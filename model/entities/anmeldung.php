<?php

class Anmeldung{

    use Entity;

    private $token = "";
    private $datum = "";
    private $telefon = "";
    private $vorname = "";
    private $nachname = "";
    private $email = "";
    private $fuehrung_id = 0;
    private $anzahl = 0;

    
    public function loeschen(){

        echo "WIP";
    }

    private function _insert(){

        $sql = 'INSERT INTO events (token, telefon, vorname, nachname, email, fuehrung_id, anzahl)' 
                . 'VALUES (:token, :telefon, :vorname, :nachname, :email, :fuehrung_id, :anzahl)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));

    }
    
    private function _update(){

        echo "WIP";

    }




    public function getToken(){
        return $this->token;
    }
    public function setToken($token){
        $this->token = $token;

        return $this;
    }

    public function getDatum(){
        return $this->datum;
    }
    public function setDatum($datum){
        $this->datum = $datum;

        return $this;
    }

    public function getTelefon(){
        return $this->telefon;
    }
    public function setTelefon($telefon){
        $this->telefon = $telefon;

        return $this;
    }

    public function getVorname(){
        return $this->vorname;
    }
    public function setVorname($vorname){
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname()
    {
        return $this->nachname;
    }
    public function setNachname($nachname){
        $this->nachname = $nachname;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    public function getFuehrung_id(){
        return $this->fuehrung_id;
    }
    public function setFuehrung_id($fuehrung_id){
        $this->fuehrung_id = $fuehrung_id;

        return $this;
    }

    public function getAnzahl(){
        return $this->anzahl;
    }
    public function setAnzahl($anzahl){
        $this->anzahl = $anzahl;

        return $this;
    }
}



?>