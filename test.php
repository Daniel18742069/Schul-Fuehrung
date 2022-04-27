<?php

$heute = new DateTime("10:30");

$minutes_to_add = 60;

$temp = $heute->add(new DateInterval('PT' . $minutes_to_add . 'M'));

echo date_format($temp, 'H:i');


?>