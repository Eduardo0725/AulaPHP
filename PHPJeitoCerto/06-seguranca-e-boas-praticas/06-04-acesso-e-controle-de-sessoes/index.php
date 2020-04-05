<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

require __DIR__ . "/../source/autoload.php";

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);

///////////////////////////////////
use Source\Database\Connect;
$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1");
$stmt->execute();
///////////////////////////////////

define("CONF_SES_PATH", __DIR__."./../storage/sessions");

$session = new Source\Core\Session();
$session->set("user", 1);
$session->regenerate();

$session->set("stats", ["name", "email"]);
$session->unset("stats");

if(!$session->has("login")){
    echo "<p>Logar-se!</p>";
    $user = $stmt->fetch();
    $session->set("login", $user);
}

$session->destroy();

echo "<pre>", var_dump(
    $_SESSION,
    $session->all(),
    $session->user,
    session_id(),
), "</pre>";