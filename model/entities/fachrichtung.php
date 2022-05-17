<?php

class Fachrichtung{

    use Entity;

    private $id = 0;
    private $beschreibung = "";
    

    public function loeschen(){

        echo "WIP";
    }

    private function _insert(){

        $sql = 'INSERT INTO od_fachrichtung (beschreibung)' 
                . 'VALUES (:beschreibung)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));
        
        $this->id = DB::getDB()->lastInsertId();

    }

    private function _update(){

        echo "WIP";

    }


    public static function findeAlleFachrichtungen() {
        $sql = 'SELECT * FROM od_fachrichtung';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fachrichtung');
        return $abfrage->fetchAll();
    }

    public static function findeFachrichtungen_OffenerTag(int $offener_tag_id, int $aktiv = 1) {
        $sql = 'SELECT DISTINCT `fa`.*
            FROM `od_fachrichtung` `fa`
            JOIN `od_fuehrung` `fu`
            ON `fa`.`id` = `fu`.`fachrichtung_id`
            JOIN `od_offener_tag` `of`
            ON `fu`.`offener_tag_id` = `of`.`id`
            WHERE `fu`.`sichtbar` = ' . $aktiv 
            . ' AND `of`.`id` = ' . $offener_tag_id;

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
    public static function getFachrichtungBeiID($id){
        $sql = 'SELECT beschreibung FROM od_fachrichtung where id = '. $id;
        $abfrage = DB::getDB()->query($sql);
        return $abfrage->fetch()['beschreibung'];
    }
}
