<?php


$heute = new DateTime("10:30");

var_dump($heute);
echo "<br>";
$minutes_to_add = 60;
$heute->add(new DateInterval('PT' . $minutes_to_add . 'M'));

var_dump($heute);
echo $heute[]->getdate();


?>