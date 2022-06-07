<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ihre Führung</title>
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />
    <script type="text/javascript" src="<?= CONF['BACKSLASH'] ?>model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>
    <?php require 'view/snippets/info_box.sp.php'; ?>

    <?php require 'view/snippets/header.sp.php'; ?>


    <section id="wrapper">


        <form action="Termin&<?= $token ?>" method="post" class="formular-termin">

            <h1>Ihre Führung am <?= $datum; ?></h1>

            <div class="termin" id="term">
                <span class="termine">
                    <p>Vorname: <?= $vorname ?></p>
                    <p>Nachname: <?= $nachname ?></p>
                    <p>Start: <?= $start ?> Uhr</p>
                    <p>Ende: <?= $ende ?> Uhr</p>
                    <p>Fachrichtung: <?= $fachrichtung ?></p>
                    <p><label for="anzahl">Anzahl Personen:</label><input class="anzahlTeilnehmer" name="anzahl" type="number" id="anzahl" value="<?= $anzahl ?>" max="<?= $maxanzahl ?>" min="1" /></p>
                </span>
                <span class="buttons">
                    <input type="button" name="abmelden_auswaehlen" value="Abmelden" class="abmelden" onclick="termin_abmelden_bestaetigen()" />
                    <input type="button" name="aendern_auswaehlen" value="Ändern" class="aendern" onclick="termin_aendern_bestaetigen()" />
                </span>
            </div>
            <div class="termin_abmelden" id="term_abme">
                <p>Wollen Sie sich wirklich abmelden?</p>
                <span class="buttons">
                    <input type="submit" name="abmelden" value="Abmelden" class="abmelden" />
                    <input type="button" name="nicht_abmelden" value="Zurück" class="aendern" onclick="termin_aktion_abbrechen()" />
                </span>
            </div>
            <div class="termin_aendern" id="term_aend">
                <p>Wollen Sie wirklich Ihren Termin ändern?</p>
                <span class="buttons">
                    <input type="submit" name="aendern" value="Ändern" class="abmelden" />
                    <input type="button" name="nicht_aendern" value="Zurück" class="aendern" onclick="termin_aktion_abbrechen()" />
                </span>
            </div>

        </form>


    </section>



    <?php require 'view/snippets/footer.sp.php'; ?>

</body>

</html>