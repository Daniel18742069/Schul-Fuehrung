<!DOCTYPE html>
<html>



<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />
    <link rel="shortcut icon" type="image/x-icon" href="view/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="view/img/favicon.png" color="#111" />
    <title>Führung erfolgreich</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2><?= $text ?></h2>

            <a href="/Schul-Fuehrung/AlleOpenDay" class="zurueck">Zurück zum Admin Panel</a>

        </div>
    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>