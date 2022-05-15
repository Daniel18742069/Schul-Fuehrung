<?php

class Anmeldung
{

    use Entity;

    private string $token = "";
    private string $datum = "";
    private string $telefon = "";
    private string $vorname = "";
    private string $nachname = "";
    private string $email = "";
    private int $fuehrung_id = 0;
    private int $anzahl = 0;

    private bool $new = true;

    public function getToken()
    {
        return $this->token;
    }
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public function getDatum()
    {
        return $this->datum;
    }
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getVorname()
    {
        return $this->vorname;
    }
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname()
    {
        return $this->nachname;
    }
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getFuehrung_id()
    {
        return $this->fuehrung_id;
    }
    public function setFuehrung_id($fuehrung_id)
    {
        $this->fuehrung_id = $fuehrung_id;

        return $this;
    }

    public function getAnzahl()
    {
        return $this->anzahl;
    }
    public function setAnzahl($anzahl)
    {
        $this->anzahl = $anzahl;

        return $this;
    }

    public function __construct(array $array = array())
    {
        if ($array) {
            foreach ($array as $key => $value) {
                if ($key == 'new') continue;
                $setter = 'set' . ucfirst($key);
                if (method_exists($this, $setter)) {
                    $this->$setter($value);
                }
            }
        }

        if ($this->token == '') {
            $this->token = self::generate_token();
        } else {
            $this->new = false;
        }

        // print_r($this->toArray());
    }

    public static function findeAnmeldung(string $token)
    {
        $sql = 'SELECT * FROM od_anmeldung WHERE token = "' . $token . '";';

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Anmeldung');
        return $abfrage->fetch();
    }

    public static function findeAlleAnmeldungen()
    {
        $sql = 'SELECT * FROM od_anmeldung;';

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Anmeldung');
        return $abfrage->fetchAll();
    }

    public static function findeAlleAnmeldungen_von_fuehrung(int $fuehrung_id)
    {
        $sql = 'SELECT * FROM od_anmeldung WHERE fuehrung_id=' . $fuehrung_id . ';';

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Anmeldung');
        return $abfrage->fetchAll();
    }

    public function speichere(): void
    {
        if ($this->new) {
            $this->_insert();
        } else {
            $this->_update();
        }
    }

    private function _insert()
    {
        $sql = 'INSERT INTO od_anmeldung (token, datum, telefon, vorname, nachname, email, fuehrung_id, anzahl)
            VALUES (:token, :datum, :telefon, :vorname, :nachname, :email, :fuehrung_id, :anzahl)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());
    }

    private function _update()
    {
        $sql = 'UPDATE od_anmeldung
            SET telefon = :telefon
            , datum = :datum
            , vorname = :vorname
            , nachname = :nachname
            , email = :email
            , fuehrung_id = :fuehrung_id
            , anzahl = :anzahl
            WHERE token = :token;';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());
    }

    public function loesche(): void
    {
        $sql = 'DELETE FROM od_anmeldung WHERE token = :token;';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(['token' => $this->getToken()]);
    }

    public function toArray()
    {
        $attribute = get_object_vars($this);
        unset($attribute['new']);
        return $attribute;
    }

    public static function generate_token(): string
    {
        $unixtime = strtotime('now');
        $letter = chr(mt_rand(97, 122));

        return $unixtime . $letter;
    }

    public static function validate_data(
        string $telefon,
        string $vorname,
        string $nachname,
        string $email,
        int $fuehrung_id,
        int $anzahl
    ): bool {
        return self::validate_telefon($telefon)
            && self::validate_name($vorname)
            && self::validate_name($nachname)
            && self::validate_email($email)
            && self::validate_fuehrung_id($fuehrung_id)
            && self::validate_anzahl($anzahl, $fuehrung_id);
    }

    public static function validate_datum(string $date, $format = 'Y-m-d'): bool
    {
        $date_format = DateTime::createFromFormat($format, $date);
    
        return $date_format
            && $date_format->format($format) == $date;
    }

    public static function validate_telefon(string $telefon): bool
    {
        return $telefon
            && preg_match_all('/^[0-9 ]{3,}$/', $telefon);
    }

    public static function validate_name(string $name): bool
    {
        return $name
            && preg_match_all('/^[a-z]{3,}$/i', $name);
    }

    public static function validate_email(string $email): bool
    {
        return $email
            && preg_match('/^[-._a-z1-9]+[@][a-z1-9]+[.][a-z]{2,3}$/i', $email);
    }

    public static function validate_fuehrung_id(int $fuehrung_id): bool
    {
        $Fuehrungen = Fuehrung::findeAlleFuehrungen();
        foreach ($Fuehrungen as $Fuehrung) {

            if ($Fuehrung->getId() == $fuehrung_id) return  true;
        }

        return false;
    }

    public static function validate_anzahl(int $anzahl, int $fuehrung_id): bool
    {
        if ($anzahl) {
            $Fuehrungen = Fuehrung::findeAlleFuehrungen();
            $Anmeldungen = Anmeldung::findeAlleAnmeldungen_von_fuehrung($fuehrung_id);

            $summe = $anzahl;
            if ($Anmeldungen) {
                foreach ($Anmeldungen as $Anmeldung) {
                    $summe += $Anmeldung->getAnzahl();
                }
            }

            foreach ($Fuehrungen as $Fuehrung) {
                if ($Fuehrung->getId() == $fuehrung_id)
                    return $summe <= $Fuehrung->getKapazitaet();
            }
        }
        return false;
    }



    public static function anzahlTeilnehmer($fuehrung_id)
    {
        $sql = 'SELECT SUM(anzahl) AS anzahl FROM od_anmeldung WHERE fuehrung_id = ?';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($fuehrung_id));
        return $abfrage->fetch()["anzahl"];
    }
}
