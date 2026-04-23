<?php

    class BreakException extends Exception {}
    class ContinueException extends Exception {}
    class ReturnValue extends Exception {
        public $value;

        public function __construct($value){
            $this->value = $value;
        }
    }

    use Context\ArgumentoContext;
    use Context\ArrayLiteralContext;
    use Context\ArregloAccesoContext;
    use Context\AsignacionContext;
    use Context\ProgramaContext;
    use Context\FuncionImprimirContext;
    use Context\BinaryExpressionSContext;
    use Context\BinaryExpressionTContext;
    use Context\BloqueContext;
    use Context\DeclaracionConstContext;
    use Context\DeclaracionContext;
    use Context\DeclaracionCortaContext;
    use Context\ExpForContext;
    use Context\ForClasicoContext;
    use Context\FuncLenContext;
    use Context\FuncNowContext;
    use Context\FuncSubContext;
    use Context\FuncTypeContext;
    use Context\UnaryExpressionContext;
    use Context\GroupedExpressionContext;
    use Context\IdentifierContext;
    use Context\ListaExprContext;
    use Context\LiteralContext;
    use Context\LiteralValueContext;
    use Context\LlamadaFuncionContext;
    use Context\LogicalExpressionContext;
    use Context\RelationalExpresionContext;
    use Context\RetornarContext;
    use Context\SentenciaBreakContext;
    use Context\SentenciaContinueContext;
    use Context\SentenciaForContext;
    use Context\SentenciaIfContext;
    use Context\SentenciaSwitchContext;

    class Interpreter extends GrammarBaseVisitor{
        public $console = "";
        public $scopes = [];
        private $scopeNames = [];
        private $functions = [];
        private $returnValue = null;
        private $mainCount = 0;
        public $semanticErrors = [];

        //manejo de errores semanticos
        public function addSemanticErrors($msg, $ctx){

            if($ctx === null){
                $line = 0;
                $column = 0;
            } else {
                $line = $ctx->getStart()->getLine();
                $column = $ctx->getStart()->getCharPositionInLine();
            }

            $this->semanticErrors[] = "Error Semantico (Linea:$line Columna:$column): $msg";
        }

        //MANEJO DE SCOPES
        public function __construct() {
            $this->scopes[] = [];
            $this->scopeNames[] = "global";
        }

        private function currentScopeIndex(){
            return count($this->scopes) - 1;
        }

        private function declareSymbol($id, $data, $ctx = null){
            $current = $this->currentScopeIndex();
            
            if (isset($this->scopes[$current][$id])) {
                $this->addSemanticErrors(
                    "Error semantico: '$id' ya fue declarado en este scope", null
                );
                return;
            }

            if($ctx !== null){
                $data["line"] = $ctx->start->getLine();
                $data["column"] = $ctx->start->getCharPositionInLine();
            } else {
                $data["line"] = null;
                $data["column"] = null;
            }

            $data["scope"] = $this->scopeNames[$current];
            $this->scopes[$current][$id] = $data;
        }

        private function findSymbolScope($id){
            for ($i = count($this->scopes) - 1; $i >= 0; $i--) {
                if (isset($this->scopes[$i][$id])) {
                    return $i;
                }
            }
            return null;
        }

        private function getSymbol($id){
            $index = $this->findSymbolScope($id);
            if ($index === null) return null;

            $sym = $this->scopes[$index][$id];
            $sym["id"] = $id;
            return $sym;
        }

        private function setSymbolValue($id, $value) {
            $index = $this->findSymbolScope($id);
            if ($index === null) {
                $this->addSemanticErrors("Error semantico: variable '$id' no definida", null);
                return;
            }

            if($this->scopes[$index][$id]["const"]){
                $this->addSemanticErrors("Error semantico: no se puede modificar una constante", null);
                return;
            }
            $this->scopes[$index][$id]["value"] = $value;
        }

        private function symbolExistInCurrentScope(string $name): bool{
            if(empty($this->scopes)){
                return false;
            }

            $currentScope = end($this->scopes);

            return isset($currentScope[$name]);
        }

        //FUNCIONES EMBEBIDAS
        //len
        public function visitFuncLen(FuncLenContext $ctx){
            $res = $this->visit($ctx->logExpr());

            if($res === null){
                $this->addSemanticErrors(
                    "Error semantico: argumento invalindo en len()", $ctx
                );
                return ["type" => "int", "value"=> 0];
            }

            $value = $res["value"];

            if(is_string($value)  || is_array($value)){
                return [
                    "type" => "int",
                    "value" => count(is_array($value) ? $value : str_split($value))
                ];
            }

            $this->addSemanticErrors(
                "Error semantico: len() solo acepta string o arreglos", $ctx
            );

            return ["type"=>"int", "value"=>0];
        }

        //now
        public function visitFuncNow(FuncNowContext $ctx){
            $date = date("Y-m-d H:i:s");

            return [
                "type" => "string",
                "value" => $date
            ];
        }

        //substring
        public function visitFuncSub(FuncSubContext $ctx){
            $str = $this->visit($ctx->logExpr(0));
            $start = $this->visit($ctx->logExpr(1));
            $len = $this->visit($ctx->logExpr(2));

            if($str["type"] !== "string"){
                $this->addSemanticErrors(
                    "Error semantico: substring espera un string", $ctx
                );
                return["type" => "string", "value"=>""];
            }

            $sub = substr($str["value"], $start["value"], $len["value"]);

            return[
                "type" => "string",
                "value" => $sub
            ];
        }

        //typeof
        public function visitFuncType(FuncTypeContext $ctx){
            $res = $this->visit($ctx->logExpr());

            if($res === null){
                $this->addSemanticErrors(
                    "Error semantico: expresion invalida en typeOf()", $ctx
                );
                return [
                    "type" => "string",
                    "value" => "error"
                ];
            }

            $tipoObtenido = $res["type"];

            if ($tipoObtenido === "array" && isset($res["dimensions"]) && isset($res["subtype"])) {
                $tipoFormateado = "";
                foreach ($res["dimensions"] as $dim) {
                    $tipoFormateado .= "[" . $dim . "]";
                }
                $tipoFormateado .= $res["subtype"];
                $tipoObtenido = $tipoFormateado;
            }

            return [
                "type" => "string",
                "value" => $tipoObtenido
            ];
        }

        //LLAMADA FUNCION
        public function visitLlamadaFuncion(LlamadaFuncionContext $ctx){
            $nombre = $ctx->IDENTIFICADOR()->getText();

            if(!isset($this->functions[$nombre])){
                $this->addSemanticErrors("Error semantico: funcion '$nombre' no existe", $ctx);
                return ["type" => "error", "value" => null];
            }

            $func = $this->functions[$nombre];
            $args = [];

            if ($ctx->listaExpr() !== null){
                $args = $this->visit($ctx->listaExpr());
            }

            $params = $func["params"] ?? [];

            if (count($args) != count($params)){
                $this->addSemanticErrors("Error semantico: funcion '$nombre' espera " . count($params) . " argumentos, recibidos " . count($args), $ctx);
                return ["type" => "error", "value" => null];
            }

            // === VALIDACIÓN DE TIPOS Y PUNTEROS ===
            for($i=0; $i<count($args); $i++){

                $expectedBaseType = $params[$i]["type"]; // ej: 'int' o 'array'
                $isPointerExpected = $params[$i]["pointer"] ?? false;

                $receivedRawType = $args[$i]["type"]; // ej: '*int', '*array', o 'int'
                $isPointerReceived = (strpos($receivedRawType, '*') === 0);

                // Le quitamos el '*' para comparar la base real
                $receivedBaseType = ltrim($receivedRawType, '*');

                $receivedType = $this->normalizeType(
                    $receivedBaseType,
                    $args[$i]["subtype"] ?? null,
                    $args[$i]["dimensions"] ?? []
                );

                // Validamos si exigía puntero
                if ($isPointerExpected && !$isPointerReceived) {
                    $this->addSemanticErrors("Error semantico: parametro '{$params[$i]["name"]}' requiere referencia (&)", $ctx);
                    return ["type" => "nil", "value"=> null];
                }

                // Validamos que la base sea exactamente la misma
                if ($expectedBaseType !== $receivedType) {
                    $expStr = $isPointerExpected ? "*" . $expectedBaseType : $expectedBaseType;
                    $recStr = $isPointerReceived ? "*" . $receivedType : $receivedType;
                    $this->addSemanticErrors("Error semantico: argumento " . ($i + 1) . " de '$nombre' debe ser tipo '$expStr', recibido '$recStr'", $ctx);
                    return ["type" => "error", "value" => null];
                }
            }

            // === CREACIÓN DEL NUEVO ENTORNO LÉXICO ===
            $entornoAnterior = $this->scopes;
            $nombresAnteriores = $this->scopeNames;

            $this->scopes = [$entornoAnterior[0], []];
            $this->scopeNames = ["global", $nombre];

            // Inyectamos los argumentos al entorno de la función
            for ($i=0; $i<count($args); $i++){
                $paramName = $func["params"][$i]["name"];

                // Pasamos el argumento tal cual (si es puntero, ya lleva su 'pointer_ref' incorporado)
                $this->scopes[1][$paramName] = $args[$i];
                $this->scopes[1][$paramName]["const"] = false;
                $this->scopes[1][$paramName]["scope"] = $nombre;
            }

            // === EJECUCIÓN ===
            $previosReturn = $this->returnValue;
            $this->returnValue = null;

            try {
                $this->visit($func["ctx"]->bloque());
            } catch (ReturnValue $ret) {
                $this->scopes = $entornoAnterior;
                $this->scopeNames = $nombresAnteriores;
                return $ret->value;
            }

            $ret = $this->returnValue;
            $this->returnValue = $previosReturn;

            $this->scopes = $entornoAnterior;
            $this->scopeNames = $nombresAnteriores;

            return $ret ?? ["type" => "nil", "value" => null];
        }

        //APUNTADORES
        public function visitArgumento(ArgumentoContext $ctx){
            $expr = $this->visit($ctx->logExpr());

            if($ctx->REF() !== null){
                if(!isset($expr["id"])){
                    $this->addSemanticErrors("Error semantico: '&' solo puede aplicarse a variables", $ctx);
                    return ["type"=>"error", "value"=>null];
                }

                $id = $expr["id"];
                $scopeIdx = $this->findSymbolScope($id);

                $ptr = [
                    "type" => "*" . $expr["type"],
                    "value" => "pointer",
                    "subtype" => $expr["subtype"] ?? null,
                    "dimensions" => $expr["dimensions"] ?? [],
                    "pointer_ref" => &$this->scopes[$scopeIdx][$id]
                ];
                return $ptr;
        }

            return $expr;
        }

        private function normalizeType($type, $subtype=null, $dimensions=[]){
            if ($type === "int32") $type = "int";
            if ($type === "float32") $type = "float";
            if ($subtype === "int32") $subtype = "int";
            if ($subtype === "float32") $subtype = "float";

            if($type === 'array'){
                $str = "";
                if (is_array($dimensions)) {
                    foreach($dimensions as $d){
                        $str .= "[$d]";
                    }
                }
                return $str . $subtype;
            }
            return $type;
        }

        //RETORNAR
        public function visitRetornar(RetornarContext $ctx){
            if($ctx->listaExpr() === null){
                $value = ["type" => "nil", "value"=>null];
            } else{
                $valores = $this->visit($ctx->listaExpr());

                if(count($valores) == 1){
                    $value = $valores[0];
                } else {
                    $value = $valores;
                }
            }

            throw new ReturnValue($value);
        }

        //BREAK Y CONTINUE
        public function visitSentenciaBreak(SentenciaBreakContext $ctx){
            throw new BreakException();
        }

        public function visitSentenciaContinue(SentenciaContinueContext $ctx){
            throw new ContinueException();
        }

        //SENTENCIA FOR
        public function visitSentenciaFor(SentenciaForContext $ctx){
            //FOR CLASICO
            if ($ctx->forClasico() !== null){
                return $this->visit($ctx->forClasico());
            }
            //FOR WHILE
            if ($ctx->logExpr() !== null){
                array_push($this->scopes, []);
                array_push($this->scopeNames, "for");
                while (true) {
                    $cond = $this->visit($ctx->logExpr());

                    if ($cond["type"] !== "bool"){
                        $this->addSemanticErrors(
                            "Error semantico: la condicion del for debe ser booleana",
                            $ctx
                        );
                        break;
                    }

                    if($cond["value"] === false) break;

                    try {
                        $this->visit($ctx->bloque());
                    } catch (BreakException $e) {
                        break;
                    } catch (ContinueException $e) {
                        continue;
                    }

                }
                array_pop($this->scopes);
                array_pop($this->scopeNames);

                return null;
            }

            //FOR INFINITO
            if ($ctx->bloque() !== null){
                array_push($this->scopes, []);
                array_push($this->scopeNames, "for");
                while (true) {
                    try {
                        $this->visit($ctx->bloque());
                    } catch (BreakException $e) {
                        break;
                    } catch (ContinueException $e) {
                        continue;
                    }
                }
                array_pop($this->scopes);
                array_pop($this->scopeNames);
            }

            return null;
        }

        //FOR CLASICO
        public function visitForClasico(ForClasicoContext $ctx){

            array_push($this->scopes, []);
            array_push($this->scopeNames, "for");

            if($ctx->declaracionCorta() !== null){
                $this->visit($ctx->declaracionCorta());
            }

            while (true) {
                if ($ctx->logExpr() !== null){
                    $cond = $this->visit($ctx->logExpr());

                    if($cond["type"] !== "bool" || $cond["value"] === null){
                        $this->addSemanticErrors(
                            "Error semantico: la condicion del for debe ser booleana",
                            $ctx
                        );
                        break;
                    }

                    if($cond["value"] === false) break;
                }

                try {
                    $this->visit($ctx->bloque());
                } catch (BreakException $e) {
                    break;
                } catch (ContinueException $e){
                    
                }

                if ($ctx->condFor() !== null) {
                    $this->visit($ctx->condFor());
                }
            }

            array_pop($this->scopes);
            array_pop($this->scopeNames);

            return null;
        }

        //AUMENTODECREMENTO
        public function visitExpFor(ExpForContext $ctx){
            $id = $ctx->IDENTIFICADOR()->getText();
            $simbolo = $this->getSymbol($id);

            if($simbolo === null){
                $this->addSemanticErrors(
                    "Error semantico: variable '$id' no existe",
                    $ctx
                );
                return null;
            }

            if ($ctx->PLUS() !== null && $ctx->PLUS(1) !== null){
                $this->setSymbolValue($id, $this->getSymbol($id)["value"] + 1);
            } else if ($ctx->MINUS() !== null && $ctx->MINUS(1) !== null){
                $this->setSymbolValue($id, $this->getSymbol($id)["value"] - 1);
            }

            return null;
        }

        //SENTENCIA SWITCH
        public function visitSentenciaSwitch(SentenciaSwitchContext $ctx){
            $switchV = $this->visit($ctx->logExpr());

            if ($switchV === null || !isset($switchV["type"])){
                $this->addSemanticErrors(
                    "Error semantico: valor de switch no valido",
                    $ctx
                );
                return null;
            }

            $bloqueSwitch = $ctx->bloqueSwitch();
            if ($bloqueSwitch === null){
                return null;
            }

            $cases = $bloqueSwitch->bloqueCase();
            $default = $bloqueSwitch->bloqueDefault();

            try {
                foreach($cases as $case){
                    $listaExpresiones = $case->listaExpr()->argumento();

                    foreach($listaExpresiones as $expresion){
                        $caseValue = $this->visit($expresion);

                        if($caseValue["type"] !== $switchV["type"]){
                            $this->addSemanticErrors(
                                "Error semantico: case tipo '{$caseValue["type"]}' incompatible con switch tipo '{$switchV["type"]}'",
                                $ctx
                            );
                            continue;
                        }

                        if ($caseValue["value"] === $switchV["value"]){
                            array_push($this->scopes, []);
                            array_push($this->scopeNames, "case");
                            foreach($case->i() as $inst){
                                $this->visit($inst);
                            }
                            array_pop($this->scopes);
                            array_pop($this->scopeNames);
                            return null;
                        }
                    }
                }

                if ($default !== null){
                    array_push($this->scopes, []);
                    array_push($this->scopeNames, "case");
                    foreach($default->i() as $inst){
                        $this->visit($inst);
                    }
                    array_pop($this->scopes);
                    array_pop($this->scopeNames);
                }
            } catch (BreakException $e) {
                return null;
            }

            return null;
        }

        //SENTENCIA IF
        public function visitSentenciaIf(SentenciaIfContext $ctx){
            $condicion = $this->visit($ctx->logExpr());

            if($condicion === null || !isset($condicion["type"]) || $condicion["type"] !== "bool"){
                $this->addSemanticErrors(
                    "Error semantico: la condicion del if debe de ser booleana",
                    $ctx
                );
                return null;
            }

            if ($condicion["value"]) {
                array_push($this->scopes, []);
                array_push($this->scopeNames, "if");

                try {
                    $this->visit($ctx->bloque(0));
                } finally{
                    array_pop($this->scopes);
                    array_pop($this->scopeNames);
                }
                
            }

            else if($ctx->ELSE() !== null){
                array_push($this->scopes, []);
                array_push($this->scopeNames, "else");

                try {
                    $this->visit($ctx->bloque(1));
                } finally {
                    array_pop($this->scopes);
                    array_pop($this->scopeNames);
                }

            }

            return null;
        }

        //ARREGLOS FUNCIONES
        private function defaultValue($type){
            switch ($type) {
                case 'int': return 0; break;
                case 'float': return 0.0; break;
                case 'bool': return false; break;
                case 'string': return ""; break;
                case 'rune': return '\u0000'; break;
                default: return null; break;
            }
        }

        private function extractTypeInfo($tipoCtx){
            $dimensions = [];
            $isPointer = false;

            while ($tipoCtx !== null) {
                if(method_exists($tipoCtx, 'LCOR') && $tipoCtx->LCOR() !== null){
                    $sizeRes = $this->visit($tipoCtx->logExpr());
                    $dimensions[] = $sizeRes["value"];
                    $tipoCtx = $tipoCtx->tipos();
                } elseif(method_exists($tipoCtx, 'MULT') && $tipoCtx->MULT() !== null){
                    $isPointer = true;
                    $tipoCtx = $tipoCtx->tipos();
                } elseif(method_exists($tipoCtx, 'tipoBase') && $tipoCtx->tipoBase() !==null){
                    $baseType = $tipoCtx->tipoBase()->getText();
                    if($baseType === "int32") $baseType = "int";
                    if($baseType === "float32") $baseType = "float";
                    break;
                } else {
                    break;
                }
            }

            return [
                "baseType" => $baseType ?? null,
                "dimensions" => $dimensions,
                "isPointer" => $isPointer
            ];
        }

        //DECLARACION CONSTANTES
        public function visitDeclaracionConst(DeclaracionConstContext $ctx){
            $valorInicial = $this->visit($ctx->logExpr());
            $id = $ctx->IDENTIFICADOR()->getText();

            $typeInfo = $this->extractTypeInfo($ctx->tipos());
            $baseType = $typeInfo["baseType"];
            $dimensions = $typeInfo["dimensions"];

            $isExpectedArray = count($dimensions) > 0;
            $tipoVariable = $isExpectedArray ? "Array" : $baseType;

            if($valorInicial["value"] === null || $valorInicial["type"] === "nil"){
                $this->addSemanticErrors(
                    "Error Semantico: la constante '$id' debe declararse con valor inicializacion",
                    $ctx
                );
                return null;
            }

            if($this->symbolExistInCurrentScope($id)){
                $this->addSemanticErrors(
                    "Error semantico: la constante '$id' ya fue declarada",
                    $ctx
                );
                return null;
            }

            $tipoExpresion = $valorInicial["type"];

            if($tipoVariable !== $tipoExpresion){
                $this->addSemanticErrors(
                    "Error semantico: tipo de constante '$id' '$tipoVariable' incompatible con valor de tipo '$tipoExpresion'",
                    $ctx
                );
                return null;
            }

            if($isExpectedArray){
                $exprSubType = $valorInicial["subtype"] ?? null;
                if($exprSubType !== $baseType){
                    $this->addSemanticErrors(
                        "Error semantico: arreglo constante '$id' espera elementos de tipo '$baseType', encontrado '$exprSubType'",
                        $ctx
                    );
                    return null;
                }

                $exprDimensions = $valorInicial["dimensiones"] ?? [];
                if($dimensions !== $exprDimensions){
                    $strExpected = "[" .implode("][", $dimensions) . "]";
                    $strFound = "[" .implode("][", $exprDimensions) . "]";
                    $this->addSemanticErrors(
                        "Error Semantico: dimensiones incompatibles en constantes '$id'. Esperado: $strExpected, Encontrado: $strFound",
                        $ctx
                    );
                    return null;
                }
            }

            $this->declareSymbol($id, [
                'type' => $tipoVariable,
                'subtype' => $isExpectedArray ? $baseType : null,
                'dimensions' => $dimensions,
                'value' => $valorInicial["value"],
                'const' => true
            ], $ctx);
            
            return null;
        }

        // ASIGNACION
        private function applyAssignmentOperation($op, $left, $right, $ctx){

            $operatorMap = [
                "+=" => "+",
                "-=" => "-",
                "*=" => "*",
                "/=" => "/"
            ];

            $binOp = $operatorMap[$op];

            $resultType = $this->resultType($binOp, $left["type"], $right["type"]);

            if($resultType === null){
                $this->addSemanticErrors(
                    "Error semantico: operacion invalida '$op' entre {$left["type"]} y {$right["type"]}",
                    $ctx
                );
                return null;
            }

            $l = $this->normalizeValue($left["type"], $left["value"]);
            $r = $this->normalizeValue($right["type"], $right["value"]);

            if(($binOp === "/" ) && $r == 0){
                $this->addSemanticErrors(
                    "Error semantico: division entre cero",
                    $ctx
                );
                return null;
            }

            switch($binOp){

                case "+":
                    $value = ($resultType === "string") ? $l . $r : $l + $r;
                    break;
                
                case "-":
                    $value = $l - $r;
                    break;
                
                case "*":
                
                    if($left["type"] === "string" && $right["type"] === "int"){
                        return [
                            "type"=>"string",
                            "value"=>str_repeat($l,$r)
                        ];
                    }
                
                    if($left["type"] === "int" && $right["type"] === "string"){
                        return [
                            "type"=>"string",
                            "value"=>str_repeat($r,$l)
                        ];
                    }
                
                    $value = $l * $r;
                    break;
                
                case "/":
                    $value = ($resultType === "int")
                        ? intval($l / $r)
                        : $l / $r;
                    break;
            }
                
            return [
                "type"=>$resultType,
                "value"=>$value
            ];
        }

        private function extractLValueIndices($ctx){
            if(method_exists($ctx, 'IDENTIFICADOR') && $ctx->IDENTIFICADOR() !== null){
                return ["id" => $ctx->IDENTIFICADOR()->getText(), "indices"=>[], "isDeref"=>false];
            }
            if(method_exists($ctx, 'MULT') && $ctx->MULT() !== null){
                $res = $this->extractFactorIndices($ctx->factor());
                $res["isDeref"] = true;
                return $res;
            }
            if(method_exists($ctx, 'factor') && $ctx->factor() !== null){
                $res = $this->extractFactorIndices($ctx->factor());
                $index = $this->visit($ctx->logExpr())["value"];
                $res["indices"][] = $index;
                $res["isDeref"] = false;
                return $res;
            }
            return ["id" => null, "indices" => [], "isDeref"=>false];
        }

        private function extractFactorIndices($factorCtx){
            if(method_exists($factorCtx, 'IDENTIFICADOR') && $factorCtx->IDENTIFICADOR() !== null){
                return ["id" => $factorCtx->IDENTIFICADOR()->getText(), "indices" => []];
            }

            if(method_exists($factorCtx, 'factor') && $factorCtx->factor() !== null && method_exists($factorCtx, 'LCOR') && $factorCtx->LCOR() !== null){
                $res = $this->extractFactorIndices($factorCtx->factor());
                $index = $this->visit($factorCtx->logExpr())["value"];
                $res["indices"][] = $index;
                return $res;
            }

            return ["id" => null, "indices" => []];
        }

        public function visitAsignacion(AsignacionContext $ctx){
            $lValueInfo = $this->extractLValueIndices($ctx->lValue());
            $id = $lValueInfo["id"];
            $indices = $lValueInfo["indices"];
            $isDeref = $lValueInfo["isDeref"];

            $op = $ctx->simboloAsignacion()->getText();
            $right = $this->visit($ctx->logExpr());

            $scopeIdx = $this->findSymbolScope($id);
            if($scopeIdx === null) {
                $this->addSemanticErrors("Error semantico: la variable '$id' no existe", $ctx);
                return null;
            }

            $simbolo = &$this->scopes[$scopeIdx][$id];

            if ($isDeref) {
                if (!isset($simbolo["pointer_ref"])) {
                    $this->addSemanticErrors("Error semantico: no se puede desreferenciar '$id' porque no es un puntero", $ctx);
                    return null;
                }
                $simbolo = &$simbolo["pointer_ref"];
            } 
            else if (!empty($indices) && isset($simbolo["pointer_ref"])) {
                $simbolo = &$simbolo["pointer_ref"];
            }

            if($simbolo["const"]){
                $this->addSemanticErrors("Error semantico: no se puede modificar una constante '$id'", $ctx);
                return null;
            }

            if (empty($indices)) {
                if($op === "="){
                    $isValidNilAssignment = ($right["type"] === "nil" && (strpos($simbolo["type"], '*') === 0 || $simbolo["type"] === "array"));
                    if($simbolo["type"] !== $right["type"] && !$isValidNilAssignment){
                        $this->addSemanticErrors("Error semantico: tipo incompatible '{$simbolo["type"]}' y '{$right["type"]}'", $ctx);
                        return null;
                    }
                    $simbolo["value"] = $right["value"];
                    return null;
                }

                $result = $this->applyAssignmentOperation($op, $simbolo, $right, $ctx);
                if($result === null) return null;

                if($result["type"] !== $simbolo["type"]){
                    $this->addSemanticErrors("Error semantico: el resultado '{$result["type"]}' no se puede asignar a '{$simbolo["type"]}'", $ctx);
                    return null;
                }
                $simbolo["value"] = $result["value"];
                return null;
            }

            $current = &$simbolo["value"]; 

            for ($k = 0; $k < count($indices); $k++) {
                $idx = $indices[$k];

                if (!isset($current[$idx])) {
                    $this->addSemanticErrors("Error semantico: indice $idx fuera de rango", $ctx);
                    return null;
                }

                if ($k === count($indices) - 1) {
                    $left = $current[$idx];

                    if ($op === "=") {
                        $isValidNilAssignment = ($right["type"] === "nil" && (strpos($left["type"], '*') === 0 || $left["type"] === "array"));
                        if ($left["type"] !== $right["type"] && !$isValidNilAssignment) {
                            $this->addSemanticErrors("Error semantico: tipo incompatible", $ctx);
                            return null;
                        }
                        $current[$idx]["value"] = $right["value"];
                    } else {
                        $result = $this->applyAssignmentOperation($op, $left, $right, $ctx);
                        if ($result === null) return null;

                        if ($result["type"] !== $left["type"]) {
                            $this->addSemanticErrors("Error semantico: tipo incompatible", $ctx);
                            return null;
                        }
                        $current[$idx]["value"] = $result["value"];
                    }
                } else {
                    $current = &$current[$idx]["value"];
                }
            }

            return null;
        }

        //DECLARACION CORTA
        public function visitDeclaracionCorta(DeclaracionCortaContext $ctx){

            $ids = $ctx->listaId()->IDENTIFICADOR();
            $expresiones = $ctx->listaExpr()->argumento();

            $values = [];

            foreach ($expresiones as $expr){
                $res = $this->visit($expr);

                if (is_array($res) && isset($res[0]) && is_array($res[0]) && isset($res[0]["type"])){
                    foreach ($res as $v){
                        $values[] = $v;
                    }
                } else {
                    $values[] = $res;
                }
            }   

            if(count($ids) !== count($values)){
                $this->addSemanticErrors(
                    "Error semantico: la cantidad de variables y valores no coincide",
                    $ctx
                );
                return null;
            }

            for ($i=0; $i < count($ids); $i++){

                $name = $ids[$i]->getText();
                $res = $values[$i];

                if ($this->symbolExistInCurrentScope($name)){
                    $this->addSemanticErrors(
                        "Error semantico: la variable '$name' ya fue declarada",
                        $ctx
                    );
                    continue;
                }

                if($res["type"] === "nil"){
                    $this->addSemanticErrors(
                        "Error semantico: no se puede asignar valor nil a '$name'", $ctx
                    );
                    continue;
                }

                $subtype = null;
                $dimensions = [];

                if($res["type"] === "array"){
                    $subtype = $res["subtype"] ?? null;
                    $dimensions = $res["dimensions"] ?? [];
                }

                $this->declareSymbol($name,[
                    "type" => $res["type"],
                    "value" => $res["value"],
                    "subtype" => $subtype,
                    "dimensions" => $dimensions,
                    "const" => false
                ], $ctx);
            }

            return null;
        }
        
        private function buildNDimensionalArray($dimensions, $baseType, $level = 0) {
            if ($level >= count($dimensions)) {
                return [
                    "type" => $baseType,
                    "value" => $this->defaultValue($baseType)
                ];
            }

            $size = $dimensions[$level];
            $array = [];
            for ($i = 0; $i < $size; $i++) {
                $array[] = $this->buildNDimensionalArray($dimensions, $baseType, $level + 1);
            }

            return [
                "type" => "array",
                "subtype" => $baseType,
                "dimensions" => array_slice($dimensions, $level),
                "value" => $array
            ];
        }

        //DECLARACION
        public function visitDeclaracion(DeclaracionContext $ctx){
            $listaIds = $ctx->listaId();
            $listaValores = $ctx->listaExpr();

            $ids = $listaIds->IDENTIFICADOR();
            $expresiones = $listaValores !== null ? $listaValores->argumento() : [];

            $typeInfo = $this->extractTypeInfo($ctx->tipos());
            $baseType = $typeInfo["baseType"];
            $dimensions = $typeInfo["dimensions"];

            $isExpectedArray = count($dimensions) > 0;

            $type = $isExpectedArray ? "array" : $baseType;
            $subtype = $isExpectedArray ? $baseType : null;

            if ($isExpectedArray) {
                $defaultValue = $this->buildNDimensionalArray($dimensions, $baseType)["value"];
            } else {
                $defaultValue = $this->defaultValue($baseType);
            }

            for ($i = 0; $i < count($ids); $i++) { 
                $name = $ids[$i]->getText();

                if ($this->symbolExistInCurrentScope($name)){
                    $this->addSemanticErrors(
                        "Error semantico: la variable '$name' ya fue declarada",
                        $ctx
                    );
                    continue;
                }

                $valueToAssign = $defaultValue;

                if($i < count($expresiones)){
                    $res = $this->visit($expresiones[$i]);

                    if ($isExpectedArray) {
                        if ($res["type"] !== "array") {
                            $this->addSemanticErrors(
                                "Error semantico: variable '$name' esperaba arreglo, se recibio '{$res["type"]}'",
                                $ctx
                            );
                        } else if (isset($res["subtype"]) && $res["subtype"] !== $baseType) {
                            $this->addSemanticErrors(
                                "Error semantico: arreglo '$name' espera elementos '$baseType', pero recibe '{$res["subtype"]}'",
                                $ctx
                            );
                        } else if (isset($res["dimensions"]) && $res["dimensions"] !== $dimensions) {
                            $strExpected = "[" . implode("][", $dimensions) . "]";
                            $strFound = "[" . implode("][", $res["dimensions"]) . "]";
                            $this->addSemanticErrors(
                                "Error semantico: dimensiones incompatibles en variable '$name'. Esperado: $strExpected, Encontrado: $strFound",
                                $ctx
                            );
                        } else {
                            $valueToAssign = $res["value"];
                        }
                    } 
                    else {
                        if($res["type"] === $type){
                            $valueToAssign = $res["value"];
                        } else{
                            $this->addSemanticErrors(
                                "Error semantico: variable '$name' tipo '$type' incompatible con valor '{$res["type"]}'",
                                $ctx
                            );
                        }
                    }
                }
                $this->declareSymbol($name, [
                    'value' => $valueToAssign,
                    'type' => $type,
                    'subtype' => $subtype,
                    'dimensions' => $dimensions,
                    'const' => false
                ], $ctx);
            }
            if(count($expresiones) > count($ids)){
                $this->addSemanticErrors(
                    "Error semantico: hay mas valores que variables en la declaracion",
                    $ctx
                );
            }
   
            return null;
        }

        //FUNCION IMPRIMIR  
        public function visitFuncionImprimir(FuncionImprimirContext $ctx){
            $lista = $ctx->imprimir()->listaExpr();

            if($lista == null) return null;

            $valores = [];

            foreach($lista->argumento() as $e){
                $resultado = $this->visit($e);

                if($resultado === null){
                    $valores[] = "null";
                    continue;
                }

                switch ($resultado["type"]) {
                    case "bool":
                        $valores[] = $resultado["value"] ? "true" : "false";
                        break;
                    case "rune":
                    case "string":
                    case "int":
                    case "float":
                        $valores[] = (string)$resultado["value"];
                        break;
                    default:
                        $valores[] = "nil";
                        $imprimir = "nil";
                        $this->addSemanticErrors(
                            "Error Semantico: no se pudo imprimir: '$imprimir'",
                            $ctx
                        );
                }
            }

            $salida = implode(" ", $valores);

            $this->console .= $salida . "\n";


            return null;
        }

        public function visitBloque(BloqueContext $ctx){
            array_push($this->scopes, []);
            $returned = false;
            try {
                foreach ($ctx->i() as $instruction) {

                    if ($instruction->exception !== null) {
                        continue;
                    }

                    if(method_exists($instruction, "funcion") && $instruction->funcion() !== null){
                        continue;
                    }
                    $this->visit($instruction);
                }
                $this->collectSymbols();
            } finally {
                array_pop($this->scopes);
            }
            if(!$returned){
                $this->collectSymbols();
            }
            return null;
        }

        //GUARDAR VARIABLES
        public $visibleSymbols = [];

        private function collectSymbols() {
            foreach ($this->scopes as $index => $scope) {
                foreach ($scope as $name => $data) {
                    $scopeName = $this->scopeNames[$index] ?? "global";
                    $this->visibleSymbols["$name@$scopeName"] = $data;
                }
            }       

            foreach($this->functions as $fname => $fdata){
                $params = implode(", ", array_map(fn($p) => $p["type"]." ".$p["name"], $fdata["params"] ?? []));
                $returns = implode(", ", $fdata["returns"] ?? []);
                            
                $this->visibleSymbols[$fname] = [
                    "value" => "funcion",
                    "type" => "funcion",
                    "params" => $params,
                    "returns" => $returns,
                    "line" => $fdata["ctx"] ? $fdata["ctx"]->start->getLine() : null,
                    "column" => $fdata["ctx"] ? $fdata["ctx"]->start->getCharPositionInLine() : null,
                    "scope" => $fdata["scope"] ?? "global"
                ];
            }
        }

        private function preRegisterFunction($ctx){
            $nombre = $ctx->IDENTIFICADOR()->getText();

            if (isset($this->functions[$nombre])){
                $this->addSemanticErrors("Error Semantico: la funcion '$nombre' ya fue declarada", $ctx);
                return;
            }

            // PARAMETROS
            $params = [];
            if($ctx->listaParametros() !== null){
                foreach($ctx->listaParametros()->parametro() as $p){
                    $paramName = $p->IDENTIFICADOR()->getText();

                    $typeInfo = $this->extractTypeInfo($p->tipos());
                    $isPointer = $p->MULT() !== null;

                    $paramType = $this->normalizeType(
                        count($typeInfo["dimensions"]) > 0 ? 'array' : $typeInfo["baseType"],
                        $typeInfo["baseType"],
                        $typeInfo["dimensions"]
                    );

                    $params[] = [
                        "name" => $paramName,
                        "type" => $paramType,
                        "pointer" => $isPointer
                    ];
                }
            }

            // RETORNOS
            $returns = [];
            if ($ctx->listaRetorno() !== null){
                foreach($ctx->listaRetorno()->tipos() as $t){
                    $tInfo = $this->extractTypeInfo($t);
                    $returns[] = $this->normalizeType(count($tInfo["dimensions"]) > 0 ? 'array' : $tInfo["baseType"], $tInfo["baseType"], $tInfo["dimensions"]);
                }
            } elseif ($ctx->tipos() !== null){
                $tInfo = $this->extractTypeInfo($ctx->tipos());
                $returns[] = $this->normalizeType(count($tInfo["dimensions"]) > 0 ? 'array' : $tInfo["baseType"], $tInfo["baseType"], $tInfo["dimensions"]);
            }

            $this->functions[$nombre] = [
                "params" => $params,
                "returns" => $returns,
                "ctx" => $ctx,
                "scope" => end($this->scopeNames),
                "isMain" => false
            ];
        }

        private function preRegisterMain($ctx){
            $this->mainCount++;

            if ($this->mainCount > 1){
                $this->addSemanticErrors(
                    "Error Semantico: solo puede existir una funcion main",
                    $ctx
                );
            }

            $this->functions["main"] = [
                "ctx" => $ctx,
                "isMain" => true
            ];
        }

        private function executeMain(){

            if(!isset($this->functions["main"])){
                $this->addSemanticErrors(
                    "Error semantico: no existe la funcion main",
                    null
                );
                return;
            }
                        
            $mainCtx = $this->functions["main"]["ctx"];

            array_push($this->scopeNames, "main");

            foreach($mainCtx->bloque()->i() as $instr){
                $this->registerFunctionsInBlock($instr);
            }
           
            $this->visit($mainCtx->bloque());

            array_pop($this->scopeNames);

        }

        private function registerFunctionsInBlock($instruction){
            if(method_exists($instruction, "funcion") && $instruction->funcion() !== null){
                $this->preRegisterFunction($instruction->funcion());
            }

            if(method_exists($instruction, 'bloque') && $instruction->bloque() !== null){
                foreach($instruction->bloque()->i() as $instr){
                    $this->registerFunctionsInBlock($instr);
                }
            }
        }

        public function visitPrograma(ProgramaContext $ctx){

            foreach ($ctx->topLevel() as $node){
                if ($node->funcion() !== null){
                    $this->preRegisterFunction($node->funcion());
                }
            }

            foreach ($ctx->topLevel() as $node){
                if ($node->mainFuncion() !== null){
                    $this->preRegisterMain($node->mainFuncion());
                }
            }

            foreach ($ctx->topLevel() as $node){
                if($node->declaracion() !== null){
                    $this->visit($node->declaracion());
                }

                if($node->declaracionConst() !== null){
                    $this->visit($node->declaracionConst());
                }
            }

            $this->executeMain();

            return null;
        }

        //LISTAEXPRESIONES
        public function visitListaExpr(ListaExprContext $ctx){
            $resultados = [];

            $expresiones = $ctx->argumento();

            foreach ($expresiones as $expr){
                $res = $this->visit($expr);
                $resultados[] = $res;
            }

            return $resultados;
        }

        //expresiones
        private function resultType($op, $t1, $t2){
            $rules = [
                '+' => [
                    'int' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                    'float' => ['int'=>'float', 'float'=>'float', 'rune'=>'float'],
                    'rune' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                    'string' => ['string'=>'string'],
                ],

                '-' => [
                    'int' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                    'float' => ['int'=>'float', 'float'=>'float', 'rune'=>'float'],
                    'rune' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                ],

                '*' => [
                    'int' => ['int'=>'int', 'float'=>'float', 'rune'=>'int', 'string'=>'string'],
                    'float' => ['int'=>'float', 'float'=>'float', 'rune'=>'float'],
                    'rune' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                    'string' => ['int'=>'string'],
                ],

                '/' => [
                    'int' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                    'float' => ['int'=>'float', 'float'=>'float', 'rune'=>'float'],
                    'rune' => ['int'=>'int', 'float'=>'float', 'rune'=>'int'],
                ],

                '%' => [
                    'int' => ['int'=>'int', 'rune'=>'int'],
                    'rune' => ['int'=>'int', 'rune'=>'int'],
                ],

                '==' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                    'bool' => ['bool'=>'bool'],
                ],

                '!=' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                    'bool' => ['bool'=>'bool'],
                ],

                '>' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                ],

                '<' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                ],

                '>=' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                ],

                '<=' => [
                    'int' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'float' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'rune' => ['int'=>'bool', 'float'=>'bool', 'rune'=>'bool'],
                    'string' => ['string'=>'bool'],
                ],
            ];

            if(isset($rules[$op][$t1][$t2])){
                return $rules[$op][$t1][$t2];
            }

            return null;
        }

        private function normalizeValue($type, $value){
            if($type === "rune"){
                return ord($value);
            }
            return $value;
        }


        public function visitBinaryExpressionT(BinaryExpressionTContext $ctx){
            $left = $this->visit($ctx->expr());
            $right = $this->visit($ctx->term());

            $op = $ctx->op->getText();

            if($left["type"] === "nil" || $right["type"] === "nil"){
                $this->addSemanticErrors(
                    "Errror semantico: operacion con nil",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $resultType = $this->resultType($op, $left["type"], $right["type"]);

            if ($resultType === null) {
                $this->addSemanticErrors(
                    "Error semantico: operacion invalida '$op' entre {$left["type"]} y {$right["type"]}",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $l = $this->normalizeValue($left["type"], $left["value"]);
            $r = $this->normalizeValue($right["type"], $right["value"]);

            switch ($op) {
                case '+':
                    $value = ($resultType === "string") ? $l . $r : $l + $r;
                    break;
                case '-':
                    $value = $l - $r;
                    break;
            }

            return [
                "type" => $resultType,
                "value" => $value
            ];
        }

        public function visitBinaryExpressionS(BinaryExpressionSContext $ctx){
            $left = $this->visit($ctx->term());
            $right = $this->visit($ctx->factor());

            $op = $ctx->op->getText();

            if($left["type"] === "nil" || $right["type"] === "nil"){
                $this->addSemanticErrors(
                    "Errror semantico: operacion con nil",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            if (($op === '/'  || $op === '%') && $right["value"] == 0) {
                $this->addSemanticErrors(
                    "Errror semantico: division o modulo por 0",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $resultType = $this->resultType($op, $left["type"], $right["type"]);

            if ($resultType === null) {
                $this->addSemanticErrors(
                    "Error semantico: operacion invalida '$op' entre {$left["type"]} y {$right["type"]}",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $l = $this->normalizeValue($left["type"], $left["value"]);
            $r = $this->normalizeValue($right["type"], $right["value"]);

            switch ($op) {
                case '*':
                    if($left["type"] === "string" && $right["type"] === "int"){
                        return [
                            "type" => "string",
                            "value" => str_repeat($l, $r)
                        ];
                    }
                    if($left["type"] === "int" && $right["type"] === "string"){
                        return [
                            "type" => "string",
                            "value" => str_repeat($r, $l)
                        ];
                    }
                    $value = $l * $r;
                    break;
                case '/':
                    $value = ($resultType === "int")
                    ? intval($l / $r)
                    : $l / $r;
                    break;
                case '%':
                    $value = $l % $r;
                    break;
            }

            return [
                "type" => $resultType,
                "value" => $value
            ];
        }

        public function visitRelationalExpresion(RelationalExpresionContext $ctx){
            $left = $this->visit($ctx->relExpr());
            $right = $this->visit($ctx->expr());

            $op = $ctx->op->getText();

            if($left["type"] === "nil" || $right["type"] === "nil"){
                $this->addSemanticErrors(
                    "Errror semantico: operacion con nil",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $resultType = $this->resultType($op, $left["type"], $right["type"]);

            if ($resultType === null) {
                $this->addSemanticErrors(
                    "Error semantico: operacion invalida '$op' entre {$left["type"]} y {$right["type"]}",
                    $ctx
                );
                return ["type" => "nil", "value"=>null];
            }

            $l = $this->normalizeValue($left["type"], $left["value"]);
            $r = $this->normalizeValue($right["type"], $right["value"]);

            switch ($op) {
                case '==': $value = ($l == $r); break;
                case '!=': $value = ($l != $r); break;
                case '>': $value = ($l > $r); break;
                case '>=': $value = ($l >= $r); break;
                case '<': $value = ($l < $r); break;
                case '<=': $value = ($l <= $r); break;
            }

            return [
                "type" => "bool",
                "value" => $value
            ];
        }

        public function visitLogicalExpression(LogicalExpressionContext $ctx){
            $op = $ctx->op->getText();

            $left = $this->visit($ctx->logExpr());

            if($left["type"] === "nil"){
                $this->addSemanticErrors(
                    "Error semantico: operacion con nil",
                    $ctx
                );
                return ["type"=>"nil", "value"=>null];
            }

            if($left["type"] !== "bool"){
                $this->addSemanticErrors(
                    "Error semantico: operacion logica '$op' requiere operandos booleanos",
                    $ctx
                );
                return ["type"=>"nil", "value"=>null];
            }

            if($op === '||'){
                if($left["value"]){
                    return ["type" => "bool", "value"=> true];
                }

                $right = $this->visit($ctx->relExpr());

                if($right["type"] !== "bool"){
                    $this->addSemanticErrors(
                        "Error semantico: operacion logica '||' requiere booleanos",
                        $ctx
                    );
                    return ["type" => "nil", "value"=> null];
                }

                return [
                    "type" => "bool",
                    "value" => $right["value"]
                ] ;
            }

            if($op === '&&'){
                if(!$left["value"]){
                    return ["type" => "bool", "value"=> false];
                }

                $right = $this->visit($ctx->relExpr());

                if($right["type"] !== "bool"){
                    $this->addSemanticErrors(
                        "Error semantico: operacion logica '&&' requiere booleanos",
                        $ctx
                    );
                    return ["type" => "nil", "value"=> null];
                }

                return [
                    "type" => "bool",
                    "value" => $right["value"]
                ] ;
            }
        }

        public function visitGroupedExpression(GroupedExpressionContext $ctx){
            return $this->visit($ctx->logExpr());
        }

        public function visitUnaryExpression(UnaryExpressionContext $ctx){
            $res = $this->visit($ctx->factor());
            $op = $ctx->op->getText();
                        
            switch ($op) {
                case '*':
                    if(!isset($res["pointer_ref"])){
                        $this->addSemanticErrors("Error semantico: no se puede desreferenciar algo que no es puntero", $ctx);
                        return ["type"=>"nil", "value"=>null];
                    }
                    return $res["pointer_ref"];
                    
                case '&':
                    if(!isset($res["id"])){
                        $this->addSemanticErrors("Error semantico: '&' solo aplica a variables", $ctx);
                        return ["type"=>"nil", "value"=>null];
                    }
                    $id = $res["id"];
                    $ptr = ["type" => "*" . $res["type"], "value" => "pointer", "subtype" => $res["subtype"] ?? null, "dimensions" => $res["dimensions"] ?? []];
                    $ptr["pointer_ref"] = &$this->scopes[$this->findSymbolScope($id)][$id];
                    return $ptr;
                    
                case '-':
                    return ["type"=>$res["type"], "value"=> -$res["value"]];
                case '!':
                    return ["type" => "bool", "value" => !$res["value"]];
            }
            return ["type" => "nil", "value" => null];
        }

        //IDENTIFICADORES
        public function visitIdentifier(IdentifierContext $ctx){
            $identificador = $ctx->getText();

            $symbol = $this->getSymbol($identificador);

            if($symbol === null){
                $this->addSemanticErrors("La variable '$identificador' no ha sido declarada", $ctx);

                return [
                    "value" => null,
                    "type" => "error"
                ];
            }

            $result = $symbol;

            $result["id"] = $identificador;

            return $result;
        }

        private function parseArrayElements($listaCtx, $dimensions, $baseType, $level, $mainCtx) {
            $size = $dimensions[$level];
            $isLastLevel = ($level === count($dimensions) - 1);

            $array = [];
            $elementos = $listaCtx ? $listaCtx->elemento() : [];

            for ($i = 0; $i < $size; $i++) {
                if ($i < count($elementos)) {
                    $elemCtx = $elementos[$i];

                    if ($isLastLevel) {
                        if ($elemCtx->logExpr() !== null) {
                            $res = $this->visit($elemCtx->logExpr());
                            if ($res["type"] !== $baseType) {
                                $this->addSemanticErrors("Error semantico: tipo incompatible, se esperaba '$baseType', encontrado '{$res["type"]}'", $elemCtx);
                            }
                            $array[] = $res;
                        } else {
                            $this->addSemanticErrors("Error semantico: demasiadas dimensiones anidadas en el literal", $elemCtx);
                            $array[] = ["type" => $baseType, "value" => $this->defaultValue($baseType)];
                        }
                    } else {
                        if ($elemCtx->LBRACE() !== null) {
                            $array[] = [
                                "type" => "array",
                                "subtype" => $baseType,
                                "dimensions" => array_slice($dimensions, $level + 1),
                                "value" => $this->parseArrayElements($elemCtx->listaElementos(), $dimensions, $baseType, $level + 1, $mainCtx)
                            ];
                        } else {
                            $this->addSemanticErrors("Error semantico: faltan bloques de llaves para coincidir con la dimension", $elemCtx);
                            $array[] = $this->buildNDimensionalArray($dimensions, $baseType, $level + 1);
                        }
                    }
                } 
                else {
                    if ($isLastLevel) {
                        $array[] = ["type" => $baseType, "value" => $this->defaultValue($baseType)];
                    } else {
                        $array[] = $this->buildNDimensionalArray($dimensions, $baseType, $level + 1);
                    }
                }
            }

            if (count($elementos) > $size) {
                $this->addSemanticErrors("Error semantico: mas elementos (" . count($elementos) . ") de los permitidos ($size) en este nivel", $listaCtx ?? $mainCtx);
            }

            return $array;
        }
       
        //LITERALES
        public function visitArrayLiteral(ArrayLiteralContext $ctx){
            $typeInfo = $this->extractTypeInfo($ctx->tipos());
            $baseType = $typeInfo["baseType"];
            $dimensions = $typeInfo["dimensions"]; 

            if (empty($dimensions)) {
                $this->addSemanticErrors("Error semantico: literal de arreglo sin dimensiones", $ctx);
                return ["type" => "error", "value" => null];
            }

            $listaCtx = $ctx->listaElementos();
    
            $value = $this->parseArrayElements($listaCtx, $dimensions, $baseType, 0, $ctx);

            return [
                "type" => "array",
                "subtype" => $baseType,
                "dimensions" => $dimensions,
                "value" => $value
            ];
        }

        public function visitArregloAcceso(ArregloAccesoContext $ctx){
            $arrayRes = $this->visit($ctx->factor());

            if (isset($arrayRes["pointer_ref"])) {
                $arrayRes = $arrayRes["pointer_ref"];
            }

            $indexRes = $this->visit($ctx->logExpr());

            if ($indexRes === null) {
                return ["type" => "nil", "value" => null];
            }

            if ($indexRes["type"] !== "int") {
                $this->addSemanticErrors("Error semantico: el índice del arreglo debe ser un numero entero, se recibio '{$indexRes["type"]}'", $ctx);
                return ["type" => "nil", "value" => null];
            }

            if ($arrayRes === null || $arrayRes["type"] !== "array") {
                $this->addSemanticErrors("Error semantico: se intento indexar un valor que no es un arreglo", $ctx);
                return ["type" => "nil", "value" => null];
            }

            $array = $arrayRes["value"];
            $index = $indexRes["value"];

            if ($index < 0) {
                $index = $index + count($array);
            }

            if (!isset($array[$index])) {
                $this->addSemanticErrors("Error semantico: indice $index fuera de rango", $ctx);
                return ["type" => "nil", "value" => null];
            }
            return $array[$index];
        }

        public function visitLiteralValue(LiteralValueContext $ctx){
            return $this->visit($ctx->literal());
        }

        public function visitLiteral(LiteralContext $ctx){
            if ($ctx->arrayLiteral() !== null) {
                return $this->visit($ctx->arrayLiteral());
            }

            $texto = $ctx->getText();

            if ($ctx->ENTERO() !== null) {
                return [
                    "value" => intval($texto),
                    "type" => "int"
                ];
            }

            if ($ctx->FLOAT() !== null) {
                return [
                    "value" => floatval($texto),
                    "type" => "float"
                ];
            }

            if ($ctx->BOOL() !== null) {
                return [
                    "value" => $texto === "true",
                    "type" => "bool"
                ];
            }

            if ($ctx->STR() !== null) {
                return [
                    "value" => trim($texto, '"'),
                    "type" => "string"
                ];
            }

            if ($ctx->NIL() !== null) {
                return [
                    "value" => null,
                    "type" => "nil"
                ];
            }

            if ($ctx->RUNE() !== null) {
                $textRune = trim($texto, "'");

                if(preg_match('/^\\\\u([0-9A-Fa-f]{4})$/', $textRune, $matches)){
                    $codepoint = hexdec($matches[1]);
                    return [
                        "value" => $codepoint,
                        "type" => "rune"
                    ];
                }

                switch ($textRune) {
                    case '\\n': $codepoint = ord("\n"); break;
                    case '\\t': $codepoint = ord("\t"); break;
                    case '\\r': $codepoint = ord("\r"); break;
                    case '\\\\': $codepoint = ord("\\"); break;
                    case "\\'": $codepoint = ord("'"); break;
                    default:
                        $codepoint = mb_ord($textRune, "UTF-8"); 
                        break;
                }

                return [
                    "value" => $codepoint,
                    "type" => "rune"
                ];
            }

            return ["type" => "nil", "value" => null];
        }
    }
?>
