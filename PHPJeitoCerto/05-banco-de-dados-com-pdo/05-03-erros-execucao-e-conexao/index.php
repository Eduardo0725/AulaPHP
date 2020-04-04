<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

try {
    // throw new Exception("ERROR!!!");
    // throw new PDOException("PDO-ERROR!!!");
    throw new ErrorException("ERROR-ERROR!!!");
} catch (PDOException | ErrorException $e){
    echo "<pre>",var_dump($e),"</pre>";
} catch (Exception $e){
    echo "<p class='trigger error'>{$e->getMessage()}</p>";
} finally {
    echo "<p class='trigger'>A execução terminou!</p>";
}

/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try{
    $pdo = new PDO(
        "mysql:host=localhost;port=3306;dbname=phpdojeitocerto",
        "Cliente",
        "Cliente",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );
    echo "<pre>",var_dump($pdo),"</pre>";

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<pre>",var_dump($user),"</pre>";
    }
} catch (PDOException $e){
    echo "<pre>",var_dump($e),"</pre>";
}

/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$pdo1 = Connect::getInstance();
$pdo2 = Connect::getInstance();

echo "<pre>",var_dump(
    $pdo1,
    $pdo2,
    Connect::getInstance(),
    Connect::getInstance()::getAvailableDrivers(),
    Connect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME)
),"</pre>";