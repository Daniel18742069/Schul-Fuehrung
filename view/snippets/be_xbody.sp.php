<section id="wrapper">

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Alle Open Days</h2>
        </div>

        <!-- Kalender -->
        <div class="tab-content">

                    <div class="accordion-wrapper">
                    <?php
                    foreach ($be_alle_od as $key => $offenerTag) {
                        ?>
                        
                       
                            <div class="kalenderbox alle_od">
                                <span class="datum"><?=$offenerTag->getDatumWelformed()?></span>
                                <span class="bezeichnung"><?=$offenerTag->getBezeichnung()?></span>
                                <span class="status"><?=$offenerTag->getStatusString()?></span>
                            </div>
                            <div class="content">
                                <h3 class="bereichnung"><?=$offenerTag->getBezeichnung()?></h3>
                                <span class="inhalt_od">
                                    <p>Datum: <?=$offenerTag->getDatumWelformed()?></p>
                                    <p>Status: <?=$offenerTag->getStatusString()?></p>
                                    <p>Start: <?=$offenerTag->getStartWelformed()?> Uhr</p>
                                    <p>Ende: <?=$offenerTag->getEndeWelformed()?> Uhr</p>
                                    <p>Intervall: <?=$offenerTag->getIntervall()?> min</p>
                                </span>
                                <span class="buttons">
                                    <button class="editieren" href=">Editieren</button>
                                    <button class="editieren">Führung hinzufügen</button>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
        </div>
    </section>