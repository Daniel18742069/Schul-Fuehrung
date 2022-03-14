<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion(); // LOGIK
        $this->generatePage($aktion); //VIEW
    }
    
    public function alleMannschaften(){
      $this->addContext("namen",Funktion);
    }
    

    private function generatePage($template){
        extract($this->context);
        require_once 'view/'.$template.".tpl.php";
        
    }
     
    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
