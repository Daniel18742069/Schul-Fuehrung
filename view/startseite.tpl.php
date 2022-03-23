<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Schulführung</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <script type="text/javascript" src="../model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <!-- Titel, Breadcrumbs -->
    <header class="header">
        <h1>Führung Buchen</h1>
        <p>Breadcrumbs...</p>
    </header>


    <section class="wrapper">

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Zeit für einen Rundgang?</h2>
            <span>Wir von der Landesberufsschule Bozen bieten jedes Jahr zum Tag der offenen Tür Rundgänge für interessierte Schüler an.<br />
                <p>Reservieren Sie eine Führung noch Heute!</p>
            </span>
        </div>

        <head>
            <meta charset="utf-8" />
            <title>Schulführung</title>
        </head>

        <body>

            <div class="box">

                <!-- Tabs Fachrichtung -->
                <div class="tabs" class="active">
                    <input type="button" name="tabs" id="tab_elektro" checked="checked" class="info_elektro-button" onclick="openCalender('info_elektro')">
                    <label for="tab_elektro">Informatik / Elektrotechnik</label>
                    <div class="tab">
                    </div>

                    <input type="button" name="tabs" id="tab_mechatronik" class="elektro_mechatronik-button" onclick="openCalender('elektro_mechatronik')">
                    <label for="tab_mechatronik">Elektrotechnik / Mechatronik</label>
                    <div class="tab">
                    </div>

                    <input type="button" name="tabs" id="tab_friseur" class="friseur-button" onclick="openCalender('friseur')">
                    <label for="tab_friseur">Friseur</label>
                    <div class="tab">
                    </div>

                    <input type="button" name="tabs" id="tab_holz" class="holzbau-button" onclick="openCalender('holzbau')">
                    <label for="tab_holz">Holzbau</label>
                    <div class="tab">
                    </div>
                </div>

                <script>
                    $('.tabs label').on('click', function() {
                        $('.tabs .active label').removeClass('active');
                        $(this).addClass('active');
                    });
                </script>

                <!-- Kalender -->
                <div>
                    <!-- Kalender -->
                    <div>
                        <div id="info_elektro" class="fachrichtung">
                            <h2>Informatik / Elektrotechnik</h2>
                            <?php $counter = 8;
                            for ($i = 0; $i <= 10; $i++) { ?>
                                <div class="kalenderbox"> 
                                    <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                    <span class="lehrer">Lehrer</span>
                                    <span class="kapazitaet">0/10</span>
                                </div>
                            <?php $counter++;
                            } ?>
                        </div>

                        <div id="elektro_mechatronik" class="fachrichtung" style="display:none">
                            <h2>Elektrotechnik / Mechatronik</h2>
                            <?php $counter = 8;
                            for ($i = 0; $i <= 10; $i++) { ?>
                                <div class="kalenderbox">
                                    <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                    <span class="lehrer">Lehrer</span>
                                    <span class="kapazitaet">0/10</span>
                                </div>
                            <?php $counter++;
                            } ?>
                        </div>

                        <div id="friseur" class="fachrichtung" style="display:none">
                            <h2>Friseur</h2>
                            <?php $counter = 8;
                            for ($i = 0; $i <= 10; $i++) { ?>
                                <div class="kalenderbox">
                                    <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                    <span class="lehrer">Lehrer</span>
                                    <span class="kapazitaet">0/10</span>
                                </div>
                            <?php $counter++;
                            } ?>
                        </div>

                        <div id="holzbau" class="fachrichtung" style="display:none">
                            <h2>Holzbau</h2>
                            <?php $counter = 8;
                            for ($i = 0; $i <= 10; $i++) { ?>
                                <div class="kalenderbox">
                                    <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                    <span class="lehrer">Lehrer</span>
                                    <span class="kapazitaet">0/10</span>
                                </div>
                            <?php $counter++;
                            } ?>
                        </div>
                    </div>
                </div>


                <footer>
                    <!-- map -->
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="425" height="160" id="gmap_canvas" src="https://maps.google.com/maps?q=39100,%20Romstra%C3%9Fe%2020&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                        </div>
                    </div>

        </body>


    </section>


    <footer>

    </footer>

</body>

</html>