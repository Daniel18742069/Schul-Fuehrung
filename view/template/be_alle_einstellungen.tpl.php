<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Verwaltung</title>
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
        <div class="wrapper-fuehrung_hinzufuegen">
            <?php if (empty($_POST)) { ?>
                <h2>Fächer auswählen</h2>
                <form action="index.php?aktion=be_alle_einstellungen&id=<?= $_GET['id'] ?>" method="post">


                    <?php foreach ($be_alle_einstellungen as $key => $einstellung) { ?>

                    <div class="fuehrung-hinzuf">
                        <div class="fachrichtungen">
                            <input type="checkbox" class="checkbox" id="checkbox" name="fachID<?= $einstellung->getId() ?>" value="<?= $key ?>" onclick="hideShowElement(this,'<?= $einstellung->getBeschreibung() ?>')" />
                            <label for="c<?= $einstellung->getId() ?>"><?= $einstellung->getBeschreibung() ?></label>
                        </div>

                        <span class="anzahl-fuehrungen" id="<?= $einstellung->getBeschreibung() ?>" style="display: none;">
                            <span>Anzahl Führungen</span>

                            <input type="radio" id="contact" name="anzahl<?= $key ?>" value="1" checked>
                            <label for="contact<?= $key ?>">1</label>

                            <input type="radio" id="contact" name="anzahl<?= $key ?>" value="2">
                            <label for="contact<?= $key ?>">2</label>

                            <input type="radio" id="contact" name="anzahl<?= $key ?>" value="3">
                            <label for="contact<?= $key ?>">3</label>
                        </span>
                    </div>

                        <hr>

                    <?php } ?>

                    <input type="submit" name="anmelden" value="Führung hinzufügen" />

                </form>
            <?php
            } else {
                $array = arrayManipulieren($_POST);
                ?>

                <form action="index.php?aktion=be_alle_od" method="post">

                    <?php for ($i = 0; $i < count($array); $i++) {
                        $stringArray = explode('_', $array[$i]);
                        $fach = $stringArray[0];
                        $anzahl = $stringArray[1];

                    ?>
                        <h2><?= Fachrichtung::getFachrichtungBeiID($fach)?></h2>
                    <?php
                        for ($j = 0; $j < $anzahl; $j++) {  //fach_anzahl
                    ?>
                        <div class="fueh-kap">
                            <p>Führungsperson: <input type="text" name="fuehrungspersonen<?php echo $fach . "_" . $j ?>" class="fuehrungspersonen" required />
                            <p>Kapazität: <input type="number" name="kapazitaet<?php echo $fach."_".$j ?>" value="1" class="kapazitaet" required /></p>
                        </div>
                    <?php
                        }
                    }

                    ?>


            <input type="text" name="offenerTag" value="<?=$_GET['id']?>" hidden/>
            <input type="submit" name="anmelden" value="Anmelden" />


                </form>

            <?php } ?>
        </div>
    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>