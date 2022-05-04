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

    //user
    public function fe_startseite()
    {
        $offener_tag = Offener_tag::findeAktiverOffenen_tag();
        $this->addContext("offener_tag", $offener_tag);

        $alle_fachrichtungen = Fachrichtung::findeAlleFachrichtungen();
        $this->addContext("fachrichtungen", $alle_fachrichtungen);

        //$alle_fuehrungen = Fuehrung::findeSpezifischeFuehrungen($offener_tag->getId());
        //$alle_anmeldungen = Anmeldung::findeAlleAnmeldungen();
        
        // personen die schon dabei sind ausrechnen mit foreach(führungen) oder so wos

        //$this->addContext("fuehrungen", $alle_fuehrungen);
    }

    //admin
    public function bg_neuer_od()
    {
        $this->addContext("bg_neuer_od", "nix");
    }
    public function bg_od_erfolgreich()
    {

        $offener_tag = new Offener_tag($_POST);
        $offener_tag->speichere();

        $this->addContext("bg_od_erfolgreich", $offener_tag);
    }
    public function bg_alle_einstellungen()
    {


        $this->addContext("offenertagID", $_REQUEST['id']);


        $this->addContext("bg_alle_einstellungen", Fachrichtung::findeAlleFachrichtungen());
    }
    public function be_alle_od()
    {
        if (!empty($_REQUEST)) {

            erstelle_Fuehrungen($_REQUEST);
        }
        $this->addContext("be_alle_od", Offener_tag::findeAlleOffener_tag());
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

    private function ___test()
    {
        echo 'test';
    }
    public function test()
    {
        $this->addContext("test", "nix");
    }

    /**
     * @author Andreas Codalonga
     */
    private function anmelden()
    {
        if (
            isset($_REQUEST['datum']) &&
            isset($_REQUEST['telefon']) &&
            isset($_REQUEST['vorname']) &&
            isset($_REQUEST['nachname']) &&
            isset($_REQUEST['email']) &&
            isset($_REQUEST['fuehrung_id']) &&
            isset($_REQUEST['anzahl'])
        ) {
            if (
                Anmeldung::validate_data(
                    $_REQUEST['datum'],
                    $_REQUEST['telefon'],
                    $_REQUEST['vorname'],
                    $_REQUEST['nachname'],
                    $_REQUEST['email'],
                    $_REQUEST['fuehrung_id'],
                    $_REQUEST['anzahl']
                )
            ) {

                $Anmeldung = new Anmeldung(
                    $_REQUEST['datum'],
                    $_REQUEST['telefon'],
                    $_REQUEST['vorname'],
                    $_REQUEST['nachname'],
                    $_REQUEST['email'],
                    $_REQUEST['fuehrung_id'],
                    $_REQUEST['anzahl']
                );
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

                $this->addContext('anmeldung', 'Erfolgreich!');
            }
        }
    }

    /**
     * @author Andreas Codalonga
     */
    private function fe_termin()
    {
        if (isset($_REQUEST['token']) && $_REQUEST['token']) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {

                $this->addContext('token', $Anmeldung->getToken());
                $this->addContext('datum', $Anmeldung->getDatum());
                $this->addContext('vorname', $Anmeldung->getVorname());
                $this->addContext('nachname', $Anmeldung->getNachname());
                $this->addContext('anzahl', $Anmeldung->getAnzahl());
            }

            return;
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

                    $Offener_tag = Offener_tag::findeNeuestenOffenenTag();
                    if ($Offener_tag) {

                        if (mindestens_1_tag_entfernt(date('Y-m-d'), $Offener_tag->getDatum())) {
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

                            $this->addContext('abmeldung', 'Erfolgreich!');
                        }
                    }
                }

                return;
            }
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

                                $this->addContext('aenderung', 'Erfolgreich!');
                            }
                        }
                    }
                }

                return;
            }
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
