<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }
    
    public function startseite(){
      $this->addContext("startseite","nix");
    }
    

    private function generatePage($template){
        extract($this->context);
        require_once 'view/Frontend/template/'.$template.".tpl.php";
        
    }
     
    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
