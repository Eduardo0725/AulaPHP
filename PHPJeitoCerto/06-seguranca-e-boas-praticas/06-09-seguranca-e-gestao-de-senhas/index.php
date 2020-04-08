<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

// $pass = password_hash(12345, PASSWORD_DEFAULT, ['cost' => 12]);
$pass = password_hash(12345, PASSWORD_DEFAULT);

echo "<pre>";
var_dump($pass);
echo "</pre>";

echo "<pre>";
var_dump([
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ['cost' => 10]),
    password_verify(12345, $pass)
]);
echo "</pre>";

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = new Source\Entity\UserEntity;
$user->load(4);
$user->password = $pass;
$user->save();

echo "<pre>";
var_dump(
    $user,
    password_verify(12345, $user->password)
);
echo "</pre>";

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = new Source\Entity\UserEntity;
$login->find("eleno29@email.com.br");

echo "<pre>";
var_dump(
    $login
);
echo "</pre>";

if(!$login->email){
    echo "Email não confere!";
}elseif(!password_verify(12345, $login->password)){
    echo "Senha inválido!";
}else{
    $login->password = password_hash($login->password, PASSWORD_DEFAULT);
    $login->save();
}

/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

require __DIR__ .  "./../source/Helpers/Helpers.php";

$pass = "1234567890";

echo "<pre>",
var_dump(
    $passwd = passwd($pass),
    passwd_verify($pass, $passwd),
    passwd_rehash($passwd)
), "</pre>";
