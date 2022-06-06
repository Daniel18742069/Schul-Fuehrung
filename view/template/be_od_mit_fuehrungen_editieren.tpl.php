<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle OpenDays</title>
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/be_CSS/style_alle_od.css" />
    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/be_CSS/style_fuehrungen_editieren.css" />
    <script type="text/javascript" src="<?= CONF['BACKSLASH'] ?>model/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?= CONF['BACKSLASH'] ?>view/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="<?= CONF['BACKSLASH'] ?>view/img/favicon.png" color="#111" />
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>




    <section id="wrapper-be">

        <div style="margin: 2rem 0 5rem 0">

            <form action="FuehrungEditieren/<?= $offenerTag->getID() ?>" method="post">
                <input type="submit" value="Speichern" name="anmeldenButton" id="btn_anmelden">
                <input type="button" class="drucken" value="Drucken" name="druckenButton" id="btn_drucken">
                <input type="button" class="zurueck-admin-panel" onclick="location.href='AlleOpenDay'" value="zurück"/> <!-- onclick="location.href='index.php?aktion=be_alle_od' -->

                <div class="accordion js-accordion" id="accordion">
                    <?php foreach ($fuehrungen as $key => $fuehrung) {
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
                                    } else {
                                    ?>
                                        <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" disabled="disabled" />

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
                                                $da = new DateTime($d);
                                                $datum = $da->format('d.m.Y H:i');
                                            ?>

                                            <p><b>Name: </b> <?= $anmeldung->getFullName() ?> </p>
                                            <p><b>Email: </b> <?= $anmeldung->getEmail() ?> </p>
                                            <p><b>Telefonnummer: </b> <?= $anmeldung->getTelefon() ?> </p>
                                            <p><b>Datum: </b> <?= $datum ?> </p>
                                            <p><b>Anzahl: </b> <?= $anmeldung->getAnzahl() ?> </p>
                                            <a href="FuehrungEditieren/<?= $offenerTag->getID() ?>&delete=<?= $anmeldung->getToken() ?>">
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

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>


</body>

</html>