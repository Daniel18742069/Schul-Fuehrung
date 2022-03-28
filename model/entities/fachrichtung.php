<?php

class Fachrichtung{

    use Entity;

    private $id = 0;
    private $beschreibung = "";
    



    public static function findeAlleFachrichtungen() {
        $sql = 'SELECT * FROM fachrichtung';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fachrichtung');
        return $abfrage->fetchAll();
    }

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