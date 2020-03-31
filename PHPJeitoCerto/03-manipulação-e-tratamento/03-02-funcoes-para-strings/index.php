<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último show do AC/DC foi incrível";
echo "<pre>", var_dump([
    "string" => $string,
    "strlen" => strlen($string),
    "mb_strlen" => mb_strlen($string),
    "substr" => substr($string, "10"),
    "mb_substr" => mb_substr($string, "10"),
    "strtoupper" => strtoupper($string),
    "mb_strtoupper" => mb_strtoupper($string)
]), "</pre>";

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString = $string;
echo "<pre>", var_dump([
    "mb_strtoupper" => mb_strtoupper($mbString),
    "mb_strtolower" => mb_strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
]), "</pre>";

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . ", iria novamente, e o que vc achou?";
echo "<pre>", var_dump([
    "mb_strlen" => mb_strlen($mbReplace),
    "mb_strpos" => mb_strpos($mbReplace, ", "),
    "mb_strrpos" => mb_strrpos($mbReplace, ", "),
    "mb_substr" => mb_substr($mbReplace, 26, 16),
    "mb_strstr false" => mb_strstr($mbReplace, ", "),
    "mb_strstr true" => mb_strstr($mbReplace, ", ", true),
    "mb_strrchr false" => mb_strrchr($mbReplace, ", "),
    "mb_strrchr true" => mb_strrchr($mbReplace, ", ", true),
]), "</pre>";

$mbStrString = $string;

echo "<p>", $mbStrString, "</p>";

echo "<p>", str_replace("AC/DC", "Nirvana", $mbStrString) , "</p>";
echo "<p>", str_replace(["AC/DC", "incrível"], "Nirvana", $mbStrString) , "</p>";
echo "<p>", str_replace(["AC/DC", "incrível"], ["Nirvana", "ÉPICO!"], $mbStrString) , "</p>";

$article = <<<EXEMPLO
    <article>
        <h1>event</h1>
        <p>desc</p>
    </article>
EXEMPLO;

$articleData = [
    "event" => "Rock In Rio",
    "desc" => $mbStrString,
];

echo "<p>", str_replace(array_keys($articleData), array_values($articleData), $article) , "</p>";

/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Eduardo&email=eduardo@email.com";

parse_str($endPoint, $endPointArray);

echo "<pre>", var_dump([
    $endPoint,
    $endPointArray,
    (object)$endPointArray
]), "</pre>";