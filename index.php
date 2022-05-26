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



session_start();

$aktion = isset($_GET['aktion'])
    ? $_GET['aktion']
    : CONF['DEFAULT_SITE'];

$controller = new Controller();

if (substr($aktion, 0, 2) == "be") {
    if ($aktion == "be_login_admin") {
        // Platzhalter
    } else if (!ist_eingeloggt()) {
        $aktion = "be_login_admin";
    }
}

if (
    !method_exists($controller, $aktion)
    || $aktion == "run"
) {
    $aktion = CONF['DEFAULT_SITE'];
}

$controller->run($aktion);
