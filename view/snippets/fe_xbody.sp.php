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
                            <input type="submit" value="Submit">



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