<?php 
require_once 'model/entities/db.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./view/style/styles.css">
        <title>asda$platzhalter für </title>
    </head>

    <?php   var_dump(Offener_tag::findeNeuestenOffenenTag());
            $fachrichtungen = Fachrichtung::findeAlleFachrichtungen();
     ?>

    <body>
        <p>Welche Fachrichtungen sollen angeboten werden?</p>
        <?php foreach ($fachrichtungen as $key => $value) {
            ?>
            <div>
            <input type="checkbox" id="<?=$value->getId()?>" name="<?=$key?>">
            <label for="<?=$key?>"><?=$value->getBeschreibung()?></label>
          </div>
          <?php
        }
        ?>


        <form action="offener_tag_erstellen.php" method="post" >
            <p>bezeichnung: <input type="text" name="bezeichnung" id="bezeichnung" required/></p>
            <p>Intervall: <input type="number" name="intervall" id="intervall" min="0" required/></p>
            <p>Datum: <input type="date" name="datum" id="datum" required/></p>
            <p>Startuhrzeit: <input type="time" name="start" id="start" required/></p>
            <p>Enduhrzeit: <input type="time" name="ende" id="ende" required/></p>
            
            <p><input type="submit" value="Erstellen" /></p>
        </form>
</body>
</html>