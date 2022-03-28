<?php

require_once 'model/entities/db.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';


var_dump(Offener_tag::findeAlleOffener_tag());


//<p>Status<input type="checkbox" id="scales" name="scales"></p>
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./view/style/styles.css">
        <title>$platzhalter für Event</title>
    </head>

    <body>
        <form action="offener_tag_erstellen.php" method="post" >
            <p>bezeichnung: <input type="text" name="bezeichnung" id="bezeichnung" required/></p>
            <p>Intervall: <input type="number" name="intervall" id="intervall" required/></p>
            <p>Datum: <input type="date" name="datum" id="datum" required/></p>
            <p>Startuhrzeit: <input type="time" name="start" id="start" required/></p>
            <p>Enduhrzeit: <input type="time" name="ende" id="ende" required/></p>
            
            <p><input type="submit" value="Erstellen" /></p>
        </form>




























        
        <script>

        var feld = 0;
        var feldm = 0;

        function feld_plus() {
        if (feld <= 9) {
        feld++;
        document.getElementById('dynamic_input').innerHTML = "";
        for (var zaehler = 1; zaehler <= feld; zaehler++) {
        var label = "Feld " + zaehler;
        var inhalt = document.getElementById("speicher" + zaehler).value;
        document.getElementById('dynamic_input').innerHTML +=
            "<label>" + label + ": <input type='text' name='n_" + feld + "' value='" + inhalt +
            "' onInput='speicher(this.value, \"" + feld + "\")'></label><br>";
        }
        }
        }

        function feld_minus() {
        if (feld >= feldm) {
        feld--;
        document.getElementById('dynamic_input').innerHTML = "";
        for (var zaehler = 1; zaehler <= feld; zaehler++) {
        var label = "Feld " + zaehler;
        var inhalt = document.getElementById("speicher" + zaehler).value;
        document.getElementById('dynamic_input').innerHTML +=
            "<label>" + label + ": <input type='text' name='n_" + feld + "' value='" + inhalt +
            "' onInput='speicher(this.value, \"" + feld + "\")'></label><br>";
        }
        }
        }

        function speicher(inhalt, feld) {
        document.getElementById("speicher" + feld).value = inhalt;
        }
        </script>

        Felder hinzufügen <input type="button" value="-" onClick="feld_minus();">
        <input type="button" value="+" onClick="feld_plus();">

        <div id="dynamic_input"></div>

        <!-- Speicher -->
        <input type="hidden" id="speicher1">
        <input type="hidden" id="speicher2">
        <input type="hidden" id="speicher3">
        <input type="hidden" id="speicher4">
        <input type="hidden" id="speicher5">
        <input type="hidden" id="speicher6">
        <input type="hidden" id="speicher7">
        <input type="hidden" id="speicher8">
        <input type="hidden" id="speicher9">
        <input type="hidden" id="speicher10">



</body>
</html>
