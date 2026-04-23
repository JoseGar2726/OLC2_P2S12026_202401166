<?php

/*
 * Generated from Grammar.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GrammarParser extends Parser
	{
		public const FUNC = 1, MAIN = 2, VAR = 3, FMT = 4, PRINTLN = 5, CONST = 6, 
               IF = 7, ELSE = 8, SWITCH = 9, CASE = 10, DEFAULT = 11, FOR = 12, 
               BREAK = 13, CONTINUE = 14, RETURN = 15, LEN = 16, NOW = 17, 
               SUBSTR = 18, TYPEOF = 19, INT_T = 20, FLOAT_T = 21, BOOL_T = 22, 
               RUNE_T = 23, STRING_T = 24, LBRACE = 25, RBRACE = 26, LPAREN = 27, 
               RPAREN = 28, LCOR = 29, RCOR = 30, COMMA = 31, ASSIGN = 32, 
               COLON = 33, SEMICOLON = 34, PLUS = 35, MINUS = 36, NEG = 37, 
               MULT = 38, DIV = 39, MOD = 40, DOT = 41, REF = 42, ANDO = 43, 
               ORO = 44, LE = 45, GE = 46, EQUAL = 47, NEQUAL = 48, LESS = 49, 
               GREATER = 50, BOOL = 51, NIL = 52, ENTERO = 53, FLOAT = 54, 
               STR = 55, RUNE = 56, IDENTIFICADOR = 57, COMENTARIO_LINEA = 58, 
               COMENTARIO_BLOQUE = 59, WS = 60, ERROR = 61;

		public const RULE_programa = 0, RULE_topLevel = 1, RULE_mainFuncion = 2, 
               RULE_i = 3, RULE_funcLen = 4, RULE_funcNow = 5, RULE_funcSub = 6, 
               RULE_funcType = 7, RULE_llamadaFuncion = 8, RULE_argumento = 9, 
               RULE_retornar = 10, RULE_funcion = 11, RULE_listaRetorno = 12, 
               RULE_listaParametros = 13, RULE_parametro = 14, RULE_sentenciaFor = 15, 
               RULE_forClasico = 16, RULE_condFor = 17, RULE_expFor = 18, 
               RULE_sentenciaSwitch = 19, RULE_bloqueSwitch = 20, RULE_bloqueCase = 21, 
               RULE_bloqueDefault = 22, RULE_sentenciaIf = 23, RULE_bloque = 24, 
               RULE_asignacion = 25, RULE_lValue = 26, RULE_imprimir = 27, 
               RULE_declaracion = 28, RULE_declaracionCorta = 29, RULE_declaracionConst = 30, 
               RULE_listaExpr = 31, RULE_listaId = 32, RULE_logExpr = 33, 
               RULE_relExpr = 34, RULE_expr = 35, RULE_term = 36, RULE_factor = 37, 
               RULE_literal = 38, RULE_arrayLiteral = 39, RULE_listaElementos = 40, 
               RULE_elemento = 41, RULE_tipos = 42, RULE_tipoBase = 43, 
               RULE_simboloAsignacion = 44;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'programa', 'topLevel', 'mainFuncion', 'i', 'funcLen', 'funcNow', 'funcSub', 
			'funcType', 'llamadaFuncion', 'argumento', 'retornar', 'funcion', 'listaRetorno', 
			'listaParametros', 'parametro', 'sentenciaFor', 'forClasico', 'condFor', 
			'expFor', 'sentenciaSwitch', 'bloqueSwitch', 'bloqueCase', 'bloqueDefault', 
			'sentenciaIf', 'bloque', 'asignacion', 'lValue', 'imprimir', 'declaracion', 
			'declaracionCorta', 'declaracionConst', 'listaExpr', 'listaId', 'logExpr', 
			'relExpr', 'expr', 'term', 'factor', 'literal', 'arrayLiteral', 'listaElementos', 
			'elemento', 'tipos', 'tipoBase', 'simboloAsignacion'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'func'", "'main'", "'var'", "'fmt'", "'Println'", "'const'", 
		    "'if'", "'else'", "'switch'", "'case'", "'default'", "'for'", "'break'", 
		    "'continue'", "'return'", "'len'", "'now'", "'substr'", "'typeOf'", 
		    null, null, "'bool'", "'rune'", "'string'", "'{'", "'}'", "'('", "')'", 
		    "'['", "']'", "','", "'='", "':'", "';'", "'+'", "'-'", "'!'", "'*'", 
		    "'/'", "'%'", "'.'", "'&'", "'&&'", "'||'", "'<='", "'>='", "'=='", 
		    "'!='", "'<'", "'>'", null, "'nil'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "FUNC", "MAIN", "VAR", "FMT", "PRINTLN", "CONST", "IF", "ELSE", 
		    "SWITCH", "CASE", "DEFAULT", "FOR", "BREAK", "CONTINUE", "RETURN", 
		    "LEN", "NOW", "SUBSTR", "TYPEOF", "INT_T", "FLOAT_T", "BOOL_T", "RUNE_T", 
		    "STRING_T", "LBRACE", "RBRACE", "LPAREN", "RPAREN", "LCOR", "RCOR", 
		    "COMMA", "ASSIGN", "COLON", "SEMICOLON", "PLUS", "MINUS", "NEG", "MULT", 
		    "DIV", "MOD", "DOT", "REF", "ANDO", "ORO", "LE", "GE", "EQUAL", "NEQUAL", 
		    "LESS", "GREATER", "BOOL", "NIL", "ENTERO", "FLOAT", "STR", "RUNE", 
		    "IDENTIFICADOR", "COMENTARIO_LINEA", "COMENTARIO_BLOQUE", "WS", "ERROR"
		];

		private const SERIALIZED_ATN =
			[4, 1, 61, 476, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 1, 0, 5, 0, 92, 8, 0, 10, 0, 12, 0, 95, 9, 
		    0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 103, 8, 1, 1, 2, 1, 2, 
		    1, 2, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 126, 8, 3, 1, 
		    4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 6, 1, 6, 1, 
		    6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 
		    7, 1, 8, 1, 8, 1, 8, 3, 8, 154, 8, 8, 1, 8, 1, 8, 1, 9, 3, 9, 159, 
		    8, 9, 1, 9, 1, 9, 1, 10, 1, 10, 3, 10, 165, 8, 10, 1, 11, 1, 11, 1, 
		    11, 1, 11, 3, 11, 171, 8, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 183, 8, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 193, 8, 11, 1, 11, 1, 
		    11, 3, 11, 197, 8, 11, 1, 12, 1, 12, 1, 12, 5, 12, 202, 8, 12, 10, 
		    12, 12, 12, 205, 9, 12, 1, 13, 1, 13, 1, 13, 5, 13, 210, 8, 13, 10, 
		    13, 12, 13, 213, 9, 13, 1, 14, 1, 14, 3, 14, 217, 8, 14, 1, 14, 1, 
		    14, 1, 15, 1, 15, 1, 15, 1, 15, 1, 15, 1, 15, 1, 15, 1, 15, 3, 15, 
		    229, 8, 15, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 17, 
		    1, 17, 3, 17, 240, 8, 17, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 
		    3, 18, 248, 8, 18, 1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 1, 20, 
		    4, 20, 257, 8, 20, 11, 20, 12, 20, 258, 1, 20, 3, 20, 262, 8, 20, 
		    1, 21, 1, 21, 1, 21, 1, 21, 5, 21, 268, 8, 21, 10, 21, 12, 21, 271, 
		    9, 21, 1, 22, 1, 22, 1, 22, 5, 22, 276, 8, 22, 10, 22, 12, 22, 279, 
		    9, 22, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 3, 23, 286, 8, 23, 1, 24, 
		    1, 24, 1, 24, 3, 24, 291, 8, 24, 5, 24, 293, 8, 24, 10, 24, 12, 24, 
		    296, 9, 24, 1, 24, 1, 24, 1, 25, 1, 25, 1, 25, 1, 25, 1, 26, 1, 26, 
		    1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 3, 26, 312, 8, 26, 1, 27, 
		    1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 28, 1, 28, 1, 28, 1, 
		    28, 1, 28, 1, 28, 1, 28, 1, 28, 1, 28, 1, 28, 3, 28, 331, 8, 28, 1, 
		    29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 
		    1, 30, 1, 31, 1, 31, 1, 31, 5, 31, 347, 8, 31, 10, 31, 12, 31, 350, 
		    9, 31, 1, 32, 1, 32, 1, 32, 5, 32, 355, 8, 32, 10, 32, 12, 32, 358, 
		    9, 32, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 5, 33, 366, 8, 33, 
		    10, 33, 12, 33, 369, 9, 33, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 
		    34, 5, 34, 377, 8, 34, 10, 34, 12, 34, 380, 9, 34, 1, 35, 1, 35, 1, 
		    35, 1, 35, 1, 35, 1, 35, 5, 35, 388, 8, 35, 10, 35, 12, 35, 391, 9, 
		    35, 1, 36, 1, 36, 1, 36, 1, 36, 1, 36, 1, 36, 5, 36, 399, 8, 36, 10, 
		    36, 12, 36, 402, 9, 36, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 
		    1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 3, 37, 418, 
		    8, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 5, 37, 425, 8, 37, 10, 37, 
		    12, 37, 428, 9, 37, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 
		    3, 38, 437, 8, 38, 1, 39, 1, 39, 1, 39, 3, 39, 442, 8, 39, 1, 39, 
		    1, 39, 1, 40, 1, 40, 1, 40, 5, 40, 449, 8, 40, 10, 40, 12, 40, 452, 
		    9, 40, 1, 41, 1, 41, 1, 41, 1, 41, 1, 41, 3, 41, 459, 8, 41, 1, 42, 
		    1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 3, 42, 467, 8, 42, 1, 43, 1, 43, 
		    1, 44, 1, 44, 1, 44, 3, 44, 474, 8, 44, 1, 44, 0, 5, 66, 68, 70, 72, 
		    74, 45, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 
		    32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 
		    66, 68, 70, 72, 74, 76, 78, 80, 82, 84, 86, 88, 0, 7, 1, 0, 43, 44, 
		    1, 0, 45, 50, 1, 0, 35, 36, 1, 0, 38, 40, 2, 0, 36, 38, 42, 42, 1, 
		    0, 20, 24, 2, 0, 35, 36, 38, 39, 499, 0, 93, 1, 0, 0, 0, 2, 102, 1, 
		    0, 0, 0, 4, 104, 1, 0, 0, 0, 6, 125, 1, 0, 0, 0, 8, 127, 1, 0, 0, 
		    0, 10, 132, 1, 0, 0, 0, 12, 136, 1, 0, 0, 0, 14, 145, 1, 0, 0, 0, 
		    16, 150, 1, 0, 0, 0, 18, 158, 1, 0, 0, 0, 20, 162, 1, 0, 0, 0, 22, 
		    196, 1, 0, 0, 0, 24, 198, 1, 0, 0, 0, 26, 206, 1, 0, 0, 0, 28, 214, 
		    1, 0, 0, 0, 30, 228, 1, 0, 0, 0, 32, 230, 1, 0, 0, 0, 34, 239, 1, 
		    0, 0, 0, 36, 247, 1, 0, 0, 0, 38, 249, 1, 0, 0, 0, 40, 256, 1, 0, 
		    0, 0, 42, 263, 1, 0, 0, 0, 44, 272, 1, 0, 0, 0, 46, 280, 1, 0, 0, 
		    0, 48, 287, 1, 0, 0, 0, 50, 299, 1, 0, 0, 0, 52, 311, 1, 0, 0, 0, 
		    54, 313, 1, 0, 0, 0, 56, 330, 1, 0, 0, 0, 58, 332, 1, 0, 0, 0, 60, 
		    337, 1, 0, 0, 0, 62, 343, 1, 0, 0, 0, 64, 351, 1, 0, 0, 0, 66, 359, 
		    1, 0, 0, 0, 68, 370, 1, 0, 0, 0, 70, 381, 1, 0, 0, 0, 72, 392, 1, 
		    0, 0, 0, 74, 417, 1, 0, 0, 0, 76, 436, 1, 0, 0, 0, 78, 438, 1, 0, 
		    0, 0, 80, 445, 1, 0, 0, 0, 82, 458, 1, 0, 0, 0, 84, 466, 1, 0, 0, 
		    0, 86, 468, 1, 0, 0, 0, 88, 473, 1, 0, 0, 0, 90, 92, 3, 2, 1, 0, 91, 
		    90, 1, 0, 0, 0, 92, 95, 1, 0, 0, 0, 93, 91, 1, 0, 0, 0, 93, 94, 1, 
		    0, 0, 0, 94, 96, 1, 0, 0, 0, 95, 93, 1, 0, 0, 0, 96, 97, 5, 0, 0, 
		    1, 97, 1, 1, 0, 0, 0, 98, 103, 3, 22, 11, 0, 99, 103, 3, 4, 2, 0, 
		    100, 103, 3, 56, 28, 0, 101, 103, 3, 60, 30, 0, 102, 98, 1, 0, 0, 
		    0, 102, 99, 1, 0, 0, 0, 102, 100, 1, 0, 0, 0, 102, 101, 1, 0, 0, 0, 
		    103, 3, 1, 0, 0, 0, 104, 105, 5, 1, 0, 0, 105, 106, 5, 2, 0, 0, 106, 
		    107, 5, 27, 0, 0, 107, 108, 5, 28, 0, 0, 108, 109, 3, 48, 24, 0, 109, 
		    5, 1, 0, 0, 0, 110, 126, 3, 54, 27, 0, 111, 126, 3, 56, 28, 0, 112, 
		    126, 3, 58, 29, 0, 113, 126, 3, 60, 30, 0, 114, 126, 3, 50, 25, 0, 
		    115, 126, 3, 46, 23, 0, 116, 126, 3, 38, 19, 0, 117, 126, 3, 30, 15, 
		    0, 118, 126, 3, 36, 18, 0, 119, 126, 3, 22, 11, 0, 120, 126, 3, 20, 
		    10, 0, 121, 126, 3, 16, 8, 0, 122, 126, 3, 66, 33, 0, 123, 126, 5, 
		    14, 0, 0, 124, 126, 5, 13, 0, 0, 125, 110, 1, 0, 0, 0, 125, 111, 1, 
		    0, 0, 0, 125, 112, 1, 0, 0, 0, 125, 113, 1, 0, 0, 0, 125, 114, 1, 
		    0, 0, 0, 125, 115, 1, 0, 0, 0, 125, 116, 1, 0, 0, 0, 125, 117, 1, 
		    0, 0, 0, 125, 118, 1, 0, 0, 0, 125, 119, 1, 0, 0, 0, 125, 120, 1, 
		    0, 0, 0, 125, 121, 1, 0, 0, 0, 125, 122, 1, 0, 0, 0, 125, 123, 1, 
		    0, 0, 0, 125, 124, 1, 0, 0, 0, 126, 7, 1, 0, 0, 0, 127, 128, 5, 16, 
		    0, 0, 128, 129, 5, 27, 0, 0, 129, 130, 3, 66, 33, 0, 130, 131, 5, 
		    28, 0, 0, 131, 9, 1, 0, 0, 0, 132, 133, 5, 17, 0, 0, 133, 134, 5, 
		    27, 0, 0, 134, 135, 5, 28, 0, 0, 135, 11, 1, 0, 0, 0, 136, 137, 5, 
		    18, 0, 0, 137, 138, 5, 27, 0, 0, 138, 139, 3, 66, 33, 0, 139, 140, 
		    5, 31, 0, 0, 140, 141, 3, 66, 33, 0, 141, 142, 5, 31, 0, 0, 142, 143, 
		    3, 66, 33, 0, 143, 144, 5, 28, 0, 0, 144, 13, 1, 0, 0, 0, 145, 146, 
		    5, 19, 0, 0, 146, 147, 5, 27, 0, 0, 147, 148, 3, 66, 33, 0, 148, 149, 
		    5, 28, 0, 0, 149, 15, 1, 0, 0, 0, 150, 151, 5, 57, 0, 0, 151, 153, 
		    5, 27, 0, 0, 152, 154, 3, 62, 31, 0, 153, 152, 1, 0, 0, 0, 153, 154, 
		    1, 0, 0, 0, 154, 155, 1, 0, 0, 0, 155, 156, 5, 28, 0, 0, 156, 17, 
		    1, 0, 0, 0, 157, 159, 5, 42, 0, 0, 158, 157, 1, 0, 0, 0, 158, 159, 
		    1, 0, 0, 0, 159, 160, 1, 0, 0, 0, 160, 161, 3, 66, 33, 0, 161, 19, 
		    1, 0, 0, 0, 162, 164, 5, 15, 0, 0, 163, 165, 3, 62, 31, 0, 164, 163, 
		    1, 0, 0, 0, 164, 165, 1, 0, 0, 0, 165, 21, 1, 0, 0, 0, 166, 167, 5, 
		    1, 0, 0, 167, 168, 5, 57, 0, 0, 168, 170, 5, 27, 0, 0, 169, 171, 3, 
		    26, 13, 0, 170, 169, 1, 0, 0, 0, 170, 171, 1, 0, 0, 0, 171, 172, 1, 
		    0, 0, 0, 172, 173, 5, 28, 0, 0, 173, 174, 5, 27, 0, 0, 174, 175, 3, 
		    24, 12, 0, 175, 176, 5, 28, 0, 0, 176, 177, 3, 48, 24, 0, 177, 197, 
		    1, 0, 0, 0, 178, 179, 5, 1, 0, 0, 179, 180, 5, 57, 0, 0, 180, 182, 
		    5, 27, 0, 0, 181, 183, 3, 26, 13, 0, 182, 181, 1, 0, 0, 0, 182, 183, 
		    1, 0, 0, 0, 183, 184, 1, 0, 0, 0, 184, 185, 5, 28, 0, 0, 185, 186, 
		    3, 84, 42, 0, 186, 187, 3, 48, 24, 0, 187, 197, 1, 0, 0, 0, 188, 189, 
		    5, 1, 0, 0, 189, 190, 5, 57, 0, 0, 190, 192, 5, 27, 0, 0, 191, 193, 
		    3, 26, 13, 0, 192, 191, 1, 0, 0, 0, 192, 193, 1, 0, 0, 0, 193, 194, 
		    1, 0, 0, 0, 194, 195, 5, 28, 0, 0, 195, 197, 3, 48, 24, 0, 196, 166, 
		    1, 0, 0, 0, 196, 178, 1, 0, 0, 0, 196, 188, 1, 0, 0, 0, 197, 23, 1, 
		    0, 0, 0, 198, 203, 3, 84, 42, 0, 199, 200, 5, 31, 0, 0, 200, 202, 
		    3, 84, 42, 0, 201, 199, 1, 0, 0, 0, 202, 205, 1, 0, 0, 0, 203, 201, 
		    1, 0, 0, 0, 203, 204, 1, 0, 0, 0, 204, 25, 1, 0, 0, 0, 205, 203, 1, 
		    0, 0, 0, 206, 211, 3, 28, 14, 0, 207, 208, 5, 31, 0, 0, 208, 210, 
		    3, 28, 14, 0, 209, 207, 1, 0, 0, 0, 210, 213, 1, 0, 0, 0, 211, 209, 
		    1, 0, 0, 0, 211, 212, 1, 0, 0, 0, 212, 27, 1, 0, 0, 0, 213, 211, 1, 
		    0, 0, 0, 214, 216, 5, 57, 0, 0, 215, 217, 5, 38, 0, 0, 216, 215, 1, 
		    0, 0, 0, 216, 217, 1, 0, 0, 0, 217, 218, 1, 0, 0, 0, 218, 219, 3, 
		    84, 42, 0, 219, 29, 1, 0, 0, 0, 220, 221, 5, 12, 0, 0, 221, 229, 3, 
		    32, 16, 0, 222, 223, 5, 12, 0, 0, 223, 224, 3, 66, 33, 0, 224, 225, 
		    3, 48, 24, 0, 225, 229, 1, 0, 0, 0, 226, 227, 5, 12, 0, 0, 227, 229, 
		    3, 48, 24, 0, 228, 220, 1, 0, 0, 0, 228, 222, 1, 0, 0, 0, 228, 226, 
		    1, 0, 0, 0, 229, 31, 1, 0, 0, 0, 230, 231, 3, 58, 29, 0, 231, 232, 
		    5, 34, 0, 0, 232, 233, 3, 66, 33, 0, 233, 234, 5, 34, 0, 0, 234, 235, 
		    3, 34, 17, 0, 235, 236, 3, 48, 24, 0, 236, 33, 1, 0, 0, 0, 237, 240, 
		    3, 36, 18, 0, 238, 240, 3, 50, 25, 0, 239, 237, 1, 0, 0, 0, 239, 238, 
		    1, 0, 0, 0, 240, 35, 1, 0, 0, 0, 241, 242, 5, 57, 0, 0, 242, 243, 
		    5, 35, 0, 0, 243, 248, 5, 35, 0, 0, 244, 245, 5, 57, 0, 0, 245, 246, 
		    5, 36, 0, 0, 246, 248, 5, 36, 0, 0, 247, 241, 1, 0, 0, 0, 247, 244, 
		    1, 0, 0, 0, 248, 37, 1, 0, 0, 0, 249, 250, 5, 9, 0, 0, 250, 251, 3, 
		    66, 33, 0, 251, 252, 5, 25, 0, 0, 252, 253, 3, 40, 20, 0, 253, 254, 
		    5, 26, 0, 0, 254, 39, 1, 0, 0, 0, 255, 257, 3, 42, 21, 0, 256, 255, 
		    1, 0, 0, 0, 257, 258, 1, 0, 0, 0, 258, 256, 1, 0, 0, 0, 258, 259, 
		    1, 0, 0, 0, 259, 261, 1, 0, 0, 0, 260, 262, 3, 44, 22, 0, 261, 260, 
		    1, 0, 0, 0, 261, 262, 1, 0, 0, 0, 262, 41, 1, 0, 0, 0, 263, 264, 5, 
		    10, 0, 0, 264, 265, 3, 62, 31, 0, 265, 269, 5, 33, 0, 0, 266, 268, 
		    3, 6, 3, 0, 267, 266, 1, 0, 0, 0, 268, 271, 1, 0, 0, 0, 269, 267, 
		    1, 0, 0, 0, 269, 270, 1, 0, 0, 0, 270, 43, 1, 0, 0, 0, 271, 269, 1, 
		    0, 0, 0, 272, 273, 5, 11, 0, 0, 273, 277, 5, 33, 0, 0, 274, 276, 3, 
		    6, 3, 0, 275, 274, 1, 0, 0, 0, 276, 279, 1, 0, 0, 0, 277, 275, 1, 
		    0, 0, 0, 277, 278, 1, 0, 0, 0, 278, 45, 1, 0, 0, 0, 279, 277, 1, 0, 
		    0, 0, 280, 281, 5, 7, 0, 0, 281, 282, 3, 66, 33, 0, 282, 285, 3, 48, 
		    24, 0, 283, 284, 5, 8, 0, 0, 284, 286, 3, 48, 24, 0, 285, 283, 1, 
		    0, 0, 0, 285, 286, 1, 0, 0, 0, 286, 47, 1, 0, 0, 0, 287, 294, 5, 25, 
		    0, 0, 288, 290, 3, 6, 3, 0, 289, 291, 5, 34, 0, 0, 290, 289, 1, 0, 
		    0, 0, 290, 291, 1, 0, 0, 0, 291, 293, 1, 0, 0, 0, 292, 288, 1, 0, 
		    0, 0, 293, 296, 1, 0, 0, 0, 294, 292, 1, 0, 0, 0, 294, 295, 1, 0, 
		    0, 0, 295, 297, 1, 0, 0, 0, 296, 294, 1, 0, 0, 0, 297, 298, 5, 26, 
		    0, 0, 298, 49, 1, 0, 0, 0, 299, 300, 3, 52, 26, 0, 300, 301, 3, 88, 
		    44, 0, 301, 302, 3, 66, 33, 0, 302, 51, 1, 0, 0, 0, 303, 312, 5, 57, 
		    0, 0, 304, 305, 3, 74, 37, 0, 305, 306, 5, 29, 0, 0, 306, 307, 3, 
		    66, 33, 0, 307, 308, 5, 30, 0, 0, 308, 312, 1, 0, 0, 0, 309, 310, 
		    5, 38, 0, 0, 310, 312, 3, 74, 37, 0, 311, 303, 1, 0, 0, 0, 311, 304, 
		    1, 0, 0, 0, 311, 309, 1, 0, 0, 0, 312, 53, 1, 0, 0, 0, 313, 314, 5, 
		    4, 0, 0, 314, 315, 5, 41, 0, 0, 315, 316, 5, 5, 0, 0, 316, 317, 5, 
		    27, 0, 0, 317, 318, 3, 62, 31, 0, 318, 319, 5, 28, 0, 0, 319, 55, 
		    1, 0, 0, 0, 320, 321, 5, 3, 0, 0, 321, 322, 3, 64, 32, 0, 322, 323, 
		    3, 84, 42, 0, 323, 331, 1, 0, 0, 0, 324, 325, 5, 3, 0, 0, 325, 326, 
		    3, 64, 32, 0, 326, 327, 3, 84, 42, 0, 327, 328, 5, 32, 0, 0, 328, 
		    329, 3, 62, 31, 0, 329, 331, 1, 0, 0, 0, 330, 320, 1, 0, 0, 0, 330, 
		    324, 1, 0, 0, 0, 331, 57, 1, 0, 0, 0, 332, 333, 3, 64, 32, 0, 333, 
		    334, 5, 33, 0, 0, 334, 335, 5, 32, 0, 0, 335, 336, 3, 62, 31, 0, 336, 
		    59, 1, 0, 0, 0, 337, 338, 5, 6, 0, 0, 338, 339, 5, 57, 0, 0, 339, 
		    340, 3, 84, 42, 0, 340, 341, 5, 32, 0, 0, 341, 342, 3, 66, 33, 0, 
		    342, 61, 1, 0, 0, 0, 343, 348, 3, 18, 9, 0, 344, 345, 5, 31, 0, 0, 
		    345, 347, 3, 18, 9, 0, 346, 344, 1, 0, 0, 0, 347, 350, 1, 0, 0, 0, 
		    348, 346, 1, 0, 0, 0, 348, 349, 1, 0, 0, 0, 349, 63, 1, 0, 0, 0, 350, 
		    348, 1, 0, 0, 0, 351, 356, 5, 57, 0, 0, 352, 353, 5, 31, 0, 0, 353, 
		    355, 5, 57, 0, 0, 354, 352, 1, 0, 0, 0, 355, 358, 1, 0, 0, 0, 356, 
		    354, 1, 0, 0, 0, 356, 357, 1, 0, 0, 0, 357, 65, 1, 0, 0, 0, 358, 356, 
		    1, 0, 0, 0, 359, 360, 6, 33, -1, 0, 360, 361, 3, 68, 34, 0, 361, 367, 
		    1, 0, 0, 0, 362, 363, 10, 2, 0, 0, 363, 364, 7, 0, 0, 0, 364, 366, 
		    3, 68, 34, 0, 365, 362, 1, 0, 0, 0, 366, 369, 1, 0, 0, 0, 367, 365, 
		    1, 0, 0, 0, 367, 368, 1, 0, 0, 0, 368, 67, 1, 0, 0, 0, 369, 367, 1, 
		    0, 0, 0, 370, 371, 6, 34, -1, 0, 371, 372, 3, 70, 35, 0, 372, 378, 
		    1, 0, 0, 0, 373, 374, 10, 2, 0, 0, 374, 375, 7, 1, 0, 0, 375, 377, 
		    3, 70, 35, 0, 376, 373, 1, 0, 0, 0, 377, 380, 1, 0, 0, 0, 378, 376, 
		    1, 0, 0, 0, 378, 379, 1, 0, 0, 0, 379, 69, 1, 0, 0, 0, 380, 378, 1, 
		    0, 0, 0, 381, 382, 6, 35, -1, 0, 382, 383, 3, 72, 36, 0, 383, 389, 
		    1, 0, 0, 0, 384, 385, 10, 2, 0, 0, 385, 386, 7, 2, 0, 0, 386, 388, 
		    3, 72, 36, 0, 387, 384, 1, 0, 0, 0, 388, 391, 1, 0, 0, 0, 389, 387, 
		    1, 0, 0, 0, 389, 390, 1, 0, 0, 0, 390, 71, 1, 0, 0, 0, 391, 389, 1, 
		    0, 0, 0, 392, 393, 6, 36, -1, 0, 393, 394, 3, 74, 37, 0, 394, 400, 
		    1, 0, 0, 0, 395, 396, 10, 2, 0, 0, 396, 397, 7, 3, 0, 0, 397, 399, 
		    3, 74, 37, 0, 398, 395, 1, 0, 0, 0, 399, 402, 1, 0, 0, 0, 400, 398, 
		    1, 0, 0, 0, 400, 401, 1, 0, 0, 0, 401, 73, 1, 0, 0, 0, 402, 400, 1, 
		    0, 0, 0, 403, 404, 6, 37, -1, 0, 404, 405, 5, 27, 0, 0, 405, 406, 
		    3, 66, 33, 0, 406, 407, 5, 28, 0, 0, 407, 418, 1, 0, 0, 0, 408, 409, 
		    7, 4, 0, 0, 409, 418, 3, 74, 37, 8, 410, 418, 3, 76, 38, 0, 411, 418, 
		    3, 10, 5, 0, 412, 418, 3, 8, 4, 0, 413, 418, 3, 12, 6, 0, 414, 418, 
		    3, 14, 7, 0, 415, 418, 3, 16, 8, 0, 416, 418, 5, 57, 0, 0, 417, 403, 
		    1, 0, 0, 0, 417, 408, 1, 0, 0, 0, 417, 410, 1, 0, 0, 0, 417, 411, 
		    1, 0, 0, 0, 417, 412, 1, 0, 0, 0, 417, 413, 1, 0, 0, 0, 417, 414, 
		    1, 0, 0, 0, 417, 415, 1, 0, 0, 0, 417, 416, 1, 0, 0, 0, 418, 426, 
		    1, 0, 0, 0, 419, 420, 10, 10, 0, 0, 420, 421, 5, 29, 0, 0, 421, 422, 
		    3, 66, 33, 0, 422, 423, 5, 30, 0, 0, 423, 425, 1, 0, 0, 0, 424, 419, 
		    1, 0, 0, 0, 425, 428, 1, 0, 0, 0, 426, 424, 1, 0, 0, 0, 426, 427, 
		    1, 0, 0, 0, 427, 75, 1, 0, 0, 0, 428, 426, 1, 0, 0, 0, 429, 437, 3, 
		    78, 39, 0, 430, 437, 5, 54, 0, 0, 431, 437, 5, 53, 0, 0, 432, 437, 
		    5, 51, 0, 0, 433, 437, 5, 56, 0, 0, 434, 437, 5, 55, 0, 0, 435, 437, 
		    5, 52, 0, 0, 436, 429, 1, 0, 0, 0, 436, 430, 1, 0, 0, 0, 436, 431, 
		    1, 0, 0, 0, 436, 432, 1, 0, 0, 0, 436, 433, 1, 0, 0, 0, 436, 434, 
		    1, 0, 0, 0, 436, 435, 1, 0, 0, 0, 437, 77, 1, 0, 0, 0, 438, 439, 3, 
		    84, 42, 0, 439, 441, 5, 25, 0, 0, 440, 442, 3, 80, 40, 0, 441, 440, 
		    1, 0, 0, 0, 441, 442, 1, 0, 0, 0, 442, 443, 1, 0, 0, 0, 443, 444, 
		    5, 26, 0, 0, 444, 79, 1, 0, 0, 0, 445, 450, 3, 82, 41, 0, 446, 447, 
		    5, 31, 0, 0, 447, 449, 3, 82, 41, 0, 448, 446, 1, 0, 0, 0, 449, 452, 
		    1, 0, 0, 0, 450, 448, 1, 0, 0, 0, 450, 451, 1, 0, 0, 0, 451, 81, 1, 
		    0, 0, 0, 452, 450, 1, 0, 0, 0, 453, 459, 3, 66, 33, 0, 454, 455, 5, 
		    25, 0, 0, 455, 456, 3, 80, 40, 0, 456, 457, 5, 26, 0, 0, 457, 459, 
		    1, 0, 0, 0, 458, 453, 1, 0, 0, 0, 458, 454, 1, 0, 0, 0, 459, 83, 1, 
		    0, 0, 0, 460, 461, 5, 29, 0, 0, 461, 462, 3, 66, 33, 0, 462, 463, 
		    5, 30, 0, 0, 463, 464, 3, 84, 42, 0, 464, 467, 1, 0, 0, 0, 465, 467, 
		    3, 86, 43, 0, 466, 460, 1, 0, 0, 0, 466, 465, 1, 0, 0, 0, 467, 85, 
		    1, 0, 0, 0, 468, 469, 7, 5, 0, 0, 469, 87, 1, 0, 0, 0, 470, 474, 5, 
		    32, 0, 0, 471, 472, 7, 6, 0, 0, 472, 474, 5, 32, 0, 0, 473, 470, 1, 
		    0, 0, 0, 473, 471, 1, 0, 0, 0, 474, 89, 1, 0, 0, 0, 39, 93, 102, 125, 
		    153, 158, 164, 170, 182, 192, 196, 203, 211, 216, 228, 239, 247, 258, 
		    261, 269, 277, 285, 290, 294, 311, 330, 348, 356, 367, 378, 389, 400, 
		    417, 426, 436, 441, 450, 458, 466, 473];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Grammar.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function programa(): Context\ProgramaContext
		{
		    $localContext = new Context\ProgramaContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_programa);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(93);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 74) !== 0)) {
		        	$this->setState(90);
		        	$this->topLevel();
		        	$this->setState(95);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(96);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function topLevel(): Context\TopLevelContext
		{
		    $localContext = new Context\TopLevelContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_topLevel);

		    try {
		        $this->setState(102);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(98);
		        	    $this->funcion();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(99);
		        	    $this->mainFuncion();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(100);
		        	    $this->declaracion();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(101);
		        	    $this->declaracionConst();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function mainFuncion(): Context\MainFuncionContext
		{
		    $localContext = new Context\MainFuncionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_mainFuncion);

		    try {
		        $localContext = new Context\BloqueMainContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(104);
		        $this->match(self::FUNC);
		        $this->setState(105);
		        $this->match(self::MAIN);
		        $this->setState(106);
		        $this->match(self::LPAREN);
		        $this->setState(107);
		        $this->match(self::RPAREN);
		        $this->setState(108);
		        $this->bloque();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function i(): Context\IContext
		{
		    $localContext = new Context\IContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_i);

		    try {
		        $this->setState(125);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\FuncionImprimirContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(110);
		        	    $this->imprimir();
		        	break;

		        	case 2:
		        	    $localContext = new Context\DeclarationContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(111);
		        	    $this->declaracion();
		        	break;

		        	case 3:
		        	    $localContext = new Context\ShortDeclarationContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(112);
		        	    $this->declaracionCorta();
		        	break;

		        	case 4:
		        	    $localContext = new Context\ConstDeclarationContext($localContext);
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(113);
		        	    $this->declaracionConst();
		        	break;

		        	case 5:
		        	    $localContext = new Context\AsignationContext($localContext);
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(114);
		        	    $this->asignacion();
		        	break;

		        	case 6:
		        	    $localContext = new Context\IfSentenciaContext($localContext);
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(115);
		        	    $this->sentenciaIf();
		        	break;

		        	case 7:
		        	    $localContext = new Context\SwitchSentenciaContext($localContext);
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(116);
		        	    $this->sentenciaSwitch();
		        	break;

		        	case 8:
		        	    $localContext = new Context\ForSentenciaContext($localContext);
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(117);
		        	    $this->sentenciaFor();
		        	break;

		        	case 9:
		        	    $localContext = new Context\IncDecContext($localContext);
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(118);
		        	    $this->expFor();
		        	break;

		        	case 10:
		        	    $localContext = new Context\DFunctionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(119);
		        	    $this->funcion();
		        	break;

		        	case 11:
		        	    $localContext = new Context\SentenciaReturnContext($localContext);
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(120);
		        	    $this->retornar();
		        	break;

		        	case 12:
		        	    $localContext = new Context\LlamarFuncionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(121);
		        	    $this->llamadaFuncion();
		        	break;

		        	case 13:
		        	    $localContext = new Context\PruebaContext($localContext);
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(122);
		        	    $this->recursiveLogExpr(0);
		        	break;

		        	case 14:
		        	    $localContext = new Context\SentenciaContinueContext($localContext);
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(123);
		        	    $this->match(self::CONTINUE);
		        	break;

		        	case 15:
		        	    $localContext = new Context\SentenciaBreakContext($localContext);
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(124);
		        	    $this->match(self::BREAK);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcLen(): Context\FuncLenContext
		{
		    $localContext = new Context\FuncLenContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_funcLen);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(127);
		        $this->match(self::LEN);
		        $this->setState(128);
		        $this->match(self::LPAREN);
		        $this->setState(129);
		        $this->recursiveLogExpr(0);
		        $this->setState(130);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcNow(): Context\FuncNowContext
		{
		    $localContext = new Context\FuncNowContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_funcNow);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(132);
		        $this->match(self::NOW);
		        $this->setState(133);
		        $this->match(self::LPAREN);
		        $this->setState(134);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcSub(): Context\FuncSubContext
		{
		    $localContext = new Context\FuncSubContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_funcSub);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(136);
		        $this->match(self::SUBSTR);
		        $this->setState(137);
		        $this->match(self::LPAREN);
		        $this->setState(138);
		        $this->recursiveLogExpr(0);
		        $this->setState(139);
		        $this->match(self::COMMA);
		        $this->setState(140);
		        $this->recursiveLogExpr(0);
		        $this->setState(141);
		        $this->match(self::COMMA);
		        $this->setState(142);
		        $this->recursiveLogExpr(0);
		        $this->setState(143);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcType(): Context\FuncTypeContext
		{
		    $localContext = new Context\FuncTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_funcType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(145);
		        $this->match(self::TYPEOF);
		        $this->setState(146);
		        $this->match(self::LPAREN);
		        $this->setState(147);
		        $this->recursiveLogExpr(0);
		        $this->setState(148);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function llamadaFuncion(): Context\LlamadaFuncionContext
		{
		    $localContext = new Context\LlamadaFuncionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_llamadaFuncion);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(150);
		        $this->match(self::IDENTIFICADOR);
		        $this->setState(151);
		        $this->match(self::LPAREN);
		        $this->setState(153);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 285983456125452288) !== 0)) {
		        	$this->setState(152);
		        	$this->listaExpr();
		        }
		        $this->setState(155);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argumento(): Context\ArgumentoContext
		{
		    $localContext = new Context\ArgumentoContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_argumento);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(158);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx)) {
		            case 1:
		        	    $this->setState(157);
		        	    $this->match(self::REF);
		        	break;
		        }
		        $this->setState(160);
		        $this->recursiveLogExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function retornar(): Context\RetornarContext
		{
		    $localContext = new Context\RetornarContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_retornar);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(162);
		        $this->match(self::RETURN);
		        $this->setState(164);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		            case 1:
		        	    $this->setState(163);
		        	    $this->listaExpr();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcion(): Context\FuncionContext
		{
		    $localContext = new Context\FuncionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_funcion);

		    try {
		        $this->setState(196);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(166);
		        	    $this->match(self::FUNC);
		        	    $this->setState(167);
		        	    $this->match(self::IDENTIFICADOR);
		        	    $this->setState(168);
		        	    $this->match(self::LPAREN);
		        	    $this->setState(170);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFICADOR) {
		        	    	$this->setState(169);
		        	    	$this->listaParametros();
		        	    }
		        	    $this->setState(172);
		        	    $this->match(self::RPAREN);
		        	    $this->setState(173);
		        	    $this->match(self::LPAREN);
		        	    $this->setState(174);
		        	    $this->listaRetorno();
		        	    $this->setState(175);
		        	    $this->match(self::RPAREN);
		        	    $this->setState(176);
		        	    $this->bloque();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(178);
		        	    $this->match(self::FUNC);
		        	    $this->setState(179);
		        	    $this->match(self::IDENTIFICADOR);
		        	    $this->setState(180);
		        	    $this->match(self::LPAREN);
		        	    $this->setState(182);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFICADOR) {
		        	    	$this->setState(181);
		        	    	$this->listaParametros();
		        	    }
		        	    $this->setState(184);
		        	    $this->match(self::RPAREN);
		        	    $this->setState(185);
		        	    $this->tipos();
		        	    $this->setState(186);
		        	    $this->bloque();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(188);
		        	    $this->match(self::FUNC);
		        	    $this->setState(189);
		        	    $this->match(self::IDENTIFICADOR);
		        	    $this->setState(190);
		        	    $this->match(self::LPAREN);
		        	    $this->setState(192);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFICADOR) {
		        	    	$this->setState(191);
		        	    	$this->listaParametros();
		        	    }
		        	    $this->setState(194);
		        	    $this->match(self::RPAREN);
		        	    $this->setState(195);
		        	    $this->bloque();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listaRetorno(): Context\ListaRetornoContext
		{
		    $localContext = new Context\ListaRetornoContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_listaRetorno);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(198);
		        $this->tipos();
		        $this->setState(203);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(199);
		        	$this->match(self::COMMA);
		        	$this->setState(200);
		        	$this->tipos();
		        	$this->setState(205);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listaParametros(): Context\ListaParametrosContext
		{
		    $localContext = new Context\ListaParametrosContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_listaParametros);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(206);
		        $this->parametro();
		        $this->setState(211);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(207);
		        	$this->match(self::COMMA);
		        	$this->setState(208);
		        	$this->parametro();
		        	$this->setState(213);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parametro(): Context\ParametroContext
		{
		    $localContext = new Context\ParametroContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_parametro);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(214);
		        $this->match(self::IDENTIFICADOR);
		        $this->setState(216);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::MULT) {
		        	$this->setState(215);
		        	$this->match(self::MULT);
		        }
		        $this->setState(218);
		        $this->tipos();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function sentenciaFor(): Context\SentenciaForContext
		{
		    $localContext = new Context\SentenciaForContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_sentenciaFor);

		    try {
		        $this->setState(228);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 13, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(220);
		        	    $this->match(self::FOR);
		        	    $this->setState(221);
		        	    $this->forClasico();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(222);
		        	    $this->match(self::FOR);
		        	    $this->setState(223);
		        	    $this->recursiveLogExpr(0);
		        	    $this->setState(224);
		        	    $this->bloque();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(226);
		        	    $this->match(self::FOR);
		        	    $this->setState(227);
		        	    $this->bloque();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forClasico(): Context\ForClasicoContext
		{
		    $localContext = new Context\ForClasicoContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_forClasico);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(230);
		        $this->declaracionCorta();
		        $this->setState(231);
		        $this->match(self::SEMICOLON);
		        $this->setState(232);
		        $this->recursiveLogExpr(0);
		        $this->setState(233);
		        $this->match(self::SEMICOLON);
		        $this->setState(234);
		        $this->condFor();
		        $this->setState(235);
		        $this->bloque();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function condFor(): Context\CondForContext
		{
		    $localContext = new Context\CondForContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_condFor);

		    try {
		        $this->setState(239);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 14, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(237);
		        	    $this->expFor();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(238);
		        	    $this->asignacion();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expFor(): Context\ExpForContext
		{
		    $localContext = new Context\ExpForContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_expFor);

		    try {
		        $this->setState(247);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 15, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(241);
		        	    $this->match(self::IDENTIFICADOR);
		        	    $this->setState(242);
		        	    $this->match(self::PLUS);
		        	    $this->setState(243);
		        	    $this->match(self::PLUS);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(244);
		        	    $this->match(self::IDENTIFICADOR);
		        	    $this->setState(245);
		        	    $this->match(self::MINUS);
		        	    $this->setState(246);
		        	    $this->match(self::MINUS);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function sentenciaSwitch(): Context\SentenciaSwitchContext
		{
		    $localContext = new Context\SentenciaSwitchContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_sentenciaSwitch);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(249);
		        $this->match(self::SWITCH);
		        $this->setState(250);
		        $this->recursiveLogExpr(0);
		        $this->setState(251);
		        $this->match(self::LBRACE);
		        $this->setState(252);
		        $this->bloqueSwitch();
		        $this->setState(253);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function bloqueSwitch(): Context\BloqueSwitchContext
		{
		    $localContext = new Context\BloqueSwitchContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_bloqueSwitch);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(256); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(255);
		        	$this->bloqueCase();
		        	$this->setState(258); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::CASE);
		        $this->setState(261);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(260);
		        	$this->bloqueDefault();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function bloqueCase(): Context\BloqueCaseContext
		{
		    $localContext = new Context\BloqueCaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_bloqueCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(263);
		        $this->match(self::CASE);
		        $this->setState(264);
		        $this->listaExpr();
		        $this->setState(265);
		        $this->match(self::COLON);
		        $this->setState(269);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 285983456125514458) !== 0)) {
		        	$this->setState(266);
		        	$this->i();
		        	$this->setState(271);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function bloqueDefault(): Context\BloqueDefaultContext
		{
		    $localContext = new Context\BloqueDefaultContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_bloqueDefault);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(272);
		        $this->match(self::DEFAULT);
		        $this->setState(273);
		        $this->match(self::COLON);
		        $this->setState(277);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 285983456125514458) !== 0)) {
		        	$this->setState(274);
		        	$this->i();
		        	$this->setState(279);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function sentenciaIf(): Context\SentenciaIfContext
		{
		    $localContext = new Context\SentenciaIfContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_sentenciaIf);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(280);
		        $this->match(self::IF);
		        $this->setState(281);
		        $this->recursiveLogExpr(0);
		        $this->setState(282);
		        $this->bloque();
		        $this->setState(285);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(283);
		        	$this->match(self::ELSE);
		        	$this->setState(284);
		        	$this->bloque();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function bloque(): Context\BloqueContext
		{
		    $localContext = new Context\BloqueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_bloque);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(287);
		        $this->match(self::LBRACE);
		        $this->setState(294);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 285983456125514458) !== 0)) {
		        	$this->setState(288);
		        	$this->i();
		        	$this->setState(290);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);

		        	if ($_la === self::SEMICOLON) {
		        		$this->setState(289);
		        		$this->match(self::SEMICOLON);
		        	}
		        	$this->setState(296);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(297);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function asignacion(): Context\AsignacionContext
		{
		    $localContext = new Context\AsignacionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_asignacion);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(299);
		        $this->lValue();
		        $this->setState(300);
		        $this->simboloAsignacion();
		        $this->setState(301);
		        $this->recursiveLogExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function lValue(): Context\LValueContext
		{
		    $localContext = new Context\LValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_lValue);

		    try {
		        $this->setState(311);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 23, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(303);
		        	    $this->match(self::IDENTIFICADOR);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(304);
		        	    $this->recursiveFactor(0);
		        	    $this->setState(305);
		        	    $this->match(self::LCOR);
		        	    $this->setState(306);
		        	    $this->recursiveLogExpr(0);
		        	    $this->setState(307);
		        	    $this->match(self::RCOR);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(309);
		        	    $this->match(self::MULT);
		        	    $this->setState(310);
		        	    $this->recursiveFactor(0);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function imprimir(): Context\ImprimirContext
		{
		    $localContext = new Context\ImprimirContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_imprimir);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(313);
		        $this->match(self::FMT);
		        $this->setState(314);
		        $this->match(self::DOT);
		        $this->setState(315);
		        $this->match(self::PRINTLN);
		        $this->setState(316);
		        $this->match(self::LPAREN);
		        $this->setState(317);
		        $this->listaExpr();
		        $this->setState(318);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function declaracion(): Context\DeclaracionContext
		{
		    $localContext = new Context\DeclaracionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_declaracion);

		    try {
		        $this->setState(330);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 24, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(320);
		        	    $this->match(self::VAR);
		        	    $this->setState(321);
		        	    $this->listaId();
		        	    $this->setState(322);
		        	    $this->tipos();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(324);
		        	    $this->match(self::VAR);
		        	    $this->setState(325);
		        	    $this->listaId();
		        	    $this->setState(326);
		        	    $this->tipos();
		        	    $this->setState(327);
		        	    $this->match(self::ASSIGN);
		        	    $this->setState(328);
		        	    $this->listaExpr();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function declaracionCorta(): Context\DeclaracionCortaContext
		{
		    $localContext = new Context\DeclaracionCortaContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_declaracionCorta);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(332);
		        $this->listaId();
		        $this->setState(333);
		        $this->match(self::COLON);
		        $this->setState(334);
		        $this->match(self::ASSIGN);
		        $this->setState(335);
		        $this->listaExpr();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function declaracionConst(): Context\DeclaracionConstContext
		{
		    $localContext = new Context\DeclaracionConstContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_declaracionConst);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(337);
		        $this->match(self::CONST);
		        $this->setState(338);
		        $this->match(self::IDENTIFICADOR);
		        $this->setState(339);
		        $this->tipos();
		        $this->setState(340);
		        $this->match(self::ASSIGN);
		        $this->setState(341);
		        $this->recursiveLogExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listaExpr(): Context\ListaExprContext
		{
		    $localContext = new Context\ListaExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_listaExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(343);
		        $this->argumento();
		        $this->setState(348);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(344);
		        	$this->match(self::COMMA);
		        	$this->setState(345);
		        	$this->argumento();
		        	$this->setState(350);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listaId(): Context\ListaIdContext
		{
		    $localContext = new Context\ListaIdContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_listaId);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(351);
		        $this->match(self::IDENTIFICADOR);
		        $this->setState(356);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(352);
		        	$this->match(self::COMMA);
		        	$this->setState(353);
		        	$this->match(self::IDENTIFICADOR);
		        	$this->setState(358);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logExpr(): Context\LogExprContext
		{
			return $this->recursiveLogExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveLogExpr(int $precedence): Context\LogExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\LogExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 66;
			$this->enterRecursionRule($localContext, 66, self::RULE_logExpr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\ToRelExprContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(360);
				$this->recursiveRelExpr(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(367);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\LogicalExpressionContext(new Context\LogExprContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_logExpr);
						$this->setState(362);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(363);

						$localContext->op = $this->input->LT(1);
						$_la = $this->input->LA(1);

						if (!($_la === self::ANDO || $_la === self::ORO)) {
							    $localContext->op = $this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(364);
						$this->recursiveRelExpr(0); 
					}

					$this->setState(369);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function relExpr(): Context\RelExprContext
		{
			return $this->recursiveRelExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveRelExpr(int $precedence): Context\RelExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\RelExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 68;
			$this->enterRecursionRule($localContext, 68, self::RULE_relExpr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\ToExprContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(371);
				$this->recursiveExpr(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(378);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 28, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\RelationalExpresionContext(new Context\RelExprContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_relExpr);
						$this->setState(373);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(374);

						$localContext->op = $this->input->LT(1);
						$_la = $this->input->LA(1);

						if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2216615441596416) !== 0))) {
							    $localContext->op = $this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(375);
						$this->recursiveExpr(0); 
					}

					$this->setState(380);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 28, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expr(): Context\ExprContext
		{
			return $this->recursiveExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpr(int $precedence): Context\ExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 70;
			$this->enterRecursionRule($localContext, 70, self::RULE_expr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\ToTermContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(382);
				$this->recursiveTerm(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(389);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\BinaryExpressionTContext(new Context\ExprContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
						$this->setState(384);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(385);

						$localContext->op = $this->input->LT(1);
						$_la = $this->input->LA(1);

						if (!($_la === self::PLUS || $_la === self::MINUS)) {
							    $localContext->op = $this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(386);
						$this->recursiveTerm(0); 
					}

					$this->setState(391);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function term(): Context\TermContext
		{
			return $this->recursiveTerm(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveTerm(int $precedence): Context\TermContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\TermContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 72;
			$this->enterRecursionRule($localContext, 72, self::RULE_term, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\ToFactorContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(393);
				$this->recursiveFactor(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(400);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\BinaryExpressionSContext(new Context\TermContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_term);
						$this->setState(395);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(396);

						$localContext->op = $this->input->LT(1);
						$_la = $this->input->LA(1);

						if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1924145348608) !== 0))) {
							    $localContext->op = $this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(397);
						$this->recursiveFactor(0); 
					}

					$this->setState(402);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function factor(): Context\FactorContext
		{
			return $this->recursiveFactor(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveFactor(int $precedence): Context\FactorContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\FactorContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 74;
			$this->enterRecursionRule($localContext, 74, self::RULE_factor, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(417);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 31, $this->ctx)) {
					case 1:
					    $localContext = new Context\GroupedExpressionContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;

					    $this->setState(404);
					    $this->match(self::LPAREN);
					    $this->setState(405);
					    $this->recursiveLogExpr(0);
					    $this->setState(406);
					    $this->match(self::RPAREN);
					break;

					case 2:
					    $localContext = new Context\UnaryExpressionContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(408);

					    $localContext->op = $this->input->LT(1);
					    $_la = $this->input->LA(1);

					    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4879082848256) !== 0))) {
					    	    $localContext->op = $this->errorHandler->recoverInline($this);
					    } else {
					    	if ($this->input->LA(1) === Token::EOF) {
					    	    $this->matchedEOF = true;
					        }

					    	$this->errorHandler->reportMatch($this);
					    	$this->consume();
					    }
					    $this->setState(409);
					    $this->recursiveFactor(8);
					break;

					case 3:
					    $localContext = new Context\LiteralValueContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(410);
					    $this->literal();
					break;

					case 4:
					    $localContext = new Context\NowFuncContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(411);
					    $this->funcNow();
					break;

					case 5:
					    $localContext = new Context\LenFuncContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(412);
					    $this->funcLen();
					break;

					case 6:
					    $localContext = new Context\SubFuncContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(413);
					    $this->funcSub();
					break;

					case 7:
					    $localContext = new Context\TypeFuncContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(414);
					    $this->funcType();
					break;

					case 8:
					    $localContext = new Context\LlamarFuncionFContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(415);
					    $this->llamadaFuncion();
					break;

					case 9:
					    $localContext = new Context\IdentifierContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(416);
					    $this->match(self::IDENTIFICADOR);
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(426);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\ArregloAccesoContext(new Context\FactorContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_factor);
						$this->setState(419);

						if (!($this->precpred($this->ctx, 10))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 10)");
						}
						$this->setState(420);
						$this->match(self::LCOR);
						$this->setState(421);
						$this->recursiveLogExpr(0);
						$this->setState(422);
						$this->match(self::RCOR); 
					}

					$this->setState(428);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function literal(): Context\LiteralContext
		{
		    $localContext = new Context\LiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_literal);

		    try {
		        $this->setState(436);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT_T:
		            case self::FLOAT_T:
		            case self::BOOL_T:
		            case self::RUNE_T:
		            case self::STRING_T:
		            case self::LCOR:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(429);
		            	$this->arrayLiteral();
		            	break;

		            case self::FLOAT:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(430);
		            	$this->match(self::FLOAT);
		            	break;

		            case self::ENTERO:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(431);
		            	$this->match(self::ENTERO);
		            	break;

		            case self::BOOL:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(432);
		            	$this->match(self::BOOL);
		            	break;

		            case self::RUNE:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(433);
		            	$this->match(self::RUNE);
		            	break;

		            case self::STR:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(434);
		            	$this->match(self::STR);
		            	break;

		            case self::NIL:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(435);
		            	$this->match(self::NIL);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(438);
		        $this->tipos();
		        $this->setState(439);
		        $this->match(self::LBRACE);
		        $this->setState(441);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 285983456159006720) !== 0)) {
		        	$this->setState(440);
		        	$this->listaElementos();
		        }
		        $this->setState(443);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listaElementos(): Context\ListaElementosContext
		{
		    $localContext = new Context\ListaElementosContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_listaElementos);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(445);
		        $this->elemento();
		        $this->setState(450);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(446);
		        	$this->match(self::COMMA);
		        	$this->setState(447);
		        	$this->elemento();
		        	$this->setState(452);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function elemento(): Context\ElementoContext
		{
		    $localContext = new Context\ElementoContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_elemento);

		    try {
		        $this->setState(458);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::LEN:
		            case self::NOW:
		            case self::SUBSTR:
		            case self::TYPEOF:
		            case self::INT_T:
		            case self::FLOAT_T:
		            case self::BOOL_T:
		            case self::RUNE_T:
		            case self::STRING_T:
		            case self::LPAREN:
		            case self::LCOR:
		            case self::MINUS:
		            case self::NEG:
		            case self::MULT:
		            case self::REF:
		            case self::BOOL:
		            case self::NIL:
		            case self::ENTERO:
		            case self::FLOAT:
		            case self::STR:
		            case self::RUNE:
		            case self::IDENTIFICADOR:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(453);
		            	$this->recursiveLogExpr(0);
		            	break;

		            case self::LBRACE:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(454);
		            	$this->match(self::LBRACE);
		            	$this->setState(455);
		            	$this->listaElementos();
		            	$this->setState(456);
		            	$this->match(self::RBRACE);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function tipos(): Context\TiposContext
		{
		    $localContext = new Context\TiposContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_tipos);

		    try {
		        $this->setState(466);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::LCOR:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(460);
		            	$this->match(self::LCOR);
		            	$this->setState(461);
		            	$this->recursiveLogExpr(0);
		            	$this->setState(462);
		            	$this->match(self::RCOR);
		            	$this->setState(463);
		            	$this->tipos();
		            	break;

		            case self::INT_T:
		            case self::FLOAT_T:
		            case self::BOOL_T:
		            case self::RUNE_T:
		            case self::STRING_T:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(465);
		            	$this->tipoBase();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function tipoBase(): Context\TipoBaseContext
		{
		    $localContext = new Context\TipoBaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_tipoBase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(468);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 32505856) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function simboloAsignacion(): Context\SimboloAsignacionContext
		{
		    $localContext = new Context\SimboloAsignacionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 88, self::RULE_simboloAsignacion);

		    try {
		        $this->setState(473);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::ASSIGN:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(470);
		            	$this->match(self::ASSIGN);
		            	break;

		            case self::PLUS:
		            case self::MINUS:
		            case self::MULT:
		            case self::DIV:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(471);

		            	$localContext->op = $this->input->LT(1);
		            	$_la = $this->input->LA(1);

		            	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 927712935936) !== 0))) {
		            		    $localContext->op = $this->errorHandler->recoverInline($this);
		            	} else {
		            		if ($this->input->LA(1) === Token::EOF) {
		            		    $this->matchedEOF = true;
		            	    }

		            		$this->errorHandler->reportMatch($this);
		            		$this->consume();
		            	}
		            	$this->setState(472);
		            	$this->match(self::ASSIGN);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 33:
						return $this->sempredLogExpr($localContext, $predicateIndex);

					case 34:
						return $this->sempredRelExpr($localContext, $predicateIndex);

					case 35:
						return $this->sempredExpr($localContext, $predicateIndex);

					case 36:
						return $this->sempredTerm($localContext, $predicateIndex);

					case 37:
						return $this->sempredFactor($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredLogExpr(?Context\LogExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredRelExpr(?Context\RelExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 1:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredExpr(?Context\ExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 2:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredTerm(?Context\TermContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 3:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredFactor(?Context\FactorContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 4:
			        return $this->precpred($this->ctx, 10);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GrammarParser;
	use GrammarVisitor;
	use GrammarListener;

	class ProgramaContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_programa;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EOF, 0);
	    }

	    /**
	     * @return array<TopLevelContext>|TopLevelContext|null
	     */
	    public function topLevel(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TopLevelContext::class);
	    	}

	        return $this->getTypedRuleContext(TopLevelContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterPrograma($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitPrograma($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitPrograma($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TopLevelContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_topLevel;
	    }

	    public function funcion(): ?FuncionContext
	    {
	    	return $this->getTypedRuleContext(FuncionContext::class, 0);
	    }

	    public function mainFuncion(): ?MainFuncionContext
	    {
	    	return $this->getTypedRuleContext(MainFuncionContext::class, 0);
	    }

	    public function declaracion(): ?DeclaracionContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionContext::class, 0);
	    }

	    public function declaracionConst(): ?DeclaracionConstContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionConstContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTopLevel($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTopLevel($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTopLevel($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MainFuncionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_mainFuncion;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class BloqueMainContext extends MainFuncionContext
	{
		public function __construct(MainFuncionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FUNC, 0);
	    }

	    public function MAIN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MAIN, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

	    public function bloque(): ?BloqueContext
	    {
	    	return $this->getTypedRuleContext(BloqueContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBloqueMain($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBloqueMain($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBloqueMain($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_i;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class IncDecContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expFor(): ?ExpForContext
	    {
	    	return $this->getTypedRuleContext(ExpForContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIncDec($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIncDec($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIncDec($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class PruebaContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterPrueba($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitPrueba($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitPrueba($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class FuncionImprimirContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function imprimir(): ?ImprimirContext
	    {
	    	return $this->getTypedRuleContext(ImprimirContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncionImprimir($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncionImprimir($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncionImprimir($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForSentenciaContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function sentenciaFor(): ?SentenciaForContext
	    {
	    	return $this->getTypedRuleContext(SentenciaForContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForSentencia($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForSentencia($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForSentencia($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DFunctionContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcion(): ?FuncionContext
	    {
	    	return $this->getTypedRuleContext(FuncionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SwitchSentenciaContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function sentenciaSwitch(): ?SentenciaSwitchContext
	    {
	    	return $this->getTypedRuleContext(SentenciaSwitchContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSwitchSentencia($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSwitchSentencia($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSwitchSentencia($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ShortDeclarationContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function declaracionCorta(): ?DeclaracionCortaContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionCortaContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterShortDeclaration($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitShortDeclaration($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitShortDeclaration($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ConstDeclarationContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function declaracionConst(): ?DeclaracionConstContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionConstContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterConstDeclaration($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitConstDeclaration($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitConstDeclaration($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SentenciaReturnContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function retornar(): ?RetornarContext
	    {
	    	return $this->getTypedRuleContext(RetornarContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaReturn($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaReturn($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaReturn($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AsignationContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function asignacion(): ?AsignacionContext
	    {
	    	return $this->getTypedRuleContext(AsignacionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAsignation($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAsignation($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAsignation($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SentenciaBreakContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::BREAK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaBreak($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaBreak($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaBreak($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SentenciaContinueContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CONTINUE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaContinue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaContinue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaContinue($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LlamarFuncionContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function llamadaFuncion(): ?LlamadaFuncionContext
	    {
	    	return $this->getTypedRuleContext(LlamadaFuncionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLlamarFuncion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLlamarFuncion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLlamarFuncion($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DeclarationContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function declaracion(): ?DeclaracionContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDeclaration($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDeclaration($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDeclaration($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IfSentenciaContext extends IContext
	{
		public function __construct(IContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function sentenciaIf(): ?SentenciaIfContext
	    {
	    	return $this->getTypedRuleContext(SentenciaIfContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIfSentencia($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIfSentencia($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIfSentencia($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncLenContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcLen;
	    }

	    public function LEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LEN, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncLen($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncLen($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncLen($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncNowContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcNow;
	    }

	    public function NOW(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NOW, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncNow($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncNow($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncNow($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncSubContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcSub;
	    }

	    public function SUBSTR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SUBSTR, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    /**
	     * @return array<LogExprContext>|LogExprContext|null
	     */
	    public function logExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LogExprContext::class);
	    	}

	        return $this->getTypedRuleContext(LogExprContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncSub($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncSub($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncSub($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcType;
	    }

	    public function TYPEOF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::TYPEOF, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LlamadaFuncionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_llamadaFuncion;
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLlamadaFuncion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLlamadaFuncion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLlamadaFuncion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentoContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_argumento;
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function REF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::REF, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArgumento($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArgumento($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArgumento($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RetornarContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_retornar;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RETURN, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterRetornar($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitRetornar($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitRetornar($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcion;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FUNC, 0);
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function LPAREN(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::LPAREN);
	    	}

	        return $this->getToken(GrammarParser::LPAREN, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function RPAREN(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::RPAREN);
	    	}

	        return $this->getToken(GrammarParser::RPAREN, $index);
	    }

	    public function listaRetorno(): ?ListaRetornoContext
	    {
	    	return $this->getTypedRuleContext(ListaRetornoContext::class, 0);
	    }

	    public function bloque(): ?BloqueContext
	    {
	    	return $this->getTypedRuleContext(BloqueContext::class, 0);
	    }

	    public function listaParametros(): ?ListaParametrosContext
	    {
	    	return $this->getTypedRuleContext(ListaParametrosContext::class, 0);
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListaRetornoContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_listaRetorno;
	    }

	    /**
	     * @return array<TiposContext>|TiposContext|null
	     */
	    public function tipos(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TiposContext::class);
	    	}

	        return $this->getTypedRuleContext(TiposContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterListaRetorno($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitListaRetorno($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitListaRetorno($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListaParametrosContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_listaParametros;
	    }

	    /**
	     * @return array<ParametroContext>|ParametroContext|null
	     */
	    public function parametro(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParametroContext::class);
	    	}

	        return $this->getTypedRuleContext(ParametroContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterListaParametros($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitListaParametros($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitListaParametros($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParametroContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_parametro;
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterParametro($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitParametro($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitParametro($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SentenciaForContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_sentenciaFor;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FOR, 0);
	    }

	    public function forClasico(): ?ForClasicoContext
	    {
	    	return $this->getTypedRuleContext(ForClasicoContext::class, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function bloque(): ?BloqueContext
	    {
	    	return $this->getTypedRuleContext(BloqueContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaFor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaFor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaFor($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForClasicoContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_forClasico;
	    }

	    public function declaracionCorta(): ?DeclaracionCortaContext
	    {
	    	return $this->getTypedRuleContext(DeclaracionCortaContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SEMICOLON(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::SEMICOLON);
	    	}

	        return $this->getToken(GrammarParser::SEMICOLON, $index);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function condFor(): ?CondForContext
	    {
	    	return $this->getTypedRuleContext(CondForContext::class, 0);
	    }

	    public function bloque(): ?BloqueContext
	    {
	    	return $this->getTypedRuleContext(BloqueContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForClasico($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForClasico($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForClasico($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CondForContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_condFor;
	    }

	    public function expFor(): ?ExpForContext
	    {
	    	return $this->getTypedRuleContext(ExpForContext::class, 0);
	    }

	    public function asignacion(): ?AsignacionContext
	    {
	    	return $this->getTypedRuleContext(AsignacionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterCondFor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitCondFor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitCondFor($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpForContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_expFor;
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function PLUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::PLUS);
	    	}

	        return $this->getToken(GrammarParser::PLUS, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function MINUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::MINUS);
	    	}

	        return $this->getToken(GrammarParser::MINUS, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterExpFor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitExpFor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitExpFor($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SentenciaSwitchContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_sentenciaSwitch;
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SWITCH, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LBRACE, 0);
	    }

	    public function bloqueSwitch(): ?BloqueSwitchContext
	    {
	    	return $this->getTypedRuleContext(BloqueSwitchContext::class, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RBRACE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaSwitch($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaSwitch($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaSwitch($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BloqueSwitchContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_bloqueSwitch;
	    }

	    /**
	     * @return array<BloqueCaseContext>|BloqueCaseContext|null
	     */
	    public function bloqueCase(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BloqueCaseContext::class);
	    	}

	        return $this->getTypedRuleContext(BloqueCaseContext::class, $index);
	    }

	    public function bloqueDefault(): ?BloqueDefaultContext
	    {
	    	return $this->getTypedRuleContext(BloqueDefaultContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBloqueSwitch($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBloqueSwitch($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBloqueSwitch($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BloqueCaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_bloqueCase;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CASE, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON, 0);
	    }

	    /**
	     * @return array<IContext>|IContext|null
	     */
	    public function i(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(IContext::class);
	    	}

	        return $this->getTypedRuleContext(IContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBloqueCase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBloqueCase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBloqueCase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BloqueDefaultContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_bloqueDefault;
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DEFAULT, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON, 0);
	    }

	    /**
	     * @return array<IContext>|IContext|null
	     */
	    public function i(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(IContext::class);
	    	}

	        return $this->getTypedRuleContext(IContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBloqueDefault($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBloqueDefault($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBloqueDefault($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SentenciaIfContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_sentenciaIf;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IF, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    /**
	     * @return array<BloqueContext>|BloqueContext|null
	     */
	    public function bloque(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BloqueContext::class);
	    	}

	        return $this->getTypedRuleContext(BloqueContext::class, $index);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ELSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSentenciaIf($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSentenciaIf($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSentenciaIf($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BloqueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_bloque;
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RBRACE, 0);
	    }

	    /**
	     * @return array<IContext>|IContext|null
	     */
	    public function i(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(IContext::class);
	    	}

	        return $this->getTypedRuleContext(IContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SEMICOLON(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::SEMICOLON);
	    	}

	        return $this->getToken(GrammarParser::SEMICOLON, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBloque($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBloque($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBloque($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AsignacionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_asignacion;
	    }

	    public function lValue(): ?LValueContext
	    {
	    	return $this->getTypedRuleContext(LValueContext::class, 0);
	    }

	    public function simboloAsignacion(): ?SimboloAsignacionContext
	    {
	    	return $this->getTypedRuleContext(SimboloAsignacionContext::class, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAsignacion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAsignacion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAsignacion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LValueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_lValue;
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function LCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LCOR, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RCOR, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLValue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLValue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ImprimirContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_imprimir;
	    }

	    public function FMT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FMT, 0);
	    }

	    public function DOT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DOT, 0);
	    }

	    public function PRINTLN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PRINTLN, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterImprimir($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitImprimir($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitImprimir($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DeclaracionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_declaracion;
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::VAR, 0);
	    }

	    public function listaId(): ?ListaIdContext
	    {
	    	return $this->getTypedRuleContext(ListaIdContext::class, 0);
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ASSIGN, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDeclaracion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDeclaracion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDeclaracion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DeclaracionCortaContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_declaracionCorta;
	    }

	    public function listaId(): ?ListaIdContext
	    {
	    	return $this->getTypedRuleContext(ListaIdContext::class, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ASSIGN, 0);
	    }

	    public function listaExpr(): ?ListaExprContext
	    {
	    	return $this->getTypedRuleContext(ListaExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDeclaracionCorta($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDeclaracionCorta($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDeclaracionCorta($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DeclaracionConstContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_declaracionConst;
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CONST, 0);
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ASSIGN, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDeclaracionConst($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDeclaracionConst($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDeclaracionConst($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListaExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_listaExpr;
	    }

	    /**
	     * @return array<ArgumentoContext>|ArgumentoContext|null
	     */
	    public function argumento(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArgumentoContext::class);
	    	}

	        return $this->getTypedRuleContext(ArgumentoContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterListaExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitListaExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitListaExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListaIdContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_listaId;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFICADOR(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::IDENTIFICADOR);
	    	}

	        return $this->getToken(GrammarParser::IDENTIFICADOR, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterListaId($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitListaId($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitListaId($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_logExpr;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class LogicalExpressionContext extends LogExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(LogExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function relExpr(): ?RelExprContext
	    {
	    	return $this->getTypedRuleContext(RelExprContext::class, 0);
	    }

	    public function ORO(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ORO, 0);
	    }

	    public function ANDO(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ANDO, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLogicalExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLogicalExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLogicalExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ToRelExprContext extends LogExprContext
	{
		public function __construct(LogExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function relExpr(): ?RelExprContext
	    {
	    	return $this->getTypedRuleContext(RelExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterToRelExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitToRelExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitToRelExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RelExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_relExpr;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ToExprContext extends RelExprContext
	{
		public function __construct(RelExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterToExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitToExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitToExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class RelationalExpresionContext extends RelExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(RelExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function relExpr(): ?RelExprContext
	    {
	    	return $this->getTypedRuleContext(RelExprContext::class, 0);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    public function LE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LE, 0);
	    }

	    public function GE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::GE, 0);
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EQUAL, 0);
	    }

	    public function NEQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NEQUAL, 0);
	    }

	    public function LESS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LESS, 0);
	    }

	    public function GREATER(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::GREATER, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterRelationalExpresion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitRelationalExpresion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitRelationalExpresion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_expr;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ToTermContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterToTerm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitToTerm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitToTerm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class BinaryExpressionTContext extends ExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

	    public function PLUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PLUS, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MINUS, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBinaryExpressionT($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBinaryExpressionT($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBinaryExpressionT($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TermContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_term;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class BinaryExpressionSContext extends TermContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(TermContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function DIV(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DIV, 0);
	    }

	    public function MOD(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MOD, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBinaryExpressionS($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBinaryExpressionS($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBinaryExpressionS($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ToFactorContext extends TermContext
	{
		public function __construct(TermContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterToFactor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitToFactor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitToFactor($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FactorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_factor;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class IdentifierContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function IDENTIFICADOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IDENTIFICADOR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIdentifier($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIdentifier($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIdentifier($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NowFuncContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcNow(): ?FuncNowContext
	    {
	    	return $this->getTypedRuleContext(FuncNowContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterNowFunc($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitNowFunc($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitNowFunc($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SubFuncContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcSub(): ?FuncSubContext
	    {
	    	return $this->getTypedRuleContext(FuncSubContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSubFunc($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSubFunc($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSubFunc($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryExpressionContext extends FactorContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MINUS, 0);
	    }

	    public function NEG(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NEG, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function REF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::REF, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterUnaryExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitUnaryExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitUnaryExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TypeFuncContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcType(): ?FuncTypeContext
	    {
	    	return $this->getTypedRuleContext(FuncTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypeFunc($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypeFunc($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypeFunc($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class GroupedExpressionContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LPAREN, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterGroupedExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitGroupedExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitGroupedExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LenFuncContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcLen(): ?FuncLenContext
	    {
	    	return $this->getTypedRuleContext(FuncLenContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLenFunc($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLenFunc($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLenFunc($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LiteralValueContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function literal(): ?LiteralContext
	    {
	    	return $this->getTypedRuleContext(LiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLiteralValue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLiteralValue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLiteralValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LlamarFuncionFContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function llamadaFuncion(): ?LlamadaFuncionContext
	    {
	    	return $this->getTypedRuleContext(LlamadaFuncionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLlamarFuncionF($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLlamarFuncionF($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLlamarFuncionF($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArregloAccesoContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function LCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LCOR, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RCOR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArregloAcceso($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArregloAcceso($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArregloAcceso($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_literal;
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FLOAT, 0);
	    }

	    public function ENTERO(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ENTERO, 0);
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::BOOL, 0);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RUNE, 0);
	    }

	    public function STR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::STR, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NIL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayLiteral;
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RBRACE, 0);
	    }

	    public function listaElementos(): ?ListaElementosContext
	    {
	    	return $this->getTypedRuleContext(ListaElementosContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListaElementosContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_listaElementos;
	    }

	    /**
	     * @return array<ElementoContext>|ElementoContext|null
	     */
	    public function elemento(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ElementoContext::class);
	    	}

	        return $this->getTypedRuleContext(ElementoContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterListaElementos($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitListaElementos($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitListaElementos($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ElementoContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_elemento;
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LBRACE, 0);
	    }

	    public function listaElementos(): ?ListaElementosContext
	    {
	    	return $this->getTypedRuleContext(ListaElementosContext::class, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RBRACE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterElemento($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitElemento($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitElemento($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TiposContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_tipos;
	    }

	    public function LCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LCOR, 0);
	    }

	    public function logExpr(): ?LogExprContext
	    {
	    	return $this->getTypedRuleContext(LogExprContext::class, 0);
	    }

	    public function RCOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RCOR, 0);
	    }

	    public function tipos(): ?TiposContext
	    {
	    	return $this->getTypedRuleContext(TiposContext::class, 0);
	    }

	    public function tipoBase(): ?TipoBaseContext
	    {
	    	return $this->getTypedRuleContext(TipoBaseContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTipos($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTipos($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTipos($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TipoBaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_tipoBase;
	    }

	    public function INT_T(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::INT_T, 0);
	    }

	    public function FLOAT_T(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FLOAT_T, 0);
	    }

	    public function BOOL_T(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::BOOL_T, 0);
	    }

	    public function RUNE_T(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RUNE_T, 0);
	    }

	    public function STRING_T(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::STRING_T, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTipoBase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTipoBase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTipoBase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SimboloAsignacionContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_simboloAsignacion;
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ASSIGN, 0);
	    }

	    public function PLUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PLUS, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MINUS, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function DIV(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DIV, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSimboloAsignacion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSimboloAsignacion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSimboloAsignacion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}