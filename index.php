<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GOLAMPI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        body{
            height:100vh;
            display:flex;
            flex-direction:column;
        }

        .topbar{
            background:#2c3e50;
            padding:10px;
        }

        .editor-container{
            flex: 1;
            display: flex;
        }

        .editor{
            flex: 1;
        }

        .editor textarea{
            width:100%;
            height:100%;
            resize:none;
            border:none;
            padding:15px;
            font-family: monospace;
            font-size: 14px;
            background: #1e1e1e;
            color: #d4d4d4
        }

        .bottom-panel{
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #000;
            color: #00ff7f;
            font-family: monospace;
            padding: 10px;
        }

        .tab-content{
            flex: 1;
            overflow: auto;
            background: #111;
            color: white;
            padding: 10px;
            font-family: monospace;
        }

        .console{
            background-color: #000;
            color: #00ff7f;
            padding: 10px;
            font-family: monospace;
            height: 100%;
            overflow: auto;
        }

        form{
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .main-container{
            flex: 1;
            display: flex;
            flex-direction: column;
        }

    </style>

</head>
<body class="bg-light">
<form method = "post">

    <div class="topbar text-white d-flex align-items-center gap-2">

        <button type="button" id="nuevo" class="btn btn-light btn-sm">Nuevo Archivo</button>
        <button type="button" id="abrir" class="btn btn-light btn-sm">Abrir Archivo</button>
        <button type="button" id="guardar" class="btn btn-light btn-sm">Guardar Código</button>

        <div class="ms-auto d-flex gap-2">
            <button type="button" id="descargarArm64" class="btn btn-info btn-sm">Descargar ARM64</button>
            <button type="submit" class="btn btn-success btn-sm">Ejecutar</button>
        </div>

        <button type="button" id="limpiar" class="btn btn-warning btn-sm">Limpiar Consola</button>

        <input type="file" id="cargaArchivo" accept=".txt" style="display:none"></input>

    </div>

    <?php
    require __DIR__ . '/vendor/autoload.php';
    require_once 'bootstrap.php';

    use Antlr\Antlr4\Runtime\InputStream;
    use Antlr\Antlr4\Runtime\CommonTokenStream;
    use Antlr\Antlr4\Runtime\Error\Listeners\ANTLRErrorListener;
    use Antlr\Antlr4\Runtime\Error\ErrorListener;
    use Antlr\Antlr4\Runtime\RecognitionException;
    use Antlr\Antlr4\Runtime\Recognizer;

    $input = "";
    $output = "";
    $arm64Output = "";
    $isError = false;
    $fueEjecutado = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fueEjecutado = true;
        $input = $_POST["expression"] ?? "";

        if (!empty($input)) {
            try {

                //LEXER
                $inputStream = InputStream::fromString($input);
                $lexer  = new GrammarLexer($inputStream);
                $tokens = new CommonTokenStream($lexer);

                $tokens -> fill();

                $tokenlist = [];
                $errors = [];

                foreach ($tokens->getAllTokens() as $token) {
                    $typeName = $lexer->getVocabulary()->getSymbolicName($token->getType());

                    if ($typeName === "ERROR") {
                        $errors[] = [
                            "text" => $token->getText(),
                            "type" => $typeName,
                            "line" => $token->getLine(),
                            "column" => $token->getCharPositionInLine()
                        ];
                    } else {
                        $tokenlist[] = [
                            "text" => $token->getText(),
                            "type" => $typeName,
                            "line" => $token->getLine(),
                            "column" => $token->getCharPositionInLine()
                        ];
                    }
                }

                $tokensJson = json_encode($tokenlist, JSON_PRETTY_PRINT);
                $errorsJson = json_encode($errors, JSON_PRETTY_PRINT);

                $tokens->seek(0);

                //PARSER
                $parser = new GrammarParser($tokens);
                $parser -> removeErrorListeners();

                $syntaxErrors = [];
                $parser->addErrorListener(new class($syntaxErrors) implements \Antlr\Antlr4\Runtime\Error\Listeners\ANTLRErrorListener{
                    private $errors;
                    public function __construct(&$errors) { $this->errors = &$errors; }

                    public function syntaxError(
                        \Antlr\Antlr4\Runtime\Recognizer $recognizer,
                        $offendingSymbol,
                        int $line,
                        int $charPositionInLine,
                        string $msg,
                        $e = null
                    ) : void {
                        $this->errors[] = [
                            "text" => $offendingSymbol ? $offendingSymbol->getText() : "",
                            "line" => $line,
                            "column" => $charPositionInLine,
                            "message" => $msg
                        ];
                    }

                    public function reportAmbiguity(\Antlr\Antlr4\Runtime\Parser $recognizer, $dfa, int $startIndex, int $stopIndex, bool $exact, $ambigAlts, $configs) : void {}
                    public function reportAttemptingFullContext(\Antlr\Antlr4\Runtime\Parser $recognizer, $dfa, int $startIndex, int $stopIndex, $conflictingAlts, $configs) : void {}
                    public function reportContextSensitivity(\Antlr\Antlr4\Runtime\Parser $recognizer, $dfa, int $startIndex, int $stopIndex, int $prediction, $configs) : void {}
                });

                //PARSEAR
                $tree = $parser->programa();

                //errores sintacticos
                $syntaxErrorsJson = json_encode($syntaxErrors, JSON_PRETTY_PRINT);

                $interpreter = new Interpreter();
                
                if (true) {
                    //Analisis Semantico e Interprete
                    $interpreter->visit($tree);
                    $output = $interpreter->console;

                    $generator = new Arm64Generator();
                    $generator->setFunctionsTabla($interpreter->getFunctionsTabla());
                    $generator->visit($tree);
                    $arm64Output = $generator->getAssembly();
                    

                } else {
                    $output = "Se encontraron errores Léxicos o Sintácticos.\nEjecución y Traducción abortadas.";
                    $arm64Output = "Error: Código fuente inválido. No se puede generar ensamblador.";
                }

                //TABLA DE VARIABLES
                $symbolsJson = json_encode($interpreter->visibleSymbols ?? '{}', JSON_PRETTY_PRINT);

                //errores semanticos
                $semanticErrorsJson = json_encode($interpreter->semanticErrors ?? [], JSON_PRETTY_PRINT);

            } catch (Exception $e) {
                $output = "Error: " . $e->getMessage();
                $isError = true;
            }
        } else {
            $output = "Ingrese una expresión.";
            $isError = true;
        }
    }
    ?>

    <div class="main-container">
        <div class="editor-container">

            <div class="editor">
                <textarea
                    id = "editor"
                    name="expression"
                    placeholder="Escribe tu codigo aqui"
                ><?php echo htmlspecialchars($input); ?></textarea>
            </div>

            <script>
                const tokens = <?php echo $tokensJson ?? '[]'; ?>;
                const errors = <?php echo $errorsJson ?? '[]'; ?>;
                const syntaxErrors = <?php echo $syntaxErrorsJson ?? '[]'; ?>;
                const symbols = <?php echo $symbolsJson ?? '{}'; ?>;
                const semanticErrors = <?php echo $semanticErrorsJson ?? '[]'; ?>;
                console.log("TOKENS:", tokens);
                console.log("LEXICAL ERRORS:", errors);
                console.log("SYNTACTIC ERRORS:", syntaxErrors)
                console.log("TABLA DE SIMBOLOS:", symbols);
                console.log("SEMANTIC ERRORS:", semanticErrors);
            </script>
        </div>
        <div class="bottom-panel">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#arm64Tab">
                        Traducción ARM64
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#console">
                        Consola
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#lexical">
                        Errores Lexicos
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#sintax">
                        Errores Sintacticos
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#semantic">
                        Errores Semanticos
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tokens">
                        Tokens
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#symbols">
                        Tabla de simbolos
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="arm64Tab">
                    <div class="console" id="arm64Contenido" style="color: #ffb86c;">
                        <pre style="margin: 0; white-space: pre-wrap; font-family: monospace;"><?php echo htmlspecialchars($arm64Output ?? "") ?></pre>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="console">
                    <div class = "console" id="consolaSalida">
                        <?php echo nl2br(htmlspecialchars($output ?? "")) ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="lexical">
                    <table class= "table table-dark table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Lexema</th>
                                <th>Tipo</th>
                                <th>Linea</th>
                                <th>Columna</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($errors)): ?>
                                <?php foreach($errors as $err): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($err["text"]); ?></td>
                                        <td><?php echo htmlspecialchars($err["type"]); ?></td>
                                        <td><?php echo $err["line"]; ?></td>
                                        <td><?php echo $err["column"]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="sintax">
                    <table class= "table table-dark table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Linea</th>
                                <th>Columna</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($syntaxErrors)): ?>
                                <?php foreach($syntaxErrors as $err): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($err["text"]); ?></td>
                                        <td><?php echo $err["line"]; ?></td>
                                        <td><?php echo $err["column"]; ?></td>
                                        <td><?php echo htmlspecialchars($err["message"]); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="semantic">
                    <table class= "table table-dark table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Error</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($interpreter->semanticErrors)): ?>
                                <?php foreach($interpreter->semanticErrors as $err): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($err); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="tokens">
                    <table class= "table table-dark table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Lexema</th>
                                <th>Tipo</th>
                                <th>Linea</th>
                                <th>Columna</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($tokenlist)): ?>
                                <?php foreach($tokenlist as $tok): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($tok["text"]); ?></td>
                                        <td><?php echo htmlspecialchars($tok["type"]); ?></td>
                                        <td><?php echo $tok["line"]; ?></td>
                                        <td><?php echo $tok["column"]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="symbols">
                    <table class= "table table-dark table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Parametros</th>
                                <th>Retorno</th>
                                <th>Linea</th>
                                <th>Columna</th>
                                <th>Ambito</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!function_exists('formatearValorSimbolo')) {
                                function formatearValorSimbolo($item) {
                                    if (!is_array($item)) return $item;

                                    if (isset($item["type"]) && isset($item["value"]) && !is_array($item["value"])) {
                                        if ($item["type"] === "string") return '"' . $item["value"] . '"';
                                        if ($item["type"] === "bool") return $item["value"] ? "true" : "false";
                                        return $item["value"];
                                    }

                                    if (isset($item["type"]) && $item["type"] === "array" && isset($item["value"]) && is_array($item["value"])) {
                                        $elementos = array_map('formatearValorSimbolo', $item["value"]);
                                        return "[" . implode(", ", $elementos) . "]";
                                    }

                                    return json_encode($item);
                                }
                            }

                            if(!empty($interpreter->visibleSymbols)): 
                                foreach($interpreter->visibleSymbols as $name => $symbol): 

                                    $tipoFormateado = $symbol["type"] ?? "";
                                    if ($tipoFormateado === "array" && !empty($symbol["dimensions"])) {
                                        $strDim = "";
                                        foreach ($symbol["dimensions"] as $dim) {
                                            $strDim .= "[$dim]";
                                        }
                                        $tipoFormateado = $strDim . ($symbol["subtype"] ?? "");
                                    }
                                
                                    $cleanName = explode("@", $name)[0];
                            ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cleanName); ?></td>

                                        <td>
                                            <?php 
                                                $value = $symbol["value"] ?? "";
                                                if (is_array($value) && isset($symbol["type"]) && $symbol["type"] === "array") {
                                                    echo htmlspecialchars(formatearValorSimbolo($symbol));
                                                } elseif (is_array($value)) {
                                                    echo htmlspecialchars(json_encode($value));
                                                } else {
                                                    if (($symbol["type"] ?? "") === "string") {
                                                        echo htmlspecialchars('"' . $value . '"');
                                                    } else {
                                                        echo htmlspecialchars(is_bool($value) ? ($value ? "true" : "false") : $value);
                                                    }
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo htmlspecialchars($tipoFormateado); ?></td>
                                        <td><?php echo htmlspecialchars($symbol["params"] ?? ""); ?></td>
                                        <td><?php echo htmlspecialchars($symbol["returns"] ?? ""); ?></td>
                                        <td><?php echo htmlspecialchars($symbol["line"] ?? ""); ?></td>
                                        <td><?php echo htmlspecialchars($symbol["column"] ?? ""); ?></td>
                                        <td><?php echo htmlspecialchars($symbol["scope"] ?? ""); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    const editor = document.getElementById("editor");
    const consolaSalida = document.getElementById("consolaSalida");

    const nuevoBtn = document.getElementById("nuevo");
    const abrirBtn = document.getElementById("abrir");
    const guardarBtn = document.getElementById("guardar");
    const limpiarBtn = document.getElementById("limpiar");
    const descargarArm64Btn = document.getElementById("descargarArm64");
    const arm64Contenido = document.getElementById("arm64Contenido");

    const cargarA = document.getElementById("cargaArchivo");

    limpiarBtn.addEventListener("click", () => {
        consolaSalida.innerHTML = "";
        arm64Contenido.innerHTML = "";
    });

    nuevoBtn.addEventListener("click", () => {
        if(confirm("Al crear un nuevo archivo se perdera el contenido actual")){
            editor.value = "";
            consolaSalida.innerHTML = "";
            arm64Contenido.innerHTML = "";
        }
    });

    guardarBtn.addEventListener("click", () => {
        const text = editor.value;
        const blob = new Blob([text], {type: "text/plain"});
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "codigo.txt";
        link.click();
    });

    abrirBtn.addEventListener("click", () => {
        cargarA.click();
    });

    cargarA.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if(!file) return;
        const reader = new FileReader();
        reader.onload = function(e){
            editor.value = e.target.result;
        };
        reader.readAsText(file);
    });

    descargarArm64Btn.addEventListener("click", () => {
        let text = arm64Contenido.innerText || arm64Contenido.textContent;
        text = text.trim();

        if(!text || text.startsWith("Error:")) {
            alert("No hay un código ARM64 válido para descargar. Por favor compila el programa primero.");
            return;
        }

        const blob = new Blob([text + "\n"], {type: "text/plain"});
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "codigo.s";
        link.click();
    });

    const fueEjecutado = <?php echo $fueEjecutado ? 'true' : 'false'; ?>;

    if (fueEjecutado) {
        document.addEventListener("DOMContentLoaded", function() {
            const arm64TabBtn = document.querySelector('button[data-bs-target="#arm64Tab"]');
            
            if (arm64TabBtn) {
                const tab = new bootstrap.Tab(arm64TabBtn);
                tab.show();
            }
        });
    }
</script>
</body>
</html>