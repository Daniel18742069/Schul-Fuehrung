<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }
    
    public function fe_startseite(){
      $this->addContext("fe_startseite","nix");
    }
    

    private function generatePage($template){
        extract($this->context);
        require_once 'view/template/'.$template.".tpl.php";
        
    }
     
    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
