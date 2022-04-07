<section id="wrapper">

        <!-- Untertitel & kurzer Text -->
        <div>
            <h2>Alle Open Days</h2>
        </div>

        <!-- Kalender -->
        <div class="tab-content">

                    <div class="accordion-wrapper">
                        <?php for ($i = 0; $i <= 10; $i++) { ?>
                            <div class="kalenderbox alle_od">
                                <span class="datum">15.05.2022</span>
                                <span class="bezeichnung">Tag der offenen Tür 2022</span>
                                <span class="status">aktiv</span>
                            </div>
                            <div class="content">
                                <h3 class="bereichnung">Tag der offenen Tür 2022</h3>
                                <span class="inhalt_od">
                                    <p>Datum: 10.05.2022</p>
                                    <p>Status: aktiv</p>
                                    <p>Start: 08.00 Uhr</p>
                                    <p>Ende: 17.00 Uhr</p>
                                    <p>Intervall: 30 min</p>
                                </span>
                                <span class="buttons">
                                    <button class="editieren">Editieren</button>
                                    <button class="editieren">Führung hinzufügen</button>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
        </div>
    </section>