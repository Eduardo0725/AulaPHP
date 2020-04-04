<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;


/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$connect = Connect::getInstance();
$read = $connect->query("SELECT * FROM users LIMIT 3");

if(!$read->rowCount()){
    echo "<p class='trigger warning'>Não obteve resultados.</p>";
}else{
    echo "<pre>",var_dump($read->fetch()),"</pre>";

    while($user = $read->fetch()){
        echo "<pre>",var_dump($user),"</pre>";
    }
    echo "<pre>",var_dump($user),"</pre>";
}


/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$read = $connect->query("SELECT * FROM users LIMIT 3,2");

// while($user = $read->fetchAll()){
//     echo "<pre>",var_dump($user),"</pre>";
// }

foreach($read->fetchAll() as $user){
    echo "<pre>",var_dump($user),"</pre>";
}

echo "<pre>",var_dump($read->fetchAll()),"</pre>";

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

$read = $connect->query("SELECT * FROM users LIMIT 5,1");

$result = $read->fetchAll();

echo "<pre>",var_dump(
    $read->fetchAll(),
    $result,
    $result
),"</pre>";

/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll() as $user){
    echo "<pre>",var_dump($user, $user->first_name),"</pre>";
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_NUM) as $user){
    echo "<pre>",var_dump($user, $user[1]),"</pre>";
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_ASSOC) as $user){
    echo "<pre>",var_dump($user, $user["first_name"]),"</pre>";
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_CLASS, Source\Database\Entity\UserEntity::class) as $user){
    echo "<pre>",var_dump(
        $user,
        // $user->first_name,
        $user->getFirstName()
    ),"</pre>";
}

