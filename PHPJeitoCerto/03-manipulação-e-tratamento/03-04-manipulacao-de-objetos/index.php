<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "robson@email.com"
];

$objProfile = (object)$arrProfile;

echo "<pre>" , var_dump($arrProfile, $objProfile) , "</pre>";
echo "<p>", $arrProfile["name"], "</p>";
echo "<p>", $objProfile->name, "</p>";

$ceo = $objProfile;
unset($ceo->company);
echo "<pre>" , var_dump($ceo) , "</pre>";

$company = new StdClass();
$company->company = "UnInside";
$company->ceo = $ceo;
$company->manager = new StdClass();
$company->manager->name = "Kaue";
$company->manager->mail = "cursos@email.com";

echo "<pre>" , var_dump($company) , "</pre>";

$date = new DateTime();

echo "<pre>" , var_dump([
    "class" => get_class($date),
    "methods" => get_class_methods($date),
    "vars" => get_object_vars($date),
    "parent" => get_parent_class($date),
    "subclass" => is_subclass_of($date, "DateTime")
]) , "</pre>";

$exception = new PDOException();

echo "<pre>" , var_dump([
    "class" => get_class($exception),
    "methods" => get_class_methods($exception),
    "vars" => get_object_vars($exception),
    "parent" => get_parent_class($exception),
    "subclass" => is_subclass_of($exception, "Exception")
]) , "</pre>";



/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);