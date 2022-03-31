<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }
    
    public function bg_startseite(){
      $this->addContext("bg_startseite",'asdf');
    }
    

    private function generatePage($template){
        extract($this->context);
        require_once 'view/Backend/'.$template.".tpl.html";
        
    }
     
    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
