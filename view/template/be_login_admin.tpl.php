<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />

    <title>Neuer OpenDay erstellt</title>

</head>

<body>

    <?php require 'view/snippets/header.sp.php'; ?>

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


    <?php require 'view/snippets/footer.sp.php'; ?>



</body>

</html>