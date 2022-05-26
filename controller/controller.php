<?php

class Controller
{

    private $context = array();


    public function run($aktion)
    {
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
        unset($_REQUEST);
    }

    private function ___test()
    {
    }

    //user
    public function fe_startseite()
    {
        if (isset($_REQUEST['anmelden'])) {
            $this->anmelden();
        }
        if (isset($_REQUEST['info']) && get_info($_REQUEST['info'])) {
            $this->addContext('info', get_info($_REQUEST['info']));
        }

        $offener_tag = Offener_tag::findeAktiverOffenen_tag();
        $this->addContext("offener_tag", $offener_tag);

        $fachrichtungen = Fachrichtung::findeFachrichtungen_OffenerTag($offener_tag->getId());
        $this->addContext("fachrichtungen", $fachrichtungen);

        $fuehrungen = Fuehrung::findeSichtbareFuehrungen($offener_tag->getId());
        $this->addContext("fuehrungen", $fuehrungen);

        $anzahl_teilnehmer = [];
        foreach ($fuehrungen as $fuehrung) {
            $anzahl_teilnehmer[$fuehrung->getId()] = Anmeldung::anzahlTeilnehmer($fuehrung->getId());
        }
        $this->addContext("anzahl_teilnehmer", $anzahl_teilnehmer);
    }

    //admin
    public function be_neuer_od()
    {
        $this->addContext("be_neuer_od", "nix");
    }
    public function be_od_erfolgreich()
    {
        if (!empty($_REQUEST['beschreibung'])) {
            $this->addContext("text", "Neues Fach wurde erfolgreich hinzugefügt");
            $this->addContext("title", "Fach wurde erfolgreich hinzugefügt");
            $fachrichtung = new Fachrichtung($_REQUEST);
            $fachrichtung->speichere();
        } else {
            if (strtotime($_REQUEST['start']) < strtotime($_REQUEST['ende'])) {
                $offener_tag = new Offener_tag($_REQUEST);
                $offener_tag->speichere();

                $this->addContext("text", "Open Day wurde erfolgreich erstellt");
                $this->addContext("title", "Neuer Open Day");
            } else {
                $this->addContext("text", "Open Day wurde nicht erstellt. Überprüfen Sie die Start- und Endzeit!");
                $this->addContext("title", "Fehler");
            }
        }
    }


    public function be_neues_fach()
    {
        $this->addContext("be_neues_fach", "nix");
    }

    public function be_fuehrung_erfolgreich()
    {
        if (!empty($_REQUEST) && !empty($_REQUEST['anmelden'])) {
            erstelle_Fuehrungen($_REQUEST);
        }
        $this->addContext("text", "Führung erfolgreich hinzugefügt");
    }
    public function be_alle_einstellungen()
    {


        $this->addContext("offenertagID", $_REQUEST['id']);


        $this->addContext("be_alle_einstellungen", Fachrichtung::findeAlleFachrichtungen());
    }
    public function be_alle_od()
    {
        $this->addContext("be_alle_od", Offener_tag::findeAlleOffener_tagDesc());
    }

    public function be_od_mit_fuehrungen_editieren()
    {
        if (isset($_REQUEST['anmeldenButton']) && !isset($_REQUEST['delete'])) {
            isUpdate($_REQUEST);


            /*
            $fuehrung = Fuehrung::findeFuehrung($_REQUEST['f_id']);
            $fuehrung->setFuehrungspersonen($_REQUEST['fuehrungspersonen']);
            $fuehrung->speichere();
            */
        } elseif (isset($_REQUEST['delete'])) {
            $anmeldung = Anmeldung::findeAnmeldung($_REQUEST['delete']);
            if ($anmeldung != NULL) {
                $anmeldung->loesche();
            }
        }

        $offenerTag = Offener_tag::findeOffenenTag($_REQUEST['id']);
        $this->addContext("offenerTag", $offenerTag);
        $this->addContext("fuehrungen", Fuehrung::gemeinsammeIDmitID($offenerTag->getId()));
    }



    //Subfooter
    public function impressum()
    {

        $this->addContext("impressum", "nix");
    }

    public function privacy()
    {
        $this->addContext("privacy", "nix");
    }

    public function cookies()
    {
        $this->addContext("cookies", "nix");
    }

    public function adminAnmeldung()
    {

        if (empty($_POST['benutzername']) && empty($_POST['passwort'])) {
            header('Location: index.php?aktion=be_login_admin');
        }
        //PASSWORT UND BENUTZERNAME LEER
        else if (stringsVergleichen($_POST['passwort'], CONF['ADMIN_PW']) && stringsVergleichen($_POST['benutzername'], CONF['ADMIN_BN'])) {
            logge_ein($_POST['benutzername']);
            header('Location: index.php?aktion=be_alle_od');
        }
        //PASSWORT UND BENUTZERNAME STIMMEN überein
        else {
            header('Location: index.php?aktion=be_login_admin');
        }
    }


    public function be_login_admin()
    {
        if (isset($_REQUEST['benutzername']) && isset($_REQUEST['passwort'])) {
        }
        $this->addContext("be_login_admin", "nix");
    }
    public function printXLS()
    {
        $alleAnmeldungen = Anmeldung::findeAlleAnmeldungenSortiertDatum();
        $this->addContext("alleAnmeldungen", $alleAnmeldungen);

        $alleFachrichtungen = Fachrichtung::findeAlleFachrichtungen();
        $this->addContext("alleFachrichtungen", $alleFachrichtungen);

        $alleFuehrungen = Fuehrung::findeAlleFuehrungen();
        $this->addContext("alleFuehrungen", $alleFuehrungen);

        $this->addContext("printXLS", "nix");

        $this->addContext("", "");
    }
    public function test()
    {
        $this->addContext("test", "nix");
    }

    /**
     * Sendet information an Seite($aktion) und beendet den derzeitigen Skript.
     * 
     * @author Andreas Codalonga
     * @param string $aktion Seite die aufgerufen werden soll.
     * @param string $info Nachricht die übergeben werden soll.
     * @param string $token Optional
     */
    private function __add_info(string $aktion, string $info, string $token = "")
    {
        if ($token === '') {
            header("Location: ?aktion=$aktion&info=$info");
        } else {
            header("Location: ?aktion=$aktion&info=$info&token=$token");
        }
        exit;
    }

    /**
     * @author Andreas Codalonga
     */
    private function anmelden()
    {
        if (
            isset($_REQUEST['telefon']) &&
            isset($_REQUEST['vorname']) &&
            isset($_REQUEST['nachname']) &&
            isset($_REQUEST['email']) &&
            isset($_REQUEST['fuehrung_id']) &&
            isset($_REQUEST['anzahl'])
        ) {
            if (
                Anmeldung::validate_data(
                    $_REQUEST['telefon'],
                    $_REQUEST['vorname'],
                    $_REQUEST['nachname'],
                    $_REQUEST['email'],
                    $_REQUEST['fuehrung_id'],
                    $_REQUEST['anzahl']
                )
            ) {
                $datum = date("Y-m-d H:i:s", strtotime("now"));

                $Anmeldung = new Anmeldung([
                    'datum' => $datum,
                    'telefon' => $_REQUEST['telefon'],
                    'vorname' => $_REQUEST['vorname'],
                    'nachname' => $_REQUEST['nachname'],
                    'email' => $_REQUEST['email'],
                    'fuehrung_id' => $_REQUEST['fuehrung_id'],
                    'anzahl' => $_REQUEST['anzahl']
                ]);
                $Anmeldung->speichere();

                require_once 'model/email.php';

                $to_address = $Anmeldung->getEmail();
                $to_name = ucwords($Anmeldung->getVorname()) . ' ' . ucwords($Anmeldung->getNachname());
                $subject = 'Anmeldung Erfolgreich';
                $message = file_get_contents('mail/anmeldung.mail.html');
                $message = ersetze_platzhalter($message, [
                    ['url', CONF['URL']],
                    ['namen', $to_name],
                    ['token', $Anmeldung->getToken()]
                ]);

                email::send(
                    $subject,
                    $message,
                    $to_address,
                    $to_name
                );

                $this->__add_info('fe_startseite', 'ce6');
            }

            $this->__add_info('fe_startseite', 'b8d');
        }

        $this->__add_info('fe_startseite', 'c8f');
    }

    /**
     * @author Andreas Codalonga
     */
    private function fe_termin()
    {
        if (isset($_REQUEST['token']) && $_REQUEST['token']) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {
                // führe aktion aus
                if (isset($_REQUEST['aendern'])) {
                    $this->aendern();
                    $Anmeldung = Anmeldung::findeAnmeldung($Anmeldung->getToken()); // aktualisieren
                } else if (isset($_REQUEST['abmelden'])) {
                    $this->abmelden();
                    header('Location: ?aktion=fe_startseite');
                }
                if (isset($_REQUEST['info']) && get_info($_REQUEST['info'])) {
                    $this->addContext('info', get_info($_REQUEST['info']));
                }

                $Fuehrung = Fuehrung::findeFuehrung($Anmeldung->getFuehrung_id());
                $Offener_tag = Offener_tag::findeOffenenTag($Fuehrung->getOffener_tag_id());
                $fachrichtung = Fachrichtung::getFachrichtungBeiID($Fuehrung->getFachrichtung_id());

                // frontend daten vorbereiten
                $this->addContext('token', $Anmeldung->getToken());
                $this->addContext('datum', datum_formatieren($Offener_tag->getDatum(), 'd.m.Y'));
                $this->addContext('vorname', $Anmeldung->getVorname());
                $this->addContext('nachname', $Anmeldung->getNachname());
                $start = strtotime($Fuehrung->getUhrzeit());
                $this->addContext('start', date('H:i', $start));
                $ende = addiere_minuten($start, $Offener_tag->getIntervall());
                $this->addContext('ende', date('H:i', $ende));
                $this->addContext('fachrichtung', $fachrichtung);
                $this->addContext('anzahl', $Anmeldung->getAnzahl());
                $max_anzahl = $Fuehrung->getKapazitaet() - Anmeldung::anzahlTeilnehmer($Fuehrung->getId()) + $Anmeldung->getAnzahl();
                $this->addcontext('maxanzahl', $max_anzahl);

                return;
            }
        }

        header('Location: ?aktion=fe_startseite');
    }

    /**
     * @author Andreas Codalonga
     */
    private function abmelden()
    {
        if (isset($_REQUEST['token']) && $_REQUEST['token']) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {

                $Fuehrung = Fuehrung::findeFuehrung($Anmeldung->getFuehrung_id());
                if ($Fuehrung) {

                    if (mindestens_1_tag_entfernt(date('Y-m-d'), $Fuehrung->getOffener_tag_datum())) {

                        $Anmeldung->loesche();

                        require_once 'model/email.php';

                        $to_address = $Anmeldung->getEmail();
                        $to_name = ucwords($Anmeldung->getVorname()) . ' ' . ucwords($Anmeldung->getNachname());
                        $subject = 'Anmeldung Gelöscht';
                        $message = file_get_contents('mail/abmeldung.mail.html');
                        $message = ersetze_platzhalter($message, [
                            ['url', CONF['URL']],
                            ['namen', $to_name],
                            ['token', $Anmeldung->getToken()]
                        ]);

                        email::send(
                            $subject,
                            $message,
                            $to_address,
                            $to_name
                        );

                        $this->__add_info('fe_startseite', '2c4');
                    }

                    $this->__add_info('fe_startseite', '8c5');
                }

                $this->__add_info('fe_startseite', '2b0');
            }

            $this->__add_info('fe_startseite', 'fa3');
        }

        header('Location: ?aktion=fe_startseite');
    }

    /**
     * @author Andreas Codalonga
     */
    private function aendern()
    {
        if (isset($_REQUEST['token']) && $_REQUEST['token']) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {

                $Fuehrung = Fuehrung::findeFuehrung($Anmeldung->getFuehrung_id());
                if ($Fuehrung) {

                    if (mindestens_1_tag_entfernt(date('Y-m-d'), $Fuehrung->getOffener_tag_datum())) {

                        if (isset($_REQUEST['anzahl']) && $_REQUEST['anzahl']) {

                            $differenz = $_REQUEST['anzahl'] - $Anmeldung->getAnzahl();

                            if (Anmeldung::validate_anzahl($differenz, $Anmeldung->getFuehrung_id())) {

                                $Anmeldung->setAnzahl($_REQUEST['anzahl']);
                                $Anmeldung->speichere();

                                require_once 'model/email.php';

                                $to_address = $Anmeldung->getEmail();
                                $to_name = ucwords($Anmeldung->getVorname()) . ' ' . ucwords($Anmeldung->getNachname());
                                $subject = 'Anmeldung Bearbeitet';
                                $message = file_get_contents('mail/bearbeitung.mail.html');
                                $message = ersetze_platzhalter($message, [
                                    ['url', CONF['URL']],
                                    ['namen', $to_name],
                                    ['token', $Anmeldung->getToken()]
                                ]);

                                email::send(
                                    $subject,
                                    $message,
                                    $to_address,
                                    $to_name
                                );

                                $this->__add_info('fe_termin', '57d', $_REQUEST['token']);
                            }

                            $this->__add_info('fe_termin', '9b8', $_REQUEST['token']);
                        }

                        $this->__add_info('fe_termin', '734', $_REQUEST['token']);
                    }

                    $this->__add_info('fe_termin', 'a95', $_REQUEST['token']);
                }

                $this->__add_info('fe_startseite', '3b9');
            }

            $this->__add_info('fe_startseite', '54e');
        }

        header('Location: ?aktion=fe_startseite');
    }

    private function generatePage($template)
    {
        extract($this->context);
        require_once 'view/template/' . $template . ".tpl.php";
    }

    private function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }
}
