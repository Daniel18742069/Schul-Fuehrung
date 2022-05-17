<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ihre Führungen</title>
    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_alleTermine.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    
    <section id="wrapper">

        
    <form action="" method="post" class="formular-termin">

        <h1>Ihre Führungen am <?= $datum; ?></h1>

        <div class="termin" id="term">
            <span class="termine">
                <p>Vorname: <?= $vorname ?></p>
                <p>Nachname: <?= $nachname ?></p>
                <p>Start: <?= $start ?> Uhr</p>
                <p>Ende: <?= $ende ?> Uhr</p>
                <p>Fachrichtung: <?= $fachrichtung ?></p>
                <p><label for="anzahl">Anzahl Personen:</label><input class="anzahlTeilnehmer" type="number" id="anzahl" value="<?= $anzahl ?>" max="10" min="1"></p>
            </span>
            <span class="buttons">
                <input type="button" value="Abmelden" class="abmelden" onclick="termin_abmelden()">
                <input type="button" value="Ändern" class="aendern" onclick="termin_aendern()">
            </span>
        </div>
        <div class="termin_bestaetigen" id="term_best">
            <p>Wollen Sie sich wircklich abmelden?</p>
            <span class="buttons">
                <input type="submit" value="Abmelden" class="abmelden">
                <input type="button" value="Zurück" class="aendern" onclick="termin_zurueck()">
            </span>
        </div>
        <div class="termin_aendern" id="term_aend">
            <p>Wollen Sie wirklich Ihren Termin ändern?</p>
            <span class="buttons">
                <input type="submit" value="Ändern" class="abmelden">
                <input type="button" value="Zurück" class="aendern" onclick="termin_zurueck()">
            </span>
        </div>

    </form>


    </section>



    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>