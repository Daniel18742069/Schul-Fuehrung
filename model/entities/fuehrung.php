<?php

class Fuehrung
{

    use Entity;

    private $id = 0;
    private $fuehrungspersonen = "";
    private $sichtbar = 0;
    private $kapazitaet = 0;
    private $uhrzeit = "";
    private $fachrichtung_id = 0;
    private $offener_tag_id  = 0;
    private $gemeinsame_id  = "";



    public function loeschen()
    {

        echo "WIP";
    }

    private function _insert()
    {

        $sql = 'INSERT INTO od_fuehrung (fuehrungspersonen, sichtbar, kapazitaet, uhrzeit, fachrichtung_id, offener_tag_id, gemeinsame_id)'
            . 'VALUES (:fuehrungspersonen, :sichtbar, :kapazitaet, :uhrzeit, :fachrichtung_id, :offener_tag_id, :gemeinsame_id)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));
    }

    private function _update()
    {

        echo "WIP";
    }

    public static function findeFuehrung(int $id)
    {
        $sql = 'SELECT * FROM od_fuehrung WHERE id = ' . $id . ';';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fuehrung');
        return $abfrage->fetch();
    }

    public static function findeAlleFuehrungen()
    {
        $sql = 'SELECT * FROM od_fuehrung';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fuehrung');
        return $abfrage->fetchAll();
    }

    /*public static function findeAlleFuehrungenXLS()
    {
        $sql = 'SELECT fuehrungspersonen, kapazitaet, uhrzeit FROM od_fuehrung';
        
        DONLER

        */


    public static function alleFuehrungEinesOD(int $offener_tag_id)
    {

        $sql = 'SELECT * FROM od_fuehrung WHERE offener_tag_id = ' . $offener_tag_id;
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fuehrung');
        return $abfrage->fetchAll();
    }
    public static function findeSpezifischeFuehrungen(int $offener_tag_id, int $fachrichtung_id, $sichtbar = 1)
    {
        $sql = 'SELECT * FROM od_fuehrung WHERE offener_tag_id = ' . $offener_tag_id . ' AND fachrichtung_id = ' . $fachrichtung_id;
        $sql .= ($sichtbar) ? ' AND sichtbar = ' . $sichtbar : '';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fuehrung');
        return $abfrage->fetchAll();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFuehrungspersonen()
    {
        return $this->fuehrungspersonen;
    }
    public function setFuehrungspersonen($fuehrungspersonen)
    {
        $this->fuehrungspersonen = $fuehrungspersonen;

        return $this;
    }



    public function getSichtbar()
    {
        return $this->sichtbar;
    }
    public function setSichtbar($sichtbar)
    {
        $this->sichtbar = $sichtbar;

        return $this;
    }

    public function getKapazitaet()
    {
        return $this->kapazitaet;
    }
    public function setKapazitaet($kapazitaet)
    {
        $this->kapazitaet = $kapazitaet;

        return $this;
    }

    public function getUhrzeit()
    {
        return $this->uhrzeit;
    }
    public function getUhrzeitWelformed()
    {
        return substr($this->uhrzeit, 0, -3);
    }
    public function setUhrzeit($uhrzeit)
    {
        $this->uhrzeit = $uhrzeit;

        return $this;
    }

    public function getFachrichtung_id()
    {
        return $this->fachrichtung_id;
    }
    public function setFachrichtung_id($fachrichtung_id)
    {
        $this->fachrichtung_id = $fachrichtung_id;

        return $this;
    }

    public function getOffener_tag_id()
    {
        return $this->offener_tag_id;
    }
    public function setOffener_tag_id($offener_tag_id)
    {
        $this->offener_tag_id  = $offener_tag_id;

        return $this;
    }
    public function getOffener_tag_datum()
    {
        $Offener_tag = Offener_tag::findeOffenenTag($this->offener_tag_id);
        return $Offener_tag->getDatum();
    }

    /**
     * Get the value of gemeinsame_id
     */
    public function getGemeinsame_id()
    {
        return $this->gemeinsame_id;
    }

    /**
     * Set the value of gemeinsame_id
     *
     * @return  self
     */
    public function setGemeinsame_id($gemeinsame_id)
    {
        $this->gemeinsame_id = $gemeinsame_id;
    }
}
