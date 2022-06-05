<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="/Schul-Fuehrung/be_CSS/style_alle_od.css" />

    <title>Neuer OpenDay erstellt</title>

</head>

<body>

    <?php require '/Schul-Fuehrung/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Login</h2>


            <form action="index.php?aktion=adminAnmeldung" method="post">

                <p>
                <label for="benutzername" class="name-fachrichtung">Benutzername:</label>
                <input type="text" name="benutzername" required class="felder-neuer-od feld-fachrichtung" />
                </p>
                <p>
                <label for="password" class="name-fachrichtung">Password:</label>
                <input type="password" name="passwort" required class="felder-neuer-od feld-fachrichtung" />
                </p>
                <input type="submit" name="anmelden" value="Anmelden" />


            </form>

        </div>
    </section>


    <?php require '/Schul-Fuehrung/snippets/fe_xfooter.sp.php'; ?>



</body>

</html>