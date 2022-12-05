<?php

require_once 'config/config.ini.php';
require_once 'config/info.ini.php';
require_once 'model/db.php';
require_once 'model/funktionen.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';

require_once 'model/email.php';
require_once 'model/phpmailer/src/Exception.php';
require_once 'model/phpmailer/src/PHPMailer.php';
require_once 'model/phpmailer/src/SMTP.php';


$subject ="test";
$message ="asdasgzdas Hallo ich bins, benno";
$to_address ="benno.pichle@gmail.com";
$to_name ="Benno";

email::send(
    $subject,
    $message,
    $to_address,
    $to_name
);


?>
