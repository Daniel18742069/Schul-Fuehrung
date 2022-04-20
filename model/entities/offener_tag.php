<?php

class Offener_tag
{

    use Entity;

    private $id = 0;
    private $datum = "";
    private $bezeichnung = "";
    private $status = 0;    //0 deaktiviert 1 aktiviert
    private $start = "";
    private $ende = "";
    private $intervall = 0;




    public function loeschen()
    {

        $sql = 'DELETE FROM od_offener_tag WHERE id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($this->getId()));

        $this->id = 0;
    }

    private function _insert()
    {

        $sql = 'INSERT INTO od_offener_tag (datum, bezeichnung, status, start, ende, intervall)
                VALUES (:datum, :bezeichnung, :status, :start, :ende, :intervall)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));

        $this->id = DB::getDB()->lastInsertId();
    }

    private function _update()
    {

        $sql = 'UPDATE od_offener_tag SET datum =:datum, bezeichnung=:bezeichnung, status=:status, start=:start, ende=:ende, intervall=:intervall WHERE id =:id';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());
    }





    public function getDatum()
    {
        return $this->datum;
    }
    public function getDatumWelformed()
    {
        $datum = strtotime($this->datum);

        return date('d.m.yy', $datum);
    }
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getStatusString()
    {
        if ($this->status == 0) {
            return "deaktiviert";
        } else {
            return "aktiviert";
        }
    }
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }
    public function getStartWelformed()
    {
        return substr($this->start, 0, -3);
    }
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getEnde()
    {
        return $this->ende;
    }
    public function getEndeWelformed()
    {
        return substr($this->ende, 0, -3);
    }
    public function setEnde($ende)
    {
        $this->ende = $ende;

        return $this;
    }

    public function getIntervall()
    {
        return $this->intervall;
    }
    public function setIntervall($intervall)
    {
        $this->intervall = $intervall;

        return $this;
    }

    public static function findeAlleOffener_tag()
    {
        $sql = 'SELECT * FROM od_offener_tag';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Offener_tag');
        return $abfrage->fetchAll();
    }

    public static function findeNeuestenOffenenTag()
    {
        $sql = 'SELECT * FROM od_offener_tag ORDER BY id DESC LIMIT 1';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Offener_tag');
        return $abfrage->fetch();
    }
    public static function findeOffenenTag(int $id)
    {
        $sql = 'SELECT * FROM od_offener_tag WHERE id = ?';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Offener_tag');
        return $abfrage->fetch();
    }

    public static function findeOffenen_tag(string $datum)
    {
        $sql = 'SELECT * FROM od_offener_tag WHERE datum = ' . $datum . ';';

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Offener_tag');
        return $abfrage->fetch();
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
