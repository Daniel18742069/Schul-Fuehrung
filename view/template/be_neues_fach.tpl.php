<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />
    <title>Neuer Open Day</title>

</head>

<body>

    <?php require 'view/snippets/header.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Neue Fachrichtung</h2>

            <form action="AlleOpenDay" method="post">

                <span>
                    <p class="name-fachrichtung">Name der Fachrichtung: <input type="text" name="beschreibung" id="beschreibung" required class="felder-neuer-od feld-fachrichtung" /></p>
                </span>

                <input type="submit" value="Erstellen">
                <a href="AlleOpenDay">
                            <input type="button" id="btn-zurueck" value="Zurück" />
                        </a>

            </form>

        </div>
    </section>

    <?php require 'view/snippets/footer.sp.php'; ?>


</body>

</html>