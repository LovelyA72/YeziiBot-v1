<?php
//return;
require("Math/TranslationStrategy/TranslationStrategyInterface.php");
require("Math/TranslationStrategy/ShuntingYard.php");
require("Math/Token.php");
require("Math/Parser.php");
require("Math/Operator.php");
require("Math/Lexer.php");

$parser = new \Math\Parser();
$expression = $argvs;
try {
	$result = $parser->evaluate($expression);
	$message = $result;
}
catch(Exception $e){
	$message = "表达式有问题啾...
请检查一下符号与数字之间是不是漏输空格了（例如说-2会被认为是负2，而- 2会被认为是减2）
表达式正确范例：11 - -2 * -3 * ( 17 * 81 ) - ( -45 - 10 )";
}


$sendBack = true;