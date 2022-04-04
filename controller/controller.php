<?php

class Controller
{

    private $context = array();


    public function run($aktion)
    {
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
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
            $Anmelden = new Anmeldung(
                $_REQUEST['datum'],
                $_REQUEST['telefon'],
                $_REQUEST['vorname'],
                $_REQUEST['nachname'],
                $_REQUEST['email'],
                $_REQUEST['fuehrung_id'],
                $_REQUEST['anzahl']
            );

            if ($Anmelden->validate_data()) {
                $Anmelden->save();

                require_once 'model/email.php';

                $to_address = $Anmelden->getEmail();
                $to_name = ucwords($Anmelden->getVorname()) . ' ' . ucwords($Anmelden->getNachname());
                $subject = 'Anmeldung Erfolgreich';
                $message = file_get_contents('mail/anmeldung.mail.html');
                $message = ersetze_platzhalter($message, [
                    ['url', URL],
                    ['namen', $to_name],
                    ['token', $Anmelden->getToken()]
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

    private function abmelden()
    {
        if (isset($_REQUEST['token'])) {
            # check token
            # if (token correct) {
                # delete
            # }
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
