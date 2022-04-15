<?php

require('src/function.php');

$mass[] = task1(50);
$jsmass = json_encode($mass);

file_put_contents('../0php/fileS.json', $jsmass);


$jsmass = json_decode(file_get_contents('../0php/fileS.json', $jsmass), true);
?>
    <pre><?
var_dump($jsmass);

task2($mass[0]);

task3($mass[0]);



