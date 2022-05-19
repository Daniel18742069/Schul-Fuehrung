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
            <div class="alle_od">
                <h2>Alle Open Days</h2>
                <span>
                    <a href="index.php?aktion=be_neuer_od">
                        <button class="neuer_od">neuer Open Day</button>
                    </a>
                    <a href="index.php?aktion=be_neues_fach">
                        <button class="neuer_od">neues Fach</button> <!-- name class ändern -->
                    </a>
                </span>
            </div>


            <div class="accordion-wrapper accordion-be js-accordion">
                <?php 
                    foreach ($be_alle_od as $offenerTag) {
                        ?>
                <div class="accordion__item js-accordion-item">
                    <div class="kalenderbox alle_od accordion-header js-accordion-header">
                        <span class="datum"><?=$offenerTag->getDatumWelformed()?></span>
                        <span class="bezeichnung" id="bezeichnung"><?=$offenerTag->getBezeichnung()?></span>
                        <span class="status"><div  id="namenAendern<?=$offenerTag->getId()?>"><?=$offenerTag->getStatusString()?></div></span>
                    </div>
                    <div class="content accordion-body js-accordion-body accordion-body__contents">
                        <div class="ccordion-body__contents">
                            <span class="inhalt_od">
                                <p>Datum: <?=$offenerTag->getDatumWelformed()?></p>
                                <p>Status: <?=$offenerTag->getStatusString()?></p>
                                <p>Start: <?=$offenerTag->getStartWelformed()?> Uhr</p>
                                <p>Ende: <?=$offenerTag->getEndeWelformed()?> Uhr</p>
                                <p>Intervall: <?=$offenerTag->getIntervall()?> min</p>
                                <form id="MyForm" name="MyForm">
                                    <button type="button" class="neuer_od andereStatus" onclick="aendereStatusFuehrung('<?=$offenerTag->getId()?>')">Status ändern</button>
                                    <input name="MyName" id="MyID" value="YourValue" hidden/>
                                </form>
                            </span>
                            <span class="buttons">
                                <a href="index.php?aktion=be_od_mit_fuehrungen_editieren&id=<?=$offenerTag->getId()?>">
                                    <button class="editieren">Editieren</button>
                                </a>
                                <a href="index.php?aktion=be_alle_einstellungen&id=<?=$offenerTag->getId()?>">
                                    <button class="editieren">Führung hinzufügen</button>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <script
                src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js">
            </script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

            <script>
                accordion();
 
            </script>

    </section>


    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>