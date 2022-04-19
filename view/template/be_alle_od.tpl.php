<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle OpenDays</title>
    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />
    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">

    <div class="wrapper-be_startseite">

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Alle Open Days</h2>
        </div>

    <!-- Kalender -->
    <div class="tab-content">

        <div class="accordion-wrapper">
            <?php
                    foreach ($be_alle_od as $key => $offenerTag) {
                        ?>


            <div class="kalenderbox alle_od">
                <span class="datum"><?=$offenerTag->getDatumWelformed()?></span>
                <span class="bezeichnung"><?=$offenerTag->getBezeichnung()?></span>
                <span class="status"><?=$offenerTag->getStatusString()?></span>
            </div>
            <div class="content">
                <h3 class="bereichnung"><?=$offenerTag->getBezeichnung()?></h3>
                <span class="inhalt_od">
                    <p>Datum: <?=$offenerTag->getDatumWelformed()?></p>
                    <p>Status: <?=$offenerTag->getStatusString()?></p>
                    <p>Start: <?=$offenerTag->getStartWelformed()?> Uhr</p>
                    <p>Ende: <?=$offenerTag->getEndeWelformed()?> Uhr</p>
                    <p>Intervall: <?=$offenerTag->getIntervall()?> min</p>
                </span>
                <span class="buttons">
                    <a href="index.php?aktion=bg_alle_einstellungen&id=<?=$offenerTag->getId()?>">
                        <button class="editieren">Editieren</button>
                    </a>
                    <a href="">
                    <button class="editieren">Führung hinzufügen</button>
                    </a>
                </span>
            </div>
            <?php } ?>
        </div>
        </div>
    </section>


    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>