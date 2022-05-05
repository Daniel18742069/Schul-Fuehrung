<!DOCTYPE html>
<html>



<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />

    <title>Führung erfolgreich</title>

</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2><?= $text ?></h2>

            <a href="index.php?aktion=be_alle_od" class="zurueck">Zurück zum Admin Pannel</a>

        </div>
    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>