<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1980-05-03");
$dateStatic = DateTime::createFromFormat(DATE_BR, "21/03/2020 12:00:00");
$dateNewStatic = DateTime::createFromFormat("d/m/Y", "21/03/2020");

echo "<pre>" , var_dump([
    $dateNow,
    $dateBirth,
    $dateStatic,
    $dateNewStatic
]) , "</pre>";

echo "<pre>" , var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("d")
]) , "</pre>";

echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")}</p>";


$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTime = new DateTime("now", $newTimeZone);
$datenow = new DateTime();

echo "<pre>" , var_dump([
    $newTimeZone,
    $newDateTime,
    $datenow
]) , "</pre>";

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

echo "<pre>" , var_dump([
    $dateInterval
]) , "</pre>";

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

echo "<pre>" , var_dump([
    $dateTime
]) , "</pre>";

$birth = new DateTime(date("Y")."-11-07");
$timeNow = new DateTime("now");
$diff = $timeNow->diff($birth);

echo "<pre>" , var_dump([
    $birth,
    $diff
]) , "</pre>";

if($diff->invert){
    echo "<p>Seu aniversário foi há {$diff->days} dias.</p>";
}else{
    echo "<p>Faltam {$diff->days} dias para o seu aniversário!</p>";
}

$dateResources = new DateTime("now");


echo "<pre>" , var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR)
]) , "</pre>";

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2021-12-12");

$period = new DatePeriod($start,$interval,$end);

echo "<pre>" , var_dump([
    $start = new DateTime("now"),
    $interval = new DateInterval("P1M"),
    $end = new DateTime("2021-12-12"),
], $period, get_class_methods($period)) , "</pre>";

echo "<h1>Suas assinaturas:</h1>";

foreach($period as $recurrences){
    echo "<p>Sua próxima fatura é {$recurrences->format(DATE_BR)}</p>";
}