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

    public function fe_startseite()
    {
        $this->addContext("fe_startseite", "nix");
    }

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
            $Anmeldung = new Anmeldung(
                $_REQUEST['datum'],
                $_REQUEST['telefon'],
                $_REQUEST['vorname'],
                $_REQUEST['nachname'],
                $_REQUEST['email'],
                $_REQUEST['fuehrung_id'],
                $_REQUEST['anzahl']
            );

            if ($Anmeldung->validate_data()) {
                $Anmeldung->speichere();

                require_once 'model/email.php';

                $to_address = $Anmeldung->getEmail();
                $to_name = ucwords($Anmeldung->getVorname()) . ' ' . ucwords($Anmeldung->getNachname());
                $subject = 'Anmeldung Erfolgreich';
                $message = file_get_contents('mail/anmeldung.mail.html');
                $message = ersetze_platzhalter($message, [
                    ['url', URL],
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

    private function fe_termin()
    {
        if (isset($_REQUEST['token'])) {

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

    private function abmelden()
    {
        if (isset($_REQUEST['token'])) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {

                $Fuehrung = Fuehrung::findeFuehrung($Anmeldung->getFuehrung_id());
                if ($Fuehrung) {

                    $Offener_tag = Offener_tag::findeNeuestenOffenenTag();
                    if ($Offener_tag) {

                        if (mindestens_1_tag_entfernt($Anmeldung->getdate(), $Offener_tag->getdate())) {
                            $Anmeldung->loeschen();

                            require_once 'model/email.php';

                            $to_address = $Anmeldung->getEmail();
                            $to_name = ucwords($Anmeldung->getVorname()) . ' ' . ucwords($Anmeldung->getNachname());
                            $subject = 'Anmeldung Gelöscht';
                            $message = file_get_contents('mail/abmeldung.mail.html');
                            $message = ersetze_platzhalter($message, [
                                ['url', URL],
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

    private function aendern()
    {
        if (isset($_REQUEST['token'])) {

            $Anmeldung = Anmeldung::findeAnmeldung($_REQUEST['token']);
            if ($Anmeldung) {

                if(isset($_REQUEST['anzahl'])) {
                    
                }
            }
        }
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
