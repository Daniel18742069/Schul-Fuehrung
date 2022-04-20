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


    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <section id="wrapper">

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
            <div class="tabs active">
                <button type="button" value="Button" name="tab_elektro" id="tab_elektro" class="info_elektro-button active tab" onclick="openCalender('info_elektro')">Informatik / Elektrotechnik</button>
                <button name="tab_mechatronik" id="tab_mechatronik" class="elektro_mechatronik-button tab" onclick="openCalender('elektro_mechatronik')">Elektrotechnik / Mechatronik</button>
                <button name="tab_friseur" id="tab_friseur" class="friseur-button tab" onclick="openCalender('friseur')">Friseur</button>
                <button name="tab_holz" id="tab_holz" class="holzbau-button tab" onclick="openCalender('holzbau')">Holzbau</button>
            </div>

        </div>




        <script>
            window.console = window.console || function(t) {};
        </script>

            <h1></h1>

        <div class="accordion js-accordion">

            <?php $counter = 8;
            for ($i = 0; $i <= 10; $i++) { ?>
                <div class="accordion__item js-accordion-item">
                    <div class="accordion-header js-accordion-header">
                        <div class="uhrzeit"><?= $counter ?>:00 Uhr</div>
                        <div class="lehrer">Lehrer</div>
                        <div class="kapazitaet">0/10</div>
                    </div>
                    <div class="accordion-body js-accordion-body">
                        <div class="accordion-body__contents">
                            <form class="form_buchung" method="POST" action="model/captcha/src/index.php">
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
            <?php $counter++;
            } ?>

        </div>

        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

        <script>
            accordion()
        </script>

    </section>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>