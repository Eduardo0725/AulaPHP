<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

$userFirstName = "Eduardo";
$userLastName = "Carvalho";

echo "<p>{$userFirstName} {$userLastName}</p>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;

echo "<p>{$user_first_name} {$user_last_name}</p>";

//variável variável
$company = "UpInside";
$$company = "treinamento";

echo "<h1>{$company} {$UpInside}</h1>";

$calcA = 20;
$calcB = 10;

$calcB = &$calcA;

$calcB = 80;

var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;

var_dump([
    $true,
    $false
]);

$user_age = 35;
$best_age = ($user_age > 30);
var_dump($best_age);

$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

if($a || $b || $c || $d || $e){
    var_dump(true);
}else{
    var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article><h1>Olá Mundo!</h1></article>";
$codeClear = call_user_func("strip_tags",$code);
var_dump($code, $codeClear);

$codeMore = function($code){
    var_dump($code);
};

$codeMore("#boraProgramar!");

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Olá Mundo!";
$array = [$string];
$object = new stdClass();
$object->hello = $string;
$null = null;
$int = 1234567;
$float = 1.234567;

var_dump($string, $array, $object, $null, $int, $float);