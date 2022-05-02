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


    public static function findeAlleFachrichtungen_limitierteColumns(array $columns, $id)
    {

    $sql = 'SELECT ';
        $count = 0;
        foreach ($columns as $column) {

            $sql .= ($count > 0)
                ? ',' . $column
                : $column;

            $count++;
        }
        $sql .= ' FROM od_fachrichtung WHERE id = '. $id;

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_ASSOC);
        return $abfrage->fetchAll();

}
}



?>