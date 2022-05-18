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
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>
    <form action="index.php?aktion=be_od_mit_fuehrungen_editieren&id=<?= $offenerTag->getID() ?>" method="post">
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
                        <input type="fuehrungsid" name="<?= $key ?>" value="<?= $fuehrung->getID() ?>" hidden="hidden" /> <!-- secreat -->
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
                        //echo $fuehrung->getGemeinsame_id();
                        ?>
                    </div>
                    <div class="accordion-body js-accordion-body">
                        <div class="accordion-body__contents">
                            <form class="form_buchung" method="POST" action="index.php?aktion=anmelden">
                                <label for="vorname">Vorname:</label>
                                <input type="text" name="vorname" value="" onblur="formAusgefuellt(this)" <?= ($anzahl_teilnehmer[$fuehrung->getId()] === $fuehrung->getKapazitaet()) ? 'disabled' : ''; ?> /><br />
                                <label for="nachname">Nachname:</label>
                                <input type="text" name="nachname" value="" onblur="formAusgefuellt(this)" <?= ($anzahl_teilnehmer[$fuehrung->getId()] === $fuehrung->getKapazitaet()) ? 'disabled' : ''; ?> /><br />
                                <label for="telefon">Telefon:</label>
                                <input type="telefon" name="telefon" value="" onblur="formAusgefuellt(this)" <?= ($anzahl_teilnehmer[$fuehrung->getId()] === $fuehrung->getKapazitaet()) ? 'disabled' : ''; ?> /><br />
                                <label for="email">E-Mail:</label>
                                <input type="email" name="email" value="" onblur="formAusgefuellt(this)" <?= ($anzahl_teilnehmer[$fuehrung->getId()] === $fuehrung->getKapazitaet()) ? 'disabled' : ''; ?> /><br />
                                <label for="anzahl">Personen:</label>
                                <input type="number" name="anzahl" value="1" max="<?= $fuehrung->getKapazitaet() - $anzahlTeilnehmer; ?>" min="1" placeholder="1" onblur="formAusgefuellt(this)" <?= ($anzahl_teilnehmer[$fuehrung->getId()] === $fuehrung->getKapazitaet()) ? 'disabled' : ''; ?> />
                                <input type="text" name="fuehrung_id" value="<?= $fuehrung->getId(); ?>" hidden />
                                <input type="submit" name="anmeldenButton" value="Anmelden" />
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <script>
        accordion();
    </script>

        </div>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

    
</body>

</html>