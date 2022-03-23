<?php

class Offener_tag{

    use Entity;

    private $id = 0;
    private $datum = "";
    private $bezeichnung = "";
    private $status = 0;
    private $start = "";
    private $ende = "";
    private $intervall = 0;

    






    public function loeschen(){

        $sql = 'DELETE FROM offener_tag WHERE id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute( array($this->getId()) );

        $this->id =0;
        
    }

    private function _insert(){

        $sql = 'INSERT INTO offener_tag (datum, bezeichnung, status, start, ende, intervall)' 
                . 'VALUES (:datum, :bezeichnung, :status, :start, :ende, :intervall)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));

    }

    private function _update(){

        $sql ='UPDATE offener_tag SET datum =:datum, bezeichnung=:bezeichnung, status=:status, start=:start, ende=:ende, intervall=:intervall WHERE datum =:datum';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());

    }

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

    public static function findeAlleOffener_tag() {
        $sql = 'SELECT * FROM offener_tag';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'offener_tag');
        return $abfrage->fetchAll();
    }

    





    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}



?>