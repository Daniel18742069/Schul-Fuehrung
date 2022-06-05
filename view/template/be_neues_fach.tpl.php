<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/be_CSS/style_alle_od.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/Schul-Fuehrung/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="/Schul-Fuehrung/img/favicon.png" color="#111" />
    <title>Neuer Open Day</title>

</head>

<body>

    <?php require '/Schul-Fuehrung/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Neue Fachrichtung</h2>

            <form action="/Schul-Fuehrung/AlleOpenDay" method="post">

                <span>
                    <p class="name-fachrichtung">Name der Fachrichtung: <input type="text" name="beschreibung" id="beschreibung" required class="felder-neuer-od feld-fachrichtung" /></p>
                </span>

                <input type="submit" value="Erstellen">
                <a href="/Schul-Fuehrung/AlleOpenDay">
                            <input type="button" id="btn-zurueck" value="Zurück" />
                        </a>

            </form>

        </div>
    </section>

    <?php require '/Schul-Fuehrung/snippets/fe_xfooter.sp.php'; ?>


</body>

</html>