<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1");
$stmt->execute();

echo "<pre>", var_dump(
    $stmt,
    $stmt->rowCount(),
    $stmt->columnCount(),
    $stmt->fetchAll()
), "</pre>";

/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

// $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = :id");
// $stmt->bindValue(":id", 50, PDO::PARAM_INT);
// $stmt->execute();

// echo "<pre>",var_dump(
//     $stmt->fetchAll()
// ),"</pre>";

////////////////////////////////////////////////////////////////////////////////

// $stmt = Connect::getInstance()->prepare("
//     INSERT INTO users (first_name, last_name)
//     VALUE(?, ?)
// ");

// $stmt->bindValue( 1, "Eduardo", PDO::PARAM_STR);
// $stmt->bindValue( 2, "Andrade", PDO::PARAM_STR);
// $stmt->execute();

// echo "<pre>",var_dump(
//     $stmt->rowCount(),
//     Connect::getInstance()->lastInsertId()
// ),"</pre>";

////////////////////////////////////////////////////////////////////////////////

// $stmt = Connect::getInstance()->prepare("
//     INSERT INTO users (first_name, last_name)
//     VALUE(:first_name, :last_name)
// ");

// $nome = "Eduardo";

// $stmt->bindValue( ":first_name", $nome, PDO::PARAM_STR);
// $stmt->bindValue( ":last_name", "Andrade", PDO::PARAM_STR);
// $stmt->execute();

// echo "<pre>",var_dump(
//     $stmt->rowCount(),
//     Connect::getInstance()->lastInsertId()
// ),"</pre>";

/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

// $stmt = Connect::getInstance()->prepare("
//     INSERT INTO users (first_name, last_name)
//     VALUE(:first_name, :last_name)
// ");

// $first_name = "Eduardo";
// $last_name = "Andrade";

// $stmt->bindParam( ":first_name", $first_name, PDO::PARAM_STR);
// $stmt->bindParam( ":last_name", $last_name, PDO::PARAM_STR);
// $stmt->execute();

// echo "<pre>",var_dump(
//     $stmt->rowCount(),
//     Connect::getInstance()->lastInsertId()
// ),"</pre>";

/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

// $stmt = Connect::getInstance()->prepare("
//     INSERT INTO users (first_name, last_name)
//     VALUE(:first_name, :last_name)
// ");

// $first_name = "Eduardo";
// $last_name = "Andrade";

// $user = [
//     ":first_name" => $first_name,
//     ":last_name" => $last_name
// ];
// $stmt->execute($user);

// echo "<pre>", var_dump(
//     $stmt->rowCount(),
//     Connect::getInstance()->lastInsertId()
// ), "</pre>";

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();

$stmt->bindColumn( "first_name", $name);
$stmt->bindColumn( "email", $email);

while($user = $stmt->fetch()){
    echo "<pre>", var_dump($user), "</pre>";
    echo "<p>O E-mail de {$name} é {$email}.</p>";
}
