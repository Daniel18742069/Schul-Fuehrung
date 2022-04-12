<?php

class Controller
{

    private $context = array();


    public function run($aktion)
    {
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }

    //user
    public function fe_startseite(){
      $this->addContext("fe_startseite","nix");
    }

    //admin
    public function bg_neuer_od(){
        $this->addContext("bg_neuer_od","nix");
    }
    public function bg_od_erfolgreich(){

        $offener_tag = new Offener_tag($_POST);
        $offener_tag->speichere();

        $this->addContext("bg_od_erfolgreich",$offener_tag);
    }
    public function bg_alle_einstellungen(){
            
    
        $this->addContext("offenertagID",$_REQUEST['id']);
        
        $this->addContext("bg_alle_einstellungen",Fachrichtung::findeAlleFachrichtungen());
    }
    public function be_alle_od(){
        if(!empty($_REQUEST)){
            //erstelle_Fuehrungen($_REQUEST);
        }
        $this->addContext("be_alle_od",Offener_tag::findeAlleOffener_tag());
        
        
    }

    public function fe_termin(){
        $this->addContext("fe_termin","nix");
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

    private function generatePage($template)
    {
        extract($this->context);
        require_once 'view/template/'.$template.".tpl.php";
    }

    private function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }
}