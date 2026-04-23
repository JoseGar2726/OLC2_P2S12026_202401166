<?php

use Context\AsignacionContext;
use Context\BinaryExpressionSContext;
use Context\BinaryExpressionTContext;
use Context\BloqueMainContext;
use Context\DeclaracionConstContext;
use Context\DeclaracionContext;
use Context\DeclaracionCortaContext;
use Context\ExpForContext;
use Context\ForClasicoContext;
use Context\FuncionImprimirContext;
use Context\GroupedExpressionContext;
use Context\IdentifierContext;
use Context\LiteralContext;


use Context\ProgramaContext;
use Context\RelationalExpresionContext;
use Context\SentenciaBreakContext;
use Context\SentenciaContinueContext;
use Context\SentenciaForContext;
use Context\SentenciaIfContext;
use Context\SentenciaSwitchContext;

    class Arm64Generator extends GrammarBaseVisitor {
        private $dataSection = ".section .data\n";

        private $dataSectionExt = "    fmt_int:   .asciz \"%d\"\n" .
                                  "    str_space: .asciz \" \"\n" .
                                  "    str_nl:    .asciz \"\\n\"\n";

        private $textSection = ".section .text\n.align 2\n.global main\n\n";
        
        private $envStack = [];
        private $currentOffset = 0;
        private $labelCounter = 0;
        private $loopStack = [];

        private $availableRegisters = [0, 1, 2, 3, 4, 5, 6, 7];

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

        private function allocateVariable($id, $type, $sizeBytes) {
            $isGlobal = count($this->envStack) === 1;

            if ($isGlobal) {
                $varInfo = [
                    "type" => $type,
                    "size" => $sizeBytes,
                    "isGlobal" => true,
                    "label" => "glob_" . $id
                ];
            } else {
                $this->currentOffset -= $sizeBytes;
                $varInfo = [
                    "type" => $type,
                    "size" => $sizeBytes,
                    "isGlobal" => false,
                    "offset" => $this->currentOffset
                ];
            }

            $currentIdx = count($this->envStack) - 1;
            $this->envStack[$currentIdx][$id] = $varInfo;

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

        public function getAssembly() {
            
            return $this->dataSection . $this->dataSectionExt . "\n" . $this->textSection . "\n";;
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

            $this->textSection .= "    stp x29, x30, [sp, -16]!\n";
            $this->textSection .= "    mov x29, sp\n";

            $this->textSection .= "    sub sp, sp, #1024\n\n";

            $this->pushEnv();

            $this->visit($ctx->bloque());

            $this->popEnv();

            $this->textSection .= "    add sp, sp, #1024\n";
            $this->textSection .= "    ldp x29, x30, [sp], 16\n";

            $this->textSection .= "    mov w0, 0\n";
            $this->textSection .= "    ret\n";

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

            $this->textSection .= "    // --- Inicio FOR ---\n";
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
            $this->textSection .= "    // --- Fin FOR ---\n\n";

            array_pop($this->loopStack);
            return null;
        }

        //FOR CLASICO
        public function visitForClasico(ForClasicoContext $ctx){
            $this->textSection .= "    // --- Inicio FOR Clasico ---\n";

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

            $this->textSection .= "    // --- Fin FOR Clasico ---\n\n";
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

            $this->textSection .= "    // --- " . ($isInc ? "Incremento" : "Decremento") . " ($id) ---\n";
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
            $this->textSection .= "    // --- Inicio SWITCH ---\n";
            $lblEnd = $this->getNewLabel() . "_switch_end";

            $expSwitch = $this->visit($ctx->logExpr());
            $regSwitch = $expSwitch["reg"];

            $bloqueSwitch = $ctx->bloqueSwitch();
            $casos = $bloqueSwitch->bloqueCase();

            if ($casos) {
                foreach ($casos as $index => $caseCtx) {
                    $lblBody = $this->getNewLabel() . "_case_body";
                    $lblNext = $this->getNewLabel() . "_case_next";

                    $this->textSection .= "    // --- Evaluando CASE $index ---\n";
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
                $this->textSection .= "    // --- Bloque DEFAULT ---\n";
                $this->pushEnv();

                foreach ($bloqueDefault->i() as $instruccion) {
                    $this->visit($instruccion);
                }

                $this->popEnv();
            }

            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    // --- Fin SWITCH ---\n\n";

            $this->freeRegister($regSwitch);

            return null;
        }

        //SENTENCIA IF
        public function visitSentenciaIf(SentenciaIfContext $ctx){
            $this->textSection .= "    // --- Inicio IF ---\n";

            $tieneElse = $ctx->ELSE() !== null;

            $lblEnd = $this->getNewLabel();

            $lblElse = $tieneElse ? $this->getNewLabel() : $lblEnd;

            $condResult = $this->visit($ctx->logExpr());
            $regCond = $condResult["reg"];

            $this->textSection .= "    cbz w$regCond, $lblElse\n";
            $this->freeRegister($regCond);

            $this->textSection .= "    // --- Bloque TRUE ---\n";
            $this->pushEnv(); 
            $this->visit($ctx->bloque(0)); 
            $this->popEnv();

            if ($tieneElse) {
                $this->textSection .= "    b $lblEnd\n";

                $this->textSection .= "$lblElse:\n";
                $this->textSection .= "    // --- Bloque ELSE ---\n";
                $this->pushEnv();
                $this->visit($ctx->bloque(1));
                $this->popEnv();
            }

            $this->textSection .= "$lblEnd:\n";
            $this->textSection .= "    // --- Fin IF ---\n\n";

            return null;
        }

        //FUNCION IMPRIMIR
        public function visitFuncionImprimir(FuncionImprimirContext $ctx){
            $lista = $ctx->imprimir()->listaExpr();
            
            $this->textSection .= "    // --- Inicio fmt.Println (usando printf) ---\n";

            if ($lista != null) {
                $argumentos = $lista->argumento();

                for ($i = 0; $i < count($argumentos); $i++) {
                    $argCtx = $argumentos[$i];
                    $res = $this->visit($argCtx);

                    if ($res["type"] === "nil" || $res["type"] === "error") continue;

                    if ($res["type"] === "int32" || $res["type"] === "int") {
                        $reg = $res["reg"];

                        if ($reg != 1) {
                            $this->textSection .= "    mov w1, w$reg\n";
                        }

                        $this->textSection .= "    ldr x0, =fmt_int\n";

                        $this->textSection .= "    bl printf\n";

                        $this->freeRegister($reg);
                    }

                    if ($i < count($argumentos) - 1) {
                        $this->textSection .= "    ldr x0, =str_space\n";
                        $this->textSection .= "    bl printf\n";
                    }
                }
            }

            $this->textSection .= "    // Salto de linea\n";
            $this->textSection .= "    ldr x0, =str_nl\n";
            $this->textSection .= "    bl printf\n";
            $this->textSection .= "    // --- Fin fmt.Println ---\n\n";

            return null;
        }

        //ASIGNACION
        public function visitAsignacion(AsignacionContext $ctx){
            $lValueCtx = $ctx->lValue();
            if ($lValueCtx->IDENTIFICADOR() === null) {
                $this->textSection .= "    // Advertencia: Asignacion a arreglos o punteros aun no soportada en ASM\n";
                return null;
            }

            $name = $lValueCtx->IDENTIFICADOR()->getText();

            $simboloCtx = $ctx->simboloAsignacion();
            $op = "=";
            if ($simboloCtx->op !== null) {
                $op = $simboloCtx->op->getText() . "="; 
            }

            $this->textSection .= "    // --- Asignacion ($op) a variable '$name' ---\n";

            $varInfo = null;
            for ($j = count($this->envStack) - 1; $j >= 0; $j--) {
                if (isset($this->envStack[$j][$name])) {
                    $varInfo = $this->envStack[$j][$name];
                    break;
                }
            }

            if ($varInfo === null) {
                $this->textSection .= "    // Error: Variable '$name' no declarada\n\n";
                return null;
            }

            $exprCtx = $ctx->logExpr();
            $exprResult = $this->visit($exprCtx);
            $regDer = $exprResult["reg"];

            $regFinal = $this->getRegister();

            if ($op !== "=") {
                if ($varInfo["isGlobal"]) {
                    $regDir = $this->getRegister();
                    $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                    $this->textSection .= "    ldr w$regFinal, [x$regDir] // Leer valor actual\n";
                    $this->freeRegister($regDir);
                } else {
                    $offset = $varInfo["offset"];
                    $this->textSection .= "    ldr w$regFinal, [x29, #$offset] // Leer valor actual\n";
                }

                switch ($op) {
                    case "+=":
                        $this->textSection .= "    add w$regFinal, w$regFinal, w$regDer\n";
                        break;
                    case "-=":
                        $this->textSection .= "    sub w$regFinal, w$regFinal, w$regDer\n";
                        break;
                    case "*=":
                        $this->textSection .= "    mul w$regFinal, w$regFinal, w$regDer\n";
                        break;
                    case "/=":
                        $this->textSection .= "    sdiv w$regFinal, w$regFinal, w$regDer\n";
                        break;
                }
            } else {
                $this->textSection .= "    mov w$regFinal, w$regDer\n";
            }

            if ($varInfo["isGlobal"]) {
                $regDir = $this->getRegister();
                $this->textSection .= "    ldr x$regDir, =" . $varInfo["label"] . "\n";
                $this->textSection .= "    str w$regFinal, [x$regDir]\n";
                $this->freeRegister($regDir);
            } else {
                $offset = $varInfo["offset"];
                $this->textSection .= "    str w$regFinal, [x29, #$offset]\n";
            }

            $this->freeRegister($regDer);
            $this->freeRegister($regFinal);
            $this->textSection .= "\n";

            return null;
        }

        //DECLARACION CORTA
        public function visitDeclaracionCorta(DeclaracionCortaContext $ctx){
            $ids = $ctx->listaId()->IDENTIFICADOR();
            $expresiones = $ctx->listaExpr()->argumento(); 
            
            for ($i = 0; $i < count($ids); $i++) {
                $name = $ids[$i]->getText();
                $exprCtx = $expresiones[$i];

                $this->textSection .= "    // --- Declarando variable '$name' ---\n";
                $exprResult = $this->visit($exprCtx);
                $regOrigen = $exprResult["reg"];

                $varInfo = $this->allocateVariable($name, $exprResult["type"], 4);
                $offset = $varInfo["offset"];

                $this->textSection .= "    str w$regOrigen, [x29, #$offset]\n";

                $this->freeRegister($regOrigen);
                $this->textSection .= "\n";
            }

            return null;
        }

        //DECLARACION
        public function visitDeclaracion(DeclaracionContext $ctx){
            $ids = $ctx->listaId()->IDENTIFICADOR();
            $tipo = "int32";

            $tieneAsignacion = $ctx->ASSIGN() !== null;
            $expresiones = $tieneAsignacion ? $ctx->listaExpr()->argumento() : [];

            for ($i = 0; $i < count($ids); $i++) {
                $name = $ids[$i]->getText();
                $this->textSection .= "    // --- Declarando variable (var) '$name' ---\n";

                $varInfo = $this->allocateVariable($name, $tipo, 4);

                if ($varInfo["isGlobal"]) {
                    $valor = 0;
                    if ($tieneAsignacion && isset($expresiones[$i])) {
                        $valor = $expresiones[$i]->getText(); 
                    }
                    $this->dataSectionExt .= "    " . $varInfo["label"] . ": .word $valor\n";
                } 
                else {
                    $offset = $varInfo["offset"];
                    if ($tieneAsignacion && isset($expresiones[$i])) {
                        $exprResult = $this->visit($expresiones[$i]);
                        $regOrigen = $exprResult["reg"];
                        $this->textSection .= "    str w$regOrigen, [x29, #$offset]\n";
                        $this->freeRegister($regOrigen);
                    } else {
                        $regTemp = $this->getRegister();
                        $this->textSection .= "    mov w$regTemp, #0\n";
                        $this->textSection .= "    str w$regTemp, [x29, #$offset]\n";
                        $this->freeRegister($regTemp);
                    }
                }
                $this->textSection .= "\n";
            }
            return null;
        }

        //DECLARACION CONSTANTES
        public function visitDeclaracionConst(DeclaracionConstContext $ctx){
            $name = $ctx->IDENTIFICADOR()->getText();
            $exprCtx = $ctx->logExpr();

            $this->textSection .= "    // --- Declarando constante '$name' ---\n";

            $varInfo = $this->allocateVariable($name, "int32", 4);

            if ($varInfo["isGlobal"]) {
                $valorCrudo = $exprCtx->getText(); 
                $this->dataSectionExt .= "    " . $varInfo["label"] . ": .word $valorCrudo\n";
                
            } else {
                $exprResult = $this->visit($exprCtx);
                $regOrigen = $exprResult["reg"];
                $offset = $varInfo["offset"];

                $this->textSection .= "    str w$regOrigen, [x29, #$offset]\n";
                
                $this->freeRegister($regOrigen);
            }

            $this->textSection .= "\n";

            return null;
        }

        //OPERACION SUMA Y RESTA
        public function visitBinaryExpressionT(BinaryExpressionTContext $ctx){
            $left = $this->visit($ctx->expr());
            $right = $this->visit($ctx->term());

            if ($left["type"] === "nil" || $right["type"] === "nil") {
                return ["type" => "nil", "reg" => -1];
            }

            $op = $ctx->op->getText();
            $resultReg = $this->getRegister();
            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            $this->textSection .= "    // Operacion: $op\n";

            if ($op === '+') {
                $this->textSection .= "    add w$resultReg, w$leftReg, w$rightReg\n";
            } else if ($op === '-') {
                $this->textSection .= "    sub w$resultReg, w$leftReg, w$rightReg\n";
            }

            $this->freeRegister($leftReg);
            $this->freeRegister($rightReg);

            return [
                "type" => "int32",
                "reg" => $resultReg
            ];
        }

        //OPERACION MULT,DIV Y MOD
        public function visitBinaryExpressionS(BinaryExpressionSContext $ctx){
            $left = $this->visit($ctx->term());
            $right = $this->visit($ctx->factor());

            if ($left["type"] === "nil" || $right["type"] === "nil") {
                return ["type" => "nil", "reg" => -1];
            }

            $op = $ctx->op->getText();

            $resultReg = $this->getRegister();
            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            $this->textSection .= "    // Operacion: $op\n";

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

            $this->freeRegister($leftReg);
            $this->freeRegister($rightReg);

            return [
                "type" => "int32",
                "reg" => $resultReg
            ];
        }

        //EXPRESIONES RELACIONALES
        public function visitRelationalExpresion(RelationalExpresionContext $ctx){
            $left = $this->visit($ctx->relExpr());
            $right = $this->visit($ctx->expr());

            if ($left["type"] === "nil" || $right["type"] === "nil") return ["type" => "nil", "reg" => -1];

            $op = $ctx->op->getText();
            $resultReg = $this->getRegister();
            $leftReg = $left["reg"];
            $rightReg = $right["reg"];

            $this->textSection .= "    // Comparacion: $op\n";
            $this->textSection .= "    cmp w$leftReg, w$rightReg\n";

            $cond = "";
            switch ($op) {
                case '==': $cond = "eq"; break;
                case '!=': $cond = "ne"; break;
                case '>':  $cond = "gt"; break;
                case '<':  $cond = "lt"; break;
                case '>=': $cond = "ge"; break;
                case '<=': $cond = "le"; break;
            }

            $this->textSection .= "    cset w$resultReg, $cond\n";

            $this->freeRegister($leftReg);
            $this->freeRegister($rightReg);

            return [
                "type" => "bool",
                "reg" => $resultReg
            ];
        }

        //EXPRESIONES AGRUPADAS
        public function visitGroupedExpression(GroupedExpressionContext $ctx){
            return $this->visit($ctx->logExpr());
        }

        //IDENTIFICADORES
        public function visitIdentifier(IdentifierContext $ctx){
            $id = $ctx->getText();
            $varInfo = null;

            for ($i = count($this->envStack) - 1; $i >= 0; $i--) {
                if (isset($this->envStack[$i][$id])) {
                    $varInfo = $this->envStack[$i][$id];
                    break;
                }
            }

            if ($varInfo === null) return ["type" => "nil", "reg" => -1];

            $reg = $this->getRegister();
            $this->textSection .= "    // Leer variable '$id'\n";

            if ($varInfo["isGlobal"]) {
                $this->textSection .= "    ldr x$reg, =" . $varInfo["label"] . "\n";
                $this->textSection .= "    ldr w$reg, [x$reg]\n";
            } else {
                $offset = $varInfo["offset"];
                $this->textSection .= "    ldr w$reg, [x29, #$offset]\n";
            }

            return [
                "type" => $varInfo["type"],
                "reg" => $reg
            ];
        }

        //LITERALES
        public function visitLiteral(LiteralContext $ctx){
            if ($ctx->ENTERO() !== null) {
                $val = $ctx->ENTERO()->getText();
                $reg = $this->getRegister();
            
                $this->textSection .= "    mov w$reg, #$val\n";
            
                return [
                    "type" => "int32",
                    "reg" => $reg
                ];
            }
            return ["type" => "nil", "reg" => -1];
        }
    }

?>