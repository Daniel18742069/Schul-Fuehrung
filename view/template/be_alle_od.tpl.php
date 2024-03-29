<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle OpenDays</title>
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />
    <script type="text/javascript" src="<?= CONF['BACKSLASH'] ?>model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>
    
<?php require 'view/snippets/info_box.sp.php'; ?>

    <?php require 'view/snippets/header.sp.php'; ?>

    <section id="wrapper">

        <div class="wrapper-be_startseite">

            <!-- Untertitel & kurzer Text -->
            <div class="alle_od">
                <h2>Alle Open Days</h2>
                <span>
                    <a href="NeuerOpenDay" class="neuer_od">neuer Open Day</a>
                    <a href="NeuesFach" class="neuer_od">neues Fach</a>
                </span>
            </div>


            <div class="accordion-wrapper accordion-be js-accordion">
                <?php
                foreach ($be_alle_od as $offenerTag) {
                ?>

                    <div class="accordion__item js-accordion-item">
                        <div class="kalenderbox alle_od accordion-header js-accordion-header">
                            <span class="datum"><?= $offenerTag->getDatumWelformed() ?></span>
                            <span class="bezeichnung" id="bezeichnung"><?= $offenerTag->getBezeichnung() ?></span>
                            <span class="status">
                                <div id="namenAendern<?= $offenerTag->getId() ?>"><?= $offenerTag->getStatusStringGross() ?>
                                </div>
                            </span>
                        </div>
                        <div class="content accordion-body js-accordion-body accordion-body__contents">
                            <div class="ccordion-body__contents">
                                <span class="inhalt_od">
                                    <p>Datum: <?= $offenerTag->getDatumWelformed() ?></p>
                                    <p>Intervall: <?= $offenerTag->getIntervall() ?> min</p>
                                    <p>Start: <?= $offenerTag->getStartWelformed() ?> Uhr</p>
                                    <p>Ende: <?= $offenerTag->getEndeWelformed() ?> Uhr</p>
                                </span>
                                <span class="buttons">

                                <?php if($offenerTag->getFuehrungen() == NULL){ ?>
                                        <button class="editieren editieren-disabled" disabled>Editieren</button>
                                <?php }else{ ?>
                                    <a href="FuehrungEditieren&<?= $offenerTag->getId() ?>" class="editieren">Editieren</a>
                                <?php } ?>

                                    <a href="Einstellungen&<?= $offenerTag->getId() ?>" class="editieren">Führung hinzufügen</a>

                                    <form id="MyForm" name="MyForm">

                                        <button type="button" class="neuer_od andereStatus" onclick="aendereStatusFuehrung('<?= $offenerTag->getId() ?>')">
                                            <div id="namenButtonAendern<?= $offenerTag->getId() ?>">
                                                <?= $offenerTag->getStatusStringUmgekehrt(); ?>
                                            </div>

                                        </button>

                                        <input name="MyName" id="MyID" value="YourValue" hidden />

                                    </form>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js">
        </script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

        <script>
            accordion();
        </script>

    </section>


    <?php require 'view/snippets/footer.sp.php'; ?>

</body>

</html>