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

    <?php require 'view/snippets/xheader.sp.php'; ?>

    
    <section id="wrapper">

        
    <form action="" method="post" class="formular-termin">

        <h1>Ihre Führungen am 01.01.2001</h1>

        <div class="termin">
            <span class="termine">
                <p>Vorname: Donler</p>
                <p>Nachname: TheMaschin</p>
                <p>Start: 10:00 Uhr</p>
                <p>Ende: 11:00 Uhr</p>
                <p>Fachrichtung: Holz</p>
                <p><label for="anzahl">Anzahl Personen:</label><input class="anzahlTeilnehmer" type="number" id="anzahl" value="7" max="10" min="1"></p>
            </span>
            <span class="buttons">
                <input type="button" value="Abmelden" class="abmelden" onclick="termin_abmelden()">
                <input type="submit" value="Ändern" class="aendern">
            </span>
        </div>
        <div class="termin_bestaetigen">
            <p>Wollen Sie sich wircklich abmelden?</p>
            <span class="buttons">
                <input type="button" value="Abmelden" class="abmelden">
                <input type="submit" value="Zurück" class="aendern">
            </span>
        </div>

    </form>


    </section>



    <?php require 'view/snippets/xfooter.sp.php'; ?>

</body>

</html>