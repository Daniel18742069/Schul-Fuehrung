<?php

class Offener_Tag{

    use Entity;

    private $datum = "";
    private $bezeichnung = "";
    private $status = 0;
    private $start = "";
    private $ende = "";
    private $intervall = 0;

    









    public function getDatum(){
        return $this->datum;
    }
    public function setDatum($datum){
        $this->datum = $datum;

        return $this;
    }

    public function getBezeichnung(){
        return $this->bezeichnung;
    }
    public function setBezeichnung($bezeichnung){
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;

        return $this;
    }

    public function getStart(){
        return $this->start;
    }
    public function setStart($start){
        $this->start = $start;

        return $this;
    }

    public function getEnde(){
        return $this->ende;
    }
    public function setEnde($ende){
        $this->ende = $ende;

        return $this;
    }

    public function getIntervall(){
        return $this->intervall;
    }
    public function setIntervall($intervall){
        $this->intervall = $intervall;

        return $this;
    }
}



?>