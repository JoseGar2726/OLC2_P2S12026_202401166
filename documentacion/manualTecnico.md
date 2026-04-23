# GRAMATICA GOLAMPI

## SIMBOLO INICIAL

< programa >  : : =   < toplevel >* EOF

## ESTRUCTURA DEL PROGRAMA

< toplevel > : : = < funcion > <br>
            | < mainFuncion > <br>
            | < declaracion > <br>
            | < declaracionConst >

## FUNCION PRINCIPAL

< mainFuncion > : : = "func"  "main"  "("  ")"  < bloque >

## INSTRUCCIONES

< i > : : =  < imprimir > <br>
            | < declaracion > <br>
            | < declaracionCorta > <br>
            | < declaracionConst > <br>
            | < asignacion > <br>
            | < sentenciaIf > <br>
            | < sentenciaSwitch > <br>
            | < sentenciaFor > <br>
            | < expFor > <br>
            | < funcion > <br>
            | < llamadaFuncion > <br>
            | < retornar > <br>
            | < logExpr > <br>
            | " continue " <br>
            | " break " <br>

## INSTRUCCION IMPRIMIR (funcion embebida)

< imprimir > : : = "fmt" "." "Println" "(" < listaExpr > ")"

## DECLARACION

< declaracion > : : = "var" < listaId > tipos <br>
| "var" < listaId > tipos "=" < listaExpr >

## DECLARACION CORTA

< declaracionCorta > : : = < listaId > ":" "=" < listaExpr >

## DECLARACION CONSTANTE

< declaracionConst > : : = "const" < IDENTIFICADOR > < tipos > " = " < logExpr >

## ASIGNACION

< asignacion > : : = < IDENTIFICADOR > < simboloAsignacion > < logExpr > <br>
| < accesoArreglo > < simboloAsignacion > < logExpr > <br>

## SENTENCIAS

### SENTENCIA IF:

< sentenciaIf > : : = "if" < logExpr > < bloque >  ( "else" < bloque > )?

### SENTENCIA SWITCH:

< sentenciaSwitch > : : = "switch" < logExpr > "{" < bloqueSwitch > "}"

< bloqueSwitch > : : = (< bloqueCase >)+ (< bloqueDefault >)?

< bloqueCase > : : = "case" < listaExpr > ":" (< i >)*

< bloqueDefault > : : = "default" ":" (< i >)*

### SENTENCIA FOR:

< sentenciaFor > : : = "for" < forClasico > <br>
| "for" < logExpr > < bloque > <br>
| "for" < bloque >

< forclasico > : : = < declaracionCorta > ";" < logExpr > ";" < condFor > < bloque >

< condFor > : : = < expFor > <br>
| < asignacion >

#### AUTOINCREMENTO Y AUTODECREMENTO:

< expFor > : : = < IDENTIFICADOR > " + " " + " <br>
| < IDENTIFICADOR > " - " " - S" 

## MANEJO DE FUNCIONES

### DECLARACION FUNCION:

< funcion > : : = "func" < IDENTIFICADOR > "(" < listaParametros >?  ")" (" < listaRetorno >?  ")" < bloque > <br>
| "func" < IDENTIFICADOR > "(" < listaParametros >?  ")" < tipos > < bloques > <br>
| "func" < IDENTIFICADOR > "(" < listaParametros >?  ")" < bloques >

< listaRetorno > : : =  < tipos > ("," < tipos >)*

< listaParametros > : : = < parametro > ("," < parametro >)*

< parametro > : : = < IDENTIFICADOR > " * "? < tipos >

### LLAMADA FUNCION

< llamadaFuncion > : : = < IDENTIFICADOR > "(" < listaExpr >? ")"

### RETORNAR

< retornar > : : = "return" < listaExpr >?

### MANEJO ARGUMENTOS:

< argumento > : : = "&" < logExpr >

## MANEJO EXPRESIONES

### OPERACIONES LOGICAS:

< logExpr > : : = < logExpr > ("&" "&" | "|" "|") < relExpr > <br>
| < relExpr >

### OPERACIONES RELACIONES:

< relExpr > : : = < relExpr > ("=" "=" | "!" "=" | "<" "=" | ">" "=" | ">" | "<") < expr > <br>
| < expr >

### OPERADORES ARITMETICAS

< expr > : : = < expr > ("+" | "-") < term > <br>
| < term >

< term > : : = < term > ("*" | "/" | "%" ) < factor > <br>
| < factor >


### FACTORES

< factor > : : = < arrayLiteral > <br>
| < arrayLiteral2D > <br>
| < accesoArreglo > <br>
| "(" < logExpr > ")" <br>
| ("-" | "!") < factor > <br>
| < FLOAT > <br>
| < ENTERO > <br>
| < BOOL > <br>
| < RUNE > <br>
| < STR > <br>
| < NIL > <br>
| < funcNow > <br>
| < funcLen > <br>
| < funcSub > <br>
| < funcType > <br>
| < llamadaFuncion > <br>
| < IDENTIFICADOR >

### FUNCIONES EMBEBIDAS

< funcLen > : : = "len" "(" < logExpr > ")"

< funcNow > : : = "now" "(" ")"

< funcSub > : : = "substr" "(" < logExpr > "," < logExpr > "," < logExpr > ")"

< funcType > : : = "typeOf" "(" < IDENTIFICADOR > ")"

## ARREGLOS

< accesoArreglo > : : = < IDENTIFICADOR > "[" < logExpr > "]" <br>
| < IDENTIFICADOR > "[" < logExpr > "]" "[" < logExpr > "]"

< arrayLiteral > : : = "[" < logExpr > "]" < tipoBase > "{" < listaExpr > "}"

< arrayLiteral2D > : : = "[" < logExpr > "]" "[" < logExpr > "]" < tipoBase > "{" < listaValores > "}"

< listaValores > : : = "{" < listaExpr > "}" ("," "{" < listaExpr > "}")*

## TIPOS

< tipos > : : = < tipoBase > <br>
| < tipoArray > <br>
| < tipoArray2D >

< tipoArray > : : = "[" < logExpr > "]" < tipoBase >

< tipoArray2D > : : = "[" < logExpr > "]" "[" < logExpr > "]" < tipoBase >

< tipoBase > : : = "int" <br>
| "int32" <br>
| "float" <br>
| "float32" <br>
| "bool" <br>
| "rune" <br>
| "string"

## LISTAS

< listaExpr > : : = < argumento > ("," < argumento >)*

< listaId > : : = < IDENTIFICADOR > ("," < IDENTIFICADOR >)*

## OPERADORES DE ASIGNACION

< simboloAsignacion > : : = "=" <br>
| "+=" <br>
| "-=" <br>
| "*=" <br>
| "/="

## LITERALES BOOLEANOS

< BOOL > : : = "true" | "false"

## LITERAL NIL

< NIL > : : = "nil"

## LITERAL ENTERO

< NIL > : : = "nil"

## LITERAL FLOAT

< FLOAT > : : = [0-9]+"."[0-9]+
| "."[0-9]+

## LITERAL STRING

< STR > : : = " ( ~["\] | "\" . )* "

## LITERAL RUNE

< RUNE > : : = ' ( ~['\]
| '\n'
| '\t'
| '\r'
| '\'
| '''
| '\u' < HEX > < HEX > < HEX > < HEX > ) '

## IDENTIFICADORES:

< IDENTIFICADOR > : : = ([_a-zA-Z])([_a-zA-Z0-9])*

## COMENTARIOS

< COMENTARIO_LINEA > : : = "//" ~[\r\n]*

< COMENTARIO_BLOQUE > : : = "/" .? "*/"

## CARACTERES ESPECIALES

< WS > : : = [ \t\r\n]+

## ERROR LEXICO

< ERROR > : : = .

# DIAGRAMA DE CLASES Y FLUJO DE PROCESAMIENTO

## ANALISIS LEXICO
Primeramente gracias a nuestra gramatica definida y generada por ANTLR4, obtenemos nuestro flujo de tokens lexicos

## ANALISIS SINTACTICO
A travez de nuestro flujo de tokens lexicos obtenidos y nuevamente gracias a ANTLR4 verificamos las estructuras formados por esto para la formacion de nuestro AST para poder comenzar con el analis semantico asi como la interpretacion de nuestro codigo

## ANALIS SEMANTICO
Realizado atravez de la interpretacion mientras vamos recorriendo nuestro arbol para la interpretacion del codigo vamos verificando la semantica de operaciones realizadas notificando sobre errores y reportandolos

## INTERPRETACION
Una vez realizado nuestro analisis lexico y semantico comenzamos la interpretacion de nuestro codigo en el cual vamos recorriendo los nodos generados en nuestro arbol AST y ejecutandolos uno a uno

![alt text](image-11.png)

![alt text](image-12.png)