<?php
require_once 'model/entities/db.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';

//var_dump($_POST);

    $offener_tag = new Offener_tag($_POST);
    var_dump($offener_tag);

    $offener_tag->speichere();




    

    
    

?>