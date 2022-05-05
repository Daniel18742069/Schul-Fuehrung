<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />

    <title>Neuer OpenDay erstellt</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

        <h2>Admin Anmeldung</h2>


        <form action="index.php?aktion=adminAnmeldung" method="post">


            <p class="name-fachrichtung">Benutzername: <input type="text" name="benutzername" required class="felder-neuer-od feld-fachrichtung" /></p>
            <p class="name-fachrichtung">Passwort: <input type="password" name="passwort" required class="felder-neuer-od feld-fachrichtung" /></p>

            <input type="submit" name="anmelden" value="Anmelden" />


        </form>

        </div>
        </section>


<?php require 'view/snippets/fe_xfooter.sp.php'; ?>



</body>

</html>