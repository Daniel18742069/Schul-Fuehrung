<?php

class Fuehrung{

    use Entity;

    private $id = 0;
    private $fuehrungspersonen = "";
    private $sichtbar = 0;
    private $kapazitaet = 0;
    private $uhrzeit = "";
    private $fachrichtung_id = 0;
    private $offener_tag_datum = "";







    public function getId()
    {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getFuehrungspersonen(){
        return $this->fuehrungspersonen;
    }
    public function setFuehrungspersonen($fuehrungspersonen){
        $this->fuehrungspersonen = $fuehrungspersonen;

        return $this;
    }

    public function getSichtbar(){
        return $this->sichtbar;
    }
    public function setSichtbar($sichtbar){
        $this->sichtbar = $sichtbar;

        return $this;
    }

    public function getKapazitaet(){
        return $this->kapazitaet;
    }
    public function setKapazitaet($kapazitaet){
        $this->kapazitaet = $kapazitaet;

        return $this;
    }

    public function getUhrzeit(){
        return $this->uhrzeit;
    }
    public function setUhrzeit($uhrzeit){
        $this->uhrzeit = $uhrzeit;

        return $this;
    }

    public function getFachrichtung_id(){
        return $this->fachrichtung_id;
    }
    public function setFachrichtung_id($fachrichtung_id){
        $this->fachrichtung_id = $fachrichtung_id;

        return $this;
    }

    public function getOffener_tag_datum(){
        return $this->offener_tag_datum;
    }
    public function setOffener_tag_datum($offener_tag_datum){
        $this->offener_tag_datum = $offener_tag_datum;

        return $this;
    }
}



?>