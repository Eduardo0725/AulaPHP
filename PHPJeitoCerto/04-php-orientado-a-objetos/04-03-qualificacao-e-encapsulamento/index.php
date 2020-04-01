<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__ . "\classes\App\Template.php";
require __DIR__ . "\classes\Web\Template.php";

$appTemplate = new App\Template;
$webTemplate = new Web\Template;

echo "<pre>" , var_dump([
    $appTemplate,
    $webTemplate
]) , "</pre>";

use App\Template;
use Web\Template AS WebTemplate;

$appUseTemplate = new Template;
$webUseTemplate = new WebTemplate;

echo "<pre>" , var_dump([
    $appUseTemplate,
    $webUseTemplate
]) , "</pre>";

/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__ . "/source/Qualifield/User.php";

$user = new \Source\Qualifield\User();

// $user->firstName = "Eduardo";
// $user->lastName = "Andrade";

// $user->setFirstName("Eduardo");
// $user->setLastName("Andrade");

echo "<pre>" , var_dump([
    $user,
    get_class_methods($user)
]) , "</pre>";

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

$eduardo = $user->setUser(
    "Eduardo",
    "Andrade",
    "example@cbd.com"
);

if(!$eduardo){
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

$kaue = new \Source\Qualifield\User();
$kaue->setUser(
    "Kaue",
    "Morandi",
    "example@cbd.com"
);

$gah = new \Source\Qualifield\User();
$gah->setUser(
    "Gah",
    "Cardoso",
    "example@cbd.com"
);


echo "<pre>" , var_dump([
    $user,
    $kaue,
    $gah
]) , "</pre>";