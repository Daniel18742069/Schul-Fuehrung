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
    <link rel="stylesheet" href="view/be_CSS/style_fuehrungen_editieren.css" />
    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="view/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="view/img/favicon.png" color="#111" />
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>


    

    <section id="wrapper">

<div class="wrapper-fe_startseite">


    <form action="index.php?aktion=be_od_mit_fuehrungen_editieren&id=<?= $offenerTag->getID() ?>" method="post">
        <input type="submit" value="DRÜCKE MICH" name="anmeldenButton" id="btn_anmelden">
        <?php
        /*
private $id = 0;
    private $fuehrungspersonen = "";
    private $sichtbar = 0;
    private $kapazitaet = 0;
    private $uhrzeit = "";
    private $fachrichtung_id = 0;
    private $offener_tag_id  = 0;
    private $gemeinsame_id  = "";
    */
        $gemID = 0;
        //foreach ($fuehrungen as $key => $fuehrung) {

        ?>

        <div class="accordion js-accordion" id="accordion">
            <?php foreach ($fuehrungen as $key => $fuehrung) {
                $anzahlTeilnehmer = Anmeldung::anzahlTeilnehmer($fuehrung->getId());
                if ($anzahlTeilnehmer == NULL) {  //anzahl Formatieren
                    $anzahlTeilnehmer = 0;
                }
                if ($gemID == 0) {
                    $gemID = $fuehrung->getGemeinsame_id();
                } else if ($gemID !== $fuehrung->getGemeinsame_id()) {
                    echo "<br>";
                    $gemID = $fuehrung->getGemeinsame_id();
                }
            ?>
                <div class="accordion__item js-accordion-item fuehrung <?= $fuehrung->getId(); ?>">
                    <div class="accordion-header js-accordion-header">
                        <!-- secreat -->
                        <input type="fuehrungsid" name="<?= $key ?>" value="<?= $fuehrung->getID() ?>" hidden="hidden" />

                        <?php
                        if ($fuehrung->getSichtbar() == 1) { ?>
                            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" checked="checked" />
                        <?php } else { ?>
                            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox<?= $key ?>" value="<?= $key ?>" />
                        <?php } ?>
                        <?php echo $fuehrung->getUhrzeitWelformed() . " ";  ?>
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
                                    
                                <b>Name: </b> <?= $anmeldung->getFullName() ?>  </br>
                                <b>Email: </b> <?= $anmeldung->getEmail() ?> </br>
                                <b>Telefonnummer: </b> <?= $anmeldung->getTelefon() ?> </br>
                                <b>Datum: </b> <?= $anmeldung->getDatum() ?>  </br>
                                <b>Anzahl: </b> <?= $anmeldung->getAnzahl() ?> </br>
                           
                                <button type="button" value="Button" id="btn_loesche" onclick="index.php?aktion=be_od_mit_fuehrungen_editieren&id=<?=$offenerTag->getID()?>&delete=<?=$anmeldung->getToken()?>">Lösche</button> </br>
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