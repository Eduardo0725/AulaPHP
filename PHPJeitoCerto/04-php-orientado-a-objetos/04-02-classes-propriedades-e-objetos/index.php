<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);

require __DIR__ . "/classes/User.php";

$user = new User();
echo "<pre>" , var_dump([
    $user
]) , "</pre>";

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "Robson";
$user->lastName = "Leite";
$user->email = "cursos";

echo "<pre>" , var_dump([
    $user
]) , "</pre>";
/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Robson");
$user->setLastName("Leite");
if(!$user->setEmail("cursos")){
    echo "<p class='trigger error'>O e-mail {$user->getEmail()} não é valido!</p>";
}

echo "<pre>" , var_dump([
    $user
]) , "</pre>";