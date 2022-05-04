<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schulführung</title>


    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/fe_CSS/w3Schools.css">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="view/img/favicon.png" />

    <!--icon noch ändern!!!-->

    <link rel="mask-icon" type="image/x-icon" href="view/img/favicon.png" color="#111" /> <!-- für Safari soweit ich weiss-->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>


    <!--CAPTCHA-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="model/captcha/src/disk/slidercaptcha.min.css" rel="stylesheet" />


    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>


    <?php if(!empty($_REQUEST['vorname'])){//captcha ?>
        
        <div class="wrapper-subfooter">

        <div class="container-fluid">
        <div class="form-row">
            <div class="col-12">
                <div class="slidercaptcha card">
                    <div class="card-header">
                        <span>Complete the security check</span>
                    </div>
                    <div class="card-body">
                        <div id="captcha"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="model/captcha/src/disk/longbow.slidercaptcha.min.js"></script>
    <script>
        var captcha = sliderCaptcha({
            id: 'captcha',
            repeatIcon: 'fa fa-redo',
            onSuccess: function () {
                window.location = "http://www.google.de/";
                var handler = setTimeout(function () {
                    window.clearTimeout(handler);
                    captcha.reset();
                }, 500);
            }
        });</script>

        </div>
        

    <?php }else{ ?>    

    <section id="wrapper">

    <div class="wrapper-fe_startseite">

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Zeit für einen Rundgang?</h2>
            <span>
                <p class="textEins">Wir von der Landesberufsschule Bozen bieten jedes Jahr zum Tag der offenen Tür Rundgänge für interessierte Schüler an.</p>
                <p class="textZwei">Reservieren Sie eine Führung noch heute!</p>
            </span>
        </div>

        <div class="box">

            <!-- Tabs Fachrichtung -->
            
            <?php
                if($fachrichtungen){
            ?>
            <div class="tabs active">
                    <?php foreach($fachrichtungen as $fachrichtung){ ?>
                        <button type="button" value="Button" name="<?= $fachrichtung->getBeschreibung() ?>" id="<?= $fachrichtung->getBeschreibung() ?>" class="info_elektro-button active tab" 
                        onclick="tabs(this,'<?= $fachrichtung->getId() ?>')"><?= $fachrichtung->getBeschreibung() ?></button>
                    <?php } ?>
            </div>

            <?php } ?>

        </div>




        <script>
            window.console = window.console || function(t) {};
        </script>

                        

        <div class="accordion js-accordion" id="accordion">
            <?php 
                $fuehrungen = Fuehrung::findeSpezifischeFuehrungen($offener_tag->getId(), 2); //I DONT KNOW
                //$intervall = $offener_tag->getIntervall() * 60;
                //for ($seconds = 0; $seconds <= $offener_tag->getEnde(); $seconds + (60)) {
                foreach($fuehrungen as $fuehrung){
                    ?>
                <div class="accordion__item js-accordion-item fuehrung <?= $fuehrung->getFachrichtung_id(); ?>">
                    <div class="accordion-header js-accordion-header">
                        <?php
                            $anzahlTeilnehmer =  Anmeldung::anzahlTeilnehmer($fuehrung->getId());
                            if($anzahlTeilnehmer == NULL){
                                $anzahlTeilnehmer = 0;
                            }
                        ?>
                        <div class="uhrzeit"><?= $fuehrung->getUhrzeitWelformed(); ?> Uhr</div>
                        <div class="lehrer"><?= $fuehrung->getFuehrungspersonen(); ?></div>
                        <div class="kapazitaet"><?= $anzahlTeilnehmer ?>/<?= $fuehrung->getKapazitaet(); ?></div>
                    </div>
                    <div class="accordion-body js-accordion-body">
                        <div class="accordion-body__contents">
                            <form class="form_buchung" method="POST" action="index.php?aktion=fe_startseite">
                                <label for="vorname">Vorname:</label>
                                <!--Nils du muesch de namen no an die Datenbank anpassen-->
                                <input type="text" id="vorname" name="vorname" value=""><br>
                                <label for="nachname">Nachname:</label>
                                <input type="text" id="nachname" name="nachname" value=""><br>
                                <label for="tel">Telefon:</label>
                                <input type="tel" id="tel" name="tel" value=""><br>
                                <label for="email">E-Mail:</label>
                                <input type="email" id="email" name="email" value=""><br>
                                <label for="anzahl">Personen:</label>
                                <input type="number" id="anzahl" name="anzahl" value="" max="10" min="1" placeholder="1">
                                <input type="submit" value="Anmelden">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

        <script>
            accordion()
        </script>


                </div>
    </section>
            <?php } ?>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>