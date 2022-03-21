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


            <!-- Kalender -->
            <div>
                <div id="info_elektro" class="fachrichtung">
                    <h2>Informatik / Elektrotechnik</h2>
                    <p>TEST TEST Info Elektro</p>
                </div>

                <!-- Untertitel & kurzer Text -->
                <div>
                    <h2>Zeit für einen Rundgang?</h2>
                    <span>Wir von der Landesberufsschule Bozen bieten jedes Jahr zum Tag der offenen Tür Rundgänge für interessierte Schüler an.<br />
                        <p>Reservieren Sie eine Führung noch Heute!</p>
                    </span>
                </div>


                <!-- Tabs Fachrichtung -->
                <div class="tabs">
                    <input type="radio" name="tabs" id="tab_one" checked="checked">
                    <label for="tab_one">Tab One</label>
                    <div class="tab">
                        <h1>Tab One Content</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <input type="radio" name="tabs" id="tab_two">
                    <label for="tab_two">Tab Two</label>
                    <div class="tab">
                        <h1>Tab Two Content</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <input type="radio" name="tabs" id="tab_three">
                    <label for="tab_three">Tab Three</label>
                    <div class="tab">
                        <h1>Tab Three Content</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>





                <div class="navbar-wrapper">
                    <button class="info_elektro-button" onclick="openCalender('info_elektro')">Informatik / Elektrotechnik</button>
                    <button class="elektro_mechatronik-button" onclick="openCalender('elektro_mechatronik')">Elektrotechnik / Mechatronik</button>
                    <button class="friseur-button" onclick="openCalender('friseur')">Friseur</button>
                    <button class="holzbau-button" onclick="openCalender('holzbau')">Holzbau</button>
                </div>


                <div>
                    <div id="info_elektro" class="fachrichtung">
                        <h2>Informatik / Elektrotechnik</h2>
                        <p>TEST TEST Info Elektro</p>
                    </div>

                    <div id="elektro_mechatronik" class="fachrichtung" style="display:none">
                        <h2>Elektrotechnik / Mechatronik</h2>
                        <p>TEST TEST Elektro Mechatronik</p>
                    </div>

                    <div id="friseur" class="fachrichtung" style="display:none">
                        <h2>Friseur</h2>
                        <p>TEST TEST Friseur</p>
                    </div>

                    <div id="holzbau" class="fachrichtung" style="display:none">
                        <h2>Holzbau</h2>
                        <p>TEST TEST Holzbau</p>
                    </div>
                </div>

        </body>


    </section>


    <footer>
        <!-- map -->
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=39100,%20Romstra%C3%9Fe%2020&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                <a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a>
                <br>
                <a href="https://www.embedgooglemap.net">how to add google map</a>
            </div>
        </div>
    </footer>

</body>

</html>