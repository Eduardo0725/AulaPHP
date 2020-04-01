<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new Source\Inheritance\Event\Event(
    "Workshop",
    new DateTime("2019-05-20 16:00"),
    2500,
    4
);

echo "<pre>" , var_dump([
    $event
]) , "</pre>";

$event->register("Eduardo", "example@email.com");
$event->register("Kaue", "example@email.com");
$event->register("Gah", "example@email.com");
$event->register("Gustavo", "example@email.com");
$event->register("João", "example@email.com");


/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new Source\Inheritance\Address("Rua dos Eventos", "1234");
$event = new Source\Inheritance\Event\EventLive(
    "Workshop",
    new DateTime("2019-05-20 16:00"),
    2500,
    4,
    $address
);

echo "<pre>" , var_dump([
    $event
]) , "</pre>";

$event->register("Eduardo", "example@email.com");
$event->register("Kaue", "example@email.com");
$event->register("Gah", "example@email.com");
$event->register("Gustavo", "example@email.com");
$event->register("João", "example@email.com");

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event = new Source\Inheritance\Event\EventOnline(
    "Workshop",
    new DateTime("2019-05-20 16:00"),
    2500,
    "http://upinside.com.br/aovivo"
);

echo "<pre>" , var_dump([
    $event
]) , "</pre>";

$event->register("Eduardo", "example@email.com");
$event->register("Kaue", "example@email.com");
$event->register("Gah", "example@email.com");
$event->register("Gustavo", "example@email.com");
$event->register("João", "example@email.com");