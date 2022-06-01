<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="/Schul-Fuehrung/view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/view/be_CSS/style_alle_od.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/Schul-Fuehrung/view/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="/Schul-Fuehrung/view/img/favicon.png" color="#111" />
    <title>Neuer Open Day</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Neue Fachrichtung</h2>

            <form action="/Schul-Fuehrung/OpenDayErfolgreich" method="post">

                <span>
                    <p class="name-fachrichtung">Name der Fachrichtung: <input type="text" name="beschreibung" id="beschreibung" required class="felder-neuer-od feld-fachrichtung" /></p>
                </span>

                <input type="submit" value="Erstellen">

            </form>

        </div>
    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>


</body>

</html>