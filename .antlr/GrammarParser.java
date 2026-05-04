// Generated from /home/josegar/Escritorio/p2compi/Grammar.g4 by ANTLR 4.13.1
import org.antlr.v4.runtime.atn.*;
import org.antlr.v4.runtime.dfa.DFA;
import org.antlr.v4.runtime.*;
import org.antlr.v4.runtime.misc.*;
import org.antlr.v4.runtime.tree.*;
import java.util.List;
import java.util.Iterator;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked", "unused", "cast", "CheckReturnValue"})
public class GrammarParser extends Parser {
	static { RuntimeMetaData.checkVersion("4.13.1", RuntimeMetaData.VERSION); }

	protected static final DFA[] _decisionToDFA;
	protected static final PredictionContextCache _sharedContextCache =
		new PredictionContextCache();
	public static final int
		FUNC=1, MAIN=2, VAR=3, FMT=4, PRINTLN=5, CONST=6, IF=7, ELSE=8, SWITCH=9, 
		CASE=10, DEFAULT=11, FOR=12, BREAK=13, CONTINUE=14, RETURN=15, LEN=16, 
		NOW=17, SUBSTR=18, TYPEOF=19, INT_T=20, FLOAT_T=21, BOOL_T=22, RUNE_T=23, 
		STRING_T=24, LBRACE=25, RBRACE=26, LPAREN=27, RPAREN=28, LCOR=29, RCOR=30, 
		COMMA=31, ASSIGN=32, COLON=33, SEMICOLON=34, PLUS=35, MINUS=36, NEG=37, 
		MULT=38, DIV=39, MOD=40, DOT=41, REF=42, ANDO=43, ORO=44, LE=45, GE=46, 
		EQUAL=47, NEQUAL=48, LESS=49, GREATER=50, BOOL=51, NIL=52, ENTERO=53, 
		FLOAT=54, STR=55, RUNE=56, IDENTIFICADOR=57, COMENTARIO_LINEA=58, COMENTARIO_BLOQUE=59, 
		WS=60, ERROR=61;
	public static final int
		RULE_programa = 0, RULE_topLevel = 1, RULE_mainFuncion = 2, RULE_i = 3, 
		RULE_funcLen = 4, RULE_funcNow = 5, RULE_funcSub = 6, RULE_funcType = 7, 
		RULE_llamadaFuncion = 8, RULE_argumento = 9, RULE_retornar = 10, RULE_funcion = 11, 
		RULE_listaRetorno = 12, RULE_listaParametros = 13, RULE_parametro = 14, 
		RULE_sentenciaFor = 15, RULE_forClasico = 16, RULE_condFor = 17, RULE_expFor = 18, 
		RULE_sentenciaSwitch = 19, RULE_bloqueSwitch = 20, RULE_bloqueCase = 21, 
		RULE_bloqueDefault = 22, RULE_sentenciaIf = 23, RULE_bloque = 24, RULE_asignacion = 25, 
		RULE_lValue = 26, RULE_imprimir = 27, RULE_declaracion = 28, RULE_declaracionCorta = 29, 
		RULE_declaracionConst = 30, RULE_listaExpr = 31, RULE_listaId = 32, RULE_logExpr = 33, 
		RULE_relExpr = 34, RULE_expr = 35, RULE_term = 36, RULE_factor = 37, RULE_literal = 38, 
		RULE_arrayLiteral = 39, RULE_listaElementos = 40, RULE_elemento = 41, 
		RULE_tipos = 42, RULE_tipoBase = 43, RULE_simboloAsignacion = 44;
	private static String[] makeRuleNames() {
		return new String[] {
			"programa", "topLevel", "mainFuncion", "i", "funcLen", "funcNow", "funcSub", 
			"funcType", "llamadaFuncion", "argumento", "retornar", "funcion", "listaRetorno", 
			"listaParametros", "parametro", "sentenciaFor", "forClasico", "condFor", 
			"expFor", "sentenciaSwitch", "bloqueSwitch", "bloqueCase", "bloqueDefault", 
			"sentenciaIf", "bloque", "asignacion", "lValue", "imprimir", "declaracion", 
			"declaracionCorta", "declaracionConst", "listaExpr", "listaId", "logExpr", 
			"relExpr", "expr", "term", "factor", "literal", "arrayLiteral", "listaElementos", 
			"elemento", "tipos", "tipoBase", "simboloAsignacion"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'func'", "'main'", "'var'", "'fmt'", "'Println'", "'const'", "'if'", 
			"'else'", "'switch'", "'case'", "'default'", "'for'", "'break'", "'continue'", 
			"'return'", "'len'", "'now'", "'substr'", "'typeOf'", null, null, "'bool'", 
			"'rune'", "'string'", "'{'", "'}'", "'('", "')'", "'['", "']'", "','", 
			"'='", "':'", "';'", "'+'", "'-'", "'!'", "'*'", "'/'", "'%'", "'.'", 
			"'&'", "'&&'", "'||'", "'<='", "'>='", "'=='", "'!='", "'<'", "'>'", 
			null, "'nil'"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, "FUNC", "MAIN", "VAR", "FMT", "PRINTLN", "CONST", "IF", "ELSE", 
			"SWITCH", "CASE", "DEFAULT", "FOR", "BREAK", "CONTINUE", "RETURN", "LEN", 
			"NOW", "SUBSTR", "TYPEOF", "INT_T", "FLOAT_T", "BOOL_T", "RUNE_T", "STRING_T", 
			"LBRACE", "RBRACE", "LPAREN", "RPAREN", "LCOR", "RCOR", "COMMA", "ASSIGN", 
			"COLON", "SEMICOLON", "PLUS", "MINUS", "NEG", "MULT", "DIV", "MOD", "DOT", 
			"REF", "ANDO", "ORO", "LE", "GE", "EQUAL", "NEQUAL", "LESS", "GREATER", 
			"BOOL", "NIL", "ENTERO", "FLOAT", "STR", "RUNE", "IDENTIFICADOR", "COMENTARIO_LINEA", 
			"COMENTARIO_BLOQUE", "WS", "ERROR"
		};
	}
	private static final String[] _SYMBOLIC_NAMES = makeSymbolicNames();
	public static final Vocabulary VOCABULARY = new VocabularyImpl(_LITERAL_NAMES, _SYMBOLIC_NAMES);

	/**
	 * @deprecated Use {@link #VOCABULARY} instead.
	 */
	@Deprecated
	public static final String[] tokenNames;
	static {
		tokenNames = new String[_SYMBOLIC_NAMES.length];
		for (int i = 0; i < tokenNames.length; i++) {
			tokenNames[i] = VOCABULARY.getLiteralName(i);
			if (tokenNames[i] == null) {
				tokenNames[i] = VOCABULARY.getSymbolicName(i);
			}

			if (tokenNames[i] == null) {
				tokenNames[i] = "<INVALID>";
			}
		}
	}

	@Override
	@Deprecated
	public String[] getTokenNames() {
		return tokenNames;
	}

	@Override

	public Vocabulary getVocabulary() {
		return VOCABULARY;
	}

	@Override
	public String getGrammarFileName() { return "Grammar.g4"; }

	@Override
	public String[] getRuleNames() { return ruleNames; }

	@Override
	public String getSerializedATN() { return _serializedATN; }

	@Override
	public ATN getATN() { return _ATN; }

	public GrammarParser(TokenStream input) {
		super(input);
		_interp = new ParserATNSimulator(this,_ATN,_decisionToDFA,_sharedContextCache);
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ProgramaContext extends ParserRuleContext {
		public TerminalNode EOF() { return getToken(GrammarParser.EOF, 0); }
		public List<TopLevelContext> topLevel() {
			return getRuleContexts(TopLevelContext.class);
		}
		public TopLevelContext topLevel(int i) {
			return getRuleContext(TopLevelContext.class,i);
		}
		public ProgramaContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_programa; }
	}

	public final ProgramaContext programa() throws RecognitionException {
		ProgramaContext _localctx = new ProgramaContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_programa);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(93);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 74L) != 0)) {
				{
				{
				setState(90);
				topLevel();
				}
				}
				setState(95);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(96);
			match(EOF);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TopLevelContext extends ParserRuleContext {
		public FuncionContext funcion() {
			return getRuleContext(FuncionContext.class,0);
		}
		public MainFuncionContext mainFuncion() {
			return getRuleContext(MainFuncionContext.class,0);
		}
		public DeclaracionContext declaracion() {
			return getRuleContext(DeclaracionContext.class,0);
		}
		public DeclaracionConstContext declaracionConst() {
			return getRuleContext(DeclaracionConstContext.class,0);
		}
		public TopLevelContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_topLevel; }
	}

	public final TopLevelContext topLevel() throws RecognitionException {
		TopLevelContext _localctx = new TopLevelContext(_ctx, getState());
		enterRule(_localctx, 2, RULE_topLevel);
		try {
			setState(102);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,1,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(98);
				funcion();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(99);
				mainFuncion();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(100);
				declaracion();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(101);
				declaracionConst();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class MainFuncionContext extends ParserRuleContext {
		public MainFuncionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_mainFuncion; }
	 
		public MainFuncionContext() { }
		public void copyFrom(MainFuncionContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class BloqueMainContext extends MainFuncionContext {
		public TerminalNode FUNC() { return getToken(GrammarParser.FUNC, 0); }
		public TerminalNode MAIN() { return getToken(GrammarParser.MAIN, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public BloqueContext bloque() {
			return getRuleContext(BloqueContext.class,0);
		}
		public BloqueMainContext(MainFuncionContext ctx) { copyFrom(ctx); }
	}

	public final MainFuncionContext mainFuncion() throws RecognitionException {
		MainFuncionContext _localctx = new MainFuncionContext(_ctx, getState());
		enterRule(_localctx, 4, RULE_mainFuncion);
		try {
			_localctx = new BloqueMainContext(_localctx);
			enterOuterAlt(_localctx, 1);
			{
			setState(104);
			match(FUNC);
			setState(105);
			match(MAIN);
			setState(106);
			match(LPAREN);
			setState(107);
			match(RPAREN);
			setState(108);
			bloque();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class IContext extends ParserRuleContext {
		public IContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_i; }
	 
		public IContext() { }
		public void copyFrom(IContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class IncDecContext extends IContext {
		public ExpForContext expFor() {
			return getRuleContext(ExpForContext.class,0);
		}
		public IncDecContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class PruebaContext extends IContext {
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public PruebaContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class FuncionImprimirContext extends IContext {
		public ImprimirContext imprimir() {
			return getRuleContext(ImprimirContext.class,0);
		}
		public FuncionImprimirContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ForSentenciaContext extends IContext {
		public SentenciaForContext sentenciaFor() {
			return getRuleContext(SentenciaForContext.class,0);
		}
		public ForSentenciaContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class DFunctionContext extends IContext {
		public FuncionContext funcion() {
			return getRuleContext(FuncionContext.class,0);
		}
		public DFunctionContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class SwitchSentenciaContext extends IContext {
		public SentenciaSwitchContext sentenciaSwitch() {
			return getRuleContext(SentenciaSwitchContext.class,0);
		}
		public SwitchSentenciaContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ShortDeclarationContext extends IContext {
		public DeclaracionCortaContext declaracionCorta() {
			return getRuleContext(DeclaracionCortaContext.class,0);
		}
		public ShortDeclarationContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ConstDeclarationContext extends IContext {
		public DeclaracionConstContext declaracionConst() {
			return getRuleContext(DeclaracionConstContext.class,0);
		}
		public ConstDeclarationContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaReturnContext extends IContext {
		public RetornarContext retornar() {
			return getRuleContext(RetornarContext.class,0);
		}
		public SentenciaReturnContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class AsignationContext extends IContext {
		public AsignacionContext asignacion() {
			return getRuleContext(AsignacionContext.class,0);
		}
		public AsignationContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaBreakContext extends IContext {
		public TerminalNode BREAK() { return getToken(GrammarParser.BREAK, 0); }
		public SentenciaBreakContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaContinueContext extends IContext {
		public TerminalNode CONTINUE() { return getToken(GrammarParser.CONTINUE, 0); }
		public SentenciaContinueContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class LlamarFuncionContext extends IContext {
		public LlamadaFuncionContext llamadaFuncion() {
			return getRuleContext(LlamadaFuncionContext.class,0);
		}
		public LlamarFuncionContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class DeclarationContext extends IContext {
		public DeclaracionContext declaracion() {
			return getRuleContext(DeclaracionContext.class,0);
		}
		public DeclarationContext(IContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class IfSentenciaContext extends IContext {
		public SentenciaIfContext sentenciaIf() {
			return getRuleContext(SentenciaIfContext.class,0);
		}
		public IfSentenciaContext(IContext ctx) { copyFrom(ctx); }
	}

	public final IContext i() throws RecognitionException {
		IContext _localctx = new IContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_i);
		try {
			setState(125);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,2,_ctx) ) {
			case 1:
				_localctx = new FuncionImprimirContext(_localctx);
				enterOuterAlt(_localctx, 1);
				{
				setState(110);
				imprimir();
				}
				break;
			case 2:
				_localctx = new DeclarationContext(_localctx);
				enterOuterAlt(_localctx, 2);
				{
				setState(111);
				declaracion();
				}
				break;
			case 3:
				_localctx = new ShortDeclarationContext(_localctx);
				enterOuterAlt(_localctx, 3);
				{
				setState(112);
				declaracionCorta();
				}
				break;
			case 4:
				_localctx = new ConstDeclarationContext(_localctx);
				enterOuterAlt(_localctx, 4);
				{
				setState(113);
				declaracionConst();
				}
				break;
			case 5:
				_localctx = new AsignationContext(_localctx);
				enterOuterAlt(_localctx, 5);
				{
				setState(114);
				asignacion();
				}
				break;
			case 6:
				_localctx = new IfSentenciaContext(_localctx);
				enterOuterAlt(_localctx, 6);
				{
				setState(115);
				sentenciaIf();
				}
				break;
			case 7:
				_localctx = new SwitchSentenciaContext(_localctx);
				enterOuterAlt(_localctx, 7);
				{
				setState(116);
				sentenciaSwitch();
				}
				break;
			case 8:
				_localctx = new ForSentenciaContext(_localctx);
				enterOuterAlt(_localctx, 8);
				{
				setState(117);
				sentenciaFor();
				}
				break;
			case 9:
				_localctx = new IncDecContext(_localctx);
				enterOuterAlt(_localctx, 9);
				{
				setState(118);
				expFor();
				}
				break;
			case 10:
				_localctx = new DFunctionContext(_localctx);
				enterOuterAlt(_localctx, 10);
				{
				setState(119);
				funcion();
				}
				break;
			case 11:
				_localctx = new SentenciaReturnContext(_localctx);
				enterOuterAlt(_localctx, 11);
				{
				setState(120);
				retornar();
				}
				break;
			case 12:
				_localctx = new LlamarFuncionContext(_localctx);
				enterOuterAlt(_localctx, 12);
				{
				setState(121);
				llamadaFuncion();
				}
				break;
			case 13:
				_localctx = new PruebaContext(_localctx);
				enterOuterAlt(_localctx, 13);
				{
				setState(122);
				logExpr(0);
				}
				break;
			case 14:
				_localctx = new SentenciaContinueContext(_localctx);
				enterOuterAlt(_localctx, 14);
				{
				setState(123);
				match(CONTINUE);
				}
				break;
			case 15:
				_localctx = new SentenciaBreakContext(_localctx);
				enterOuterAlt(_localctx, 15);
				{
				setState(124);
				match(BREAK);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FuncLenContext extends ParserRuleContext {
		public TerminalNode LEN() { return getToken(GrammarParser.LEN, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public FuncLenContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_funcLen; }
	}

	public final FuncLenContext funcLen() throws RecognitionException {
		FuncLenContext _localctx = new FuncLenContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_funcLen);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(127);
			match(LEN);
			setState(128);
			match(LPAREN);
			setState(129);
			logExpr(0);
			setState(130);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FuncNowContext extends ParserRuleContext {
		public TerminalNode NOW() { return getToken(GrammarParser.NOW, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public FuncNowContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_funcNow; }
	}

	public final FuncNowContext funcNow() throws RecognitionException {
		FuncNowContext _localctx = new FuncNowContext(_ctx, getState());
		enterRule(_localctx, 10, RULE_funcNow);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(132);
			match(NOW);
			setState(133);
			match(LPAREN);
			setState(134);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FuncSubContext extends ParserRuleContext {
		public TerminalNode SUBSTR() { return getToken(GrammarParser.SUBSTR, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public List<LogExprContext> logExpr() {
			return getRuleContexts(LogExprContext.class);
		}
		public LogExprContext logExpr(int i) {
			return getRuleContext(LogExprContext.class,i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public FuncSubContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_funcSub; }
	}

	public final FuncSubContext funcSub() throws RecognitionException {
		FuncSubContext _localctx = new FuncSubContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_funcSub);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(136);
			match(SUBSTR);
			setState(137);
			match(LPAREN);
			setState(138);
			logExpr(0);
			setState(139);
			match(COMMA);
			setState(140);
			logExpr(0);
			setState(141);
			match(COMMA);
			setState(142);
			logExpr(0);
			setState(143);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FuncTypeContext extends ParserRuleContext {
		public TerminalNode TYPEOF() { return getToken(GrammarParser.TYPEOF, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public FuncTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_funcType; }
	}

	public final FuncTypeContext funcType() throws RecognitionException {
		FuncTypeContext _localctx = new FuncTypeContext(_ctx, getState());
		enterRule(_localctx, 14, RULE_funcType);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(145);
			match(TYPEOF);
			setState(146);
			match(LPAREN);
			setState(147);
			logExpr(0);
			setState(148);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LlamadaFuncionContext extends ParserRuleContext {
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public LlamadaFuncionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_llamadaFuncion; }
	}

	public final LlamadaFuncionContext llamadaFuncion() throws RecognitionException {
		LlamadaFuncionContext _localctx = new LlamadaFuncionContext(_ctx, getState());
		enterRule(_localctx, 16, RULE_llamadaFuncion);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(150);
			match(IDENTIFICADOR);
			setState(151);
			match(LPAREN);
			setState(153);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 285983456125452288L) != 0)) {
				{
				setState(152);
				listaExpr();
				}
			}

			setState(155);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArgumentoContext extends ParserRuleContext {
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode REF() { return getToken(GrammarParser.REF, 0); }
		public ArgumentoContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_argumento; }
	}

	public final ArgumentoContext argumento() throws RecognitionException {
		ArgumentoContext _localctx = new ArgumentoContext(_ctx, getState());
		enterRule(_localctx, 18, RULE_argumento);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(158);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,4,_ctx) ) {
			case 1:
				{
				setState(157);
				match(REF);
				}
				break;
			}
			setState(160);
			logExpr(0);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class RetornarContext extends ParserRuleContext {
		public TerminalNode RETURN() { return getToken(GrammarParser.RETURN, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public RetornarContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_retornar; }
	}

	public final RetornarContext retornar() throws RecognitionException {
		RetornarContext _localctx = new RetornarContext(_ctx, getState());
		enterRule(_localctx, 20, RULE_retornar);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(162);
			match(RETURN);
			setState(164);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,5,_ctx) ) {
			case 1:
				{
				setState(163);
				listaExpr();
				}
				break;
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FuncionContext extends ParserRuleContext {
		public TerminalNode FUNC() { return getToken(GrammarParser.FUNC, 0); }
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public List<TerminalNode> LPAREN() { return getTokens(GrammarParser.LPAREN); }
		public TerminalNode LPAREN(int i) {
			return getToken(GrammarParser.LPAREN, i);
		}
		public List<TerminalNode> RPAREN() { return getTokens(GrammarParser.RPAREN); }
		public TerminalNode RPAREN(int i) {
			return getToken(GrammarParser.RPAREN, i);
		}
		public ListaRetornoContext listaRetorno() {
			return getRuleContext(ListaRetornoContext.class,0);
		}
		public BloqueContext bloque() {
			return getRuleContext(BloqueContext.class,0);
		}
		public ListaParametrosContext listaParametros() {
			return getRuleContext(ListaParametrosContext.class,0);
		}
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public FuncionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_funcion; }
	}

	public final FuncionContext funcion() throws RecognitionException {
		FuncionContext _localctx = new FuncionContext(_ctx, getState());
		enterRule(_localctx, 22, RULE_funcion);
		int _la;
		try {
			setState(196);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,9,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(166);
				match(FUNC);
				setState(167);
				match(IDENTIFICADOR);
				setState(168);
				match(LPAREN);
				setState(170);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==IDENTIFICADOR) {
					{
					setState(169);
					listaParametros();
					}
				}

				setState(172);
				match(RPAREN);
				setState(173);
				match(LPAREN);
				setState(174);
				listaRetorno();
				setState(175);
				match(RPAREN);
				setState(176);
				bloque();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(178);
				match(FUNC);
				setState(179);
				match(IDENTIFICADOR);
				setState(180);
				match(LPAREN);
				setState(182);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==IDENTIFICADOR) {
					{
					setState(181);
					listaParametros();
					}
				}

				setState(184);
				match(RPAREN);
				setState(185);
				tipos();
				setState(186);
				bloque();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(188);
				match(FUNC);
				setState(189);
				match(IDENTIFICADOR);
				setState(190);
				match(LPAREN);
				setState(192);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==IDENTIFICADOR) {
					{
					setState(191);
					listaParametros();
					}
				}

				setState(194);
				match(RPAREN);
				setState(195);
				bloque();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ListaRetornoContext extends ParserRuleContext {
		public List<TiposContext> tipos() {
			return getRuleContexts(TiposContext.class);
		}
		public TiposContext tipos(int i) {
			return getRuleContext(TiposContext.class,i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public ListaRetornoContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_listaRetorno; }
	}

	public final ListaRetornoContext listaRetorno() throws RecognitionException {
		ListaRetornoContext _localctx = new ListaRetornoContext(_ctx, getState());
		enterRule(_localctx, 24, RULE_listaRetorno);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(198);
			tipos();
			setState(203);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMA) {
				{
				{
				setState(199);
				match(COMMA);
				setState(200);
				tipos();
				}
				}
				setState(205);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ListaParametrosContext extends ParserRuleContext {
		public List<ParametroContext> parametro() {
			return getRuleContexts(ParametroContext.class);
		}
		public ParametroContext parametro(int i) {
			return getRuleContext(ParametroContext.class,i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public ListaParametrosContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_listaParametros; }
	}

	public final ListaParametrosContext listaParametros() throws RecognitionException {
		ListaParametrosContext _localctx = new ListaParametrosContext(_ctx, getState());
		enterRule(_localctx, 26, RULE_listaParametros);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(206);
			parametro();
			setState(211);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMA) {
				{
				{
				setState(207);
				match(COMMA);
				setState(208);
				parametro();
				}
				}
				setState(213);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ParametroContext extends ParserRuleContext {
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public TerminalNode MULT() { return getToken(GrammarParser.MULT, 0); }
		public ParametroContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_parametro; }
	}

	public final ParametroContext parametro() throws RecognitionException {
		ParametroContext _localctx = new ParametroContext(_ctx, getState());
		enterRule(_localctx, 28, RULE_parametro);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(214);
			match(IDENTIFICADOR);
			setState(216);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==MULT) {
				{
				setState(215);
				match(MULT);
				}
			}

			setState(218);
			tipos();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaForContext extends ParserRuleContext {
		public TerminalNode FOR() { return getToken(GrammarParser.FOR, 0); }
		public ForClasicoContext forClasico() {
			return getRuleContext(ForClasicoContext.class,0);
		}
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public BloqueContext bloque() {
			return getRuleContext(BloqueContext.class,0);
		}
		public SentenciaForContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_sentenciaFor; }
	}

	public final SentenciaForContext sentenciaFor() throws RecognitionException {
		SentenciaForContext _localctx = new SentenciaForContext(_ctx, getState());
		enterRule(_localctx, 30, RULE_sentenciaFor);
		try {
			setState(228);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,13,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(220);
				match(FOR);
				setState(221);
				forClasico();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(222);
				match(FOR);
				setState(223);
				logExpr(0);
				setState(224);
				bloque();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(226);
				match(FOR);
				setState(227);
				bloque();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ForClasicoContext extends ParserRuleContext {
		public DeclaracionCortaContext declaracionCorta() {
			return getRuleContext(DeclaracionCortaContext.class,0);
		}
		public List<TerminalNode> SEMICOLON() { return getTokens(GrammarParser.SEMICOLON); }
		public TerminalNode SEMICOLON(int i) {
			return getToken(GrammarParser.SEMICOLON, i);
		}
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public CondForContext condFor() {
			return getRuleContext(CondForContext.class,0);
		}
		public BloqueContext bloque() {
			return getRuleContext(BloqueContext.class,0);
		}
		public ForClasicoContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_forClasico; }
	}

	public final ForClasicoContext forClasico() throws RecognitionException {
		ForClasicoContext _localctx = new ForClasicoContext(_ctx, getState());
		enterRule(_localctx, 32, RULE_forClasico);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(230);
			declaracionCorta();
			setState(231);
			match(SEMICOLON);
			setState(232);
			logExpr(0);
			setState(233);
			match(SEMICOLON);
			setState(234);
			condFor();
			setState(235);
			bloque();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class CondForContext extends ParserRuleContext {
		public ExpForContext expFor() {
			return getRuleContext(ExpForContext.class,0);
		}
		public AsignacionContext asignacion() {
			return getRuleContext(AsignacionContext.class,0);
		}
		public CondForContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_condFor; }
	}

	public final CondForContext condFor() throws RecognitionException {
		CondForContext _localctx = new CondForContext(_ctx, getState());
		enterRule(_localctx, 34, RULE_condFor);
		try {
			setState(239);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,14,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(237);
				expFor();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(238);
				asignacion();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExpForContext extends ParserRuleContext {
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public List<TerminalNode> PLUS() { return getTokens(GrammarParser.PLUS); }
		public TerminalNode PLUS(int i) {
			return getToken(GrammarParser.PLUS, i);
		}
		public List<TerminalNode> MINUS() { return getTokens(GrammarParser.MINUS); }
		public TerminalNode MINUS(int i) {
			return getToken(GrammarParser.MINUS, i);
		}
		public ExpForContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expFor; }
	}

	public final ExpForContext expFor() throws RecognitionException {
		ExpForContext _localctx = new ExpForContext(_ctx, getState());
		enterRule(_localctx, 36, RULE_expFor);
		try {
			setState(247);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,15,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(241);
				match(IDENTIFICADOR);
				setState(242);
				match(PLUS);
				setState(243);
				match(PLUS);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(244);
				match(IDENTIFICADOR);
				setState(245);
				match(MINUS);
				setState(246);
				match(MINUS);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaSwitchContext extends ParserRuleContext {
		public TerminalNode SWITCH() { return getToken(GrammarParser.SWITCH, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode LBRACE() { return getToken(GrammarParser.LBRACE, 0); }
		public BloqueSwitchContext bloqueSwitch() {
			return getRuleContext(BloqueSwitchContext.class,0);
		}
		public TerminalNode RBRACE() { return getToken(GrammarParser.RBRACE, 0); }
		public SentenciaSwitchContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_sentenciaSwitch; }
	}

	public final SentenciaSwitchContext sentenciaSwitch() throws RecognitionException {
		SentenciaSwitchContext _localctx = new SentenciaSwitchContext(_ctx, getState());
		enterRule(_localctx, 38, RULE_sentenciaSwitch);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(249);
			match(SWITCH);
			setState(250);
			logExpr(0);
			setState(251);
			match(LBRACE);
			setState(252);
			bloqueSwitch();
			setState(253);
			match(RBRACE);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BloqueSwitchContext extends ParserRuleContext {
		public List<BloqueCaseContext> bloqueCase() {
			return getRuleContexts(BloqueCaseContext.class);
		}
		public BloqueCaseContext bloqueCase(int i) {
			return getRuleContext(BloqueCaseContext.class,i);
		}
		public BloqueDefaultContext bloqueDefault() {
			return getRuleContext(BloqueDefaultContext.class,0);
		}
		public BloqueSwitchContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_bloqueSwitch; }
	}

	public final BloqueSwitchContext bloqueSwitch() throws RecognitionException {
		BloqueSwitchContext _localctx = new BloqueSwitchContext(_ctx, getState());
		enterRule(_localctx, 40, RULE_bloqueSwitch);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(256); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(255);
				bloqueCase();
				}
				}
				setState(258); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==CASE );
			setState(261);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==DEFAULT) {
				{
				setState(260);
				bloqueDefault();
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BloqueCaseContext extends ParserRuleContext {
		public TerminalNode CASE() { return getToken(GrammarParser.CASE, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public TerminalNode COLON() { return getToken(GrammarParser.COLON, 0); }
		public List<IContext> i() {
			return getRuleContexts(IContext.class);
		}
		public IContext i(int i) {
			return getRuleContext(IContext.class,i);
		}
		public BloqueCaseContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_bloqueCase; }
	}

	public final BloqueCaseContext bloqueCase() throws RecognitionException {
		BloqueCaseContext _localctx = new BloqueCaseContext(_ctx, getState());
		enterRule(_localctx, 42, RULE_bloqueCase);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(263);
			match(CASE);
			setState(264);
			listaExpr();
			setState(265);
			match(COLON);
			setState(269);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 285983456125514458L) != 0)) {
				{
				{
				setState(266);
				i();
				}
				}
				setState(271);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BloqueDefaultContext extends ParserRuleContext {
		public TerminalNode DEFAULT() { return getToken(GrammarParser.DEFAULT, 0); }
		public TerminalNode COLON() { return getToken(GrammarParser.COLON, 0); }
		public List<IContext> i() {
			return getRuleContexts(IContext.class);
		}
		public IContext i(int i) {
			return getRuleContext(IContext.class,i);
		}
		public BloqueDefaultContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_bloqueDefault; }
	}

	public final BloqueDefaultContext bloqueDefault() throws RecognitionException {
		BloqueDefaultContext _localctx = new BloqueDefaultContext(_ctx, getState());
		enterRule(_localctx, 44, RULE_bloqueDefault);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(272);
			match(DEFAULT);
			setState(273);
			match(COLON);
			setState(277);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 285983456125514458L) != 0)) {
				{
				{
				setState(274);
				i();
				}
				}
				setState(279);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SentenciaIfContext extends ParserRuleContext {
		public TerminalNode IF() { return getToken(GrammarParser.IF, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public List<BloqueContext> bloque() {
			return getRuleContexts(BloqueContext.class);
		}
		public BloqueContext bloque(int i) {
			return getRuleContext(BloqueContext.class,i);
		}
		public TerminalNode ELSE() { return getToken(GrammarParser.ELSE, 0); }
		public SentenciaIfContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_sentenciaIf; }
	}

	public final SentenciaIfContext sentenciaIf() throws RecognitionException {
		SentenciaIfContext _localctx = new SentenciaIfContext(_ctx, getState());
		enterRule(_localctx, 46, RULE_sentenciaIf);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(280);
			match(IF);
			setState(281);
			logExpr(0);
			setState(282);
			bloque();
			setState(285);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ELSE) {
				{
				setState(283);
				match(ELSE);
				setState(284);
				bloque();
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BloqueContext extends ParserRuleContext {
		public TerminalNode LBRACE() { return getToken(GrammarParser.LBRACE, 0); }
		public TerminalNode RBRACE() { return getToken(GrammarParser.RBRACE, 0); }
		public List<IContext> i() {
			return getRuleContexts(IContext.class);
		}
		public IContext i(int i) {
			return getRuleContext(IContext.class,i);
		}
		public List<TerminalNode> SEMICOLON() { return getTokens(GrammarParser.SEMICOLON); }
		public TerminalNode SEMICOLON(int i) {
			return getToken(GrammarParser.SEMICOLON, i);
		}
		public BloqueContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_bloque; }
	}

	public final BloqueContext bloque() throws RecognitionException {
		BloqueContext _localctx = new BloqueContext(_ctx, getState());
		enterRule(_localctx, 48, RULE_bloque);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(287);
			match(LBRACE);
			setState(294);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 285983456125514458L) != 0)) {
				{
				{
				setState(288);
				i();
				setState(290);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==SEMICOLON) {
					{
					setState(289);
					match(SEMICOLON);
					}
				}

				}
				}
				setState(296);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(297);
			match(RBRACE);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class AsignacionContext extends ParserRuleContext {
		public LValueContext lValue() {
			return getRuleContext(LValueContext.class,0);
		}
		public SimboloAsignacionContext simboloAsignacion() {
			return getRuleContext(SimboloAsignacionContext.class,0);
		}
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public AsignacionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_asignacion; }
	}

	public final AsignacionContext asignacion() throws RecognitionException {
		AsignacionContext _localctx = new AsignacionContext(_ctx, getState());
		enterRule(_localctx, 50, RULE_asignacion);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(299);
			lValue();
			setState(300);
			simboloAsignacion();
			setState(301);
			logExpr(0);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LValueContext extends ParserRuleContext {
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public FactorContext factor() {
			return getRuleContext(FactorContext.class,0);
		}
		public TerminalNode LCOR() { return getToken(GrammarParser.LCOR, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RCOR() { return getToken(GrammarParser.RCOR, 0); }
		public TerminalNode MULT() { return getToken(GrammarParser.MULT, 0); }
		public LValueContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_lValue; }
	}

	public final LValueContext lValue() throws RecognitionException {
		LValueContext _localctx = new LValueContext(_ctx, getState());
		enterRule(_localctx, 52, RULE_lValue);
		try {
			setState(311);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,23,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(303);
				match(IDENTIFICADOR);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(304);
				factor(0);
				setState(305);
				match(LCOR);
				setState(306);
				logExpr(0);
				setState(307);
				match(RCOR);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(309);
				match(MULT);
				setState(310);
				factor(0);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ImprimirContext extends ParserRuleContext {
		public TerminalNode FMT() { return getToken(GrammarParser.FMT, 0); }
		public TerminalNode DOT() { return getToken(GrammarParser.DOT, 0); }
		public TerminalNode PRINTLN() { return getToken(GrammarParser.PRINTLN, 0); }
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public ImprimirContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_imprimir; }
	}

	public final ImprimirContext imprimir() throws RecognitionException {
		ImprimirContext _localctx = new ImprimirContext(_ctx, getState());
		enterRule(_localctx, 54, RULE_imprimir);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(313);
			match(FMT);
			setState(314);
			match(DOT);
			setState(315);
			match(PRINTLN);
			setState(316);
			match(LPAREN);
			setState(317);
			listaExpr();
			setState(318);
			match(RPAREN);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class DeclaracionContext extends ParserRuleContext {
		public TerminalNode VAR() { return getToken(GrammarParser.VAR, 0); }
		public ListaIdContext listaId() {
			return getRuleContext(ListaIdContext.class,0);
		}
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public TerminalNode ASSIGN() { return getToken(GrammarParser.ASSIGN, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public DeclaracionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_declaracion; }
	}

	public final DeclaracionContext declaracion() throws RecognitionException {
		DeclaracionContext _localctx = new DeclaracionContext(_ctx, getState());
		enterRule(_localctx, 56, RULE_declaracion);
		try {
			setState(330);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,24,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(320);
				match(VAR);
				setState(321);
				listaId();
				setState(322);
				tipos();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(324);
				match(VAR);
				setState(325);
				listaId();
				setState(326);
				tipos();
				setState(327);
				match(ASSIGN);
				setState(328);
				listaExpr();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class DeclaracionCortaContext extends ParserRuleContext {
		public ListaIdContext listaId() {
			return getRuleContext(ListaIdContext.class,0);
		}
		public TerminalNode COLON() { return getToken(GrammarParser.COLON, 0); }
		public TerminalNode ASSIGN() { return getToken(GrammarParser.ASSIGN, 0); }
		public ListaExprContext listaExpr() {
			return getRuleContext(ListaExprContext.class,0);
		}
		public DeclaracionCortaContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_declaracionCorta; }
	}

	public final DeclaracionCortaContext declaracionCorta() throws RecognitionException {
		DeclaracionCortaContext _localctx = new DeclaracionCortaContext(_ctx, getState());
		enterRule(_localctx, 58, RULE_declaracionCorta);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(332);
			listaId();
			setState(333);
			match(COLON);
			setState(334);
			match(ASSIGN);
			setState(335);
			listaExpr();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class DeclaracionConstContext extends ParserRuleContext {
		public TerminalNode CONST() { return getToken(GrammarParser.CONST, 0); }
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public TerminalNode ASSIGN() { return getToken(GrammarParser.ASSIGN, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public DeclaracionConstContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_declaracionConst; }
	}

	public final DeclaracionConstContext declaracionConst() throws RecognitionException {
		DeclaracionConstContext _localctx = new DeclaracionConstContext(_ctx, getState());
		enterRule(_localctx, 60, RULE_declaracionConst);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(337);
			match(CONST);
			setState(338);
			match(IDENTIFICADOR);
			setState(339);
			tipos();
			setState(340);
			match(ASSIGN);
			setState(341);
			logExpr(0);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ListaExprContext extends ParserRuleContext {
		public List<ArgumentoContext> argumento() {
			return getRuleContexts(ArgumentoContext.class);
		}
		public ArgumentoContext argumento(int i) {
			return getRuleContext(ArgumentoContext.class,i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public ListaExprContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_listaExpr; }
	}

	public final ListaExprContext listaExpr() throws RecognitionException {
		ListaExprContext _localctx = new ListaExprContext(_ctx, getState());
		enterRule(_localctx, 62, RULE_listaExpr);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(343);
			argumento();
			setState(348);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMA) {
				{
				{
				setState(344);
				match(COMMA);
				setState(345);
				argumento();
				}
				}
				setState(350);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ListaIdContext extends ParserRuleContext {
		public List<TerminalNode> IDENTIFICADOR() { return getTokens(GrammarParser.IDENTIFICADOR); }
		public TerminalNode IDENTIFICADOR(int i) {
			return getToken(GrammarParser.IDENTIFICADOR, i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public ListaIdContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_listaId; }
	}

	public final ListaIdContext listaId() throws RecognitionException {
		ListaIdContext _localctx = new ListaIdContext(_ctx, getState());
		enterRule(_localctx, 64, RULE_listaId);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(351);
			match(IDENTIFICADOR);
			setState(356);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMA) {
				{
				{
				setState(352);
				match(COMMA);
				setState(353);
				match(IDENTIFICADOR);
				}
				}
				setState(358);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LogExprContext extends ParserRuleContext {
		public LogExprContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_logExpr; }
	 
		public LogExprContext() { }
		public void copyFrom(LogExprContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class LogicalExpressionContext extends LogExprContext {
		public Token op;
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public RelExprContext relExpr() {
			return getRuleContext(RelExprContext.class,0);
		}
		public TerminalNode ORO() { return getToken(GrammarParser.ORO, 0); }
		public TerminalNode ANDO() { return getToken(GrammarParser.ANDO, 0); }
		public LogicalExpressionContext(LogExprContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ToRelExprContext extends LogExprContext {
		public RelExprContext relExpr() {
			return getRuleContext(RelExprContext.class,0);
		}
		public ToRelExprContext(LogExprContext ctx) { copyFrom(ctx); }
	}

	public final LogExprContext logExpr() throws RecognitionException {
		return logExpr(0);
	}

	private LogExprContext logExpr(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		LogExprContext _localctx = new LogExprContext(_ctx, _parentState);
		LogExprContext _prevctx = _localctx;
		int _startState = 66;
		enterRecursionRule(_localctx, 66, RULE_logExpr, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			{
			_localctx = new ToRelExprContext(_localctx);
			_ctx = _localctx;
			_prevctx = _localctx;

			setState(360);
			relExpr(0);
			}
			_ctx.stop = _input.LT(-1);
			setState(367);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,27,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					{
					_localctx = new LogicalExpressionContext(new LogExprContext(_parentctx, _parentState));
					pushNewRecursionContext(_localctx, _startState, RULE_logExpr);
					setState(362);
					if (!(precpred(_ctx, 2))) throw new FailedPredicateException(this, "precpred(_ctx, 2)");
					setState(363);
					((LogicalExpressionContext)_localctx).op = _input.LT(1);
					_la = _input.LA(1);
					if ( !(_la==ANDO || _la==ORO) ) {
						((LogicalExpressionContext)_localctx).op = (Token)_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(364);
					relExpr(0);
					}
					} 
				}
				setState(369);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,27,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class RelExprContext extends ParserRuleContext {
		public RelExprContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_relExpr; }
	 
		public RelExprContext() { }
		public void copyFrom(RelExprContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ToExprContext extends RelExprContext {
		public ExprContext expr() {
			return getRuleContext(ExprContext.class,0);
		}
		public ToExprContext(RelExprContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class RelationalExpresionContext extends RelExprContext {
		public Token op;
		public RelExprContext relExpr() {
			return getRuleContext(RelExprContext.class,0);
		}
		public ExprContext expr() {
			return getRuleContext(ExprContext.class,0);
		}
		public TerminalNode LE() { return getToken(GrammarParser.LE, 0); }
		public TerminalNode GE() { return getToken(GrammarParser.GE, 0); }
		public TerminalNode EQUAL() { return getToken(GrammarParser.EQUAL, 0); }
		public TerminalNode NEQUAL() { return getToken(GrammarParser.NEQUAL, 0); }
		public TerminalNode LESS() { return getToken(GrammarParser.LESS, 0); }
		public TerminalNode GREATER() { return getToken(GrammarParser.GREATER, 0); }
		public RelationalExpresionContext(RelExprContext ctx) { copyFrom(ctx); }
	}

	public final RelExprContext relExpr() throws RecognitionException {
		return relExpr(0);
	}

	private RelExprContext relExpr(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		RelExprContext _localctx = new RelExprContext(_ctx, _parentState);
		RelExprContext _prevctx = _localctx;
		int _startState = 68;
		enterRecursionRule(_localctx, 68, RULE_relExpr, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			{
			_localctx = new ToExprContext(_localctx);
			_ctx = _localctx;
			_prevctx = _localctx;

			setState(371);
			expr(0);
			}
			_ctx.stop = _input.LT(-1);
			setState(378);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,28,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					{
					_localctx = new RelationalExpresionContext(new RelExprContext(_parentctx, _parentState));
					pushNewRecursionContext(_localctx, _startState, RULE_relExpr);
					setState(373);
					if (!(precpred(_ctx, 2))) throw new FailedPredicateException(this, "precpred(_ctx, 2)");
					setState(374);
					((RelationalExpresionContext)_localctx).op = _input.LT(1);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 2216615441596416L) != 0)) ) {
						((RelationalExpresionContext)_localctx).op = (Token)_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(375);
					expr(0);
					}
					} 
				}
				setState(380);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,28,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExprContext extends ParserRuleContext {
		public ExprContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expr; }
	 
		public ExprContext() { }
		public void copyFrom(ExprContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ToTermContext extends ExprContext {
		public TermContext term() {
			return getRuleContext(TermContext.class,0);
		}
		public ToTermContext(ExprContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class BinaryExpressionTContext extends ExprContext {
		public Token op;
		public ExprContext expr() {
			return getRuleContext(ExprContext.class,0);
		}
		public TermContext term() {
			return getRuleContext(TermContext.class,0);
		}
		public TerminalNode PLUS() { return getToken(GrammarParser.PLUS, 0); }
		public TerminalNode MINUS() { return getToken(GrammarParser.MINUS, 0); }
		public BinaryExpressionTContext(ExprContext ctx) { copyFrom(ctx); }
	}

	public final ExprContext expr() throws RecognitionException {
		return expr(0);
	}

	private ExprContext expr(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		ExprContext _localctx = new ExprContext(_ctx, _parentState);
		ExprContext _prevctx = _localctx;
		int _startState = 70;
		enterRecursionRule(_localctx, 70, RULE_expr, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			{
			_localctx = new ToTermContext(_localctx);
			_ctx = _localctx;
			_prevctx = _localctx;

			setState(382);
			term(0);
			}
			_ctx.stop = _input.LT(-1);
			setState(389);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,29,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					{
					_localctx = new BinaryExpressionTContext(new ExprContext(_parentctx, _parentState));
					pushNewRecursionContext(_localctx, _startState, RULE_expr);
					setState(384);
					if (!(precpred(_ctx, 2))) throw new FailedPredicateException(this, "precpred(_ctx, 2)");
					setState(385);
					((BinaryExpressionTContext)_localctx).op = _input.LT(1);
					_la = _input.LA(1);
					if ( !(_la==PLUS || _la==MINUS) ) {
						((BinaryExpressionTContext)_localctx).op = (Token)_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(386);
					term(0);
					}
					} 
				}
				setState(391);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,29,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TermContext extends ParserRuleContext {
		public TermContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_term; }
	 
		public TermContext() { }
		public void copyFrom(TermContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class BinaryExpressionSContext extends TermContext {
		public Token op;
		public TermContext term() {
			return getRuleContext(TermContext.class,0);
		}
		public FactorContext factor() {
			return getRuleContext(FactorContext.class,0);
		}
		public TerminalNode MULT() { return getToken(GrammarParser.MULT, 0); }
		public TerminalNode DIV() { return getToken(GrammarParser.DIV, 0); }
		public TerminalNode MOD() { return getToken(GrammarParser.MOD, 0); }
		public BinaryExpressionSContext(TermContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ToFactorContext extends TermContext {
		public FactorContext factor() {
			return getRuleContext(FactorContext.class,0);
		}
		public ToFactorContext(TermContext ctx) { copyFrom(ctx); }
	}

	public final TermContext term() throws RecognitionException {
		return term(0);
	}

	private TermContext term(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		TermContext _localctx = new TermContext(_ctx, _parentState);
		TermContext _prevctx = _localctx;
		int _startState = 72;
		enterRecursionRule(_localctx, 72, RULE_term, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			{
			_localctx = new ToFactorContext(_localctx);
			_ctx = _localctx;
			_prevctx = _localctx;

			setState(393);
			factor(0);
			}
			_ctx.stop = _input.LT(-1);
			setState(400);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,30,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					{
					_localctx = new BinaryExpressionSContext(new TermContext(_parentctx, _parentState));
					pushNewRecursionContext(_localctx, _startState, RULE_term);
					setState(395);
					if (!(precpred(_ctx, 2))) throw new FailedPredicateException(this, "precpred(_ctx, 2)");
					setState(396);
					((BinaryExpressionSContext)_localctx).op = _input.LT(1);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 1924145348608L) != 0)) ) {
						((BinaryExpressionSContext)_localctx).op = (Token)_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(397);
					factor(0);
					}
					} 
				}
				setState(402);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,30,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FactorContext extends ParserRuleContext {
		public FactorContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_factor; }
	 
		public FactorContext() { }
		public void copyFrom(FactorContext ctx) {
			super.copyFrom(ctx);
		}
	}
	@SuppressWarnings("CheckReturnValue")
	public static class IdentifierContext extends FactorContext {
		public TerminalNode IDENTIFICADOR() { return getToken(GrammarParser.IDENTIFICADOR, 0); }
		public IdentifierContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class NowFuncContext extends FactorContext {
		public FuncNowContext funcNow() {
			return getRuleContext(FuncNowContext.class,0);
		}
		public NowFuncContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class SubFuncContext extends FactorContext {
		public FuncSubContext funcSub() {
			return getRuleContext(FuncSubContext.class,0);
		}
		public SubFuncContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class UnaryExpressionContext extends FactorContext {
		public Token op;
		public FactorContext factor() {
			return getRuleContext(FactorContext.class,0);
		}
		public TerminalNode MINUS() { return getToken(GrammarParser.MINUS, 0); }
		public TerminalNode NEG() { return getToken(GrammarParser.NEG, 0); }
		public TerminalNode MULT() { return getToken(GrammarParser.MULT, 0); }
		public TerminalNode REF() { return getToken(GrammarParser.REF, 0); }
		public UnaryExpressionContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class TypeFuncContext extends FactorContext {
		public FuncTypeContext funcType() {
			return getRuleContext(FuncTypeContext.class,0);
		}
		public TypeFuncContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class GroupedExpressionContext extends FactorContext {
		public TerminalNode LPAREN() { return getToken(GrammarParser.LPAREN, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RPAREN() { return getToken(GrammarParser.RPAREN, 0); }
		public GroupedExpressionContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class LenFuncContext extends FactorContext {
		public FuncLenContext funcLen() {
			return getRuleContext(FuncLenContext.class,0);
		}
		public LenFuncContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class LiteralValueContext extends FactorContext {
		public LiteralContext literal() {
			return getRuleContext(LiteralContext.class,0);
		}
		public LiteralValueContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class LlamarFuncionFContext extends FactorContext {
		public LlamadaFuncionContext llamadaFuncion() {
			return getRuleContext(LlamadaFuncionContext.class,0);
		}
		public LlamarFuncionFContext(FactorContext ctx) { copyFrom(ctx); }
	}
	@SuppressWarnings("CheckReturnValue")
	public static class ArregloAccesoContext extends FactorContext {
		public FactorContext factor() {
			return getRuleContext(FactorContext.class,0);
		}
		public TerminalNode LCOR() { return getToken(GrammarParser.LCOR, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RCOR() { return getToken(GrammarParser.RCOR, 0); }
		public ArregloAccesoContext(FactorContext ctx) { copyFrom(ctx); }
	}

	public final FactorContext factor() throws RecognitionException {
		return factor(0);
	}

	private FactorContext factor(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		FactorContext _localctx = new FactorContext(_ctx, _parentState);
		FactorContext _prevctx = _localctx;
		int _startState = 74;
		enterRecursionRule(_localctx, 74, RULE_factor, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(417);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,31,_ctx) ) {
			case 1:
				{
				_localctx = new GroupedExpressionContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;

				setState(404);
				match(LPAREN);
				setState(405);
				logExpr(0);
				setState(406);
				match(RPAREN);
				}
				break;
			case 2:
				{
				_localctx = new UnaryExpressionContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(408);
				((UnaryExpressionContext)_localctx).op = _input.LT(1);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 4879082848256L) != 0)) ) {
					((UnaryExpressionContext)_localctx).op = (Token)_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(409);
				factor(8);
				}
				break;
			case 3:
				{
				_localctx = new LiteralValueContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(410);
				literal();
				}
				break;
			case 4:
				{
				_localctx = new NowFuncContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(411);
				funcNow();
				}
				break;
			case 5:
				{
				_localctx = new LenFuncContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(412);
				funcLen();
				}
				break;
			case 6:
				{
				_localctx = new SubFuncContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(413);
				funcSub();
				}
				break;
			case 7:
				{
				_localctx = new TypeFuncContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(414);
				funcType();
				}
				break;
			case 8:
				{
				_localctx = new LlamarFuncionFContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(415);
				llamadaFuncion();
				}
				break;
			case 9:
				{
				_localctx = new IdentifierContext(_localctx);
				_ctx = _localctx;
				_prevctx = _localctx;
				setState(416);
				match(IDENTIFICADOR);
				}
				break;
			}
			_ctx.stop = _input.LT(-1);
			setState(426);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,32,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					{
					_localctx = new ArregloAccesoContext(new FactorContext(_parentctx, _parentState));
					pushNewRecursionContext(_localctx, _startState, RULE_factor);
					setState(419);
					if (!(precpred(_ctx, 10))) throw new FailedPredicateException(this, "precpred(_ctx, 10)");
					setState(420);
					match(LCOR);
					setState(421);
					logExpr(0);
					setState(422);
					match(RCOR);
					}
					} 
				}
				setState(428);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,32,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LiteralContext extends ParserRuleContext {
		public ArrayLiteralContext arrayLiteral() {
			return getRuleContext(ArrayLiteralContext.class,0);
		}
		public TerminalNode FLOAT() { return getToken(GrammarParser.FLOAT, 0); }
		public TerminalNode ENTERO() { return getToken(GrammarParser.ENTERO, 0); }
		public TerminalNode BOOL() { return getToken(GrammarParser.BOOL, 0); }
		public TerminalNode RUNE() { return getToken(GrammarParser.RUNE, 0); }
		public TerminalNode STR() { return getToken(GrammarParser.STR, 0); }
		public TerminalNode NIL() { return getToken(GrammarParser.NIL, 0); }
		public LiteralContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_literal; }
	}

	public final LiteralContext literal() throws RecognitionException {
		LiteralContext _localctx = new LiteralContext(_ctx, getState());
		enterRule(_localctx, 76, RULE_literal);
		try {
			setState(436);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case INT_T:
			case FLOAT_T:
			case BOOL_T:
			case RUNE_T:
			case STRING_T:
			case LCOR:
				enterOuterAlt(_localctx, 1);
				{
				setState(429);
				arrayLiteral();
				}
				break;
			case FLOAT:
				enterOuterAlt(_localctx, 2);
				{
				setState(430);
				match(FLOAT);
				}
				break;
			case ENTERO:
				enterOuterAlt(_localctx, 3);
				{
				setState(431);
				match(ENTERO);
				}
				break;
			case BOOL:
				enterOuterAlt(_localctx, 4);
				{
				setState(432);
				match(BOOL);
				}
				break;
			case RUNE:
				enterOuterAlt(_localctx, 5);
				{
				setState(433);
				match(RUNE);
				}
				break;
			case STR:
				enterOuterAlt(_localctx, 6);
				{
				setState(434);
				match(STR);
				}
				break;
			case NIL:
				enterOuterAlt(_localctx, 7);
				{
				setState(435);
				match(NIL);
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayLiteralContext extends ParserRuleContext {
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public TerminalNode LBRACE() { return getToken(GrammarParser.LBRACE, 0); }
		public TerminalNode RBRACE() { return getToken(GrammarParser.RBRACE, 0); }
		public ListaElementosContext listaElementos() {
			return getRuleContext(ListaElementosContext.class,0);
		}
		public ArrayLiteralContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayLiteral; }
	}

	public final ArrayLiteralContext arrayLiteral() throws RecognitionException {
		ArrayLiteralContext _localctx = new ArrayLiteralContext(_ctx, getState());
		enterRule(_localctx, 78, RULE_arrayLiteral);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(438);
			tipos();
			setState(439);
			match(LBRACE);
			setState(441);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 285983456159006720L) != 0)) {
				{
				setState(440);
				listaElementos();
				}
			}

			setState(443);
			match(RBRACE);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ListaElementosContext extends ParserRuleContext {
		public List<ElementoContext> elemento() {
			return getRuleContexts(ElementoContext.class);
		}
		public ElementoContext elemento(int i) {
			return getRuleContext(ElementoContext.class,i);
		}
		public List<TerminalNode> COMMA() { return getTokens(GrammarParser.COMMA); }
		public TerminalNode COMMA(int i) {
			return getToken(GrammarParser.COMMA, i);
		}
		public ListaElementosContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_listaElementos; }
	}

	public final ListaElementosContext listaElementos() throws RecognitionException {
		ListaElementosContext _localctx = new ListaElementosContext(_ctx, getState());
		enterRule(_localctx, 80, RULE_listaElementos);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(445);
			elemento();
			setState(450);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMA) {
				{
				{
				setState(446);
				match(COMMA);
				setState(447);
				elemento();
				}
				}
				setState(452);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ElementoContext extends ParserRuleContext {
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode LBRACE() { return getToken(GrammarParser.LBRACE, 0); }
		public ListaElementosContext listaElementos() {
			return getRuleContext(ListaElementosContext.class,0);
		}
		public TerminalNode RBRACE() { return getToken(GrammarParser.RBRACE, 0); }
		public ElementoContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_elemento; }
	}

	public final ElementoContext elemento() throws RecognitionException {
		ElementoContext _localctx = new ElementoContext(_ctx, getState());
		enterRule(_localctx, 82, RULE_elemento);
		try {
			setState(458);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case LEN:
			case NOW:
			case SUBSTR:
			case TYPEOF:
			case INT_T:
			case FLOAT_T:
			case BOOL_T:
			case RUNE_T:
			case STRING_T:
			case LPAREN:
			case LCOR:
			case MINUS:
			case NEG:
			case MULT:
			case REF:
			case BOOL:
			case NIL:
			case ENTERO:
			case FLOAT:
			case STR:
			case RUNE:
			case IDENTIFICADOR:
				enterOuterAlt(_localctx, 1);
				{
				setState(453);
				logExpr(0);
				}
				break;
			case LBRACE:
				enterOuterAlt(_localctx, 2);
				{
				setState(454);
				match(LBRACE);
				setState(455);
				listaElementos();
				setState(456);
				match(RBRACE);
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TiposContext extends ParserRuleContext {
		public TerminalNode LCOR() { return getToken(GrammarParser.LCOR, 0); }
		public LogExprContext logExpr() {
			return getRuleContext(LogExprContext.class,0);
		}
		public TerminalNode RCOR() { return getToken(GrammarParser.RCOR, 0); }
		public TiposContext tipos() {
			return getRuleContext(TiposContext.class,0);
		}
		public TipoBaseContext tipoBase() {
			return getRuleContext(TipoBaseContext.class,0);
		}
		public TiposContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_tipos; }
	}

	public final TiposContext tipos() throws RecognitionException {
		TiposContext _localctx = new TiposContext(_ctx, getState());
		enterRule(_localctx, 84, RULE_tipos);
		try {
			setState(466);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case LCOR:
				enterOuterAlt(_localctx, 1);
				{
				setState(460);
				match(LCOR);
				setState(461);
				logExpr(0);
				setState(462);
				match(RCOR);
				setState(463);
				tipos();
				}
				break;
			case INT_T:
			case FLOAT_T:
			case BOOL_T:
			case RUNE_T:
			case STRING_T:
				enterOuterAlt(_localctx, 2);
				{
				setState(465);
				tipoBase();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TipoBaseContext extends ParserRuleContext {
		public TerminalNode INT_T() { return getToken(GrammarParser.INT_T, 0); }
		public TerminalNode FLOAT_T() { return getToken(GrammarParser.FLOAT_T, 0); }
		public TerminalNode BOOL_T() { return getToken(GrammarParser.BOOL_T, 0); }
		public TerminalNode RUNE_T() { return getToken(GrammarParser.RUNE_T, 0); }
		public TerminalNode STRING_T() { return getToken(GrammarParser.STRING_T, 0); }
		public TipoBaseContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_tipoBase; }
	}

	public final TipoBaseContext tipoBase() throws RecognitionException {
		TipoBaseContext _localctx = new TipoBaseContext(_ctx, getState());
		enterRule(_localctx, 86, RULE_tipoBase);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(468);
			_la = _input.LA(1);
			if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 32505856L) != 0)) ) {
			_errHandler.recoverInline(this);
			}
			else {
				if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
				_errHandler.reportMatch(this);
				consume();
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SimboloAsignacionContext extends ParserRuleContext {
		public Token op;
		public TerminalNode ASSIGN() { return getToken(GrammarParser.ASSIGN, 0); }
		public TerminalNode PLUS() { return getToken(GrammarParser.PLUS, 0); }
		public TerminalNode MINUS() { return getToken(GrammarParser.MINUS, 0); }
		public TerminalNode MULT() { return getToken(GrammarParser.MULT, 0); }
		public TerminalNode DIV() { return getToken(GrammarParser.DIV, 0); }
		public SimboloAsignacionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_simboloAsignacion; }
	}

	public final SimboloAsignacionContext simboloAsignacion() throws RecognitionException {
		SimboloAsignacionContext _localctx = new SimboloAsignacionContext(_ctx, getState());
		enterRule(_localctx, 88, RULE_simboloAsignacion);
		int _la;
		try {
			setState(473);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case ASSIGN:
				enterOuterAlt(_localctx, 1);
				{
				setState(470);
				match(ASSIGN);
				}
				break;
			case PLUS:
			case MINUS:
			case MULT:
			case DIV:
				enterOuterAlt(_localctx, 2);
				{
				setState(471);
				((SimboloAsignacionContext)_localctx).op = _input.LT(1);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 927712935936L) != 0)) ) {
					((SimboloAsignacionContext)_localctx).op = (Token)_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(472);
				match(ASSIGN);
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public boolean sempred(RuleContext _localctx, int ruleIndex, int predIndex) {
		switch (ruleIndex) {
		case 33:
			return logExpr_sempred((LogExprContext)_localctx, predIndex);
		case 34:
			return relExpr_sempred((RelExprContext)_localctx, predIndex);
		case 35:
			return expr_sempred((ExprContext)_localctx, predIndex);
		case 36:
			return term_sempred((TermContext)_localctx, predIndex);
		case 37:
			return factor_sempred((FactorContext)_localctx, predIndex);
		}
		return true;
	}
	private boolean logExpr_sempred(LogExprContext _localctx, int predIndex) {
		switch (predIndex) {
		case 0:
			return precpred(_ctx, 2);
		}
		return true;
	}
	private boolean relExpr_sempred(RelExprContext _localctx, int predIndex) {
		switch (predIndex) {
		case 1:
			return precpred(_ctx, 2);
		}
		return true;
	}
	private boolean expr_sempred(ExprContext _localctx, int predIndex) {
		switch (predIndex) {
		case 2:
			return precpred(_ctx, 2);
		}
		return true;
	}
	private boolean term_sempred(TermContext _localctx, int predIndex) {
		switch (predIndex) {
		case 3:
			return precpred(_ctx, 2);
		}
		return true;
	}
	private boolean factor_sempred(FactorContext _localctx, int predIndex) {
		switch (predIndex) {
		case 4:
			return precpred(_ctx, 10);
		}
		return true;
	}

	public static final String _serializedATN =
		"\u0004\u0001=\u01dc\u0002\u0000\u0007\u0000\u0002\u0001\u0007\u0001\u0002"+
		"\u0002\u0007\u0002\u0002\u0003\u0007\u0003\u0002\u0004\u0007\u0004\u0002"+
		"\u0005\u0007\u0005\u0002\u0006\u0007\u0006\u0002\u0007\u0007\u0007\u0002"+
		"\b\u0007\b\u0002\t\u0007\t\u0002\n\u0007\n\u0002\u000b\u0007\u000b\u0002"+
		"\f\u0007\f\u0002\r\u0007\r\u0002\u000e\u0007\u000e\u0002\u000f\u0007\u000f"+
		"\u0002\u0010\u0007\u0010\u0002\u0011\u0007\u0011\u0002\u0012\u0007\u0012"+
		"\u0002\u0013\u0007\u0013\u0002\u0014\u0007\u0014\u0002\u0015\u0007\u0015"+
		"\u0002\u0016\u0007\u0016\u0002\u0017\u0007\u0017\u0002\u0018\u0007\u0018"+
		"\u0002\u0019\u0007\u0019\u0002\u001a\u0007\u001a\u0002\u001b\u0007\u001b"+
		"\u0002\u001c\u0007\u001c\u0002\u001d\u0007\u001d\u0002\u001e\u0007\u001e"+
		"\u0002\u001f\u0007\u001f\u0002 \u0007 \u0002!\u0007!\u0002\"\u0007\"\u0002"+
		"#\u0007#\u0002$\u0007$\u0002%\u0007%\u0002&\u0007&\u0002\'\u0007\'\u0002"+
		"(\u0007(\u0002)\u0007)\u0002*\u0007*\u0002+\u0007+\u0002,\u0007,\u0001"+
		"\u0000\u0005\u0000\\\b\u0000\n\u0000\f\u0000_\t\u0000\u0001\u0000\u0001"+
		"\u0000\u0001\u0001\u0001\u0001\u0001\u0001\u0001\u0001\u0003\u0001g\b"+
		"\u0001\u0001\u0002\u0001\u0002\u0001\u0002\u0001\u0002\u0001\u0002\u0001"+
		"\u0002\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0003\u0003~\b\u0003\u0001"+
		"\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0005\u0001"+
		"\u0005\u0001\u0005\u0001\u0005\u0001\u0006\u0001\u0006\u0001\u0006\u0001"+
		"\u0006\u0001\u0006\u0001\u0006\u0001\u0006\u0001\u0006\u0001\u0006\u0001"+
		"\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\b\u0001\b"+
		"\u0001\b\u0003\b\u009a\b\b\u0001\b\u0001\b\u0001\t\u0003\t\u009f\b\t\u0001"+
		"\t\u0001\t\u0001\n\u0001\n\u0003\n\u00a5\b\n\u0001\u000b\u0001\u000b\u0001"+
		"\u000b\u0001\u000b\u0003\u000b\u00ab\b\u000b\u0001\u000b\u0001\u000b\u0001"+
		"\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001"+
		"\u000b\u0001\u000b\u0003\u000b\u00b7\b\u000b\u0001\u000b\u0001\u000b\u0001"+
		"\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0003"+
		"\u000b\u00c1\b\u000b\u0001\u000b\u0001\u000b\u0003\u000b\u00c5\b\u000b"+
		"\u0001\f\u0001\f\u0001\f\u0005\f\u00ca\b\f\n\f\f\f\u00cd\t\f\u0001\r\u0001"+
		"\r\u0001\r\u0005\r\u00d2\b\r\n\r\f\r\u00d5\t\r\u0001\u000e\u0001\u000e"+
		"\u0003\u000e\u00d9\b\u000e\u0001\u000e\u0001\u000e\u0001\u000f\u0001\u000f"+
		"\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f"+
		"\u0003\u000f\u00e5\b\u000f\u0001\u0010\u0001\u0010\u0001\u0010\u0001\u0010"+
		"\u0001\u0010\u0001\u0010\u0001\u0010\u0001\u0011\u0001\u0011\u0003\u0011"+
		"\u00f0\b\u0011\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012"+
		"\u0001\u0012\u0003\u0012\u00f8\b\u0012\u0001\u0013\u0001\u0013\u0001\u0013"+
		"\u0001\u0013\u0001\u0013\u0001\u0013\u0001\u0014\u0004\u0014\u0101\b\u0014"+
		"\u000b\u0014\f\u0014\u0102\u0001\u0014\u0003\u0014\u0106\b\u0014\u0001"+
		"\u0015\u0001\u0015\u0001\u0015\u0001\u0015\u0005\u0015\u010c\b\u0015\n"+
		"\u0015\f\u0015\u010f\t\u0015\u0001\u0016\u0001\u0016\u0001\u0016\u0005"+
		"\u0016\u0114\b\u0016\n\u0016\f\u0016\u0117\t\u0016\u0001\u0017\u0001\u0017"+
		"\u0001\u0017\u0001\u0017\u0001\u0017\u0003\u0017\u011e\b\u0017\u0001\u0018"+
		"\u0001\u0018\u0001\u0018\u0003\u0018\u0123\b\u0018\u0005\u0018\u0125\b"+
		"\u0018\n\u0018\f\u0018\u0128\t\u0018\u0001\u0018\u0001\u0018\u0001\u0019"+
		"\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u001a\u0001\u001a\u0001\u001a"+
		"\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0003\u001a"+
		"\u0138\b\u001a\u0001\u001b\u0001\u001b\u0001\u001b\u0001\u001b\u0001\u001b"+
		"\u0001\u001b\u0001\u001b\u0001\u001c\u0001\u001c\u0001\u001c\u0001\u001c"+
		"\u0001\u001c\u0001\u001c\u0001\u001c\u0001\u001c\u0001\u001c\u0001\u001c"+
		"\u0003\u001c\u014b\b\u001c\u0001\u001d\u0001\u001d\u0001\u001d\u0001\u001d"+
		"\u0001\u001d\u0001\u001e\u0001\u001e\u0001\u001e\u0001\u001e\u0001\u001e"+
		"\u0001\u001e\u0001\u001f\u0001\u001f\u0001\u001f\u0005\u001f\u015b\b\u001f"+
		"\n\u001f\f\u001f\u015e\t\u001f\u0001 \u0001 \u0001 \u0005 \u0163\b \n"+
		" \f \u0166\t \u0001!\u0001!\u0001!\u0001!\u0001!\u0001!\u0005!\u016e\b"+
		"!\n!\f!\u0171\t!\u0001\"\u0001\"\u0001\"\u0001\"\u0001\"\u0001\"\u0005"+
		"\"\u0179\b\"\n\"\f\"\u017c\t\"\u0001#\u0001#\u0001#\u0001#\u0001#\u0001"+
		"#\u0005#\u0184\b#\n#\f#\u0187\t#\u0001$\u0001$\u0001$\u0001$\u0001$\u0001"+
		"$\u0005$\u018f\b$\n$\f$\u0192\t$\u0001%\u0001%\u0001%\u0001%\u0001%\u0001"+
		"%\u0001%\u0001%\u0001%\u0001%\u0001%\u0001%\u0001%\u0001%\u0003%\u01a2"+
		"\b%\u0001%\u0001%\u0001%\u0001%\u0001%\u0005%\u01a9\b%\n%\f%\u01ac\t%"+
		"\u0001&\u0001&\u0001&\u0001&\u0001&\u0001&\u0001&\u0003&\u01b5\b&\u0001"+
		"\'\u0001\'\u0001\'\u0003\'\u01ba\b\'\u0001\'\u0001\'\u0001(\u0001(\u0001"+
		"(\u0005(\u01c1\b(\n(\f(\u01c4\t(\u0001)\u0001)\u0001)\u0001)\u0001)\u0003"+
		")\u01cb\b)\u0001*\u0001*\u0001*\u0001*\u0001*\u0001*\u0003*\u01d3\b*\u0001"+
		"+\u0001+\u0001,\u0001,\u0001,\u0003,\u01da\b,\u0001,\u0000\u0005BDFHJ"+
		"-\u0000\u0002\u0004\u0006\b\n\f\u000e\u0010\u0012\u0014\u0016\u0018\u001a"+
		"\u001c\u001e \"$&(*,.02468:<>@BDFHJLNPRTVX\u0000\u0007\u0001\u0000+,\u0001"+
		"\u0000-2\u0001\u0000#$\u0001\u0000&(\u0002\u0000$&**\u0001\u0000\u0014"+
		"\u0018\u0002\u0000#$&\'\u01f3\u0000]\u0001\u0000\u0000\u0000\u0002f\u0001"+
		"\u0000\u0000\u0000\u0004h\u0001\u0000\u0000\u0000\u0006}\u0001\u0000\u0000"+
		"\u0000\b\u007f\u0001\u0000\u0000\u0000\n\u0084\u0001\u0000\u0000\u0000"+
		"\f\u0088\u0001\u0000\u0000\u0000\u000e\u0091\u0001\u0000\u0000\u0000\u0010"+
		"\u0096\u0001\u0000\u0000\u0000\u0012\u009e\u0001\u0000\u0000\u0000\u0014"+
		"\u00a2\u0001\u0000\u0000\u0000\u0016\u00c4\u0001\u0000\u0000\u0000\u0018"+
		"\u00c6\u0001\u0000\u0000\u0000\u001a\u00ce\u0001\u0000\u0000\u0000\u001c"+
		"\u00d6\u0001\u0000\u0000\u0000\u001e\u00e4\u0001\u0000\u0000\u0000 \u00e6"+
		"\u0001\u0000\u0000\u0000\"\u00ef\u0001\u0000\u0000\u0000$\u00f7\u0001"+
		"\u0000\u0000\u0000&\u00f9\u0001\u0000\u0000\u0000(\u0100\u0001\u0000\u0000"+
		"\u0000*\u0107\u0001\u0000\u0000\u0000,\u0110\u0001\u0000\u0000\u0000."+
		"\u0118\u0001\u0000\u0000\u00000\u011f\u0001\u0000\u0000\u00002\u012b\u0001"+
		"\u0000\u0000\u00004\u0137\u0001\u0000\u0000\u00006\u0139\u0001\u0000\u0000"+
		"\u00008\u014a\u0001\u0000\u0000\u0000:\u014c\u0001\u0000\u0000\u0000<"+
		"\u0151\u0001\u0000\u0000\u0000>\u0157\u0001\u0000\u0000\u0000@\u015f\u0001"+
		"\u0000\u0000\u0000B\u0167\u0001\u0000\u0000\u0000D\u0172\u0001\u0000\u0000"+
		"\u0000F\u017d\u0001\u0000\u0000\u0000H\u0188\u0001\u0000\u0000\u0000J"+
		"\u01a1\u0001\u0000\u0000\u0000L\u01b4\u0001\u0000\u0000\u0000N\u01b6\u0001"+
		"\u0000\u0000\u0000P\u01bd\u0001\u0000\u0000\u0000R\u01ca\u0001\u0000\u0000"+
		"\u0000T\u01d2\u0001\u0000\u0000\u0000V\u01d4\u0001\u0000\u0000\u0000X"+
		"\u01d9\u0001\u0000\u0000\u0000Z\\\u0003\u0002\u0001\u0000[Z\u0001\u0000"+
		"\u0000\u0000\\_\u0001\u0000\u0000\u0000][\u0001\u0000\u0000\u0000]^\u0001"+
		"\u0000\u0000\u0000^`\u0001\u0000\u0000\u0000_]\u0001\u0000\u0000\u0000"+
		"`a\u0005\u0000\u0000\u0001a\u0001\u0001\u0000\u0000\u0000bg\u0003\u0016"+
		"\u000b\u0000cg\u0003\u0004\u0002\u0000dg\u00038\u001c\u0000eg\u0003<\u001e"+
		"\u0000fb\u0001\u0000\u0000\u0000fc\u0001\u0000\u0000\u0000fd\u0001\u0000"+
		"\u0000\u0000fe\u0001\u0000\u0000\u0000g\u0003\u0001\u0000\u0000\u0000"+
		"hi\u0005\u0001\u0000\u0000ij\u0005\u0002\u0000\u0000jk\u0005\u001b\u0000"+
		"\u0000kl\u0005\u001c\u0000\u0000lm\u00030\u0018\u0000m\u0005\u0001\u0000"+
		"\u0000\u0000n~\u00036\u001b\u0000o~\u00038\u001c\u0000p~\u0003:\u001d"+
		"\u0000q~\u0003<\u001e\u0000r~\u00032\u0019\u0000s~\u0003.\u0017\u0000"+
		"t~\u0003&\u0013\u0000u~\u0003\u001e\u000f\u0000v~\u0003$\u0012\u0000w"+
		"~\u0003\u0016\u000b\u0000x~\u0003\u0014\n\u0000y~\u0003\u0010\b\u0000"+
		"z~\u0003B!\u0000{~\u0005\u000e\u0000\u0000|~\u0005\r\u0000\u0000}n\u0001"+
		"\u0000\u0000\u0000}o\u0001\u0000\u0000\u0000}p\u0001\u0000\u0000\u0000"+
		"}q\u0001\u0000\u0000\u0000}r\u0001\u0000\u0000\u0000}s\u0001\u0000\u0000"+
		"\u0000}t\u0001\u0000\u0000\u0000}u\u0001\u0000\u0000\u0000}v\u0001\u0000"+
		"\u0000\u0000}w\u0001\u0000\u0000\u0000}x\u0001\u0000\u0000\u0000}y\u0001"+
		"\u0000\u0000\u0000}z\u0001\u0000\u0000\u0000}{\u0001\u0000\u0000\u0000"+
		"}|\u0001\u0000\u0000\u0000~\u0007\u0001\u0000\u0000\u0000\u007f\u0080"+
		"\u0005\u0010\u0000\u0000\u0080\u0081\u0005\u001b\u0000\u0000\u0081\u0082"+
		"\u0003B!\u0000\u0082\u0083\u0005\u001c\u0000\u0000\u0083\t\u0001\u0000"+
		"\u0000\u0000\u0084\u0085\u0005\u0011\u0000\u0000\u0085\u0086\u0005\u001b"+
		"\u0000\u0000\u0086\u0087\u0005\u001c\u0000\u0000\u0087\u000b\u0001\u0000"+
		"\u0000\u0000\u0088\u0089\u0005\u0012\u0000\u0000\u0089\u008a\u0005\u001b"+
		"\u0000\u0000\u008a\u008b\u0003B!\u0000\u008b\u008c\u0005\u001f\u0000\u0000"+
		"\u008c\u008d\u0003B!\u0000\u008d\u008e\u0005\u001f\u0000\u0000\u008e\u008f"+
		"\u0003B!\u0000\u008f\u0090\u0005\u001c\u0000\u0000\u0090\r\u0001\u0000"+
		"\u0000\u0000\u0091\u0092\u0005\u0013\u0000\u0000\u0092\u0093\u0005\u001b"+
		"\u0000\u0000\u0093\u0094\u0003B!\u0000\u0094\u0095\u0005\u001c\u0000\u0000"+
		"\u0095\u000f\u0001\u0000\u0000\u0000\u0096\u0097\u00059\u0000\u0000\u0097"+
		"\u0099\u0005\u001b\u0000\u0000\u0098\u009a\u0003>\u001f\u0000\u0099\u0098"+
		"\u0001\u0000\u0000\u0000\u0099\u009a\u0001\u0000\u0000\u0000\u009a\u009b"+
		"\u0001\u0000\u0000\u0000\u009b\u009c\u0005\u001c\u0000\u0000\u009c\u0011"+
		"\u0001\u0000\u0000\u0000\u009d\u009f\u0005*\u0000\u0000\u009e\u009d\u0001"+
		"\u0000\u0000\u0000\u009e\u009f\u0001\u0000\u0000\u0000\u009f\u00a0\u0001"+
		"\u0000\u0000\u0000\u00a0\u00a1\u0003B!\u0000\u00a1\u0013\u0001\u0000\u0000"+
		"\u0000\u00a2\u00a4\u0005\u000f\u0000\u0000\u00a3\u00a5\u0003>\u001f\u0000"+
		"\u00a4\u00a3\u0001\u0000\u0000\u0000\u00a4\u00a5\u0001\u0000\u0000\u0000"+
		"\u00a5\u0015\u0001\u0000\u0000\u0000\u00a6\u00a7\u0005\u0001\u0000\u0000"+
		"\u00a7\u00a8\u00059\u0000\u0000\u00a8\u00aa\u0005\u001b\u0000\u0000\u00a9"+
		"\u00ab\u0003\u001a\r\u0000\u00aa\u00a9\u0001\u0000\u0000\u0000\u00aa\u00ab"+
		"\u0001\u0000\u0000\u0000\u00ab\u00ac\u0001\u0000\u0000\u0000\u00ac\u00ad"+
		"\u0005\u001c\u0000\u0000\u00ad\u00ae\u0005\u001b\u0000\u0000\u00ae\u00af"+
		"\u0003\u0018\f\u0000\u00af\u00b0\u0005\u001c\u0000\u0000\u00b0\u00b1\u0003"+
		"0\u0018\u0000\u00b1\u00c5\u0001\u0000\u0000\u0000\u00b2\u00b3\u0005\u0001"+
		"\u0000\u0000\u00b3\u00b4\u00059\u0000\u0000\u00b4\u00b6\u0005\u001b\u0000"+
		"\u0000\u00b5\u00b7\u0003\u001a\r\u0000\u00b6\u00b5\u0001\u0000\u0000\u0000"+
		"\u00b6\u00b7\u0001\u0000\u0000\u0000\u00b7\u00b8\u0001\u0000\u0000\u0000"+
		"\u00b8\u00b9\u0005\u001c\u0000\u0000\u00b9\u00ba\u0003T*\u0000\u00ba\u00bb"+
		"\u00030\u0018\u0000\u00bb\u00c5\u0001\u0000\u0000\u0000\u00bc\u00bd\u0005"+
		"\u0001\u0000\u0000\u00bd\u00be\u00059\u0000\u0000\u00be\u00c0\u0005\u001b"+
		"\u0000\u0000\u00bf\u00c1\u0003\u001a\r\u0000\u00c0\u00bf\u0001\u0000\u0000"+
		"\u0000\u00c0\u00c1\u0001\u0000\u0000\u0000\u00c1\u00c2\u0001\u0000\u0000"+
		"\u0000\u00c2\u00c3\u0005\u001c\u0000\u0000\u00c3\u00c5\u00030\u0018\u0000"+
		"\u00c4\u00a6\u0001\u0000\u0000\u0000\u00c4\u00b2\u0001\u0000\u0000\u0000"+
		"\u00c4\u00bc\u0001\u0000\u0000\u0000\u00c5\u0017\u0001\u0000\u0000\u0000"+
		"\u00c6\u00cb\u0003T*\u0000\u00c7\u00c8\u0005\u001f\u0000\u0000\u00c8\u00ca"+
		"\u0003T*\u0000\u00c9\u00c7\u0001\u0000\u0000\u0000\u00ca\u00cd\u0001\u0000"+
		"\u0000\u0000\u00cb\u00c9\u0001\u0000\u0000\u0000\u00cb\u00cc\u0001\u0000"+
		"\u0000\u0000\u00cc\u0019\u0001\u0000\u0000\u0000\u00cd\u00cb\u0001\u0000"+
		"\u0000\u0000\u00ce\u00d3\u0003\u001c\u000e\u0000\u00cf\u00d0\u0005\u001f"+
		"\u0000\u0000\u00d0\u00d2\u0003\u001c\u000e\u0000\u00d1\u00cf\u0001\u0000"+
		"\u0000\u0000\u00d2\u00d5\u0001\u0000\u0000\u0000\u00d3\u00d1\u0001\u0000"+
		"\u0000\u0000\u00d3\u00d4\u0001\u0000\u0000\u0000\u00d4\u001b\u0001\u0000"+
		"\u0000\u0000\u00d5\u00d3\u0001\u0000\u0000\u0000\u00d6\u00d8\u00059\u0000"+
		"\u0000\u00d7\u00d9\u0005&\u0000\u0000\u00d8\u00d7\u0001\u0000\u0000\u0000"+
		"\u00d8\u00d9\u0001\u0000\u0000\u0000\u00d9\u00da\u0001\u0000\u0000\u0000"+
		"\u00da\u00db\u0003T*\u0000\u00db\u001d\u0001\u0000\u0000\u0000\u00dc\u00dd"+
		"\u0005\f\u0000\u0000\u00dd\u00e5\u0003 \u0010\u0000\u00de\u00df\u0005"+
		"\f\u0000\u0000\u00df\u00e0\u0003B!\u0000\u00e0\u00e1\u00030\u0018\u0000"+
		"\u00e1\u00e5\u0001\u0000\u0000\u0000\u00e2\u00e3\u0005\f\u0000\u0000\u00e3"+
		"\u00e5\u00030\u0018\u0000\u00e4\u00dc\u0001\u0000\u0000\u0000\u00e4\u00de"+
		"\u0001\u0000\u0000\u0000\u00e4\u00e2\u0001\u0000\u0000\u0000\u00e5\u001f"+
		"\u0001\u0000\u0000\u0000\u00e6\u00e7\u0003:\u001d\u0000\u00e7\u00e8\u0005"+
		"\"\u0000\u0000\u00e8\u00e9\u0003B!\u0000\u00e9\u00ea\u0005\"\u0000\u0000"+
		"\u00ea\u00eb\u0003\"\u0011\u0000\u00eb\u00ec\u00030\u0018\u0000\u00ec"+
		"!\u0001\u0000\u0000\u0000\u00ed\u00f0\u0003$\u0012\u0000\u00ee\u00f0\u0003"+
		"2\u0019\u0000\u00ef\u00ed\u0001\u0000\u0000\u0000\u00ef\u00ee\u0001\u0000"+
		"\u0000\u0000\u00f0#\u0001\u0000\u0000\u0000\u00f1\u00f2\u00059\u0000\u0000"+
		"\u00f2\u00f3\u0005#\u0000\u0000\u00f3\u00f8\u0005#\u0000\u0000\u00f4\u00f5"+
		"\u00059\u0000\u0000\u00f5\u00f6\u0005$\u0000\u0000\u00f6\u00f8\u0005$"+
		"\u0000\u0000\u00f7\u00f1\u0001\u0000\u0000\u0000\u00f7\u00f4\u0001\u0000"+
		"\u0000\u0000\u00f8%\u0001\u0000\u0000\u0000\u00f9\u00fa\u0005\t\u0000"+
		"\u0000\u00fa\u00fb\u0003B!\u0000\u00fb\u00fc\u0005\u0019\u0000\u0000\u00fc"+
		"\u00fd\u0003(\u0014\u0000\u00fd\u00fe\u0005\u001a\u0000\u0000\u00fe\'"+
		"\u0001\u0000\u0000\u0000\u00ff\u0101\u0003*\u0015\u0000\u0100\u00ff\u0001"+
		"\u0000\u0000\u0000\u0101\u0102\u0001\u0000\u0000\u0000\u0102\u0100\u0001"+
		"\u0000\u0000\u0000\u0102\u0103\u0001\u0000\u0000\u0000\u0103\u0105\u0001"+
		"\u0000\u0000\u0000\u0104\u0106\u0003,\u0016\u0000\u0105\u0104\u0001\u0000"+
		"\u0000\u0000\u0105\u0106\u0001\u0000\u0000\u0000\u0106)\u0001\u0000\u0000"+
		"\u0000\u0107\u0108\u0005\n\u0000\u0000\u0108\u0109\u0003>\u001f\u0000"+
		"\u0109\u010d\u0005!\u0000\u0000\u010a\u010c\u0003\u0006\u0003\u0000\u010b"+
		"\u010a\u0001\u0000\u0000\u0000\u010c\u010f\u0001\u0000\u0000\u0000\u010d"+
		"\u010b\u0001\u0000\u0000\u0000\u010d\u010e\u0001\u0000\u0000\u0000\u010e"+
		"+\u0001\u0000\u0000\u0000\u010f\u010d\u0001\u0000\u0000\u0000\u0110\u0111"+
		"\u0005\u000b\u0000\u0000\u0111\u0115\u0005!\u0000\u0000\u0112\u0114\u0003"+
		"\u0006\u0003\u0000\u0113\u0112\u0001\u0000\u0000\u0000\u0114\u0117\u0001"+
		"\u0000\u0000\u0000\u0115\u0113\u0001\u0000\u0000\u0000\u0115\u0116\u0001"+
		"\u0000\u0000\u0000\u0116-\u0001\u0000\u0000\u0000\u0117\u0115\u0001\u0000"+
		"\u0000\u0000\u0118\u0119\u0005\u0007\u0000\u0000\u0119\u011a\u0003B!\u0000"+
		"\u011a\u011d\u00030\u0018\u0000\u011b\u011c\u0005\b\u0000\u0000\u011c"+
		"\u011e\u00030\u0018\u0000\u011d\u011b\u0001\u0000\u0000\u0000\u011d\u011e"+
		"\u0001\u0000\u0000\u0000\u011e/\u0001\u0000\u0000\u0000\u011f\u0126\u0005"+
		"\u0019\u0000\u0000\u0120\u0122\u0003\u0006\u0003\u0000\u0121\u0123\u0005"+
		"\"\u0000\u0000\u0122\u0121\u0001\u0000\u0000\u0000\u0122\u0123\u0001\u0000"+
		"\u0000\u0000\u0123\u0125\u0001\u0000\u0000\u0000\u0124\u0120\u0001\u0000"+
		"\u0000\u0000\u0125\u0128\u0001\u0000\u0000\u0000\u0126\u0124\u0001\u0000"+
		"\u0000\u0000\u0126\u0127\u0001\u0000\u0000\u0000\u0127\u0129\u0001\u0000"+
		"\u0000\u0000\u0128\u0126\u0001\u0000\u0000\u0000\u0129\u012a\u0005\u001a"+
		"\u0000\u0000\u012a1\u0001\u0000\u0000\u0000\u012b\u012c\u00034\u001a\u0000"+
		"\u012c\u012d\u0003X,\u0000\u012d\u012e\u0003B!\u0000\u012e3\u0001\u0000"+
		"\u0000\u0000\u012f\u0138\u00059\u0000\u0000\u0130\u0131\u0003J%\u0000"+
		"\u0131\u0132\u0005\u001d\u0000\u0000\u0132\u0133\u0003B!\u0000\u0133\u0134"+
		"\u0005\u001e\u0000\u0000\u0134\u0138\u0001\u0000\u0000\u0000\u0135\u0136"+
		"\u0005&\u0000\u0000\u0136\u0138\u0003J%\u0000\u0137\u012f\u0001\u0000"+
		"\u0000\u0000\u0137\u0130\u0001\u0000\u0000\u0000\u0137\u0135\u0001\u0000"+
		"\u0000\u0000\u01385\u0001\u0000\u0000\u0000\u0139\u013a\u0005\u0004\u0000"+
		"\u0000\u013a\u013b\u0005)\u0000\u0000\u013b\u013c\u0005\u0005\u0000\u0000"+
		"\u013c\u013d\u0005\u001b\u0000\u0000\u013d\u013e\u0003>\u001f\u0000\u013e"+
		"\u013f\u0005\u001c\u0000\u0000\u013f7\u0001\u0000\u0000\u0000\u0140\u0141"+
		"\u0005\u0003\u0000\u0000\u0141\u0142\u0003@ \u0000\u0142\u0143\u0003T"+
		"*\u0000\u0143\u014b\u0001\u0000\u0000\u0000\u0144\u0145\u0005\u0003\u0000"+
		"\u0000\u0145\u0146\u0003@ \u0000\u0146\u0147\u0003T*\u0000\u0147\u0148"+
		"\u0005 \u0000\u0000\u0148\u0149\u0003>\u001f\u0000\u0149\u014b\u0001\u0000"+
		"\u0000\u0000\u014a\u0140\u0001\u0000\u0000\u0000\u014a\u0144\u0001\u0000"+
		"\u0000\u0000\u014b9\u0001\u0000\u0000\u0000\u014c\u014d\u0003@ \u0000"+
		"\u014d\u014e\u0005!\u0000\u0000\u014e\u014f\u0005 \u0000\u0000\u014f\u0150"+
		"\u0003>\u001f\u0000\u0150;\u0001\u0000\u0000\u0000\u0151\u0152\u0005\u0006"+
		"\u0000\u0000\u0152\u0153\u00059\u0000\u0000\u0153\u0154\u0003T*\u0000"+
		"\u0154\u0155\u0005 \u0000\u0000\u0155\u0156\u0003B!\u0000\u0156=\u0001"+
		"\u0000\u0000\u0000\u0157\u015c\u0003\u0012\t\u0000\u0158\u0159\u0005\u001f"+
		"\u0000\u0000\u0159\u015b\u0003\u0012\t\u0000\u015a\u0158\u0001\u0000\u0000"+
		"\u0000\u015b\u015e\u0001\u0000\u0000\u0000\u015c\u015a\u0001\u0000\u0000"+
		"\u0000\u015c\u015d\u0001\u0000\u0000\u0000\u015d?\u0001\u0000\u0000\u0000"+
		"\u015e\u015c\u0001\u0000\u0000\u0000\u015f\u0164\u00059\u0000\u0000\u0160"+
		"\u0161\u0005\u001f\u0000\u0000\u0161\u0163\u00059\u0000\u0000\u0162\u0160"+
		"\u0001\u0000\u0000\u0000\u0163\u0166\u0001\u0000\u0000\u0000\u0164\u0162"+
		"\u0001\u0000\u0000\u0000\u0164\u0165\u0001\u0000\u0000\u0000\u0165A\u0001"+
		"\u0000\u0000\u0000\u0166\u0164\u0001\u0000\u0000\u0000\u0167\u0168\u0006"+
		"!\uffff\uffff\u0000\u0168\u0169\u0003D\"\u0000\u0169\u016f\u0001\u0000"+
		"\u0000\u0000\u016a\u016b\n\u0002\u0000\u0000\u016b\u016c\u0007\u0000\u0000"+
		"\u0000\u016c\u016e\u0003D\"\u0000\u016d\u016a\u0001\u0000\u0000\u0000"+
		"\u016e\u0171\u0001\u0000\u0000\u0000\u016f\u016d\u0001\u0000\u0000\u0000"+
		"\u016f\u0170\u0001\u0000\u0000\u0000\u0170C\u0001\u0000\u0000\u0000\u0171"+
		"\u016f\u0001\u0000\u0000\u0000\u0172\u0173\u0006\"\uffff\uffff\u0000\u0173"+
		"\u0174\u0003F#\u0000\u0174\u017a\u0001\u0000\u0000\u0000\u0175\u0176\n"+
		"\u0002\u0000\u0000\u0176\u0177\u0007\u0001\u0000\u0000\u0177\u0179\u0003"+
		"F#\u0000\u0178\u0175\u0001\u0000\u0000\u0000\u0179\u017c\u0001\u0000\u0000"+
		"\u0000\u017a\u0178\u0001\u0000\u0000\u0000\u017a\u017b\u0001\u0000\u0000"+
		"\u0000\u017bE\u0001\u0000\u0000\u0000\u017c\u017a\u0001\u0000\u0000\u0000"+
		"\u017d\u017e\u0006#\uffff\uffff\u0000\u017e\u017f\u0003H$\u0000\u017f"+
		"\u0185\u0001\u0000\u0000\u0000\u0180\u0181\n\u0002\u0000\u0000\u0181\u0182"+
		"\u0007\u0002\u0000\u0000\u0182\u0184\u0003H$\u0000\u0183\u0180\u0001\u0000"+
		"\u0000\u0000\u0184\u0187\u0001\u0000\u0000\u0000\u0185\u0183\u0001\u0000"+
		"\u0000\u0000\u0185\u0186\u0001\u0000\u0000\u0000\u0186G\u0001\u0000\u0000"+
		"\u0000\u0187\u0185\u0001\u0000\u0000\u0000\u0188\u0189\u0006$\uffff\uffff"+
		"\u0000\u0189\u018a\u0003J%\u0000\u018a\u0190\u0001\u0000\u0000\u0000\u018b"+
		"\u018c\n\u0002\u0000\u0000\u018c\u018d\u0007\u0003\u0000\u0000\u018d\u018f"+
		"\u0003J%\u0000\u018e\u018b\u0001\u0000\u0000\u0000\u018f\u0192\u0001\u0000"+
		"\u0000\u0000\u0190\u018e\u0001\u0000\u0000\u0000\u0190\u0191\u0001\u0000"+
		"\u0000\u0000\u0191I\u0001\u0000\u0000\u0000\u0192\u0190\u0001\u0000\u0000"+
		"\u0000\u0193\u0194\u0006%\uffff\uffff\u0000\u0194\u0195\u0005\u001b\u0000"+
		"\u0000\u0195\u0196\u0003B!\u0000\u0196\u0197\u0005\u001c\u0000\u0000\u0197"+
		"\u01a2\u0001\u0000\u0000\u0000\u0198\u0199\u0007\u0004\u0000\u0000\u0199"+
		"\u01a2\u0003J%\b\u019a\u01a2\u0003L&\u0000\u019b\u01a2\u0003\n\u0005\u0000"+
		"\u019c\u01a2\u0003\b\u0004\u0000\u019d\u01a2\u0003\f\u0006\u0000\u019e"+
		"\u01a2\u0003\u000e\u0007\u0000\u019f\u01a2\u0003\u0010\b\u0000\u01a0\u01a2"+
		"\u00059\u0000\u0000\u01a1\u0193\u0001\u0000\u0000\u0000\u01a1\u0198\u0001"+
		"\u0000\u0000\u0000\u01a1\u019a\u0001\u0000\u0000\u0000\u01a1\u019b\u0001"+
		"\u0000\u0000\u0000\u01a1\u019c\u0001\u0000\u0000\u0000\u01a1\u019d\u0001"+
		"\u0000\u0000\u0000\u01a1\u019e\u0001\u0000\u0000\u0000\u01a1\u019f\u0001"+
		"\u0000\u0000\u0000\u01a1\u01a0\u0001\u0000\u0000\u0000\u01a2\u01aa\u0001"+
		"\u0000\u0000\u0000\u01a3\u01a4\n\n\u0000\u0000\u01a4\u01a5\u0005\u001d"+
		"\u0000\u0000\u01a5\u01a6\u0003B!\u0000\u01a6\u01a7\u0005\u001e\u0000\u0000"+
		"\u01a7\u01a9\u0001\u0000\u0000\u0000\u01a8\u01a3\u0001\u0000\u0000\u0000"+
		"\u01a9\u01ac\u0001\u0000\u0000\u0000\u01aa\u01a8\u0001\u0000\u0000\u0000"+
		"\u01aa\u01ab\u0001\u0000\u0000\u0000\u01abK\u0001\u0000\u0000\u0000\u01ac"+
		"\u01aa\u0001\u0000\u0000\u0000\u01ad\u01b5\u0003N\'\u0000\u01ae\u01b5"+
		"\u00056\u0000\u0000\u01af\u01b5\u00055\u0000\u0000\u01b0\u01b5\u00053"+
		"\u0000\u0000\u01b1\u01b5\u00058\u0000\u0000\u01b2\u01b5\u00057\u0000\u0000"+
		"\u01b3\u01b5\u00054\u0000\u0000\u01b4\u01ad\u0001\u0000\u0000\u0000\u01b4"+
		"\u01ae\u0001\u0000\u0000\u0000\u01b4\u01af\u0001\u0000\u0000\u0000\u01b4"+
		"\u01b0\u0001\u0000\u0000\u0000\u01b4\u01b1\u0001\u0000\u0000\u0000\u01b4"+
		"\u01b2\u0001\u0000\u0000\u0000\u01b4\u01b3\u0001\u0000\u0000\u0000\u01b5"+
		"M\u0001\u0000\u0000\u0000\u01b6\u01b7\u0003T*\u0000\u01b7\u01b9\u0005"+
		"\u0019\u0000\u0000\u01b8\u01ba\u0003P(\u0000\u01b9\u01b8\u0001\u0000\u0000"+
		"\u0000\u01b9\u01ba\u0001\u0000\u0000\u0000\u01ba\u01bb\u0001\u0000\u0000"+
		"\u0000\u01bb\u01bc\u0005\u001a\u0000\u0000\u01bcO\u0001\u0000\u0000\u0000"+
		"\u01bd\u01c2\u0003R)\u0000\u01be\u01bf\u0005\u001f\u0000\u0000\u01bf\u01c1"+
		"\u0003R)\u0000\u01c0\u01be\u0001\u0000\u0000\u0000\u01c1\u01c4\u0001\u0000"+
		"\u0000\u0000\u01c2\u01c0\u0001\u0000\u0000\u0000\u01c2\u01c3\u0001\u0000"+
		"\u0000\u0000\u01c3Q\u0001\u0000\u0000\u0000\u01c4\u01c2\u0001\u0000\u0000"+
		"\u0000\u01c5\u01cb\u0003B!\u0000\u01c6\u01c7\u0005\u0019\u0000\u0000\u01c7"+
		"\u01c8\u0003P(\u0000\u01c8\u01c9\u0005\u001a\u0000\u0000\u01c9\u01cb\u0001"+
		"\u0000\u0000\u0000\u01ca\u01c5\u0001\u0000\u0000\u0000\u01ca\u01c6\u0001"+
		"\u0000\u0000\u0000\u01cbS\u0001\u0000\u0000\u0000\u01cc\u01cd\u0005\u001d"+
		"\u0000\u0000\u01cd\u01ce\u0003B!\u0000\u01ce\u01cf\u0005\u001e\u0000\u0000"+
		"\u01cf\u01d0\u0003T*\u0000\u01d0\u01d3\u0001\u0000\u0000\u0000\u01d1\u01d3"+
		"\u0003V+\u0000\u01d2\u01cc\u0001\u0000\u0000\u0000\u01d2\u01d1\u0001\u0000"+
		"\u0000\u0000\u01d3U\u0001\u0000\u0000\u0000\u01d4\u01d5\u0007\u0005\u0000"+
		"\u0000\u01d5W\u0001\u0000\u0000\u0000\u01d6\u01da\u0005 \u0000\u0000\u01d7"+
		"\u01d8\u0007\u0006\u0000\u0000\u01d8\u01da\u0005 \u0000\u0000\u01d9\u01d6"+
		"\u0001\u0000\u0000\u0000\u01d9\u01d7\u0001\u0000\u0000\u0000\u01daY\u0001"+
		"\u0000\u0000\u0000\']f}\u0099\u009e\u00a4\u00aa\u00b6\u00c0\u00c4\u00cb"+
		"\u00d3\u00d8\u00e4\u00ef\u00f7\u0102\u0105\u010d\u0115\u011d\u0122\u0126"+
		"\u0137\u014a\u015c\u0164\u016f\u017a\u0185\u0190\u01a1\u01aa\u01b4\u01b9"+
		"\u01c2\u01ca\u01d2\u01d9";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}