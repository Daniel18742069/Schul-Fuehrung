<?php
require_once 'entities/db.php';
require_once 'entities/entity.php';
require_once 'entities/anmeldung.php';
require_once 'entities/fachrichtung.php';
require_once 'entities/fuehrung.php';
require_once 'entities/offener_tag.php';

require_once '../controller/controller.php';

//var_dump($_POST);

    $offener_tag = new Offener_tag($_POST);
    var_dump($offener_tag);

    $offener_tag->speichere();

    header('Location: gen...'); //pfad wieder zurück zur adminseite





    

    
    

?>