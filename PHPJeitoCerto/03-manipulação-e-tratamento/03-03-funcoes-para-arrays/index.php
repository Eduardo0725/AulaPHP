<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge"
];

$assoc = [
    "banda_1" => "AC/DC",
    "banda_2" => "Nirvana",
    "banda_3" => "Alter Bridge"
];

array_unshift($index, "Pearl Jam", "");
$assoc = ["banda_4" => "Pearl Jam", "banda_5" => ""] + $assoc;

array_push($index, "");
$assoc = $assoc + ["banda_6" => ""];

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

array_shift($index);
array_shift($assoc);

array_pop($index);
array_pop($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

$index = array_filter($index);
$assoc = array_filter($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

$index = array_reverse($index);
$assoc = array_reverse($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

asort($index);
asort($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

ksort($index);
ksort($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

krsort($index);
krsort($assoc);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

sort($index);

echo "<pre>", var_dump([
    $index
]), "</pre>";

rsort($index);

echo "<pre>", var_dump([
    $index
]), "</pre>";

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

echo "<pre>", var_dump([
    $index,
    $assoc
]), "</pre>";

if(in_array("AC/DC", $assoc)){
    echo "<p>Cause I'm back!</p>";
}

$arrToString = implode(", ", $assoc);
echo $arrToString;

echo "<pre>", var_dump([
    $arr = explode(", ", $arrToString)
]), "</pre>";

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "robson@email.com"
];

$template = <<<TEM
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="{{mail}}">Enviar e-mail</a></p>
    </article>
TEM;

echo $template;

$newprofile = "{{" . implode("}}&{{", array_keys($profile)) . "}}";
$newTemplate = str_replace(explode("&",$newprofile), array_values($profile), $template);
echo $newTemplate;