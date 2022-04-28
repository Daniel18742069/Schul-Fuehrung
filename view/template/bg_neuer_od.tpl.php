<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />

    <title>Neuer Open Day</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Neuer Open Day</h2>

            <form action="index.php?aktion=bg_od_erfolgreich" method="post">


                <div class="neuer-od-formular">
                    <span><p>Bezeichnung:</p></span>
                    <span><p><input type="text" name="bezeichnung" id="bezeichnung" required class="felder-neuer-od feld-neuer-od-bez"/></p></span>
                </div>
                    

                <div class="neuer-od-formular">

                    <span><p>Datum:</p><input type="date" name="datum" id="datum" required class="felder-neuer-od" /></span>

                    <span><p>Intervall:</p><input type="number" name="intervall" id="intervall" min="10" placeholder="Minuten" required class="felder-neuer-od" /></span>

                    <span><p>Startuhrzeit:</p><input type="time" name="start" id="start" required class="felder-neuer-od" /></span>

                    <span><p>Enduhrzeit:</p><input type="time" name="ende" id="ende" required class="felder-neuer-od" /></span>

                </div>

                <input type="submit" value="Erstellen">

            </form>

        </div>
    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>