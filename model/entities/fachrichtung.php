<?php

class Fachrichtung{

    use Entity;

    private $id = 0;
    private $beschreibung = "";
    

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getBeschreibung(){
        return $this->beschreibung;
    }
    public function setBeschreibung($beschreibung){
        $this->beschreibung = $beschreibung;

        return $this;
    }
}



?>