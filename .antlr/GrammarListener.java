// Generated from /home/josegar/Escritorio/p2compi/Grammar.g4 by ANTLR 4.13.1
import org.antlr.v4.runtime.tree.ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@link GrammarParser}.
 */
public interface GrammarListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@link GrammarParser#programa}.
	 * @param ctx the parse tree
	 */
	void enterPrograma(GrammarParser.ProgramaContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#programa}.
	 * @param ctx the parse tree
	 */
	void exitPrograma(GrammarParser.ProgramaContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#topLevel}.
	 * @param ctx the parse tree
	 */
	void enterTopLevel(GrammarParser.TopLevelContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#topLevel}.
	 * @param ctx the parse tree
	 */
	void exitTopLevel(GrammarParser.TopLevelContext ctx);
	/**
	 * Enter a parse tree produced by the {@code BloqueMain}
	 * labeled alternative in {@link GrammarParser#mainFuncion}.
	 * @param ctx the parse tree
	 */
	void enterBloqueMain(GrammarParser.BloqueMainContext ctx);
	/**
	 * Exit a parse tree produced by the {@code BloqueMain}
	 * labeled alternative in {@link GrammarParser#mainFuncion}.
	 * @param ctx the parse tree
	 */
	void exitBloqueMain(GrammarParser.BloqueMainContext ctx);
	/**
	 * Enter a parse tree produced by the {@code FuncionImprimir}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterFuncionImprimir(GrammarParser.FuncionImprimirContext ctx);
	/**
	 * Exit a parse tree produced by the {@code FuncionImprimir}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitFuncionImprimir(GrammarParser.FuncionImprimirContext ctx);
	/**
	 * Enter a parse tree produced by the {@code Declaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterDeclaration(GrammarParser.DeclarationContext ctx);
	/**
	 * Exit a parse tree produced by the {@code Declaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitDeclaration(GrammarParser.DeclarationContext ctx);
	/**
	 * Enter a parse tree produced by the {@code ShortDeclaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterShortDeclaration(GrammarParser.ShortDeclarationContext ctx);
	/**
	 * Exit a parse tree produced by the {@code ShortDeclaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitShortDeclaration(GrammarParser.ShortDeclarationContext ctx);
	/**
	 * Enter a parse tree produced by the {@code ConstDeclaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterConstDeclaration(GrammarParser.ConstDeclarationContext ctx);
	/**
	 * Exit a parse tree produced by the {@code ConstDeclaration}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitConstDeclaration(GrammarParser.ConstDeclarationContext ctx);
	/**
	 * Enter a parse tree produced by the {@code Asignation}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterAsignation(GrammarParser.AsignationContext ctx);
	/**
	 * Exit a parse tree produced by the {@code Asignation}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitAsignation(GrammarParser.AsignationContext ctx);
	/**
	 * Enter a parse tree produced by the {@code IfSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterIfSentencia(GrammarParser.IfSentenciaContext ctx);
	/**
	 * Exit a parse tree produced by the {@code IfSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitIfSentencia(GrammarParser.IfSentenciaContext ctx);
	/**
	 * Enter a parse tree produced by the {@code SwitchSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterSwitchSentencia(GrammarParser.SwitchSentenciaContext ctx);
	/**
	 * Exit a parse tree produced by the {@code SwitchSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitSwitchSentencia(GrammarParser.SwitchSentenciaContext ctx);
	/**
	 * Enter a parse tree produced by the {@code ForSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterForSentencia(GrammarParser.ForSentenciaContext ctx);
	/**
	 * Exit a parse tree produced by the {@code ForSentencia}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitForSentencia(GrammarParser.ForSentenciaContext ctx);
	/**
	 * Enter a parse tree produced by the {@code IncDec}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterIncDec(GrammarParser.IncDecContext ctx);
	/**
	 * Exit a parse tree produced by the {@code IncDec}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitIncDec(GrammarParser.IncDecContext ctx);
	/**
	 * Enter a parse tree produced by the {@code DFunction}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterDFunction(GrammarParser.DFunctionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code DFunction}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitDFunction(GrammarParser.DFunctionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code SentenciaReturn}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaReturn(GrammarParser.SentenciaReturnContext ctx);
	/**
	 * Exit a parse tree produced by the {@code SentenciaReturn}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaReturn(GrammarParser.SentenciaReturnContext ctx);
	/**
	 * Enter a parse tree produced by the {@code LlamarFuncion}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterLlamarFuncion(GrammarParser.LlamarFuncionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code LlamarFuncion}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitLlamarFuncion(GrammarParser.LlamarFuncionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code prueba}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterPrueba(GrammarParser.PruebaContext ctx);
	/**
	 * Exit a parse tree produced by the {@code prueba}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitPrueba(GrammarParser.PruebaContext ctx);
	/**
	 * Enter a parse tree produced by the {@code SentenciaContinue}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaContinue(GrammarParser.SentenciaContinueContext ctx);
	/**
	 * Exit a parse tree produced by the {@code SentenciaContinue}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaContinue(GrammarParser.SentenciaContinueContext ctx);
	/**
	 * Enter a parse tree produced by the {@code SentenciaBreak}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaBreak(GrammarParser.SentenciaBreakContext ctx);
	/**
	 * Exit a parse tree produced by the {@code SentenciaBreak}
	 * labeled alternative in {@link GrammarParser#i}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaBreak(GrammarParser.SentenciaBreakContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#funcLen}.
	 * @param ctx the parse tree
	 */
	void enterFuncLen(GrammarParser.FuncLenContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#funcLen}.
	 * @param ctx the parse tree
	 */
	void exitFuncLen(GrammarParser.FuncLenContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#funcNow}.
	 * @param ctx the parse tree
	 */
	void enterFuncNow(GrammarParser.FuncNowContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#funcNow}.
	 * @param ctx the parse tree
	 */
	void exitFuncNow(GrammarParser.FuncNowContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#funcSub}.
	 * @param ctx the parse tree
	 */
	void enterFuncSub(GrammarParser.FuncSubContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#funcSub}.
	 * @param ctx the parse tree
	 */
	void exitFuncSub(GrammarParser.FuncSubContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#funcType}.
	 * @param ctx the parse tree
	 */
	void enterFuncType(GrammarParser.FuncTypeContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#funcType}.
	 * @param ctx the parse tree
	 */
	void exitFuncType(GrammarParser.FuncTypeContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#llamadaFuncion}.
	 * @param ctx the parse tree
	 */
	void enterLlamadaFuncion(GrammarParser.LlamadaFuncionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#llamadaFuncion}.
	 * @param ctx the parse tree
	 */
	void exitLlamadaFuncion(GrammarParser.LlamadaFuncionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#argumento}.
	 * @param ctx the parse tree
	 */
	void enterArgumento(GrammarParser.ArgumentoContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#argumento}.
	 * @param ctx the parse tree
	 */
	void exitArgumento(GrammarParser.ArgumentoContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#retornar}.
	 * @param ctx the parse tree
	 */
	void enterRetornar(GrammarParser.RetornarContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#retornar}.
	 * @param ctx the parse tree
	 */
	void exitRetornar(GrammarParser.RetornarContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#funcion}.
	 * @param ctx the parse tree
	 */
	void enterFuncion(GrammarParser.FuncionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#funcion}.
	 * @param ctx the parse tree
	 */
	void exitFuncion(GrammarParser.FuncionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#listaRetorno}.
	 * @param ctx the parse tree
	 */
	void enterListaRetorno(GrammarParser.ListaRetornoContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#listaRetorno}.
	 * @param ctx the parse tree
	 */
	void exitListaRetorno(GrammarParser.ListaRetornoContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#listaParametros}.
	 * @param ctx the parse tree
	 */
	void enterListaParametros(GrammarParser.ListaParametrosContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#listaParametros}.
	 * @param ctx the parse tree
	 */
	void exitListaParametros(GrammarParser.ListaParametrosContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#parametro}.
	 * @param ctx the parse tree
	 */
	void enterParametro(GrammarParser.ParametroContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#parametro}.
	 * @param ctx the parse tree
	 */
	void exitParametro(GrammarParser.ParametroContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#sentenciaFor}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaFor(GrammarParser.SentenciaForContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#sentenciaFor}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaFor(GrammarParser.SentenciaForContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#forClasico}.
	 * @param ctx the parse tree
	 */
	void enterForClasico(GrammarParser.ForClasicoContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#forClasico}.
	 * @param ctx the parse tree
	 */
	void exitForClasico(GrammarParser.ForClasicoContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#condFor}.
	 * @param ctx the parse tree
	 */
	void enterCondFor(GrammarParser.CondForContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#condFor}.
	 * @param ctx the parse tree
	 */
	void exitCondFor(GrammarParser.CondForContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#expFor}.
	 * @param ctx the parse tree
	 */
	void enterExpFor(GrammarParser.ExpForContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#expFor}.
	 * @param ctx the parse tree
	 */
	void exitExpFor(GrammarParser.ExpForContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#sentenciaSwitch}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaSwitch(GrammarParser.SentenciaSwitchContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#sentenciaSwitch}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaSwitch(GrammarParser.SentenciaSwitchContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#bloqueSwitch}.
	 * @param ctx the parse tree
	 */
	void enterBloqueSwitch(GrammarParser.BloqueSwitchContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#bloqueSwitch}.
	 * @param ctx the parse tree
	 */
	void exitBloqueSwitch(GrammarParser.BloqueSwitchContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#bloqueCase}.
	 * @param ctx the parse tree
	 */
	void enterBloqueCase(GrammarParser.BloqueCaseContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#bloqueCase}.
	 * @param ctx the parse tree
	 */
	void exitBloqueCase(GrammarParser.BloqueCaseContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#bloqueDefault}.
	 * @param ctx the parse tree
	 */
	void enterBloqueDefault(GrammarParser.BloqueDefaultContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#bloqueDefault}.
	 * @param ctx the parse tree
	 */
	void exitBloqueDefault(GrammarParser.BloqueDefaultContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#sentenciaIf}.
	 * @param ctx the parse tree
	 */
	void enterSentenciaIf(GrammarParser.SentenciaIfContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#sentenciaIf}.
	 * @param ctx the parse tree
	 */
	void exitSentenciaIf(GrammarParser.SentenciaIfContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#bloque}.
	 * @param ctx the parse tree
	 */
	void enterBloque(GrammarParser.BloqueContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#bloque}.
	 * @param ctx the parse tree
	 */
	void exitBloque(GrammarParser.BloqueContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#asignacion}.
	 * @param ctx the parse tree
	 */
	void enterAsignacion(GrammarParser.AsignacionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#asignacion}.
	 * @param ctx the parse tree
	 */
	void exitAsignacion(GrammarParser.AsignacionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#lValue}.
	 * @param ctx the parse tree
	 */
	void enterLValue(GrammarParser.LValueContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#lValue}.
	 * @param ctx the parse tree
	 */
	void exitLValue(GrammarParser.LValueContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#imprimir}.
	 * @param ctx the parse tree
	 */
	void enterImprimir(GrammarParser.ImprimirContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#imprimir}.
	 * @param ctx the parse tree
	 */
	void exitImprimir(GrammarParser.ImprimirContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#declaracion}.
	 * @param ctx the parse tree
	 */
	void enterDeclaracion(GrammarParser.DeclaracionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#declaracion}.
	 * @param ctx the parse tree
	 */
	void exitDeclaracion(GrammarParser.DeclaracionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#declaracionCorta}.
	 * @param ctx the parse tree
	 */
	void enterDeclaracionCorta(GrammarParser.DeclaracionCortaContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#declaracionCorta}.
	 * @param ctx the parse tree
	 */
	void exitDeclaracionCorta(GrammarParser.DeclaracionCortaContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#declaracionConst}.
	 * @param ctx the parse tree
	 */
	void enterDeclaracionConst(GrammarParser.DeclaracionConstContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#declaracionConst}.
	 * @param ctx the parse tree
	 */
	void exitDeclaracionConst(GrammarParser.DeclaracionConstContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#listaExpr}.
	 * @param ctx the parse tree
	 */
	void enterListaExpr(GrammarParser.ListaExprContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#listaExpr}.
	 * @param ctx the parse tree
	 */
	void exitListaExpr(GrammarParser.ListaExprContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#listaId}.
	 * @param ctx the parse tree
	 */
	void enterListaId(GrammarParser.ListaIdContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#listaId}.
	 * @param ctx the parse tree
	 */
	void exitListaId(GrammarParser.ListaIdContext ctx);
	/**
	 * Enter a parse tree produced by the {@code LogicalExpression}
	 * labeled alternative in {@link GrammarParser#logExpr}.
	 * @param ctx the parse tree
	 */
	void enterLogicalExpression(GrammarParser.LogicalExpressionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code LogicalExpression}
	 * labeled alternative in {@link GrammarParser#logExpr}.
	 * @param ctx the parse tree
	 */
	void exitLogicalExpression(GrammarParser.LogicalExpressionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code toRelExpr}
	 * labeled alternative in {@link GrammarParser#logExpr}.
	 * @param ctx the parse tree
	 */
	void enterToRelExpr(GrammarParser.ToRelExprContext ctx);
	/**
	 * Exit a parse tree produced by the {@code toRelExpr}
	 * labeled alternative in {@link GrammarParser#logExpr}.
	 * @param ctx the parse tree
	 */
	void exitToRelExpr(GrammarParser.ToRelExprContext ctx);
	/**
	 * Enter a parse tree produced by the {@code ToExpr}
	 * labeled alternative in {@link GrammarParser#relExpr}.
	 * @param ctx the parse tree
	 */
	void enterToExpr(GrammarParser.ToExprContext ctx);
	/**
	 * Exit a parse tree produced by the {@code ToExpr}
	 * labeled alternative in {@link GrammarParser#relExpr}.
	 * @param ctx the parse tree
	 */
	void exitToExpr(GrammarParser.ToExprContext ctx);
	/**
	 * Enter a parse tree produced by the {@code RelationalExpresion}
	 * labeled alternative in {@link GrammarParser#relExpr}.
	 * @param ctx the parse tree
	 */
	void enterRelationalExpresion(GrammarParser.RelationalExpresionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code RelationalExpresion}
	 * labeled alternative in {@link GrammarParser#relExpr}.
	 * @param ctx the parse tree
	 */
	void exitRelationalExpresion(GrammarParser.RelationalExpresionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code toTerm}
	 * labeled alternative in {@link GrammarParser#expr}.
	 * @param ctx the parse tree
	 */
	void enterToTerm(GrammarParser.ToTermContext ctx);
	/**
	 * Exit a parse tree produced by the {@code toTerm}
	 * labeled alternative in {@link GrammarParser#expr}.
	 * @param ctx the parse tree
	 */
	void exitToTerm(GrammarParser.ToTermContext ctx);
	/**
	 * Enter a parse tree produced by the {@code BinaryExpressionT}
	 * labeled alternative in {@link GrammarParser#expr}.
	 * @param ctx the parse tree
	 */
	void enterBinaryExpressionT(GrammarParser.BinaryExpressionTContext ctx);
	/**
	 * Exit a parse tree produced by the {@code BinaryExpressionT}
	 * labeled alternative in {@link GrammarParser#expr}.
	 * @param ctx the parse tree
	 */
	void exitBinaryExpressionT(GrammarParser.BinaryExpressionTContext ctx);
	/**
	 * Enter a parse tree produced by the {@code BinaryExpressionS}
	 * labeled alternative in {@link GrammarParser#term}.
	 * @param ctx the parse tree
	 */
	void enterBinaryExpressionS(GrammarParser.BinaryExpressionSContext ctx);
	/**
	 * Exit a parse tree produced by the {@code BinaryExpressionS}
	 * labeled alternative in {@link GrammarParser#term}.
	 * @param ctx the parse tree
	 */
	void exitBinaryExpressionS(GrammarParser.BinaryExpressionSContext ctx);
	/**
	 * Enter a parse tree produced by the {@code toFactor}
	 * labeled alternative in {@link GrammarParser#term}.
	 * @param ctx the parse tree
	 */
	void enterToFactor(GrammarParser.ToFactorContext ctx);
	/**
	 * Exit a parse tree produced by the {@code toFactor}
	 * labeled alternative in {@link GrammarParser#term}.
	 * @param ctx the parse tree
	 */
	void exitToFactor(GrammarParser.ToFactorContext ctx);
	/**
	 * Enter a parse tree produced by the {@code Identifier}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterIdentifier(GrammarParser.IdentifierContext ctx);
	/**
	 * Exit a parse tree produced by the {@code Identifier}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitIdentifier(GrammarParser.IdentifierContext ctx);
	/**
	 * Enter a parse tree produced by the {@code NowFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterNowFunc(GrammarParser.NowFuncContext ctx);
	/**
	 * Exit a parse tree produced by the {@code NowFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitNowFunc(GrammarParser.NowFuncContext ctx);
	/**
	 * Enter a parse tree produced by the {@code SubFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterSubFunc(GrammarParser.SubFuncContext ctx);
	/**
	 * Exit a parse tree produced by the {@code SubFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitSubFunc(GrammarParser.SubFuncContext ctx);
	/**
	 * Enter a parse tree produced by the {@code UnaryExpression}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterUnaryExpression(GrammarParser.UnaryExpressionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code UnaryExpression}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitUnaryExpression(GrammarParser.UnaryExpressionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code TypeFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterTypeFunc(GrammarParser.TypeFuncContext ctx);
	/**
	 * Exit a parse tree produced by the {@code TypeFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitTypeFunc(GrammarParser.TypeFuncContext ctx);
	/**
	 * Enter a parse tree produced by the {@code GroupedExpression}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterGroupedExpression(GrammarParser.GroupedExpressionContext ctx);
	/**
	 * Exit a parse tree produced by the {@code GroupedExpression}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitGroupedExpression(GrammarParser.GroupedExpressionContext ctx);
	/**
	 * Enter a parse tree produced by the {@code LenFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterLenFunc(GrammarParser.LenFuncContext ctx);
	/**
	 * Exit a parse tree produced by the {@code LenFunc}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitLenFunc(GrammarParser.LenFuncContext ctx);
	/**
	 * Enter a parse tree produced by the {@code literalValue}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterLiteralValue(GrammarParser.LiteralValueContext ctx);
	/**
	 * Exit a parse tree produced by the {@code literalValue}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitLiteralValue(GrammarParser.LiteralValueContext ctx);
	/**
	 * Enter a parse tree produced by the {@code LlamarFuncionF}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterLlamarFuncionF(GrammarParser.LlamarFuncionFContext ctx);
	/**
	 * Exit a parse tree produced by the {@code LlamarFuncionF}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitLlamarFuncionF(GrammarParser.LlamarFuncionFContext ctx);
	/**
	 * Enter a parse tree produced by the {@code ArregloAcceso}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void enterArregloAcceso(GrammarParser.ArregloAccesoContext ctx);
	/**
	 * Exit a parse tree produced by the {@code ArregloAcceso}
	 * labeled alternative in {@link GrammarParser#factor}.
	 * @param ctx the parse tree
	 */
	void exitArregloAcceso(GrammarParser.ArregloAccesoContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#literal}.
	 * @param ctx the parse tree
	 */
	void enterLiteral(GrammarParser.LiteralContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#literal}.
	 * @param ctx the parse tree
	 */
	void exitLiteral(GrammarParser.LiteralContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#arrayLiteral}.
	 * @param ctx the parse tree
	 */
	void enterArrayLiteral(GrammarParser.ArrayLiteralContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#arrayLiteral}.
	 * @param ctx the parse tree
	 */
	void exitArrayLiteral(GrammarParser.ArrayLiteralContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#listaElementos}.
	 * @param ctx the parse tree
	 */
	void enterListaElementos(GrammarParser.ListaElementosContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#listaElementos}.
	 * @param ctx the parse tree
	 */
	void exitListaElementos(GrammarParser.ListaElementosContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#elemento}.
	 * @param ctx the parse tree
	 */
	void enterElemento(GrammarParser.ElementoContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#elemento}.
	 * @param ctx the parse tree
	 */
	void exitElemento(GrammarParser.ElementoContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#tipos}.
	 * @param ctx the parse tree
	 */
	void enterTipos(GrammarParser.TiposContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#tipos}.
	 * @param ctx the parse tree
	 */
	void exitTipos(GrammarParser.TiposContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#tipoBase}.
	 * @param ctx the parse tree
	 */
	void enterTipoBase(GrammarParser.TipoBaseContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#tipoBase}.
	 * @param ctx the parse tree
	 */
	void exitTipoBase(GrammarParser.TipoBaseContext ctx);
	/**
	 * Enter a parse tree produced by {@link GrammarParser#simboloAsignacion}.
	 * @param ctx the parse tree
	 */
	void enterSimboloAsignacion(GrammarParser.SimboloAsignacionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GrammarParser#simboloAsignacion}.
	 * @param ctx the parse tree
	 */
	void exitSimboloAsignacion(GrammarParser.SimboloAsignacionContext ctx);
}