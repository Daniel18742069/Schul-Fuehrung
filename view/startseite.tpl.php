<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Schulführung</title>
    </head>
    <body>

        <!-- Titel, Breadcrumbs -->
        <h1>Führung Buchen</h1>
        <p>Breadcrumbs...</p>

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Zeit für einen Rundgang?</h2>
            <span>Wir von der Landesberufsschule Bozen bieten jedes Jahr zum Tag der offenen Tür Rundgänge für interessierte Schüler an.<br />
                <p>Reservieren Sie eine Führung noch Heute!</p>
            </span>
        </div>


        <!-- Tabs Fachrichtung -->
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
</html>