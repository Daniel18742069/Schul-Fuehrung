<?php

$heute = new DateTime("10:30");



var_dump($heute);

echo "<br>";

$minutes_to_add = 60;

$temp = $heute->add(new DateInterval('PT' . $minutes_to_add . 'M'));

//var_dump($temp->);
?>