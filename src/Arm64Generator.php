<?php

use Context\ArrayLiteralContext;
use Context\AsignacionContext;
use Context\BinaryExpressionSContext;
use Context\BinaryExpressionTContext;
use Context\BloqueMainContext;
use Context\ComentarioContext;
use Context\DeclaracionConstContext;
use Context\DeclaracionContext;
use Context\DeclaracionCortaContext;
use Context\ExpForContext;
use Context\ForClasicoContext;
use Context\FuncionContext;
use Context\FuncionImprimirContext;
use Context\FuncSubContext;
use Context\FuncTypeContext;
use Context\GroupedExpressionContext;
use Context\IdentifierContext;
use Context\LenFuncContext;
use Context\LiteralContext;
use Context\LlamadaFuncionContext;
use Context\LogicalExpressionContext;
use Context\NowFuncContext;
use Context\ProgramaContext;
use Context\RelationalExpresionContext;
use Context\RetornarContext;
use Context\SentenciaBreakContext;
use Context\SentenciaComentarioContext;
use Context\SentenciaContinueContext;
use Context\SentenciaForContext;
use Context\SentenciaIfContext;
use Context\SentenciaSwitchContext;
use Context\SubFuncContext;
use Context\TypeFuncContext;

    class Arm64Generator extends GrammarBaseVisitor {
        private $dataSection = ".section .data\n";

        private $dataSectionExt = "    fmt_int:   .asciz \"%d\"\n" .
                                  "    fmt_float:   .asciz \"%g\"\n" .
                                  "    fmt_string: .asciz \"%s\"\n" .
                                  "    fmt_char:  .asciz \"%c\"\n" .
                                  "    str_space: .asciz \" \"\n" .
                                  "    str_nl:    .asciz \"\\n\"\n" .
                                  "    str_true:  .asciz \"true\"\n" .
                                  "    str_false: .asciz \"false\"\n" .
                                  "    str_nil:   .asciz \"nil\"\n" .
                                  "    str_empty: .asciz \"\"\n";

        private $textSection = ".section .text\n.align 2\n.global main\n\n";
        
        private $envStack = [];
        private $currentOffset = 0;
        private $labelCounter = 0;
        private $loopStack = [];
        private $currentFunction = "";
        private $retornosEsperados = 1;
        private $floatCount = 0;
        private $strCount = 0;
        public $lenCount = 0;
        public $substrCount = 0;

        private $functionsTabla = [];

        public function setFunctionsTabla($tabla) {
            $this->functionsTabla = $tabla;
        }

        private $availableRegisters = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
        private $availableFloatRegs = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

        private function getNewLabel() {
            $this->labelCounter++;
            return "L" . $this->labelCounter;
        }

        private function pushEnv() {
            array_push($this->envStack, []);
        }

        private function popEnv() {
            array_pop($this->envStack);
        }

        private function allocateVariable($id, $type, $sizeBytes, $metadata = []) {
            $isGlobal = count($this->envStack) === 1;

            $varInfo = [
                "type" => $type,
                "size" => $sizeBytes,
                "isGlobal" => $isGlobal
            ];

            foreach ($metadata as $key => $value) {
                $varInfo[$key] = $value;
            }

            if ($isGlobal) {
                $varInfo["label"] = "glob_" . $id;
            } else {
                $this->currentOffset -= $sizeBytes;
                $varInfo["offset"] = $this->currentOffset;
            }

            $this->envStack[count($this->envStack) - 1][$id] = $varInfo;
            return $varInfo;
        }

        private function getRegister() {
            if (empty($this->availableRegisters)) {
                echo "Error interno del generador: Se agotaron los registros temporales.\n";
                return 0;
            }
            return array_shift($this->availableRegisters);
        }

        private function freeRegister($reg) {
            if (!in_array($reg, $this->availableRegisters)) {
                array_unshift($this->availableRegisters, $reg);
            }
        }

        public function getFloatRegister() {
            if (empty($this->availableFloatRegs)) {
                throw new \Exception("Se acabaron los registros FPU");
            }
            $reg = array_shift($this->availableFloatRegs);
            
            return $reg; 
        }

        public function freeFloatRegister($reg) {
            if (!in_array($reg, $this->availableFloatRegs)) {
                array_push($this->availableFloatRegs, $reg);
                sort($this->availableFloatRegs);
            }
        }

        public function extraerTipoYDimensiones($tiposCtx) {
            $dimensiones = [];
            $actual = $tiposCtx;

            while (method_exists($actual, 'LCOR') && $actual->LCOR() !== null) {
                $dim = intval($actual->logExpr()->getText());
                $dimensiones[] = $dim;
                
                $actual = $actual->tipos(); 
            }

            $textoBase = strtolower($actual->getText());
            $tipoReal = "int32";
            
            if (strpos($textoBase, 'float') !== false) $tipoReal = "float32";
            else if (strpos($textoBase, 'string') !== false) $tipoReal = "string";
            else if (strpos($textoBase, '*') !== false) $tipoReal = "ptr";
            else if (strpos($textoBase, 'rune') !== false) $tipoReal = "rune";
            else if (strpos($textoBase, 'bool') !== false) $tipoReal = "bool";

            return [
                "tipoBase" => $tipoReal,
                "dimensiones" => $dimensiones
            ];
        }

        public function getAssembly() {
            $assemblyFinal = $this->dataSection . $this->dataSectionExt . "\n" . $this->textSection . "\n";
            return $assemblyFinal . "\n";
        }

        //INICIO DEL PROGRAMA
        public function visitPrograma(ProgramaContext $ctx){
            $this->pushEnv();

            foreach($ctx->topLevel() as $node){
                $this->visit($node);
            }

            $this->popEnv();
            return null;
        }

        //BLOQUE DE INICIO
        public function visitBloqueMain(BloqueMainContext $ctx){
            $this->textSection .= "main:\n";

            $this->textSection .= "    # --- Prologo de la funcion main ---\n";
            $this->textSection .= "    stp x29, x30, [sp, -16]!\n";
            $this->textSection .= "    mov x29, sp\n";

            $this->textSection .= "    sub sp, sp, #1024 // Reservar memoria para variables locales\n\n";

            $this->pushEnv();

            $this->visit($ctx->bloque());

            $this->popEnv();

            $this->textSection .= "    # --- Epilogo de la funcion main ---\n";
            $this->textSection .= "    add sp, sp, #1024\n";
            $this->textSection .= "    ldp x29, x30, [sp], 16\n";

            $this->textSection .= "    mov w0, 0 // Codigo de salida exitosa\n";
            $this->textSection .= "    ret\n";

            return null;
        }

        //FUNCION TYPEOF
        public function visitTypeFunc(Context\TypeFuncContext $ctx){
            return $this->visit($ctx->funcType());
        }

        public function visitFuncType(Context\FuncTypeContext $ctx){
            $this->textSection .= "    # --- Ejecutando funcion embebida typeOf() ---\n";

            $exprCtx = $ctx->logExpr();
            $exprRes = $this->visit($exprCtx);

            $tipoReal = $exprRes["type"];

            if ($tipoReal === "array_literal") {
                $tipoReal = "array";
            }

            if (isset($exprRes["reg"]) && $exprRes["reg"] !== -1) {
                if ($exprRes["type"] === "float32") {
                    $this->freeFloatRegister($exprRes["reg"]);
                } else {
                    $this->freeRegister($exprRes["reg"]);
                }
            }

            $label = "type_str_" . $this->strCount++;
            $this->dataSectionExt .= "    $label: .asciz \"$tipoReal\"\n";

            $regResult = $this->getRegister();
            $this->textSection .= "    ldr x$regResult, =$label // Retornando puntero al string '$tipoReal'\n";

            return [
                "type" => "string",
                "reg" => $regResult
            ];
        }

        //FUNCION SUBSTR
        public function visitSubFunc(Context\SubFuncContext $ctx){
            return $this->visit($ctx->funcSub());
        }

        public function visitFuncSub(Context\FuncSubContext $ctx){
            $this->textSection .= "    # --- Ejecutando funcion embebida substr() ---\n";
            
            $expresiones = $ctx->logExpr(); 
            $strCtx = $expresiones[0];
            $startCtx = $expresiones[1];
            $lenCtx = $expresiones[2];

            $strRes = $this->visit($strCtx);
            $regStr = $strRes["reg"];

            $startRes = $this->visit($startCtx);
            $regStart = $startRes["reg"];

            $lenRes = $this->visit($lenCtx);
            $regLen = $lenRes["reg"];

            $regResult = $this->getRegister();
            
            $bufLabel = "substr_buf_" . $this->substrCount;
            $loopLabel = "substr_loop_" . $this->substrCount;
            $endLabel = "substr_end_" . $this->substrCount;
            $this->substrCount++;

            $this->dataSectionExt .= "    $bufLabel: .space 256 // Buffer para el resultado de substr()\n";

            $this->textSection .= "    # --- Logica de subcadena en hardware ---\n";
            
            $regDest = $this->getRegister();
            $regSrc = $this->getRegister();
            $regCount = $this->getRegister();
            $regTemp64 = $this->getRegister();
            $regTempByte = $this->getRegister();

            $this->textSection .= "    ldr x$regDest, =$bufLabel\n";
            
            $this->textSection .= "    sxtw x$regTemp64, w$regStart\n";
            $this->textSection .= "    add x$regSrc, x$regStr, x$regTemp64\n";
            
            $this->textSection .= "    mov w$regCount, w$regLen\n";

            $this->textSection .= "$loopLabel:\n";
            $this->textSection .= "    cbz w$regCount, $endLabel            // Si el contador de longitud llega a 0, terminar\n";
            
            $this->textSection .= "    ldrb w$regTempByte, [x$regSrc], #1 // Leer byte original y avanzar puntero origen\n";
            $this->textSection .= "    cbz w$regTempByte, $endLabel // Si la cadena original se acaba (Nulo), terminar por seguridad\n";
            
            $this->textSection .= "    strb w$regTempByte, [x$regDest], #1 // Escribir byte en el destino y avanzar puntero destino\n";
            $this->textSection .= "    sub w$regCount, w$regCount, #1               // Restar 1 a la longitud pendiente\n";
            $this->textSection .= "    b $loopLabel                 // Repetir ciclo\n";
            
            $this->textSection .= "$endLabel:\n";
            $this->textSection .= "    strb wzr, [x$regDest]               // Poner caracter nulo (0) al final del nuevo string\n";

            $this->textSection .= "    ldr x$regResult, =$bufLabel  // Devolver el puntero base del nuevo string\n";

            $this->freeRegister($regStr);
            $this->freeRegister($regStart);
            $this->freeRegister($regLen);
            $this->freeRegister($regDest);
            $this->freeRegister($regSrc);
            $this->freeRegister($regCount);
            $this->freeRegister($regTemp64);
            $this->freeRegister($regTempByte);

            return [
                "type" => "string",
                "reg" => $regResult
            ];
        }

        //FUNCION NOW
        public function visitNowFunc(Context\NowFuncContext $ctx){
            return $this->visit($ctx->funcNow());
        }
        
        public function visitFuncNow(Context\FuncNowContext $ctx){
            $this->textSection .= "    # --- Ejecutando funcion embebida now() ---\n";
            
            $fechaActual = date("Y-m-d H:i:s");
            
            $strLabel = "str_now_" . $this->strCount++;
            
            $this->dataSectionExt .= "    $strLabel: .asciz \"$fechaActual\"\n";
            
            $regResult = $this->getRegister();
            $this->textSection .= "    ldr x$regResult, =$strLabel // Cargar puntero al string de la fecha\n";
            
            return [
                "type" => "string",
                "innerType" => "string",
                "size" => 8,
                "reg" => $regResult
            ];
        }

        //FUNCION LEN
        public function visitLenFunc(Context\LenFuncContext $ctx){
            return $this->visit($ctx->funcLen());
        }

        public function visitFuncLen(Context\FuncLenContext $ctx){
            $this->textSection .= "    # --- Ejecutando funcion embebida len() ---\n";
            
            $exprRes = $this->visit($ctx->logExpr());
            $tipo = $exprRes["type"];
            
            $regResult = $this->getRegister();

            if ($tipo === "array") {
                $dimensiones = $exprRes["dimensiones"] ?? [];
                $len = isset($dimensiones[0]) ? $dimensiones[0] : 0;
                
                $this->textSection .= "    mov w$regResult, #$len // O(1): Longitud de arreglo pre-calculada\n";
                
                if (isset($exprRes["reg"])) {
                    $this->freeRegister($exprRes["reg"]);
                }
            } 
            else if ($tipo === "array_literal") {
                $elementos = $exprRes["elementos"];
                $len = count($elementos);
                $this->textSection .= "    mov w$regResult, #$len // O(1): Longitud de arreglo literal\n";
            }
            else if ($tipo === "string" || $tipo === "ptr") {
                $regOrigen = $exprRes["reg"];
                
                if (!isset($this->lenCount)) $this->lenCount = 0;
                $loopLabel = "len_loop_" . $this->lenCount;
                $endLabel = "len_end_" . $this->lenCount;
                $this->lenCount++;

                $regTempByte = $this->getRegister();

                $this->textSection .= "    mov x$regResult, #0 // Contador = 0 (Usamos x para indexar memoria de 64-bit)\n";
                $this->textSection .= "$loopLabel:\n";
                $this->textSection .= "    ldrb w$regTempByte, [x$regOrigen, x$regResult] // Leer 1 byte del string\n";
                $this->textSection .= "    cbz w$regTempByte, $endLabel // Si el byte es '\\0' (0), terminar ciclo\n";
                $this->textSection .= "    add x$regResult, x$regResult, #1 // Contador++\n";
                $this->textSection .= "    b $loopLabel // Repetir\n";
                $this->textSection .= "$endLabel:\n";
                $this->textSection .= "    // w$regResult ahora contiene la longitud exacta en bytes\n";

                $this->freeRegister($regTempByte);
                $this->freeRegister($regOrigen);
            } 
            else {
                $this->textSection .= "    // Error Semantico: len() invalido para el tipo '$tipo'\n";
                $this->textSection .= "    mov w$regResult, #0\n";
                
                if (isset($exprRes["reg"])) {
                    if ($tipo === "float32") $this->freeFloatRegister($exprRes["reg"]);
                    else $this->freeRegister($exprRes["reg"]);
                }
            }

            return [
                "type" => "int32",
                "reg" => $regResult
            ];
        }

        //FUNCIONES
        public function visitFuncion(Context\FuncionContext $ctx){
            $funcName = $ctx->IDENTIFICADOR()->getText();
            $this->currentFunction = $funcName;

            $this->textSection .= "    # ==========================================\n";
            $this->textSection .= "    # --- Funcion: $funcName ---\n";
            $this->textSection .= "$funcName:\n";

            $this->textSection .= "    stp x29, x30, [sp, -16]!\n";
            $this->textSection .= "    mov x29, sp\n";
            $this->textSection .= "    sub sp, sp, #1024\n\n";

            $this->pushEnv();

            $oldOffset = $this->currentOffset;
            $this->currentOffset = 0;

            if ($ctx->listaParametros() !== null) {
                $params = $ctx->listaParametros()->parametro();
                $this->textSection .= "    # --- Mapeando Parametros ---\n";
                
                $intRegIdx = 0;
                $floatRegIdx = 0;

                foreach ($params as $paramCtx) {
                    $paramName = $paramCtx->IDENTIFICADOR()->getText();
                    $tiposCtx = $paramCtx->tipos();

                    $infoTipo = $this->extraerTipoYDimensiones($tiposCtx);
                    $tipoBase = $infoTipo["tipoBase"];
                    $dimensiones = $infoTipo["dimensiones"];
                    $isArray = count($dimensiones) > 0;

                    $isPtr = method_exists($paramCtx, 'MULT') && $paramCtx->MULT() !== null;

                    $metadata = [
                        "innerType" => $tipoBase,
                        "dimensiones" => $isArray ? $dimensiones : []
                    ];

                    if ($isPtr || $isArray) {
                        $tipo = $isArray ? "array_param" : "ptr";
                        
                        $varInfo = $this->allocateVariable($paramName, $tipo, 8, $metadata);
                        $offset = $varInfo["offset"];
                        
                        $this->textSection .= "    str x$intRegIdx, [x29, #$offset] // Recibiendo puntero 64-bit ($paramName)\n";
                        $intRegIdx++;
                    } 
                    else if ($tipoBase === "float32" || $tipoBase === "float") {
                        $varInfo = $this->allocateVariable($paramName, "float32", 4, $metadata);
                        $offset = $varInfo["offset"];
                        $this->textSection .= "    str s$floatRegIdx, [x29, #$offset] // Recibiendo float en FPU ($paramName)\n";
                        $floatRegIdx++;
                    } 
                    else {
                        $varInfo = $this->allocateVariable($paramName, $tipoBase, 4, $metadata);
                        $offset = $varInfo["offset"];
                        $this->textSection .= "    str w$intRegIdx, [x29, #$offset] // Recibiendo int 32-bit ($paramName)\n";
                        $intRegIdx++;
                    }
                }
                $this->textSection .= "\n";
            }

            $this->visit($ctx->bloque());

            $this->textSection .= $funcName . "_end:\n";
            $this->textSection .= "    add sp, sp, #1024\n";
            $this->textSection .= "    ldp x29, x30, [sp], 16\n";
            $this->textSection .= "    ret\n";
            $this->textSection .= "    # ==========================================\n\n";

            $this->popEnv();
            $this->currentOffset = $oldOffset;

            return null;
        }

        //llamadaFuncion
        public function visitLlamadaFuncion(Context\LlamadaFuncionContext $ctx) {
            $funcName = $ctx->IDENTIFICADOR()->getText();
            $this->textSection .= "    # --- Llamando a funcion: $funcName ---\n";

            $registrosVivos = array_diff([0, 1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15], $this->availableRegisters);
            $respaldos = [];

            if (count($registrosVivos) > 0) {
                $this->textSection .= "    // Protegiendo registros temporales activos\n";
                foreach ($registrosVivos as $reg) {
                    $this->currentOffset -= 4;
                    $offset = $this->currentOffset;
                    $respaldos[$reg] = $offset;
                    $this->textSection .= "    str w$reg, [x29, #$offset]\n";
                }
            }

            $argRegs = [];
            $argTypes = [];
            $argSizes = [];

            if ($ctx->listaExpr() !== null) {
                $args = $ctx->listaExpr()->argumento();
                foreach ($args as $argCtx) {
                    $res = $this->visit($argCtx);
                    $argRegs[] = $res["reg"];
                    $argTypes[] = $res["type"];
                    $argSizes[] = $res["size"] ?? 4;
                }
            }

            $intRegIdx = 0;
            $floatRegIdx = 0;

            foreach ($argRegs as $index => $reg) {
                $tipo = $argTypes[$index];

                if ($tipo === "float32") {
                    $this->textSection .= "    fmov s$floatRegIdx, s$reg // Pasar float a registro de argumento S\n";
                    $floatRegIdx++;
                } else if ($tipo === "array") {
                    $this->textSection .= "    # --- Paso por VALOR  ---\n";
                    $size = $argSizes[$index]; 
                    
                    $this->textSection .= "    sub sp, sp, #$size\n";

                    for ($k = 0; $k < ($size / 4); $k++) {
                        $offset = $k * 4;
                        $this->textSection .= "    ldr w16, [x$reg, #$offset]\n";
                        $this->textSection .= "    str w16, [sp, #$offset]\n";
                    }

                    $this->textSection .= "    mov x$intRegIdx, sp\n";
                    $intRegIdx++;
                } 
                else if ($tipo === "ptr" || $tipo === "array_param") {
                    $this->textSection .= "    mov x$intRegIdx, x$reg // Referencia 64-bit\n";
                    $intRegIdx++;
                } 
                else {
                    $this->textSection .= "    mov w$intRegIdx, w$reg // Entero 32-bit\n";
                    $intRegIdx++;
                }
            }

            $this->textSection .= "    bl $funcName\n";

            foreach ($argTypes as $index => $tipo) {
                if ($tipo === "array") {
                    $size = $argSizes[$index] ?? 20;
                    $this->textSection .= "    add sp, sp, #$size // Limpiando copias temporales del Stack\n";
                }
            }
            
            foreach ($argRegs as $reg) {
                $this->freeRegister($reg);
            }

            $retornosEsperados = [];
            if (isset($this->functionsTabla[$funcName])) {
                $retornosEsperados = $this->functionsTabla[$funcName]["returns"];
            } else {
                $this->textSection .= "    // Advertencia: Función '$funcName' no pre-registrada.\n";
            }

            $resRegs = [];
            $tiposProcesados = [];
            $numRetornos = count($retornosEsperados);

            for ($i = 0; $i < $numRetornos; $i++) {
                $regDestino = $this->getRegister();
                $retType = $retornosEsperados[$i];
                
                $tipoBase = is_array($retType) ? ($retType["type"] ?? "int32") : $retType;
                $innerType = is_array($retType) ? ($retType["innerType"] ?? $tipoBase) : $tipoBase;
                
                if (is_string($innerType)) {
                    $innerType = preg_replace('/\[.*?\]/', '', $innerType);
                }

                $dimensiones = is_array($retType) ? ($retType["dimensions"] ?? []) : [];

                $isArrayType = (is_string($tipoBase) && strpos($tipoBase, '[') !== false);
                $is64Bit = ($tipoBase === "string" || $tipoBase === "ptr" || $tipoBase === "array" || $tipoBase === "array_param" || $isArrayType);
                $esFloat = ($tipoBase === "float32" || $tipoBase === "float");

                if ($esFloat) {
                    $this->textSection .= "    fmov s$regDestino, s$i // Rescatando retorno float\n";
                } else if ($is64Bit) {
                    $this->textSection .= "    mov x$regDestino, x$i // Rescatando retorno 64-bit (puntero/arreglo)\n";
                } else {
                    $this->textSection .= "    mov w$regDestino, w$i // Rescatando retorno int 32-bit\n";
                }
                
                $resRegs[] = $regDestino;
                
                $tiposProcesados[] = [
                    "type" => ($tipoBase === "array") ? "array_param" : $tipoBase, 
                    "innerType" => $innerType,
                    "dimensiones" => $dimensiones
                ];
            }

            if (count($registrosVivos) > 0) {
                $this->textSection .= "    # Restaurando temporales post-llamada\n";
                foreach ($registrosVivos as $reg) {
                    $offset = $respaldos[$reg];
                    $this->textSection .= "    ldr w$reg, [x29, #$offset]\n";
                }
            }
            $this->textSection .= "\n";

            if ($numRetornos === 0) {
                return null;
            } else if ($numRetornos === 1) {
                return [
                    "type" => $tiposProcesados[0]["type"],
                    "innerType" => $tiposProcesados[0]["innerType"],
                    "dimensiones" => $tiposProcesados[0]["dimensiones"],
                    "reg"  => $resRegs[0],
                    "regs" => $resRegs
                ];
            } else {
                return [
                    "type" => "multiple",
                    "retornos" => $tiposProcesados,
                    "regs" => $resRegs
                ];
            }
        }

        //argumentos
        public function visitArgumento(Context\ArgumentoContext $ctx) {
            if ($ctx->REF() !== null) {
                $this->textSection .= "    # --- Operacion Unaria: & (Address-Of) ---\n";

                $id = $ctx->logExpr()->getText(); 

                $varInfo = null;
                for ($i = count($this->envStack) - 1; $i >= 0; $i--) {
                    if (isset($this->envStack[$i][$id])) {
                        $varInfo = $this->envStack[$i][$id];
                        break;
                    }
                }

                if ($varInfo === null) {
                    $this->textSection .= "    // Error: Variable '$id' no encontrada\n";
                    return ["type" => "nil", "reg" => -1];
                }

                $reg = $this->getRegister();
                if ($varInfo["isGlobal"]) {
                    $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . "\n";
                } else {
                    $offset = $varInfo["offset"];
                    if ($offset < 0) {
                        $absOffset = abs($offset);
                        $this->textSection .= "    sub x$reg, x29, #$absOffset // Calculando direccion de $id\n";
                    } else {
                        $this->textSection .= "    add x$reg, x29, #$offset // Calculando direccion de $id\n";
                    }
                }
                
                return ["type" => "ptr", "reg" => $reg, "innerType" => $varInfo["type"]];
            }

            return $this->visit($ctx->logExpr());
        }

        //return
        public function visitRetornar(Context\RetornarContext $ctx){
            $this->textSection .= "    # --- Return ---\n";

            if ($ctx->listaExpr() !== null) {
                $args = $ctx->listaExpr()->argumento();
                foreach ($args as $index => $argCtx) {
                    $res = $this->visit($argCtx);
                    $reg = $res["reg"];
                    $tipo = $res["type"];
                    
                    $is64Bit = ($tipo === "string" || $tipo === "ptr" || $tipo === "array" || $tipo === "array_param");

                    if ($tipo === "float32") {
                        $this->textSection .= "    fmov s$index, s$reg // Retorno flotante en S$index\n";
                        $this->freeFloatRegister($reg);
                    } else if ($is64Bit) {
                        $this->textSection .= "    mov x$index, x$reg // Retorno 64-bit (puntero/arreglo/string) en X$index\n";
                        $this->freeRegister($reg);
                    } else {
                        $this->textSection .= "    mov w$index, w$reg // Retorno 32-bit (entero/bool) en W$index\n";
                        $this->freeRegister($reg);
                    }
                }
            }
            $this->textSection .= "    b " . $this->currentFunction . "_end\n\n";
            return null;
        }

        //SENTENCIA FOR
        public function visitSentenciaFor(SentenciaForContext $ctx){
            if ($ctx->forClasico() !== null) {
                return $this->visit($ctx->forClasico());
            }

            $lblStart = $this->getNewLabel() . "_for_start";
            $lblNext = $lblStart;
            $lblEnd = $this->getNewLabel() . "_for_end";

            array_push($this->loopStack, ["start" => $lblStart, "next" => $lblNext, "end" => $lblEnd]);

            $this->textSection .= "    # --- Inicio FOR ---\n";
            $this->textSection .= "$lblStart:\n";

            if ($ctx->logExpr() !== null) {
                $condResult = $this->visit($ctx->logExpr());
                $regCond = $condResult["reg"];
                $this->textSection .= "    cbz w$regCond, $lblEnd\n";
                $this->freeRegister($regCond);
            }

            $this->pushEnv();
            $this->visit($ctx->bloque());
            $this->popEnv();

            $this->textSection .= "    b $lblStart\n";
            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    # --- Fin FOR ---\n\n";

            array_pop($this->loopStack);
            return null;
        }

        //FOR CLASICO
        public function visitForClasico(ForClasicoContext $ctx){
            $this->textSection .= "    # --- Inicio FOR Clasico ---\n";

            $this->pushEnv(); 
            $this->visit($ctx->declaracionCorta());

            $lblStart = $this->getNewLabel() . "_for_start";
        
            $lblNext = $this->getNewLabel() . "_for_next"; 
            $lblEnd = $this->getNewLabel() . "_for_end";

            array_push($this->loopStack, ["start" => $lblStart, "next" => $lblNext, "end" => $lblEnd]);

            $this->textSection .= "$lblStart:\n";
            $condResult = $this->visit($ctx->logExpr());
            $regCond = $condResult["reg"];
            $this->textSection .= "    cbz w$regCond, $lblEnd\n";
            $this->freeRegister($regCond);

            $this->pushEnv();
            $this->visit($ctx->bloque());
            $this->popEnv();

            $this->textSection .= "$lblNext:\n";
            $this->visit($ctx->condFor());
            $this->textSection .= "    b $lblStart\n";

            $this->textSection .= "$lblEnd:\n";

            array_pop($this->loopStack);
            $this->popEnv();

            $this->textSection .= "    # --- Fin FOR Clasico ---\n\n";
            return null;
        }

        //Break
        public function visitSentenciaBreak(SentenciaBreakContext $ctx){
            if (!empty($this->loopStack)) {
                $currentLoop = end($this->loopStack);
                $lblEnd = $currentLoop["end"];
                $this->textSection .= "    b $lblEnd // break\n";
            }
            return null;
        }

        //Continue
        public function visitSentenciaContinue(SentenciaContinueContext $ctx){
            if (!empty($this->loopStack)) {
                $currentLoop = end($this->loopStack);
                $lblNext = $currentLoop["next"];
                $this->textSection .= "    b $lblNext // continue\n";
            }
            return null;
        }

        //Incremento y Decremento
        public function visitExpFor(ExpForContext $ctx){
            $id = $ctx->IDENTIFICADOR()->getText();
            $isInc = $ctx->PLUS(0) !== null;

            $varInfo = null;
            for ($i = count($this->envStack) - 1; $i >= 0; $i--) {
                if (isset($this->envStack[$i][$id])) {
                    $varInfo = $this->envStack[$i][$id];
                    break;
                }
            }

            if ($varInfo === null) return null;

            $offset = $varInfo["offset"];
            $reg = $this->getRegister();

            $this->textSection .= "    # --- " . ($isInc ? "Incremento" : "Decremento") . " ($id) ---\n";
            $this->textSection .= "    ldr w$reg, [x29, #$offset]\n";

            if ($isInc) {
                $this->textSection .= "    add w$reg, w$reg, #1\n";
            } else {
                $this->textSection .= "    sub w$reg, w$reg, #1\n";
            }

            $this->textSection .= "    str w$reg, [x29, #$offset]\n";
            $this->freeRegister($reg);

            return null;
        }

        //SENTENCIA SWITCH
        public function visitSentenciaSwitch(SentenciaSwitchContext $ctx){
            $this->textSection .= "    # --- Inicio SWITCH ---\n";
            $lblEnd = $this->getNewLabel() . "_switch_end";

            $expSwitch = $this->visit($ctx->logExpr());
            $regSwitch = $expSwitch["reg"];

            $bloqueSwitch = $ctx->bloqueSwitch();
            $casos = $bloqueSwitch->bloqueCase();

            if ($casos) {
                foreach ($casos as $index => $caseCtx) {
                    $lblBody = $this->getNewLabel() . "_case_body";
                    $lblNext = $this->getNewLabel() . "_case_next";

                    $this->textSection .= "    # --- Evaluando CASE $index ---\n";
                    $listaExpr = $caseCtx->listaExpr()->argumento();

                    foreach ($listaExpr as $argCtx) {
                        $resCase = $this->visit($argCtx);
                        $regCase = $resCase["reg"];

                        $this->textSection .= "    cmp w$regSwitch, w$regCase\n";
                        $this->textSection .= "    b.eq $lblBody\n";

                        $this->freeRegister($regCase);
                    }

                    $this->textSection .= "    b $lblNext\n";

                    $this->textSection .= "$lblBody:\n";
                    $this->pushEnv();

                    foreach ($caseCtx->i() as $instruccion) {
                        $this->visit($instruccion);
                    }

                    $this->popEnv();
                    $this->textSection .= "    b $lblEnd\n";
                    $this->textSection .= "$lblNext:\n";
                }
            }

            $bloqueDefault = $bloqueSwitch->bloqueDefault();

            if ($bloqueDefault) {
                $this->textSection .= "    # --- Bloque DEFAULT ---\n";
                $this->pushEnv();

                foreach ($bloqueDefault->i() as $instruccion) {
                    $this->visit($instruccion);
                }

                $this->popEnv();
            }

            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    # --- Fin SWITCH ---\n\n";

            $this->freeRegister($regSwitch);

            return null;
        }

        //SENTENCIA IF
        public function visitSentenciaIf(SentenciaIfContext $ctx){
            $this->textSection .= "    # --- Inicio IF ---\n";

            $tieneElse = $ctx->ELSE() !== null;

            $lblEnd = $this->getNewLabel();

            $lblElse = $tieneElse ? $this->getNewLabel() : $lblEnd;

            $condResult = $this->visit($ctx->logExpr());
            $regCond = $condResult["reg"];

            $this->textSection .= "    cbz w$regCond, $lblElse\n";
            $this->freeRegister($regCond);

            $this->textSection .= "    # --- Bloque TRUE ---\n";
            $this->pushEnv(); 
            $this->visit($ctx->bloque(0)); 
            $this->popEnv();

            if ($tieneElse) {
                $this->textSection .= "    b $lblEnd\n";

                $this->textSection .= "$lblElse:\n";
                $this->textSection .= "    # --- Bloque ELSE ---\n";
                $this->pushEnv();
                $this->visit($ctx->bloque(1));
                $this->popEnv();
            }

            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    # --- Fin IF ---\n\n";

            return null;
        }

        //FUNCION IMPRIMIR
        public function visitFuncionImprimir(Context\FuncionImprimirContext $ctx){
            $lista = $ctx->imprimir()->listaExpr();
            
            $this->textSection .= "    # --- Inicio fmt.Println (usando printf) ---\n";

            if ($lista != null) {
                $argumentos = $lista->argumento();

                for ($i = 0; $i < count($argumentos); $i++) {
                    $argCtx = $argumentos[$i];
                    $res = $this->visit($argCtx);

                    if ($res["type"] === "error") continue;

                    if ($res["type"] === "nil") {
                        $this->textSection .= "    ldr x1, =str_nil\n";
                        $this->textSection .= "    ldr x0, =fmt_string\n";
                        $this->textSection .= "    bl printf\n";
                    }
                    else if ($res["type"] === "bool") {
                        $reg = $res["reg"];
                        $tmpT = $this->getRegister();
                        $tmpF = $this->getRegister();
                        
                        $this->textSection .= "    cmp w$reg, #1\n";
                        $this->textSection .= "    ldr x$tmpT, =str_true\n";
                        $this->textSection .= "    ldr x$tmpF, =str_false\n";
                        $this->textSection .= "    csel x1, x$tmpT, x$tmpF, eq\n";
                        $this->textSection .= "    ldr x0, =fmt_string\n";
                        $this->textSection .= "    bl printf\n";
                        
                        $this->freeRegister($tmpT);
                        $this->freeRegister($tmpF);
                        $this->freeRegister($reg);
                    }
                    else if ($res["type"] === "int32" || $res["type"] === "int" || $res["type"] === "rune") {
                        $reg = $res["reg"];
                        $this->textSection .= "    mov w1, w$reg\n";
                        $this->textSection .= "    ldr x0, =fmt_int\n";
                        $this->textSection .= "    bl printf\n";
                        $this->freeRegister($reg);
                    } 
                    else if ($res["type"] === "float32" || $res["type"] === "float") {
                        $reg = $res["reg"];
                        
                        $this->textSection .= "    fcvt d0, s$reg // Promocion a 64-bit para printf variable\n";
                        $this->textSection .= "    ldr x0, =fmt_float\n"; 
                        $this->textSection .= "    bl printf\n";
                        
                        $this->freeFloatRegister($reg);
                    }
                    else if ($res["type"] === "string" || $res["type"] === "ptr") {
                        $reg = $res["reg"];
                        $tmpEmpty = $this->getRegister();

                        $this->textSection .= "    cmp x$reg, #0\n";
                        $this->textSection .= "    ldr x$tmpEmpty, =str_empty\n";
                        $this->textSection .= "    csel x1, x$tmpEmpty, x$reg, eq\n";
                        $this->textSection .= "    ldr x0, =fmt_string\n";
                        $this->textSection .= "    bl printf\n";

                        $this->freeRegister($tmpEmpty);
                        $this->freeRegister($reg);
                    }

                    if ($i < count($argumentos) - 1) {
                        $this->textSection .= "    ldr x0, =str_space\n";
                        $this->textSection .= "    bl printf\n";
                    }
                }
            }

            $this->textSection .= "    ldr x0, =str_nl\n";
            $this->textSection .= "    bl printf\n";
            $this->textSection .= "    # --- Fin fmt.Println ---\n\n";

            return null;
        }

        //ASIGNACION
        public function visitAsignacion(Context\AsignacionContext $ctx){
            $lValueCtx = $ctx->lValue();

            if (method_exists($lValueCtx, 'MULT') && $lValueCtx->MULT() !== null) {
                $this->textSection .= "    # --- Asignacion a puntero (*ptr = valor) ---\n";

                $exprRes = $this->visit($ctx->logExpr());
                $regDer = $exprRes["reg"];
                $tipoDer = $exprRes["type"];

                $factorRes = $this->visit($lValueCtx->factor());
                $regDir = $factorRes["reg"];

                if ($tipoDer === "float32") {
                    $this->textSection .= "    str s$regDer, [x$regDir] // Guardando float apuntado\n\n";
                    $this->freeFloatRegister($regDer);
                } else if ($tipoDer === "string" || $tipoDer === "ptr") {
                    $this->textSection .= "    str x$regDer, [x$regDir] // Guardando puntero/string apuntado (64-bit)\n\n";
                    $this->freeRegister($regDer);
                } else {
                    $this->textSection .= "    str w$regDer, [x$regDir] // Guardando int apuntado\n\n";
                    $this->freeRegister($regDer);
                }

                $this->freeRegister($regDir);
                return null;
            }

            if (method_exists($lValueCtx, 'LCOR') && $lValueCtx->LCOR() !== null) {
                $this->textSection .= "    # --- Acceso a Arreglo para Asignacion ---\n";

                $exprRes = $this->visit($ctx->logExpr());
                $regDer = $exprRes["reg"];
                $tipoDer = $exprRes["type"];

                $baseRes = $this->visit($lValueCtx->factor());
                $regBase = $baseRes["reg"];

                $dimensiones = $baseRes["dimensiones"] ?? [];
                if (count($dimensiones) > 0) {
                    array_shift($dimensiones);
                }

                $indexRes = $this->visit($lValueCtx->logExpr());
                $regIndex = $indexRes["reg"];

                $pesoCelda = ($tipoDer === "string" || $tipoDer === "ptr") ? 8 : 4;
                $elementosRestantes = 1;
                foreach ($dimensiones as $dim) {
                    $elementosRestantes *= $dim;
                }
                $chunkSize = $elementosRestantes * $pesoCelda;

                $regOffset = $this->getRegister();
                $this->textSection .= "    mov w$regOffset, #$chunkSize\n";                                                                                                                  
                $this->textSection .= "    mul w$regIndex, w$regIndex, w$regOffset\n";
                $this->textSection .= "    sxtw x$regIndex, w$regIndex\n";

                $this->textSection .= "    add x$regBase, x$regBase, x$regIndex // Dir exacta a procesar\n";

                $simboloCtx = $ctx->simboloAsignacion();
                $op = ($simboloCtx->op !== null) ? $simboloCtx->op->getText() . "=" : "=";

                if ($op !== "=") {
                    $this->textSection .= "    # --- Operacion Compuesta ($op) en Arreglo ---\n";

                    if ($tipoDer === "float32") {
                        $regActual = $this->getFloatRegister();
                        $this->textSection .= "    ldr s$regActual, [x$regBase] // Leer valor actual float\n";

                        switch ($op) {
                            case "+=": $this->textSection .= "    fadd s$regDer, s$regActual, s$regDer\n"; break;
                            case "-=": $this->textSection .= "    fsub s$regDer, s$regActual, s$regDer\n"; break;
                            case "*=": $this->textSection .= "    fmul s$regDer, s$regActual, s$regDer\n"; break;
                            case "/=": $this->textSection .= "    fdiv s$regDer, s$regActual, s$regDer\n"; break;
                        }
                        $this->freeFloatRegister($regActual);
                    } else {
                        $regActual = $this->getRegister();
                        $this->textSection .= "    ldr w$regActual, [x$regBase] // Leer valor actual int\n";

                        switch ($op) {
                            case "+=": $this->textSection .= "    add w$regDer, w$regActual, w$regDer\n"; break;
                            case "-=": $this->textSection .= "    sub w$regDer, w$regActual, w$regDer\n"; break;
                            case "*=": $this->textSection .= "    mul w$regDer, w$regActual, w$regDer\n"; break;
                            case "/=": $this->textSection .= "    sdiv w$regDer, w$regActual, w$regDer\n"; break;
                        }
                        $this->freeRegister($regActual);
                    }
                }

                if ($tipoDer === "float32") {
                    $this->textSection .= "    str s$regDer, [x$regBase] // Guardar en celda float\n\n";
                    $this->freeFloatRegister($regDer);
                } else if ($tipoDer === "string" || $tipoDer === "ptr") {
                    $this->textSection .= "    str x$regDer, [x$regBase] // Guardar en celda 64-bit\n\n";
                    $this->freeRegister($regDer);
                } else {
                    $this->textSection .= "    str w$regDer, [x$regBase] // Guardar en celda int\n\n";
                    $this->freeRegister($regDer);
                }

                $this->freeRegister($regBase);
                $this->freeRegister($regIndex);
                $this->freeRegister($regOffset);
                return null;
            }

            if ($lValueCtx->IDENTIFICADOR() === null) {
                $this->textSection .= "    // Error: Asignacion no valida\n";
                return null;
            }

            $name = $lValueCtx->IDENTIFICADOR()->getText();
            $simboloCtx = $ctx->simboloAsignacion();
            $op = ($simboloCtx->op !== null) ? $simboloCtx->op->getText() . "=" : "=";

            $this->textSection .= "    # --- Asignacion ($op) a variable '$name' ---\n";

            $varInfo = null;
            for ($j = count($this->envStack) - 1; $j >= 0; $j--) {
                if (isset($this->envStack[$j][$name])) {
                    $varInfo = $this->envStack[$j][$name];
                    break;
                }
            }

            if ($varInfo === null) {
                $this->textSection .= "    // Error Semantico: Variable '$name' no declarada\n\n";
                return null;
            }

            $exprResult = $this->visit($ctx->logExpr());
            $regDer = $exprResult["reg"];
            $tipoReal = $exprResult["type"];

            $tipoVar = $varInfo["type"];
            $isFloatVar = ($tipoVar === "float32");
            $isFloatDer = ($tipoReal === "float32");

            if ($tipoVar === "string" || $tipoReal === "string") {
                if ($op === "=") {
                    if ($varInfo["isGlobal"]) {
                        $regDir = $this->getRegister();
                        $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                        $this->textSection .= "    str x$regDer, [x$regDir] \n";
                        $this->freeRegister($regDir);
                    } else {
                        $offset = $varInfo["offset"];
                        $this->textSection .= "    str x$regDer, [x29, #$offset] \n";
                    }
                } else if ($op === "+=") {
                    $regDir = $this->getRegister();
                    if ($varInfo["isGlobal"]) {
                        $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                        $this->textSection .= "    ldr x0, [x$regDir] \n";
                    } else {
                        $offset = $varInfo["offset"];
                        $this->textSection .= "    ldr x0, [x29, #$offset] \n";
                    }
                    $this->textSection .= "    mov x1, x$regDer \n";
                    $this->textSection .= "    bl concat_strings \n";
                    if ($varInfo["isGlobal"]) $this->textSection .= "    str x0, [x$regDir] \n";
                    else $this->textSection .= "    str x0, [x29, #$offset] \n";
                    $this->freeRegister($regDir);
                }
                $this->freeRegister($regDer);
                return null;
            }

            if ($op !== "=") {
                $regFinal = $isFloatVar ? $this->getFloatRegister() : $this->getRegister();
                $offset = $varInfo["offset"];

                if ($varInfo["isGlobal"]) {
                    $regDir = $this->getRegister();
                    $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                    if ($isFloatVar) $this->textSection .= "    ldr s$regFinal, [x$regDir]\n";
                    else $this->textSection .= "    ldr w$regFinal, [x$regDir]\n";
                    $this->freeRegister($regDir);
                } else {
                    if ($isFloatVar) $this->textSection .= "    ldr s$regFinal, [x29, #$offset]\n";
                    else $this->textSection .= "    ldr w$regFinal, [x29, #$offset]\n";
                }

                if ($isFloatVar) {
                    $regDerAUsar = ($isFloatDer) ? $regDer : $this->getFloatRegister();
                    if (!$isFloatDer) $this->textSection .= "    scvtf s$regDerAUsar, w$regDer\n";

                    switch ($op) {
                        case "+=": $this->textSection .= "    fadd s$regFinal, s$regFinal, s$regDerAUsar\n"; break;
                        case "-=": $this->textSection .= "    fsub s$regFinal, s$regFinal, s$regDerAUsar\n"; break;
                        case "*=": $this->textSection .= "    fmul s$regFinal, s$regFinal, s$regDerAUsar\n"; break;
                        case "/=": $this->textSection .= "    fdiv s$regFinal, s$regFinal, s$regDerAUsar\n"; break;
                    }
                    if (!$isFloatDer) $this->freeFloatRegister($regDerAUsar);
                } else {
                    switch ($op) {
                        case "+=": $this->textSection .= "    add w$regFinal, w$regFinal, w$regDer\n"; break;
                        case "-=": $this->textSection .= "    sub w$regFinal, w$regFinal, w$regDer\n"; break;
                        case "*=": $this->textSection .= "    mul w$regFinal, w$regFinal, w$regDer\n"; break;
                        case "/=": $this->textSection .= "    sdiv w$regFinal, w$regFinal, w$regDer\n"; break;
                    }
                }
                $regDer = $regFinal;
            }

            if ($varInfo["isGlobal"]) {
                $regDir = $this->getRegister();
                $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                if ($isFloatVar) $this->textSection .= "    str s$regDer, [x$regDir]\n";
                else $this->textSection .= "    str w$regDer, [x$regDir]\n";
                $this->freeRegister($regDir);
            } else {
                $offset = $varInfo["offset"];
                if ($isFloatVar) $this->textSection .= "    str s$regDer, [x29, #$offset]\n";
                else $this->textSection .= "    str w$regDer, [x29, #$offset]\n";
            }

            if ($isFloatVar || $isFloatDer) $this->freeFloatRegister($regDer);
            else $this->freeRegister($regDer);

            $this->textSection .= "\n";
            return null;
        }

        //DECLARACION CORTA
        public function visitDeclaracionCorta(Context\DeclaracionCortaContext $ctx){
            $ids = $ctx->listaId()->IDENTIFICADOR();
            $expresiones = $ctx->listaExpr()->argumento(); 

            if (count($ids) > 1 && count($expresiones) === 1) {
                $this->textSection .= "    # --- Declaracion Corta Multiple ---\n";

                $this->retornosEsperados = count($ids);
                $exprResult = $this->visit($expresiones[0]);
                $this->retornosEsperados = 1; 

                $regsRetorno = $exprResult["regs"]; 
                $retornosMetadata = $exprResult["retornos"] ?? [];

                for ($i = 0; $i < count($ids); $i++) {
                    $name = $ids[$i]->getText();
                    $regOrigen = $regsRetorno[$i];
                    
                    $retData = $retornosMetadata[$i] ?? null;
                    $tipo = is_array($retData) ? ($retData["type"] ?? "int32") : "int32";
                    $innerType = is_array($retData) ? ($retData["innerType"] ?? $tipo) : $tipo;
                    $dimensiones = is_array($retData) ? ($retData["dimensiones"] ?? []) : [];

                    if (empty($dimensiones) && is_string($tipo)) {
                        if (preg_match_all('/\[(\d+)\]/', $tipo, $matches)) {
                            foreach ($matches[1] as $d) {
                                $dimensiones[] = intval($d);
                            }
                        }
                    }

                    if (is_string($innerType)) {
                        $innerType = preg_replace('/\[.*?\]/', '', $innerType);
                    }

                    $isArrayType = (is_string($tipo) && strpos($tipo, '[') !== false);
                    $isFullArrayFromFunc = ($tipo === "array" || $tipo === "array_param" || $isArrayType);

                    $pesoC = 4;
                    if ($isFullArrayFromFunc) {
                        $pesoC = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
                        $totalElems = 1;
                        foreach ($dimensiones as $d) $totalElems *= $d;
                        $size = $totalElems * $pesoC;
                        $tipoAGuardar = "array";
                    } else {
                        $is64Bit = ($tipo === "ptr" || $tipo === "string");
                        $size = $is64Bit ? 8 : 4;
                        $tipoAGuardar = $tipo;
                    }

                    $metadata = [
                        "innerType" => $innerType,
                        "dimensiones" => $dimensiones
                    ];

                    $varInfo = $this->allocateVariable($name, $tipoAGuardar, $size, $metadata);
                    $offset = abs($varInfo["offset"]);

                    if ($isFullArrayFromFunc) {
                        $this->textSection .= "    # --- Copiando Arreglo Retornado ---\n";
                        $regBaseLocal = $this->getRegister();
                        $this->textSection .= "    sub x$regBaseLocal, x29, #$offset // Base local protegida\n";
                        
                        $cantidad = $size / $pesoC;
                        for ($k = 0; $k < $cantidad; $k++) {
                            $currOff = $k * $pesoC;
                            if ($pesoC === 8) {
                                $this->textSection .= "    ldr x16, [x$regOrigen, #$currOff]\n";
                                $this->textSection .= "    str x16, [x$regBaseLocal, #$currOff]\n";
                            } else {
                                $this->textSection .= "    ldr w16, [x$regOrigen, #$currOff]\n";
                                $this->textSection .= "    str w16, [x$regBaseLocal, #$currOff]\n";
                            }
                        }
                        $this->freeRegister($regBaseLocal);
                        $this->freeRegister($regOrigen);
                    } else if ($tipoAGuardar === "ptr" || $tipoAGuardar === "string") {
                        $this->textSection .= "    str x$regOrigen, [x29, #-$offset]\n";
                        $this->freeRegister($regOrigen);
                    } else if ($tipoAGuardar === "float32" || $tipoAGuardar === "float") {
                        $this->textSection .= "    str s$regOrigen, [x29, #-$offset]\n";
                        $this->freeFloatRegister($regOrigen);
                    } else {
                        $this->textSection .= "    str w$regOrigen, [x29, #-$offset]\n";
                        $this->freeRegister($regOrigen);
                    }
                }
                $this->textSection .= "\n";
                return null;
            }

            for ($i = 0; $i < count($ids); $i++) {
                $name = $ids[$i]->getText();
                $exprCtx = $expresiones[$i];

                $this->textSection .= "    # --- Declarando variable '$name' ---\n";

                $exprResult = $this->visit($exprCtx);
                $tipo = $exprResult["type"];

                $pesoC = 4;

                if ($tipo === "array_literal") {
                    $elementos = $exprResult["elementos"];
                    $count = count($elementos);

                    $innerTypeInferred = "int32";
                    if ($count > 0) {
                        $firstElem = $this->visit($elementos[0]->logExpr());
                        $innerTypeInferred = $firstElem["type"];
                        $this->freeRegister($firstElem["reg"]);
                    }

                    if (is_string($innerTypeInferred)) {
                        $innerTypeInferred = preg_replace('/\[.*?\]/', '', $innerTypeInferred);
                    }

                    $pesoC = ($innerTypeInferred === "string" || $innerTypeInferred === "ptr") ? 8 : 4;
                    $size = $count * $pesoC;

                    $metadata = [
                        "innerType" => $innerTypeInferred,
                        "dimensiones" => [$count]
                    ];

                    $varInfo = $this->allocateVariable($name, "array", $size, $metadata);
                    $offset = abs($varInfo["offset"]);

                    $this->textSection .= "    # --- Inicializando Arreglo Literal ---\n";
                    for ($k = 0; $k < $count; $k++) {
                        $resElem = $this->visit($elementos[$k]->logExpr());
                        $regElem = $resElem["reg"]; 
                        $tipoElem = $resElem["type"];

                        $elemOffset = $offset - ($k * $pesoC); 

                        if ($tipoElem === "float32") {
                            $this->textSection .= "    str s$regElem, [x29, #-$elemOffset] // Indice $k\n";
                            $this->freeFloatRegister($regElem);
                        } else if ($tipoElem === "string" || $tipoElem === "ptr" || strpos($tipoElem, '[') !== false) {
                            $this->textSection .= "    str x$regElem, [x29, #-$elemOffset] // Indice $k\n";
                            $this->freeRegister($regElem);
                        } else {
                            $this->textSection .= "    str w$regElem, [x29, #-$elemOffset] // Indice $k\n";
                            $this->freeRegister($regElem);
                        }
                    }
                } 
                else {
                    $regOrigen = $exprResult["reg"];
                    
                    $isArrayType = (is_string($tipo) && strpos($tipo, '[') !== false);
                    $isFullArrayFromFunc = ($tipo === "array_param" || $isArrayType);

                    $innerTypeToSave = $exprResult["innerType"] ?? $tipo;
                    if (is_string($innerTypeToSave)) {
                        $innerTypeToSave = preg_replace('/\[.*?\]/', '', $innerTypeToSave);
                    }

                    $dimensiones = $exprResult["dimensiones"] ?? [];

                    if (empty($dimensiones) && is_string($tipo)) {
                        if (preg_match_all('/\[(\d+)\]/', $tipo, $matches)) {
                            foreach ($matches[1] as $d) {
                                $dimensiones[] = intval($d);
                            }
                        }
                    }

                    if ($isFullArrayFromFunc) {
                        $pesoC = ($innerTypeToSave === "string" || $innerTypeToSave === "ptr") ? 8 : 4;
                        $totalElems = 1;
                        foreach ($dimensiones as $d) $totalElems *= $d;
                        $size = $totalElems * $pesoC;
                        $tipoAGuardar = "array";
                    } else {
                        $is64Bit = ($tipo === "ptr" || $tipo === "string");
                        $size = $is64Bit ? 8 : 4;
                        $tipoAGuardar = $tipo;
                    }

                    $metadata = [
                        "innerType" => $innerTypeToSave,
                        "dimensiones" => $dimensiones
                    ];

                    $varInfo = $this->allocateVariable($name, $tipoAGuardar, $size, $metadata);
                    $offset = abs($varInfo["offset"]);

                    if ($isFullArrayFromFunc) {
                        $this->textSection .= "    # --- Copiando Arreglo Retornado ---\n";
                        $regBaseLocal = $this->getRegister();
                        $this->textSection .= "    sub x$regBaseLocal, x29, #$offset // Base local protegida\n";
                        
                        $cantidad = $size / $pesoC;
                        for ($k = 0; $k < $cantidad; $k++) {
                            $currOff = $k * $pesoC;
                            if ($pesoC === 8) {
                                $this->textSection .= "    ldr x16, [x$regOrigen, #$currOff]\n";
                                $this->textSection .= "    str x16, [x$regBaseLocal, #$currOff]\n";
                            } else {
                                $this->textSection .= "    ldr w16, [x$regOrigen, #$currOff]\n";
                                $this->textSection .= "    str w16, [x$regBaseLocal, #$currOff]\n";
                            }
                        }
                        $this->freeRegister($regBaseLocal);
                        $this->freeRegister($regOrigen);
                    } else if ($tipoAGuardar === "ptr" || $tipoAGuardar === "string") {
                        $this->textSection .= "    str x$regOrigen, [x29, #-$offset] // Guardando 64-bit\n";
                        $this->freeRegister($regOrigen);
                    } else if ($tipoAGuardar === "float32" || $tipoAGuardar === "float") {
                        $this->textSection .= "    str s$regOrigen, [x29, #-$offset] // Guardando float\n";
                        $this->freeFloatRegister($regOrigen);
                    } else {
                        $this->textSection .= "    str w$regOrigen, [x29, #-$offset] // Guardando 32-bit\n";
                        $this->freeRegister($regOrigen);
                    }
                }
                $this->textSection .= "\n";
            }
            return null;
        }

        //DECLARACION
        public function visitDeclaracion(Context\DeclaracionContext $ctx) {
            $ids = $ctx->listaId()->IDENTIFICADOR();
            $tiposCtx = $ctx->tipos();

            $infoTipo = $this->extraerTipoYDimensiones($tiposCtx);
            $tipoBase = $infoTipo["tipoBase"];
            $dimensiones = $infoTipo["dimensiones"];
            $isArray = count($dimensiones) > 0;

            $innerType = $tipoBase;
            if (is_string($innerType)) {
                $innerType = preg_replace('/\[.*?\]/', '', $innerType);
            }

            if ($isArray) {
                $totalElementos = 1;
                foreach ($dimensiones as $dim) {
                    $totalElementos *= $dim;
                }

                $pesoCelda = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
                $sizeBytes = $totalElementos * $pesoCelda;
                $tipoStr = "array";
            } else {
                $sizeBytes = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
                $tipoStr = $innerType;
            }

            $tieneAsignacion = $ctx->ASSIGN() !== null;
            $expresiones = $tieneAsignacion ? $ctx->listaExpr()->argumento() : [];

            for ($i = 0; $i < count($ids); $i++) {
                $name = $ids[$i]->getText();
                $this->textSection .= "    # --- Declarando variable '$name' ($tipoStr, $sizeBytes bytes) ---\n";

                $metadata = [
                    "innerType" => $innerType,
                    "dimensiones" => $isArray ? $dimensiones : []
                ];

                $varInfo = $this->allocateVariable($name, $tipoStr, $sizeBytes, $metadata);

                if ($varInfo["isGlobal"]) {
                    $valor = 0;
                    if ($tieneAsignacion && isset($expresiones[$i])) {
                        $valor = $expresiones[$i]->getText(); 
                    }

                    if ($tipoStr === "float32") {
                        $this->dataSectionExt .= "    " . $varInfo["label"] . ": .single $valor\n";
                    } else if ($tipoStr === "string" || $tipoStr === "ptr") {
                        $this->dataSectionExt .= "    " . $varInfo["label"] . ": .dword $valor\n";
                    } else {
                        $this->dataSectionExt .= "    " . $varInfo["label"] . ": .word $valor\n";
                    }
                } 
                else {
                    $offset = $varInfo["offset"];

                    if ($tieneAsignacion && isset($expresiones[$i])) {
                        $exprResult = $this->visit($expresiones[$i]);
                        $exprType = $exprResult["type"];

                        if ($exprType === "array_literal") {
                            $this->textSection .= "    # --- Inicializando Arreglo Literal ---\n";
                            $elementos = $exprResult["elementos"];
                            $pesoC = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;

                            foreach ($elementos as $k => $elemCtx) {
                                $resElem = $this->visit($elemCtx->logExpr());
                                $regElem = $resElem["reg"]; 
                                $tipoElem = $resElem["type"];

                                $elemOffset = $offset + ($k * $pesoC);
                                if ($tipoElem === "float32") {
                                    $this->textSection .= "    str s$regElem, [x29, #$elemOffset] // Indice $k (float)\n";
                                    $this->freeFloatRegister($regElem);
                                } else if ($tipoElem === "string" || $tipoElem === "ptr" || strpos($tipoElem, '[') !== false) {
                                    $this->textSection .= "    str x$regElem, [x29, #$elemOffset] // Indice $k (64-bit)\n";
                                    $this->freeRegister($regElem);
                                } else {
                                    $this->textSection .= "    str w$regElem, [x29, #$elemOffset] // Indice $k (32-bit)\n";
                                    $this->freeRegister($regElem);
                                }
                            }
                        } 
                        else {
                            $regOrigen = $exprResult["reg"];

                            $isArrayType = (is_string($exprType) && strpos($exprType, '[') !== false);
                            $isFullArrayFromFunc = ($exprType === "array_param" || $isArrayType || $tipoStr === "array");

                            if ($isFullArrayFromFunc && $regOrigen !== -1) {
                                $this->textSection .= "    # --- Copiando Arreglo Retornado ---\n";
                                $regBaseLocal = $this->getRegister();
                                $absOffset = abs($offset);
                                $this->textSection .= "    sub x$regBaseLocal, x29, #$absOffset // Base local protegida\n";
                                
                                $pesoC = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
                                $cantidad = $sizeBytes / $pesoC;
                                
                                for ($k = 0; $k < $cantidad; $k++) {
                                    $currOff = $k * $pesoC;
                                    if ($pesoC === 8) {
                                        $this->textSection .= "    ldr x16, [x$regOrigen, #$currOff]\n";
                                        $this->textSection .= "    str x16, [x$regBaseLocal, #$currOff]\n";
                                    } else {
                                        $this->textSection .= "    ldr w16, [x$regOrigen, #$currOff]\n";
                                        $this->textSection .= "    str w16, [x$regBaseLocal, #$currOff]\n";
                                    }
                                }
                                $this->freeRegister($regBaseLocal);
                                $this->freeRegister($regOrigen);
                            } else {
                                $is64Bit = ($tipoStr === "ptr" || $exprType === "ptr" || $tipoStr === "string" || $exprType === "string");

                                if ($is64Bit) {
                                    $this->textSection .= "    str x$regOrigen, [x29, #$offset] // Guardando 64-bit ($exprType)\n";
                                    $this->freeRegister($regOrigen);
                                } else if ($tipoStr === "float32" || $exprType === "float32") {
                                    $this->textSection .= "    str s$regOrigen, [x29, #$offset] // Guardando float\n";
                                    $this->freeFloatRegister($regOrigen);
                                } else {
                                    $this->textSection .= "    str w$regOrigen, [x29, #$offset] // Guardando 32-bit\n";
                                    $this->freeRegister($regOrigen);
                                }
                            }
                        }
                    } else {
                        $regTemp = $this->getRegister();
                        $this->textSection .= "    mov x$regTemp, #0\n";

                        if ($tipoStr === "array") {
                            $pesoC = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
                            $cantidad = $sizeBytes / $pesoC;
                            for ($k = 0; $k < $cantidad; $k++) {
                                $elemOffset = $offset + ($k * $pesoC);
                                $instr = ($pesoC === 8) ? "str x" : "str w";
                                $this->textSection .= "    $instr$regTemp, [x29, #$elemOffset]\n";
                            }
                        } else {
                            $instr = ($sizeBytes === 8) ? "str x" : "str w";
                            $this->textSection .= "    $instr$regTemp, [x29, #$offset] // Inicializar con 0\n";
                        }
                        $this->freeRegister($regTemp);
                    }
                }
                $this->textSection .= "\n";
            }
            return null;
        }

        //DECLARACION CONSTANTES
        public function visitDeclaracionConst(Context\DeclaracionConstContext $ctx){
            $name = $ctx->IDENTIFICADOR()->getText();
            $exprCtx = $ctx->logExpr();

            $this->textSection .= "    # --- Declarando constante '$name' ---\n";

            $isGlobal = (count($this->envStack) === 1);

            if ($isGlobal) {
                $valorCrudo = $exprCtx->getText();
                $tipoInferred = "int32";

                if (strpos($valorCrudo, '"') !== false) {
                    $tipoInferred = "string";
                } else if (strpos($valorCrudo, '.') !== false) {
                    $tipoInferred = "float32";
                } else if ($valorCrudo === 'true' || $valorCrudo === 'false') {
                    $tipoInferred = "bool";
                }

                $sizeBytes = ($tipoInferred === "string" || $tipoInferred === "ptr") ? 8 : 4;

                $innerType = $tipoInferred;
                if (is_string($innerType)) {
                    $innerType = preg_replace('/\[.*?\]/', '', $innerType);
                }

                $varInfo = $this->allocateVariable($name, $tipoInferred, $sizeBytes, ["innerType" => $innerType]);

                if ($tipoInferred === "string") {
                    $strLabel = "str_lit_" . $this->strCount++;
                    $this->dataSectionExt .= "    $strLabel: .asciz $valorCrudo\n";
                    $this->dataSectionExt .= "    " . $varInfo["label"] . ": .dword $strLabel // Puntero a constante string\n";
                } else if ($tipoInferred === "float32") {
                    $this->dataSectionExt .= "    " . $varInfo["label"] . ": .single $valorCrudo\n";
                } else {
                    $v = $valorCrudo;
                    if ($v === 'true') $v = 1;
                    if ($v === 'false') $v = 0;
                    $this->dataSectionExt .= "    " . $varInfo["label"] . ": .word $v\n";
                }
            } else {
                $exprResult = $this->visit($exprCtx);
                $tipo = $exprResult["type"];

                if ($tipo === "array_literal") {
                    $elementos = $exprResult["elementos"];
                    $count = count($elementos);

                    $innerTypeInferred = "int32";
                    if ($count > 0) {
                        $firstRes = $this->visit($elementos[0]->logExpr());
                        $innerTypeInferred = $firstRes["type"];
                        $this->freeRegister($firstRes["reg"]);
                    }

                    if (is_string($innerTypeInferred)) {
                        $innerTypeInferred = preg_replace('/\[.*?\]/', '', $innerTypeInferred);
                    }

                    $pesoC = ($innerTypeInferred === "string" || $innerTypeInferred === "ptr") ? 8 : 4;
                    $size = $count * $pesoC;

                    $metadata = [
                        "innerType" => $innerTypeInferred,
                        "dimensiones" => [$count]
                    ];

                    $varInfo = $this->allocateVariable($name, "array", $size, $metadata);
                    $offset = $varInfo["offset"];

                    $this->textSection .= "    # --- Inicializando Arreglo Constante Local: $name ---\n";
                    foreach ($elementos as $k => $elemCtx) {
                        $resElem = $this->visit($elemCtx->logExpr());
                        $regElem = $resElem["reg"]; 
                        $tipoElem = $resElem["type"];

                        $elemOffset = $offset + ($k * $pesoC);

                        if ($tipoElem === "float32") {
                            $this->textSection .= "    str s$regElem, [x29, #$elemOffset] // Indice $k\n";
                            $this->freeFloatRegister($regElem);
                        } else if ($tipoElem === "string" || $tipoElem === "ptr" || strpos($tipoElem, '[') !== false) {
                            $this->textSection .= "    str x$regElem, [x29, #$elemOffset] // Indice $k (64-bit)\n";
                            $this->freeRegister($regElem);
                        } else {
                            $this->textSection .= "    str w$regElem, [x29, #$elemOffset] // Indice $k (32-bit)\n";
                            $this->freeRegister($regElem);
                        }
                    }
                } else {
                    $regOrigen = $exprResult["reg"];
                    
                    $isArrayType = (is_string($tipo) && strpos($tipo, '[') !== false);
                    $is64Bit = ($tipo === "ptr" || $tipo === "string" || $tipo === "array_param" || $isArrayType);
                    $size = $is64Bit ? 8 : 4;

                    $innerTypeToSave = $exprResult["innerType"] ?? $tipo;
                    if (is_string($innerTypeToSave)) {
                        $innerTypeToSave = preg_replace('/\[.*?\]/', '', $innerTypeToSave);
                    }

                    $varInfo = $this->allocateVariable($name, $tipo, $size, ["innerType" => $innerTypeToSave]);
                    $offset = $varInfo["offset"];

                    if ($is64Bit) {
                        $this->textSection .= "    str x$regOrigen, [x29, #$offset] // Constante 64-bit ($tipo)\n";
                        $this->freeRegister($regOrigen);
                    } else if ($tipo === "float32") {
                        $this->textSection .= "    str s$regOrigen, [x29, #$offset] // Constante float\n";
                        $this->freeFloatRegister($regOrigen);
                    } else {
                        $this->textSection .= "    str w$regOrigen, [x29, #$offset] // Constante 32-bit\n";
                        $this->freeRegister($regOrigen);
                    }
                }
            }

            $this->textSection .= "\n";
            return null;
        }

        //OPERACION SUMA Y RESTA
        public function visitBinaryExpressionT(Context\BinaryExpressionTContext $ctx){
            $left = $this->visit($ctx->expr());
            $right = $this->visit($ctx->term());

            if ($left["type"] === "nil" || $right["type"] === "nil" || 
                $left["type"] === "error" || $right["type"] === "error") {
                return ["type" => "error", "reg" => -1];
            }

            $op = $ctx->op->getText();
            $this->textSection .= "    # Operacion: $op\n";

            $leftType = $left["type"];
            $rightType = $right["type"];
            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            if ($leftType === "string" || $rightType === "string") {
                if ($op === '+') {
                    $this->textSection .= "    // No hay operaciones de strings\n";
                } else {
                    $this->textSection .= "    // Error Semantico: Operador $op no definido para strings\n";
                }
                $this->freeRegister($leftReg);
                $this->freeRegister($rightReg);
                return ["type" => "error", "reg" => -1];
            }

            $isLeftFloat = ($leftType === "float32");
            $isRightFloat = ($rightType === "float32");

            if ($isLeftFloat || $isRightFloat) {
                $resultReg = $this->getFloatRegister();
                
                $regDerAUsar = $rightReg;
                $regIzqAUsar = $leftReg;

                if (!$isLeftFloat) {
                    $regIzqAUsar = $this->getFloatRegister();
                    $this->textSection .= "    scvtf s$regIzqAUsar, w$leftReg // Casteo izq a float\n";
                    $this->freeRegister($leftReg);
                }
                
                if (!$isRightFloat) {
                    $regDerAUsar = $this->getFloatRegister();
                    $this->textSection .= "    scvtf s$regDerAUsar, w$rightReg // Casteo der a float\n";
                    $this->freeRegister($rightReg);
                }

                if ($op === '+') {
                    $this->textSection .= "    fadd s$resultReg, s$regIzqAUsar, s$regDerAUsar\n";
                } else if ($op === '-') {
                    $this->textSection .= "    fsub s$resultReg, s$regIzqAUsar, s$regDerAUsar\n";
                }

                $this->freeFloatRegister($regIzqAUsar);
                $this->freeFloatRegister($regDerAUsar);

                return [
                    "type" => "float32",
                    "reg" => $resultReg
                ];
            } 
            else {
                $resultReg = $this->getRegister();

                if ($op === '+') {
                    $this->textSection .= "    add w$resultReg, w$leftReg, w$rightReg\n";
                } else if ($op === '-') {
                    $this->textSection .= "    sub w$resultReg, w$leftReg, w$rightReg\n";
                }
                
                $finalType = "int32"; 
                if (strpos($leftType, 'int') !== false && $rightType === "rune") {
                    $finalType = "rune";
                }

                $this->freeRegister($leftReg);
                $this->freeRegister($rightReg);

                return [
                    "type" => $finalType,
                    "reg" => $resultReg
                ];
            }
        }

        //OPERACION MULT,DIV Y MOD
        public function visitBinaryExpressionS(Context\BinaryExpressionSContext $ctx){
            $left = $this->visit($ctx->term());
            $right = $this->visit($ctx->factor());

            if ($left["type"] === "nil" || $right["type"] === "nil" || 
                $left["type"] === "error" || $right["type"] === "error") {
                return ["type" => "error", "reg" => -1];
            }

            $op = $ctx->op->getText();
            $this->textSection .= "    # Operacion: $op\n";

            $leftType = $left["type"];
            $rightType = $right["type"];
            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            if ($leftType === "string" || $rightType === "string") {
                if ($op === '*') {
                    $this->textSection .= "    // No hay operacion para strings\n";
                } else {
                    $this->textSection .= "    // Error Semantico: Operador $op no definido para strings\n";
                }
                $this->freeRegister($leftReg);
                $this->freeRegister($rightReg);
                return ["type" => "error", "reg" => -1];
            }

            $isLeftFloat = ($leftType === "float32");
            $isRightFloat = ($rightType === "float32");

            if ($isLeftFloat || $isRightFloat) {
                if ($op === '%') {
                    $this->textSection .= "    // Error Semantico: Operador % no aplicable a float32\n";
                    if ($isLeftFloat) $this->freeFloatRegister($leftReg); else $this->freeRegister($leftReg);
                    if ($isRightFloat) $this->freeFloatRegister($rightReg); else $this->freeRegister($rightReg);
                    return ["type" => "error", "reg" => -1];
                }

                $resultReg = $this->getFloatRegister();
                $regDerAUsar = $rightReg;
                $regIzqAUsar = $leftReg;

                if (!$isLeftFloat) {
                    $regIzqAUsar = $this->getFloatRegister();
                    $this->textSection .= "    scvtf s$regIzqAUsar, w$leftReg // Casteo izq a float\n";
                    $this->freeRegister($leftReg);
                }
                if (!$isRightFloat) {
                    $regDerAUsar = $this->getFloatRegister();
                    $this->textSection .= "    scvtf s$regDerAUsar, w$rightReg // Casteo der a float\n";
                    $this->freeRegister($rightReg);
                }

                if ($op === '*') {
                    $this->textSection .= "    fmul s$resultReg, s$regIzqAUsar, s$regDerAUsar\n";
                } else if ($op === '/') {
                    $this->textSection .= "    fdiv s$resultReg, s$regIzqAUsar, s$regDerAUsar\n";
                }

                $this->freeFloatRegister($regIzqAUsar);
                $this->freeFloatRegister($regDerAUsar);

                return ["type" => "float32", "reg" => $resultReg];
            } 
            else {
                $resultReg = $this->getRegister();

                if ($op === '*') {
                    $this->textSection .= "    mul w$resultReg, w$leftReg, w$rightReg\n";
                } else if ($op === '/') {
                    $this->textSection .= "    sdiv w$resultReg, w$leftReg, w$rightReg\n";
                } else if ($op === '%') {
                    $tempReg = $this->getRegister();
                    $this->textSection .= "    sdiv w$tempReg, w$leftReg, w$rightReg \n";
                    $this->textSection .= "    msub w$resultReg, w$tempReg, w$rightReg, w$leftReg \n";
                    $this->freeRegister($tempReg);
                }

                $finalType = "int32"; 
                if ($op === '%') {
                    $finalType = "int32";
                } else {
                    if ((strpos($leftType, 'int') !== false && $rightType === "rune") || 
                        ($leftType === "rune" && strpos($rightType, 'int') !== false)) {
                        $finalType = "rune";
                    }
                }

                $this->freeRegister($leftReg);
                $this->freeRegister($rightReg);

                return ["type" => $finalType, "reg" => $resultReg];
            }
        }

        //EXPRESIONES RELACIONALES
        public function visitRelationalExpresion(Context\RelationalExpresionContext $ctx){
            $left = $this->visit($ctx->relExpr());
            $right = $this->visit($ctx->expr());

            if ($left["type"] === "nil" || $right["type"] === "nil") {
            $this->textSection .= "    // Operacion relacional sobre nil: propagando nil\n";
        
                if (isset($left["reg"]) && $left["reg"] !== -1) $this->freeRegister($left["reg"]);
                if (isset($right["reg"]) && $right["reg"] !== -1) $this->freeRegister($right["reg"]);

                return ["type" => "nil", "reg" => -1];
            }

            $op = $ctx->op->getText();
            $this->textSection .= "    # Comparacion: $op\n";

            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            $cond = "";
            switch ($op) {
                case '==': $cond = "eq"; break;
                case '!=': $cond = "ne"; break;
                case '>':  $cond = "gt"; break;
                case '<':  $cond = "lt"; break;
                case '>=': $cond = "ge"; break;
                case '<=': $cond = "le"; break;
            }

            $resultReg = $this->getRegister();

            if ($left["type"] === "float32") {
                $this->textSection .= "    fcmp s$leftReg, s$rightReg\n";
                $this->textSection .= "    cset w$resultReg, $cond // Guardando resultado bool en registro de enteros\n";

                $this->freeFloatRegister($leftReg);
                $this->freeFloatRegister($rightReg);
            } 
            else {
                $this->textSection .= "    cmp w$leftReg, w$rightReg\n";
                $this->textSection .= "    cset w$resultReg, $cond\n";

                $this->freeRegister($leftReg);
                $this->freeRegister($rightReg);
            }

            return [
                "type" => "bool",
                "reg" => $resultReg
            ];
        }

        //EXPRESIONES LOGICAS
        public function visitLogicalExpression(Context\LogicalExpressionContext $ctx){
            $op = $ctx->op->getText();
            $lblEnd = $this->getNewLabel() . "_shortcircuit_end";

            $this->textSection .= "    # --- Inicio Operacion Logica: $op ---\n";

            $leftRes = $this->visit($ctx->logExpr());
            $leftType = $leftRes["type"];
            $leftReg = $leftRes["reg"];

            if ($leftType === "nil" || $leftType === "error" || $leftReg === -1) {
                $this->textSection .= "    // Error/Nil detectado en lado izquierdo de '$op'\n";
                if ($leftReg !== -1) $this->freeRegister($leftReg);
                return [
                    "type" => "nil",
                    "reg" => -1
                ];
            }

            $resultReg = $this->getRegister();
            
            $this->textSection .= "    mov w$resultReg, w$leftReg\n";

            if ($op === '&&') {
                $this->textSection .= "    cbz w$resultReg, $lblEnd\n";
            } else if ($op === '||') {
                $this->textSection .= "    cbnz w$resultReg, $lblEnd\n";
            }

            $this->textSection .= "    // Evaluando lado derecho (No hubo cortocircuito)\n";
            $rightRes = $this->visit($ctx->relExpr());
            $rightType = $rightRes["type"];
            $rightReg = $rightRes["reg"];

            if ($rightType === "nil" || $rightType === "error" || $rightReg === -1) {
                $this->textSection .= "    // Error/Nil detectado en lado derecho de '$op'\n";
                $this->textSection .= "$lblEnd:\n";
                
                if ($rightReg !== -1) $this->freeRegister($rightReg);
                $this->freeRegister($leftReg);
                $this->freeRegister($resultReg);
                
                return [
                    "type" => "nil",
                    "reg" => -1
                ];
            }

            $this->textSection .= "    mov w$resultReg, w$rightReg\n";
            $this->freeRegister($rightReg);

            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    # --- Fin Operacion Logica: $op ---\n\n";

            $this->freeRegister($leftReg);

            return [
                "type" => "bool",
                "reg" => $resultReg
            ];
        }

        //EXPRESIONES UNARIAS
        public function visitUnaryExpression(Context\UnaryExpressionContext $ctx) {
            $op = $ctx->op->getText();
            $this->textSection .= "    # --- Operacion Unaria: $op ---\n";

            if ($op === '&') {
                $id = $ctx->factor()->getText();

                $varInfo = null;
                for ($i = count($this->envStack) - 1; $i >= 0; $i--) {
                    if (isset($this->envStack[$i][$id])) {
                        $varInfo = $this->envStack[$i][$id];
                        break;
                    }
                }

                if ($varInfo === null) {
                    $this->textSection .= "    // Error Semantico: Variable '$id' no encontrada para &\n";
                    return ["type" => "nil", "reg" => -1];
                }

                $reg = $this->getRegister();
                if ($varInfo["isGlobal"]) {
                    $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . "\n";
                } else {
                    $offset = $varInfo["offset"];
                    if ($offset < 0) {
                        $absOffset = abs($offset);
                        $this->textSection .= "    sub x$reg, x29, #$absOffset // Direccion de $id\n";
                    } else {
                        $this->textSection .= "    add x$reg, x29, #$offset // Direccion de $id\n";
                    }
                }
                
                return ["type" => "ptr", "reg" => $reg, "innerType" => $varInfo["type"]];
            }

            if ($op === '*') {
                $res = $this->visit($ctx->factor());
                $regDir = $res["reg"];
                $innerType = $res["innerType"] ?? "int32";

                if ($innerType === "float32") {
                    $regVal = $this->getFloatRegister();
                    $this->textSection .= "    ldr s$regVal, [x$regDir] // Leer float apuntado\n";
                } else {
                    $regVal = $this->getRegister();
                    $this->textSection .= "    ldr w$regVal, [x$regDir] // Leer int apuntado\n";
                }

                $this->freeRegister($regDir);
                return ["type" => $innerType, "reg" => $regVal];
            }

            $res = $this->visit($ctx->factor());
            $reg = $res["reg"];
            $tipo = $res["type"];

            if ($op === '-') {
                if ($tipo === "float32") {
                    $this->textSection .= "    fneg s$reg, s$reg // Negar float\n";
                } else {
                    $this->textSection .= "    neg w$reg, w$reg // Negar int\n";
                }
            } else if ($op === '!') {
                if ($tipo === "float32") {
                    $this->textSection .= "    // Error Semantico: ! no es aplicable a float32\n";
                } else {
                    $this->textSection .= "    cmp w$reg, #0\n";
                    $this->textSection .= "    cset w$reg, eq\n";
                    $tipo = "bool";
                }
            }

            return ["type" => $tipo, "reg" => $reg];
        }

        //EXPRESIONES AGRUPADAS
        public function visitGroupedExpression(GroupedExpressionContext $ctx){
            return $this->visit($ctx->logExpr());
        }

        //ACCESOARREGLO
        public function visitArregloAcceso(Context\ArregloAccesoContext $ctx) {
            $this->textSection .= "    # --- Accediendo a Arreglo --- \n";

            $baseRes = $this->visit($ctx->factor());
            $regBase = $baseRes["reg"]; 
            $innerType = $baseRes["innerType"] ?? "int32";
            $dimensiones = $baseRes["dimensiones"] ?? [];

            $indexRes = $this->visit($ctx->logExpr());
            $regIndex = $indexRes["reg"]; 

            array_shift($dimensiones);

            $pesoCelda = ($innerType === "string" || $innerType === "ptr") ? 8 : 4;
            $elementosEnSiguienteDim = 1;
            foreach ($dimensiones as $dim) {
                $elementosEnSiguienteDim *= $dim;
            }
            $chunkSize = $elementosEnSiguienteDim * $pesoCelda;

            $regOffset = $this->getRegister();
            $this->textSection .= "    mov w$regOffset, #$chunkSize\n";
            $this->textSection .= "    mul w$regIndex, w$regIndex, w$regOffset\n";
            $this->textSection .= "    sxtw x$regIndex, w$regIndex\n";
            $this->textSection .= "    add x$regBase, x$regBase, x$regIndex\n";

            $this->freeRegister($regIndex);
            $this->freeRegister($regOffset);

            $esLValueFinal = false;
            $nodoActual = $ctx->getParent();
            
            while ($nodoActual !== null) {
                if ($nodoActual instanceof Context\LValueContext) { 
                    $esLValueFinal = true;
                    break;
                }
                if ($nodoActual instanceof Context\LogExprContext || $nodoActual instanceof Context\ArgumentoContext) {
                    $esLValueFinal = false;
                    break;
                }
                $nodoActual = $nodoActual->getParent();
            }

            $sigueSiendoAcceso = ($ctx->getParent() instanceof Context\ArregloAccesoContext);

            $hacerLdr = !$sigueSiendoAcceso && !$esLValueFinal;

            if (!$hacerLdr) {
                return [
                    "type" => "array", 
                    "innerType" => $innerType, 
                    "reg" => $regBase, 
                    "dimensiones" => $dimensiones 
                ];
            }

            if ($innerType === "float32" || $innerType === "float") {
                $regVal = $this->getFloatRegister();
                $this->textSection .= "    ldr s$regVal, [x$regBase] // Carga final float\n";
                $this->freeRegister($regBase);
            } else if ($innerType === "string" || $innerType === "ptr") {
                $regVal = $this->getRegister();
                $this->textSection .= "    ldr x$regVal, [x$regBase] // Carga final 64-bit\n";
                $this->freeRegister($regBase);
            } else {
                $regVal = $this->getRegister();
                $this->textSection .= "    ldr w$regVal, [x$regBase] // Carga final 32-bit\n";
                $this->freeRegister($regBase);
            }

            return [
                "type" => $innerType, 
                "innerType" => $innerType, 
                "reg" => $regVal
            ];
        }
        
        //IDENTIFICADORES
        public function visitIdentifier(Context\IdentifierContext $ctx){
            $id = $ctx->getText();
            $varInfo = null;

            for ($i = count($this->envStack) - 1; $i >= 0; $i--) {
                if (isset($this->envStack[$i][$id])) {
                    $varInfo = $this->envStack[$i][$id];
                    break;
                }
            }

            if ($varInfo === null) return ["type" => "nil", "reg" => -1];

            $this->textSection .= "    # Leer variable '$id'\n";
            $tipo = $varInfo["type"];

            if ($tipo === "float32" || $tipo === "float") {
                $reg = $this->getFloatRegister();
            } else {
                $reg = $this->getRegister();
            }

            $isArrayType = (is_string($tipo) && strpos($tipo, '[') !== false);

            if ($tipo === "array") {
                if ($varInfo["isGlobal"]) {
                    $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . " // Dir base global\n";
                } else {
                    $offset = $varInfo["offset"];
                    if ($offset < 0) {
                        $absOffset = abs($offset);
                        $this->textSection .= "    sub x$reg, x29, #$absOffset // Calcular Dir base local\n";
                    } else {
                        $this->textSection .= "    add x$reg, x29, #$offset // Calcular Dir base local\n";
                    }
                }
            } 
            else if ($tipo === "ptr" || $tipo === "array_param" || $tipo === "string" || $isArrayType) {
                if ($varInfo["isGlobal"]) {
                    $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . "\n";
                    $this->textSection .= "    ldr x$reg, [x$reg] // Leer puntero/array/string global\n";
                } else {
                    $offset = $varInfo["offset"];
                    $this->textSection .= "    ldr x$reg, [x29, #$offset] // Leer puntero/array/string local\n";
                }
            } 
            else if ($tipo === "float32" || $tipo === "float") {
                if ($varInfo["isGlobal"]) {
                    $regTemp = $this->getRegister(); 
                    $this->textSection .= "    ldr x$regTemp, =" . $varInfo["label"] . "\n";
                    $this->textSection .= "    ldr s$reg, [x$regTemp] // Leer float global al FPU\n";
                    $this->freeRegister($regTemp);
                } else {
                    $offset = $varInfo["offset"];
                    $this->textSection .= "    ldr s$reg, [x29, #$offset] // Leer float local al FPU\n";
                }
            } 
            else {
                if ($varInfo["isGlobal"]) {
                    $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . "\n";
                    $this->textSection .= "    ldr w$reg, [x$reg]\n";
                } else {
                    $offset = $varInfo["offset"];
                    $this->textSection .= "    ldr w$reg, [x29, #$offset] // Leer 32-bit\n";
                }
            }

            return [
                "type" => $tipo,
                "reg" => $reg,
                "size" => $varInfo["size"] ?? 4,
                "innerType" => $varInfo["innerType"] ?? "int32",
                "dimensiones" => $varInfo["dimensiones"] ?? []
            ];
        }

        //LITERALES
        public function visitLiteral(Context\LiteralContext $ctx){
            if ($ctx->arrayLiteral() !== null) {
                return $this->visit($ctx->arrayLiteral());
            }

            if ($ctx->ENTERO() !== null) {
                $val = $ctx->ENTERO()->getText();
                $reg = $this->getRegister();
                $this->textSection .= "    mov w$reg, #$val\n";
                return ["type" => "int32", "reg" => $reg];
            }

            if ($ctx->FLOAT() !== null) {
                $val = $ctx->FLOAT()->getText();
                $label = "float_lit_" . $this->floatCount++;
                $this->dataSectionExt .= "    $label: .single $val\n";

                $regFloat = $this->getFloatRegister();
                $regTempX = $this->getRegister();

                $this->textSection .= "    # --- Cargar literal float: $val ---\n";
                $this->textSection .= "    ldr x$regTempX, =$label // Cargar direccion\n";
                $this->textSection .= "    ldr s$regFloat, [x$regTempX] // Extraer el decimal al FPU\n";

                $this->freeRegister($regTempX);
                return ["type" => "float32", "reg" => $regFloat];
            }

            if ($ctx->STR() !== null) {
                $val = $ctx->STR()->getText();
                $label = "str_lit_" . $this->strCount++;
                $this->dataSectionExt .= "    $label: .asciz $val\n";

                $reg = $this->getRegister();
                $this->textSection .= "    # --- Cargar literal string ---\n";
                $this->textSection .= "    ldr x$reg, =$label\n";

                return ["type" => "string", "reg" => $reg];
            }

            if ($ctx->RUNE() !== null) {
                $charText = $ctx->RUNE()->getText();
                $charLimpio = trim($charText, "'");
                
                if ($charLimpio === '\n') { $asciiVal = 10; }
                else if ($charLimpio === '\t') { $asciiVal = 9; }
                else {
                    $asciiVal = ord($charLimpio[0]); 
                }

                $reg = $this->getRegister();
                $this->textSection .= "    # --- Cargar literal rune ($charLimpio -> ASCII: $asciiVal) ---\n";
                $this->textSection .= "    mov w$reg, #$asciiVal\n";

                return ["type" => "rune", "reg" => $reg];
            }

            if ($ctx->BOOL() !== null) {
                $texto = $ctx->BOOL()->getText();
                $val = ($texto === 'true') ? 1 : 0;
                $reg = $this->getRegister();
                $this->textSection .= "    mov w$reg, #$val // Bool literal: $texto\n";
                return ["type" => "bool", "reg" => $reg];
            }

            return ["type" => "nil", "reg" => -1];
        }

        //literal array
        public function visitArrayLiteral(Context\ArrayLiteralContext $ctx){
            $elementosPlanos = [];
            
            if ($ctx->listaElementos() !== null) {
                $this->aplanarElementos($ctx->listaElementos(), $elementosPlanos);
            }

            return [
                "type" => "array_literal",
                "elementos" => $elementosPlanos
            ];
        }

        private function aplanarElementos($listaCtx, &$elementosPlanos) {
            if ($listaCtx === null) return;
            
            foreach ($listaCtx->elemento() as $elemCtx) {
                if ($elemCtx->logExpr() !== null) {
                    $elementosPlanos[] = $elemCtx;
                } else if ($elemCtx->listaElementos() !== null) {
                    $this->aplanarElementos($elemCtx->listaElementos(), $elementosPlanos);
                }
            }
        }
    }

?>