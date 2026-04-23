<?php

/*
 * Generated from Grammar.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see GrammarParser}.
 */
interface GrammarListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see GrammarParser::programa()}.
	 * @param $context The parse tree.
	 */
	public function enterPrograma(Context\ProgramaContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::programa()}.
	 * @param $context The parse tree.
	 */
	public function exitPrograma(Context\ProgramaContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::topLevel()}.
	 * @param $context The parse tree.
	 */
	public function enterTopLevel(Context\TopLevelContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::topLevel()}.
	 * @param $context The parse tree.
	 */
	public function exitTopLevel(Context\TopLevelContext $context): void;
	/**
	 * Enter a parse tree produced by the `BloqueMain`
	 * labeled alternative in {@see GrammarParser::mainFuncion()}.
	 * @param $context The parse tree.
	 */
	public function enterBloqueMain(Context\BloqueMainContext $context): void;
	/**
	 * Exit a parse tree produced by the `BloqueMain` labeled alternative
	 * in {@see GrammarParser::mainFuncion()}.
	 * @param $context The parse tree.
	 */
	public function exitBloqueMain(Context\BloqueMainContext $context): void;
	/**
	 * Enter a parse tree produced by the `FuncionImprimir`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncionImprimir(Context\FuncionImprimirContext $context): void;
	/**
	 * Exit a parse tree produced by the `FuncionImprimir` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncionImprimir(Context\FuncionImprimirContext $context): void;
	/**
	 * Enter a parse tree produced by the `Declaration`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Exit a parse tree produced by the `Declaration` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Enter a parse tree produced by the `ShortDeclaration`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterShortDeclaration(Context\ShortDeclarationContext $context): void;
	/**
	 * Exit a parse tree produced by the `ShortDeclaration` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitShortDeclaration(Context\ShortDeclarationContext $context): void;
	/**
	 * Enter a parse tree produced by the `ConstDeclaration`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDeclaration(Context\ConstDeclarationContext $context): void;
	/**
	 * Exit a parse tree produced by the `ConstDeclaration` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDeclaration(Context\ConstDeclarationContext $context): void;
	/**
	 * Enter a parse tree produced by the `Asignation`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterAsignation(Context\AsignationContext $context): void;
	/**
	 * Exit a parse tree produced by the `Asignation` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitAsignation(Context\AsignationContext $context): void;
	/**
	 * Enter a parse tree produced by the `IfSentencia`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterIfSentencia(Context\IfSentenciaContext $context): void;
	/**
	 * Exit a parse tree produced by the `IfSentencia` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitIfSentencia(Context\IfSentenciaContext $context): void;
	/**
	 * Enter a parse tree produced by the `SwitchSentencia`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchSentencia(Context\SwitchSentenciaContext $context): void;
	/**
	 * Exit a parse tree produced by the `SwitchSentencia` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchSentencia(Context\SwitchSentenciaContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForSentencia`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterForSentencia(Context\ForSentenciaContext $context): void;
	/**
	 * Exit a parse tree produced by the `ForSentencia` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitForSentencia(Context\ForSentenciaContext $context): void;
	/**
	 * Enter a parse tree produced by the `IncDec`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterIncDec(Context\IncDecContext $context): void;
	/**
	 * Exit a parse tree produced by the `IncDec` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitIncDec(Context\IncDecContext $context): void;
	/**
	 * Enter a parse tree produced by the `DFunction`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterDFunction(Context\DFunctionContext $context): void;
	/**
	 * Exit a parse tree produced by the `DFunction` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitDFunction(Context\DFunctionContext $context): void;
	/**
	 * Enter a parse tree produced by the `SentenciaReturn`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaReturn(Context\SentenciaReturnContext $context): void;
	/**
	 * Exit a parse tree produced by the `SentenciaReturn` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaReturn(Context\SentenciaReturnContext $context): void;
	/**
	 * Enter a parse tree produced by the `LlamarFuncion`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterLlamarFuncion(Context\LlamarFuncionContext $context): void;
	/**
	 * Exit a parse tree produced by the `LlamarFuncion` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitLlamarFuncion(Context\LlamarFuncionContext $context): void;
	/**
	 * Enter a parse tree produced by the `prueba`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterPrueba(Context\PruebaContext $context): void;
	/**
	 * Exit a parse tree produced by the `prueba` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitPrueba(Context\PruebaContext $context): void;
	/**
	 * Enter a parse tree produced by the `SentenciaContinue`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaContinue(Context\SentenciaContinueContext $context): void;
	/**
	 * Exit a parse tree produced by the `SentenciaContinue` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaContinue(Context\SentenciaContinueContext $context): void;
	/**
	 * Enter a parse tree produced by the `SentenciaBreak`
	 * labeled alternative in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaBreak(Context\SentenciaBreakContext $context): void;
	/**
	 * Exit a parse tree produced by the `SentenciaBreak` labeled alternative
	 * in {@see GrammarParser::i()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaBreak(Context\SentenciaBreakContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcLen()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncLen(Context\FuncLenContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcLen()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncLen(Context\FuncLenContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcNow()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncNow(Context\FuncNowContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcNow()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncNow(Context\FuncNowContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcSub()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncSub(Context\FuncSubContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcSub()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncSub(Context\FuncSubContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcType()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncType(Context\FuncTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcType()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncType(Context\FuncTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::llamadaFuncion()}.
	 * @param $context The parse tree.
	 */
	public function enterLlamadaFuncion(Context\LlamadaFuncionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::llamadaFuncion()}.
	 * @param $context The parse tree.
	 */
	public function exitLlamadaFuncion(Context\LlamadaFuncionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::argumento()}.
	 * @param $context The parse tree.
	 */
	public function enterArgumento(Context\ArgumentoContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::argumento()}.
	 * @param $context The parse tree.
	 */
	public function exitArgumento(Context\ArgumentoContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::retornar()}.
	 * @param $context The parse tree.
	 */
	public function enterRetornar(Context\RetornarContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::retornar()}.
	 * @param $context The parse tree.
	 */
	public function exitRetornar(Context\RetornarContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcion()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncion(Context\FuncionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcion()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncion(Context\FuncionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::listaRetorno()}.
	 * @param $context The parse tree.
	 */
	public function enterListaRetorno(Context\ListaRetornoContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::listaRetorno()}.
	 * @param $context The parse tree.
	 */
	public function exitListaRetorno(Context\ListaRetornoContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::listaParametros()}.
	 * @param $context The parse tree.
	 */
	public function enterListaParametros(Context\ListaParametrosContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::listaParametros()}.
	 * @param $context The parse tree.
	 */
	public function exitListaParametros(Context\ListaParametrosContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::parametro()}.
	 * @param $context The parse tree.
	 */
	public function enterParametro(Context\ParametroContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::parametro()}.
	 * @param $context The parse tree.
	 */
	public function exitParametro(Context\ParametroContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::sentenciaFor()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaFor(Context\SentenciaForContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::sentenciaFor()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaFor(Context\SentenciaForContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::forClasico()}.
	 * @param $context The parse tree.
	 */
	public function enterForClasico(Context\ForClasicoContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::forClasico()}.
	 * @param $context The parse tree.
	 */
	public function exitForClasico(Context\ForClasicoContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::condFor()}.
	 * @param $context The parse tree.
	 */
	public function enterCondFor(Context\CondForContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::condFor()}.
	 * @param $context The parse tree.
	 */
	public function exitCondFor(Context\CondForContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::expFor()}.
	 * @param $context The parse tree.
	 */
	public function enterExpFor(Context\ExpForContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::expFor()}.
	 * @param $context The parse tree.
	 */
	public function exitExpFor(Context\ExpForContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::sentenciaSwitch()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaSwitch(Context\SentenciaSwitchContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::sentenciaSwitch()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaSwitch(Context\SentenciaSwitchContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::bloqueSwitch()}.
	 * @param $context The parse tree.
	 */
	public function enterBloqueSwitch(Context\BloqueSwitchContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::bloqueSwitch()}.
	 * @param $context The parse tree.
	 */
	public function exitBloqueSwitch(Context\BloqueSwitchContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::bloqueCase()}.
	 * @param $context The parse tree.
	 */
	public function enterBloqueCase(Context\BloqueCaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::bloqueCase()}.
	 * @param $context The parse tree.
	 */
	public function exitBloqueCase(Context\BloqueCaseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::bloqueDefault()}.
	 * @param $context The parse tree.
	 */
	public function enterBloqueDefault(Context\BloqueDefaultContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::bloqueDefault()}.
	 * @param $context The parse tree.
	 */
	public function exitBloqueDefault(Context\BloqueDefaultContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::sentenciaIf()}.
	 * @param $context The parse tree.
	 */
	public function enterSentenciaIf(Context\SentenciaIfContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::sentenciaIf()}.
	 * @param $context The parse tree.
	 */
	public function exitSentenciaIf(Context\SentenciaIfContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::bloque()}.
	 * @param $context The parse tree.
	 */
	public function enterBloque(Context\BloqueContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::bloque()}.
	 * @param $context The parse tree.
	 */
	public function exitBloque(Context\BloqueContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::asignacion()}.
	 * @param $context The parse tree.
	 */
	public function enterAsignacion(Context\AsignacionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::asignacion()}.
	 * @param $context The parse tree.
	 */
	public function exitAsignacion(Context\AsignacionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::lValue()}.
	 * @param $context The parse tree.
	 */
	public function enterLValue(Context\LValueContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::lValue()}.
	 * @param $context The parse tree.
	 */
	public function exitLValue(Context\LValueContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::imprimir()}.
	 * @param $context The parse tree.
	 */
	public function enterImprimir(Context\ImprimirContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::imprimir()}.
	 * @param $context The parse tree.
	 */
	public function exitImprimir(Context\ImprimirContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::declaracion()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaracion(Context\DeclaracionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::declaracion()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaracion(Context\DeclaracionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::declaracionCorta()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaracionCorta(Context\DeclaracionCortaContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::declaracionCorta()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaracionCorta(Context\DeclaracionCortaContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::declaracionConst()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaracionConst(Context\DeclaracionConstContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::declaracionConst()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaracionConst(Context\DeclaracionConstContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::listaExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterListaExpr(Context\ListaExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::listaExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitListaExpr(Context\ListaExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::listaId()}.
	 * @param $context The parse tree.
	 */
	public function enterListaId(Context\ListaIdContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::listaId()}.
	 * @param $context The parse tree.
	 */
	public function exitListaId(Context\ListaIdContext $context): void;
	/**
	 * Enter a parse tree produced by the `LogicalExpression`
	 * labeled alternative in {@see GrammarParser::logExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalExpression(Context\LogicalExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by the `LogicalExpression` labeled alternative
	 * in {@see GrammarParser::logExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalExpression(Context\LogicalExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by the `toRelExpr`
	 * labeled alternative in {@see GrammarParser::logExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterToRelExpr(Context\ToRelExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `toRelExpr` labeled alternative
	 * in {@see GrammarParser::logExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitToRelExpr(Context\ToRelExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `ToExpr`
	 * labeled alternative in {@see GrammarParser::relExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterToExpr(Context\ToExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ToExpr` labeled alternative
	 * in {@see GrammarParser::relExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitToExpr(Context\ToExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `RelationalExpresion`
	 * labeled alternative in {@see GrammarParser::relExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterRelationalExpresion(Context\RelationalExpresionContext $context): void;
	/**
	 * Exit a parse tree produced by the `RelationalExpresion` labeled alternative
	 * in {@see GrammarParser::relExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitRelationalExpresion(Context\RelationalExpresionContext $context): void;
	/**
	 * Enter a parse tree produced by the `toTerm`
	 * labeled alternative in {@see GrammarParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterToTerm(Context\ToTermContext $context): void;
	/**
	 * Exit a parse tree produced by the `toTerm` labeled alternative
	 * in {@see GrammarParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitToTerm(Context\ToTermContext $context): void;
	/**
	 * Enter a parse tree produced by the `BinaryExpressionT`
	 * labeled alternative in {@see GrammarParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterBinaryExpressionT(Context\BinaryExpressionTContext $context): void;
	/**
	 * Exit a parse tree produced by the `BinaryExpressionT` labeled alternative
	 * in {@see GrammarParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitBinaryExpressionT(Context\BinaryExpressionTContext $context): void;
	/**
	 * Enter a parse tree produced by the `BinaryExpressionS`
	 * labeled alternative in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function enterBinaryExpressionS(Context\BinaryExpressionSContext $context): void;
	/**
	 * Exit a parse tree produced by the `BinaryExpressionS` labeled alternative
	 * in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function exitBinaryExpressionS(Context\BinaryExpressionSContext $context): void;
	/**
	 * Enter a parse tree produced by the `toFactor`
	 * labeled alternative in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function enterToFactor(Context\ToFactorContext $context): void;
	/**
	 * Exit a parse tree produced by the `toFactor` labeled alternative
	 * in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function exitToFactor(Context\ToFactorContext $context): void;
	/**
	 * Enter a parse tree produced by the `Identifier`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterIdentifier(Context\IdentifierContext $context): void;
	/**
	 * Exit a parse tree produced by the `Identifier` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitIdentifier(Context\IdentifierContext $context): void;
	/**
	 * Enter a parse tree produced by the `NowFunc`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterNowFunc(Context\NowFuncContext $context): void;
	/**
	 * Exit a parse tree produced by the `NowFunc` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitNowFunc(Context\NowFuncContext $context): void;
	/**
	 * Enter a parse tree produced by the `SubFunc`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterSubFunc(Context\SubFuncContext $context): void;
	/**
	 * Exit a parse tree produced by the `SubFunc` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitSubFunc(Context\SubFuncContext $context): void;
	/**
	 * Enter a parse tree produced by the `UnaryExpression`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryExpression(Context\UnaryExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by the `UnaryExpression` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryExpression(Context\UnaryExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypeFunc`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeFunc(Context\TypeFuncContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypeFunc` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeFunc(Context\TypeFuncContext $context): void;
	/**
	 * Enter a parse tree produced by the `GroupedExpression`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterGroupedExpression(Context\GroupedExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by the `GroupedExpression` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitGroupedExpression(Context\GroupedExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by the `LenFunc`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterLenFunc(Context\LenFuncContext $context): void;
	/**
	 * Exit a parse tree produced by the `LenFunc` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitLenFunc(Context\LenFuncContext $context): void;
	/**
	 * Enter a parse tree produced by the `literalValue`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterLiteralValue(Context\LiteralValueContext $context): void;
	/**
	 * Exit a parse tree produced by the `literalValue` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitLiteralValue(Context\LiteralValueContext $context): void;
	/**
	 * Enter a parse tree produced by the `LlamarFuncionF`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterLlamarFuncionF(Context\LlamarFuncionFContext $context): void;
	/**
	 * Exit a parse tree produced by the `LlamarFuncionF` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitLlamarFuncionF(Context\LlamarFuncionFContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArregloAcceso`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterArregloAcceso(Context\ArregloAccesoContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArregloAcceso` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitArregloAcceso(Context\ArregloAccesoContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function enterLiteral(Context\LiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function exitLiteral(Context\LiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::listaElementos()}.
	 * @param $context The parse tree.
	 */
	public function enterListaElementos(Context\ListaElementosContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::listaElementos()}.
	 * @param $context The parse tree.
	 */
	public function exitListaElementos(Context\ListaElementosContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::elemento()}.
	 * @param $context The parse tree.
	 */
	public function enterElemento(Context\ElementoContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::elemento()}.
	 * @param $context The parse tree.
	 */
	public function exitElemento(Context\ElementoContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::tipos()}.
	 * @param $context The parse tree.
	 */
	public function enterTipos(Context\TiposContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::tipos()}.
	 * @param $context The parse tree.
	 */
	public function exitTipos(Context\TiposContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::tipoBase()}.
	 * @param $context The parse tree.
	 */
	public function enterTipoBase(Context\TipoBaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::tipoBase()}.
	 * @param $context The parse tree.
	 */
	public function exitTipoBase(Context\TipoBaseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::simboloAsignacion()}.
	 * @param $context The parse tree.
	 */
	public function enterSimboloAsignacion(Context\SimboloAsignacionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::simboloAsignacion()}.
	 * @param $context The parse tree.
	 */
	public function exitSimboloAsignacion(Context\SimboloAsignacionContext $context): void;
}