<?php

class Controller
{

    private $context = array();


    public function run($aktion)
    {
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }

    public function alleMannschaften()
    {
        $this->addContext("namen", 'Funktion');
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
            $Anmelden = new anmeldung(
                $_REQUEST['datum'],
                $_REQUEST['telefon'],
                $_REQUEST['vorname'],
                $_REQUEST['nachname'],
                $_REQUEST['email'],
                $_REQUEST['fuehrung_id'],
                $_REQUEST['anzahl']
            );
        }
        $this->addContext('anmeldung', 'hallo');
    }

    private function generatePage($template)
    {
        extract($this->context);
        require_once 'view/' . $template . ".tpl.php";
    }

    private function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }
}
