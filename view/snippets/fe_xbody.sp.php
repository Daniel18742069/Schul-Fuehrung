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



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


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
                            Test
                            Test
                        </div>
                    </div>
                </div>
        <?php $counter++;
        } ?>
         

    </div>


    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script>accordion()</script>
    
        




    <!--

        
    <div class="tab-content">
            <div class="accordion">
                <div id="info_elektro" data-tab-content class="fachrichtung active" style="display:none">
                    <h2>Verfügbare Termine:</h2>
                    <div class="accordion-wrapper">
                        <?php /* $counter = 8;
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

                <div id="elektro_mechatronik" data-tab-content class="fachrichtung" style="display:none">
                <h2>Verfügbare Termine:</h2>   
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
                <h2>Verfügbare Termine:</h2>    
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

                <div id="holzbau" data-tab-content class="fachrichtung" style="display:none">
                <h2>Verfügbare Termine:</h2>
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
                        } */ ?>
                    </div>
                </div>
            </div>
        </div>
                    -->




</section>