<!DOCTYPE html>
<html>

<head>
    <base href="<?= CONF['BASE'] ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schulführung</title>

    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>


    <!--CAPTCHA-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="model/captcha/src/disk/slidercaptcha.min.css" rel="stylesheet" />


    <script type="text/javascript" src="<?= CONF['BACKSLASH'] ?>model/JS/script.js"></script>
    <script type="text/javascript" src="<?= CONF['BACKSLASH'] ?>plugin/js/cookieconsent.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>
    <script>
        cookieconsent()
    </script>
    <?php require 'view/snippets/info_box.sp.php'; ?>


    <div id="content">
        <?php require 'view/snippets/header.sp.php'; ?>
        <?php if ($offener_tag != false) { ?>
            <section id="wrapper">

                <div class="wrapper-fe_startseite">

                    <!-- Untertitel & kurzer Text -->
                    <div>
                        <h2>Zeit für einen Rundgang?</h2>
                        <span>
                            <p class="textEins">Wir von der Landesberufsschule Bozen bieten jedes Jahr zum Tag der offenen Tür Rundgänge für interessierte Schüler und Eltern an.</p>
                            <p class="textZwei">Reservieren Sie eine Führung noch heute für den <strong><?= $offener_tag->getBezeichnung() ?></strong> am <strong><?= $offener_tag->getDatumWelformed() ?></strong>, von <strong><?= $offener_tag->getStartWelformed() ?></strong> bis <strong><?= $offener_tag->getEndeWelformed() ?> Uhr!</strong></p>
                        </span>
                    </div>

                    <div class="box">

                        <!-- Tabs Fachrichtung -->

                        <?php
                        if ($fachrichtungen) {
                        ?>
                            <div class="tabs active">
                                <?php foreach ($fachrichtungen as $fachrichtung) { ?>
                                    <button type="button" value="Button" name="<?= $fachrichtung->getBeschreibung() ?>" id="<?= $fachrichtung->getBeschreibung() ?>" class="active tab" onclick=" invisible(); tabs(this,'<?= $fachrichtung->getId() ?>');"><?= $fachrichtung->getBeschreibung() ?></button>
                                <?php } ?>
                            </div>

                        <?php } ?>

                    </div>




                    <script>
                        window.console = window.console || function(t) {};
                    </script>



                    <p id="nichts_ausgewaehlt" style="color:grey; text-align:center; margin-top:7rem">Sie haben noch keine Fachrichtung ausgewählt!</p>




                    <div class="accordion js-accordion" id="accordion">
                        <?php foreach ($fuehrungen as $fuehrung) { ?>
                            <?php if ($anzahl_teilnehmer[$fuehrung->getId()] != $fuehrung->getKapazitaet()) { ?>
                                <div class="accordion__item js-accordion-item fuehrung <?= $fuehrung->getFachrichtung_id(); ?>" style="display:none">
                                    <div class="accordion-header js-accordion-header">
                                        <div class="uhrzeit"><?= $fuehrung->getUhrzeitWelformed(); ?> Uhr</div>
                                        <div class="lehrer"><?= Fachrichtung::getFachrichtungBeiID($fuehrung->getFachrichtung_id()); ?></div>
                                        <div class="kapazitaet"><?= ($anzahl_teilnehmer[$fuehrung->getId()]) ? $anzahl_teilnehmer[$fuehrung->getId()] : 0; ?>/<?= $fuehrung->getKapazitaet(); ?></div>
                                    </div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <form class="form_buchung" method="POST" action="index.php?aktion=fe_startseite&anmelden=1">
                                                <label for="vorname">Vorname:</label>
                                                <input type="text" name="vorname" class="anmeldeinputs" title="zB. Max" value="" onchange="formAusgefuellt(this)" /><br />
                                                <label for="nachname">Nachname:</label>
                                                <input type="text" name="nachname" class="anmeldeinputs" title="zB. Mustermann" value="" onchange="formAusgefuellt(this)" /><br />
                                                <label for="telefon">Telefon:</label>
                                                <input type="telefon" name="telefon" class="anmeldeinputs" title="zB. 339 123 4567" value="" onchange="formAusgefuellt(this)" minlength="10" maxlength="15" /><br />
                                                <label for="email">E-Mail:</label>
                                                <input type="email" name="email" class="anmeldeinputs" title="zB. max.mustermann@gmail.com" value="" onchange="formAusgefuellt(this)" /><br />
                                                <label for="anzahl">Personen:</label>
                                                <input type="number" name="anzahl" class="anmeldeinputs" title="zB. 6" value="1" max="<?= $fuehrung->getKapazitaet() - $anzahl_teilnehmer[$fuehrung->getId()]; ?>" min="1" placeholder="1" onchange="formAusgefuellt(this)" />
                                                <input type="text" name="fuehrung_id" class="anmeldeinputs" value="<?= $fuehrung->getId(); ?>" hidden />
                                                <input type="submit" value="Anmelden" disabled="disabled" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>

                                <div class="accordion__item js-accordion-item fuehrung <?= $fuehrung->getFachrichtung_id(); ?>" style="display:none">
                                    <div class="accordion-header js-accordion-header" style="background-color: lightgray; cursor: not-allowed">
                                        <div class="uhrzeit"><?= $fuehrung->getUhrzeitWelformed(); ?> Uhr</div>
                                        <div class="lehrer"><?= Fachrichtung::getFachrichtungBeiID($fuehrung->getFachrichtung_id()); ?></div>
                                        <div class="kapazitaet"><?= ($anzahl_teilnehmer[$fuehrung->getId()]) ? $anzahl_teilnehmer[$fuehrung->getId()] : 0; ?>/<?= $fuehrung->getKapazitaet(); ?></div>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>

                    </div>

                    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

                    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

                    <script>
                        accordion()
                    </script>


                </div>
            </section>
        <?php } else { ?>
            <div class="no_OD">
                <p>Zum aktuellen Zeitpunkt ist es nicht möglich eine Führung für den Tag der Offenen Tür zu buchen!</p>
            </div>
        <?php } ?>

        <?php require 'view/snippets/footer.sp.php'; ?>

    </div>

    <?php require_once 'view/snippets/captcha.sp.php'; ?>
    <?php require_once 'view/snippets/loading_screen.sp.php'; ?>
</body>
<script>
    function invisible() {
        nichtsAusgewaehlt = document.getElementById('nichts_ausgewaehlt');
        nichtsAusgewaehlt.style.display = 'none';
    }
</script>

<?php
if ($offener_tag != false) {


    if ($fachrichtungen) { ?>
        <script>
            //first_tab();
            set_events();
        </script>
<?php }
} ?>

</html>