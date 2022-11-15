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
            $this->__add_info($this->anmelden());
        }
        if (isset($_REQUEST['info']) && get_info($_REQUEST['info'])) {
            $this->addContext('info', get_info($_REQUEST['info']));
        }

        $offener_tag = Offener_tag::findeAktiverOffenen_tag();
        $this->addContext("offener_tag", $offener_tag);
        
        if($offener_tag != false){

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
    }

    //admin
    public function be_neuer_od()
    {
        $this->addContext("be_neuer_od", "nix");
    }


    public function be_neues_fach()
    {
        $this->addContext("be_neues_fach", "nix");
    }

    public function be_alle_einstellungen()
    {


        $this->addContext("offenertagID", $_REQUEST['id']);


        $this->addContext("be_alle_einstellungen", Fachrichtung::findeAlleFachrichtungen());
    }
    public function be_alle_od()
    {
        if (!empty($_REQUEST) && !empty($_REQUEST['anmeldenFuehrungen'])) {
            erstelle_Fuehrungen($_REQUEST);
            $_REQUEST['info']="9b0";
        }else if(!empty($_REQUEST['beschreibung'])) {
            $fachrichtung = new Fachrichtung($_REQUEST);
            $fachrichtung->speichere();
            $_REQUEST['info']="7x1";
        }elseif(!empty($_REQUEST['start'])){
            if (strtotime($_REQUEST['start']) < strtotime($_REQUEST['ende'])) {
                $offener_tag = new Offener_tag($_REQUEST);
                $offener_tag->speichere();
                $_REQUEST['info']="6g9";
            } else {
                $_REQUEST['info']="8b7";
            }

        
    }
    if (isset($_REQUEST['info']) && get_info($_REQUEST['info'])) {
        $this->addContext('info', get_info($_REQUEST['info']));
    }
    $this->addContext("be_alle_od", Offener_tag::findeAlleOffener_tagDesc());
}

    public function be_od_mit_fuehrungen_editieren()
    {
        if (isset($_REQUEST['anmeldenButton']) && !isset($_REQUEST['delete'])) {
            isUpdate($_REQUEST);
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
            header('Location: Login');
        }
        //PASSWORT UND BENUTZERNAME LEER
        else if (stringsVergleichen($_POST['passwort'], CONF['ADMIN_PW']) && stringsVergleichen($_POST['benutzername'], CONF['ADMIN_BN'])) {
            logge_ein($_POST['benutzername']);
            header('Location: AlleOpenday');
            
        }
        //PASSWORT UND BENUTZERNAME STIMMEN überein
        else {
            header('Location: Login');
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

        $alleFuehrungen = Fuehrung::alleFuehrungEinesOD($_GET['id']);
        $this->addContext("alleFuehrungen", $alleFuehrungen);

        $this->addContext("printXLS", "nix");

        $this->addContext("", "");
    }
    public function test()
    {
        $this->addContext("test", "nix");
    }

    /**
     * Sendet information($array[1]) an Seite($array[0]) und beendet den derzeitigen Skript. Optional kann es einen Token($array[2]) mitgeben.
     * 
     * @author Andreas Codalonga
     * @param array $array $array[0]=aktion; $array[1]=information; optional $array[2]=token;
     */
    private function __add_info(array $array)
    {
        $aktion = $array[0];
        $info = $array[1];
        if (isset($array[2])) {
            $token = $array[2];
            header("Location: $aktion$token$info");
        } else {
            header("Location: $aktion$info");
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

                return ['Startseite&', 'ce6'];
            }

            return ['Startseite&', 'b8d'];
        }

        return ['Startseite&', 'c8f'];
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
                    $this->__add_info($this->aendern());
                } else if (isset($_REQUEST['abmelden'])) {
                    $this->__add_info($this->abmelden());
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

        header('Location: Startseite');
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

                        return ['Startseite&', '2c4'];
                    }

                    return ['Startseite&', '8c5'];
                }

                return ['Startseite&', '2b0'];
            }

            return ['Startseite&', 'fa3'];
        }

        return ['Location: Startseite'];
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

                                return ['Termin&', '57d', $_REQUEST['token']];
                            }

                            return ['Termin&', '9b8', $_REQUEST['token']];
                        }

                        return ['Termin&', '734', $_REQUEST['token']];
                    }

                    return ['Termin&', 'a95', $_REQUEST['token']];
                }

                return ['Startseite&', '3b9'];
            }

            return ['Startseite&', '54e'];
        }

        header('Location: Startseite');
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
