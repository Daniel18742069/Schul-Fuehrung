<section id="wrapper">

    <div class="wrapper-fe_startseite">
        

    <h1>Führungen buchen</h1>

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

        <!-- Kalender -->
        <div class="tab-content">
            <!-- Kalender -->
            <div>
                <div id="info_elektro" data-tab-content class="fachrichtung active" style="display:none">
                    <h2>Informatik / Elektrotechnik</h2>
                    <div class="accordion-wrapper">
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

                <div id="elektro_mechatronik" data-tab-content class="fachrichtung" style="display:none">
                    <h2>Elektrotechnik / Mechatronik</h2>
                    <div class="accordion-wrapper">
                        <?php $counter = 8;
                        for ($i = 0; $i <= 10; $i++) { ?>
                            <div class="kalenderbox" onclick="accordions()">
                                <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                <span class="lehrer">Lehrer</span>
                                <span class="kapazitaet">0/10</span>
                            </div>
                            <span class="content">
                                <p>TEST</p>
                            </span>
                        <?php $counter++;
                        } ?>
                    </div>
                </div>

                <div id="friseur" data-tab-content class="fachrichtung" style="display:none">
                    <h2>Friseur</h2>
                    <div class="accordion-wrapper">
                        <?php $counter = 8;
                        for ($i = 0; $i <= 10; $i++) { ?>
                            <div class="kalenderbox accordion">
                                <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                <span class="lehrer">Lehrer</span>
                                <span class="kapazitaet">0/10</span>
                            </div>
                        <?php $counter++;
                        } ?>
                    </div>
                </div>

                <div id="holzbau" data-tab-content class="fachrichtung" style="display:none">
                    <h2>Holzbau</h2>
                    <div class="accordion-wrapper">
                        <?php $counter = 8;
                        for ($i = 0; $i <= 10; $i++) { ?>
                            <div class="kalenderbox accordion">
                                <span class="uhrzeit"><?= $counter ?>:00 Uhr</span>
                                <span class="lehrer">Lehrer</span>
                                <span class="kapazitaet">0/10</span>
                            </div>
                        <?php $counter++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>