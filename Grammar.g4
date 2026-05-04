grammar Grammar;

programa
    : topLevel* EOF
    ;

topLevel
    : funcion
    | mainFuncion
    | declaracion
    | declaracionConst
    ;


mainFuncion
    : FUNC MAIN LPAREN RPAREN bloque #BloqueMain
    ;

i
    : imprimir #FuncionImprimir  
    | declaracion #Declaration
    | declaracionCorta #ShortDeclaration
    | declaracionConst #ConstDeclaration
    | asignacion #Asignation
    | sentenciaIf #IfSentencia
    | sentenciaSwitch #SwitchSentencia
    | sentenciaFor #ForSentencia
    | expFor #IncDec
    | funcion #DFunction
    | retornar #SentenciaReturn
    | llamadaFuncion #LlamarFuncion
    | logExpr #prueba
    | CONTINUE #SentenciaContinue
    | BREAK #SentenciaBreak
    ;

funcLen
    : LEN LPAREN logExpr RPAREN
    ;

funcNow
    : NOW LPAREN RPAREN
    ;

funcSub
    : SUBSTR LPAREN logExpr COMMA logExpr COMMA logExpr RPAREN
    ;

funcType
    : TYPEOF LPAREN logExpr RPAREN
    ;

llamadaFuncion
    : IDENTIFICADOR LPAREN listaExpr? RPAREN
    ;

argumento
    : REF? logExpr
    ;

retornar
    : RETURN listaExpr?;

funcion
    : FUNC IDENTIFICADOR LPAREN listaParametros? RPAREN LPAREN listaRetorno RPAREN bloque
    | FUNC IDENTIFICADOR LPAREN listaParametros? RPAREN tipos bloque
    | FUNC IDENTIFICADOR LPAREN listaParametros? RPAREN bloque
    ;

listaRetorno
    : tipos (COMMA tipos)*
    ;

listaParametros
    : parametro (COMMA parametro)*
    ;

parametro
    : IDENTIFICADOR MULT? tipos
    ;

sentenciaFor
    : FOR forClasico
    | FOR logExpr bloque
    | FOR bloque
    ;

forClasico
    : declaracionCorta SEMICOLON logExpr SEMICOLON condFor bloque 
    ;

condFor
    : expFor
    | asignacion
    ;

expFor
    : IDENTIFICADOR PLUS PLUS
    | IDENTIFICADOR MINUS MINUS
    ;

sentenciaSwitch
    : SWITCH logExpr LBRACE bloqueSwitch RBRACE
    ;

bloqueSwitch
    : bloqueCase+ bloqueDefault?
    ;

bloqueCase
    : CASE listaExpr COLON i*
    ;

bloqueDefault
    : DEFAULT COLON i*
    ;

sentenciaIf
    : IF logExpr bloque (ELSE bloque)?
    ;

bloque
    : LBRACE (i SEMICOLON?)* RBRACE
    ;

asignacion
    : lValue simboloAsignacion logExpr
    ;

lValue
    : IDENTIFICADOR
    | factor LCOR logExpr RCOR
    | MULT factor
    ;

imprimir
    : FMT DOT PRINTLN LPAREN listaExpr RPAREN
    ;

declaracion
    : VAR listaId tipos
    | VAR listaId tipos ASSIGN listaExpr
    ;

declaracionCorta
    : listaId COLON ASSIGN listaExpr
    ;

declaracionConst
    : CONST IDENTIFICADOR tipos ASSIGN logExpr
    ;

listaExpr
    : argumento (COMMA argumento)*
    ;

listaId
    : IDENTIFICADOR (COMMA IDENTIFICADOR)*
    ;

logExpr
    : logExpr op=(ORO | ANDO) relExpr # LogicalExpression
    | relExpr # toRelExpr
    ;

relExpr
    : relExpr op=(LE | GE | EQUAL | NEQUAL | LESS | GREATER) expr #RelationalExpresion
    | expr #ToExpr
    ;

expr
    : expr op=(PLUS | MINUS) term # BinaryExpressionT
    | term                 # toTerm
    ;

term
    : term op=(MULT | DIV | MOD) factor # BinaryExpressionS
    | factor #toFactor
    ;

factor
    : factor LCOR logExpr RCOR # ArregloAcceso
    | LPAREN logExpr RPAREN # GroupedExpression
    | op=(MINUS | NEG | MULT | REF) factor # UnaryExpression
    | literal #literalValue
    | funcNow #NowFunc
    | funcLen #LenFunc
    | funcSub #SubFunc
    | funcType #TypeFunc
    | llamadaFuncion #LlamarFuncionF
    | IDENTIFICADOR #Identifier
    ;

literal
    : arrayLiteral
    | FLOAT | ENTERO | BOOL | RUNE | STR | NIL
    ;

arrayLiteral
    : tipos LBRACE listaElementos? RBRACE
    ;

listaElementos
    : elemento (COMMA elemento)*
    ;

elemento
    : logExpr
    | LBRACE listaElementos RBRACE
    ;

tipos
    : LCOR logExpr RCOR tipos
    | tipoBase
    ;

tipoBase
    : INT_T
    | FLOAT_T
    | BOOL_T
    | RUNE_T
    | STRING_T
    ;

simboloAsignacion
    : ASSIGN
    | op=(PLUS | MINUS | MULT | DIV) ASSIGN
    ;

//PALABRAS RESERVADAS
FUNC : 'func';
MAIN : 'main';
VAR : 'var';
FMT : 'fmt';
PRINTLN : 'Println';
CONST : 'const';
IF : 'if';
ELSE : 'else';
SWITCH: 'switch';
CASE: 'case';
DEFAULT: 'default';
FOR: 'for';
BREAK: 'break';
CONTINUE: 'continue';
RETURN: 'return';
LEN: 'len';
NOW: 'now';
SUBSTR: 'substr';
TYPEOF: 'typeOf';

INT_T : 'int' | 'int32';
FLOAT_T : 'float' | 'float32';
BOOL_T : 'bool';
RUNE_T : 'rune';
STRING_T : 'string';

//SIMBOLOS
LBRACE : '{';
RBRACE : '}';
LPAREN : '(';
RPAREN : ')';
LCOR : '[';
RCOR : ']';
COMMA : ',';
ASSIGN : '=';
COLON : ':';
SEMICOLON : ';';
PLUS : '+';
MINUS : '-';
NEG: '!';
MULT : '*';
DIV : '/';
MOD : '%';
DOT : '.';
REF : '&';
ANDO : '&&';
ORO : '||';
LE: '<=';
GE: '>=';
EQUAL: '==';
NEQUAL: '!=';
LESS : '<';
GREATER : '>';

BOOL
    : 'true'
    | 'false'
    ;

NIL
    : 'nil'
    ;

ENTERO
    : [0-9]+
    ;

FLOAT
    : [0-9]+ '.' [0-9]+
    | '.' [0-9]+
    ;

STR
    : '"' ( ~["\\] | '\\' . )* '"'
    ;

RUNE
    : '\'' ( ~['\\]
        | '\\n'
        | '\\t'
        | '\\r'
        | '\\\\'
        | '\\\''
        | '\\u' HEX HEX HEX HEX
        ) '\''  
    ;

fragment HEX
    : [0-9a-fA-F];

IDENTIFICADOR
    : ([_a-zA-Z])([_a-zA-Z0-9])*
    ;

COMENTARIO_LINEA
    : '//' ~[\r\n]* -> skip
    ;

COMENTARIO_BLOQUE
    : '/*' .*? '*/'-> skip
    ;

WS
    : [ \t\r\n]+ -> skip
    ;

ERROR
    : .
    ;