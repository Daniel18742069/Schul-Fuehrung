<?php

require_once 'config/config.ini.php';
require_once 'model/db.php';
require_once 'model/funktionen.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';

//session_start();
//var_dump($_SESSION);


$aktion = isset($_GET['aktion'])?$_GET['aktion']:'be_alle_od';

$controller = new Controller();

if (method_exists($controller, $aktion)) {
    $controller->run($aktion);
}
