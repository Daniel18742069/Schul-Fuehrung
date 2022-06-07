<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/be_CSS/style_alle_od.css" />
    <title>Neuer Open Day</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

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

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>


</body>

</html>