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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <?php require 'view/snippets/header.sp.php'; ?>



    <section id="wrapper-be">

        <div class="wrapper-fe_startseite">

            <form action="FuehrungEditieren&<?= $offenerTag->getID() ?>" method="post">
                <div class="btns-admin-panel">
                <input type="submit" value="Speichern" name="anmeldenButton" id="btn_anmelden">
               <?php if($offenerTag->getFuehrungen() == NULL) { ?>
                <input type="button" class="btn_drucken disabled" onclick="location.href='TabelleDrucken&<?= $offenerTag->getID() ?>'" value="Drucken" name="druckenButton" id="btn_drucken" disabled>
              <?php }else { ?>
                <input type="button" class="btn_drucken disabled" onclick="location.href='TabelleDrucken&<?= $offenerTag->getID() ?>'" value="Drucken" name="druckenButton" id="btn_drucken">
                <?php } ?>
                <input type="button" class="zurueck-admin-panel" onclick="location.href='AlleOpenDay'" value="Zurück" />
                <div class="accordion js-accordion" id="accordion">
                    <?php foreach ($fuehrungen as $key => $fuehrung) {
                        //var_dump($fuehrungen);
                        $anzahlTeilnehmer = Anmeldung::anzahlTeilnehmer($fuehrung->getId());
                        if ($anzahlTeilnehmer == NULL) {  //anzahl Formatieren
                            $anzahlTeilnehmer = 0;
                        }
                    ?>
                        <div class="accordion__item js-accordion-item fuehrung <?= $fuehrung->getId(); ?>">
                            <div class="accordion-header js-accordion-header">
                                <!-- secreat -->
                                <input type="fuehrungsid" name="<?= $key ?>" value="<?= $fuehrung->getID() ?>" hidden="hidden" />

                                <div>
                                    <?php
                                    if (($fuehrung->getSichtbar() == 1) && ($anzahlTeilnehmer >= 1)) { ?>
                                        <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" checked="checked" disabled="disabled" />
                                    <?php
                                    } elseif (($fuehrung->getSichtbar() == 1) && ($anzahlTeilnehmer == 0)) { ?>
                                        <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" checked="checked" />

                                   <?php
                                    } elseif(($fuehrung->getSichtbar() == 0)) {
                                    ?>
                                        <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" />
                                    <?php } ?>

                                    <?php echo $fuehrung->getUhrzeitWelformed() . " ";  ?>
                                </div>

                                <input type="text" name="fuehrungspersonen<?= $key ?>" class="fuehrungspersonen" value="<?= $fuehrung->getFuehrungspersonen() ?>" required />
                                <?php

                                echo $anzahlTeilnehmer . " / " . $fuehrung->getKapazitaet() . "<br>";
                                $anmeldungen = Anmeldung::findeAlleAnmeldungen_von_fuehrung($fuehrung->getId());
                                ?>
                            </div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents asdf">
                                    <?php // hier werden die Angemeldeten personen angezeigt
                                    $anmeldungenDerFuehrung = Anmeldung::findeAlleAnmeldungen_von_fuehrung($fuehrung->getId());
                                    foreach ($anmeldungenDerFuehrung as $key1 => $anmeldung) {
                                    ?>  
                                        <div>
                                            <?php
                                                $d = $anmeldung->getDatum();
                                            ?>

                                            <p><b>Name: </b> <?= $anmeldung->getFullName() ?> </p>
                                            <p><b>Email: </b> <?= $anmeldung->getEmail() ?> </p>
                                            <p><b>Telefonnummer: </b> <?= $anmeldung->getTelefon() ?> </p>
                                            <p><b>Datum: </b> <?= $d ?> </p>
                                            <p><b>Anzahl: </b> <?= $anmeldung->getAnzahl() ?> </p>
                                            <a href="FuehrungEditieren&<?= $offenerTag->getID() ?>&<?= $anmeldung->getToken() ?>">
                                            <button type="button" value="Button" id="btn_loesche">Löschen</button>
                                            </a>    
                                        </br>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <script>
                        accordion();
                    </script>
                </div>
            </form>

        </div>
    </section>

    <?php require 'view/snippets/footer.sp.php'; ?>


</body>

</html>