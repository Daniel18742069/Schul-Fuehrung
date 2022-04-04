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

    private bool $valid = false;

    public function loeschen()
    {

        echo "WIP";
    }

    private function _update()
    {
        echo "WIP";
    }




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

    public function __construct(
        $datum,
        $telefon,
        $vorname,
        $nachname,
        $email,
        $fuehrung_id,
        $anzahl
    ) {
        $this->token = self::generate_token();
        $this->datum = $datum;
        $this->telefon = $telefon;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->fuehrung_id = $fuehrung_id;
        $this->anzahl = $anzahl;
    }

    public static function findeAlleAnmeldungen_von_fuehrung(int $fuehrung_id)
    {
        $sql = 'SELECT * FROM anmeldung WHERE fuehrung_id=' . $fuehrung_id . ';';

        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fuehrung');
        return $abfrage->fetchAll();
    }

    public function save(): void
    {
        if ($this->valid)
            $this->_insert();
    }

    private function _insert(): void
    {
        $sql = 'INSERT INTO anmeldung (token, datum, vorname, nachname, email, fuehrung_id, anzahl)'
            . 'VALUES (:token, :datum, :vorname, :nachname, :email, :fuehrung_id, :anzahl)';

        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));
    }

    private static function generate_token(): string
    {
        $unixtime = microtime(true);

        $letter = chr(mt_rand(97, 122));

        return $unixtime . $letter;
    }

    public function validate_data(): bool
    {
        return $this->validate_datum($this->datum)
            && $this->validate_telefon($this->telefon)
            && $this->validate_name($this->vorname)
            && $this->validate_name($this->nachname)
            && $this->validate_email($this->email)
            && $this->validate_fuehrung_id($this->fuehrung_id)
            && $this->validate_anzahl($this->anzahl, $this->fuehrung_id);
    }

    private function validate_datum(string $date, $format = 'Y-m-d'): bool
    {
        $date_format = DateTime::createFromFormat($format, $date);

        return $date_format
            && $date_format->format($format) === $date;
    }

    private function validate_telefon(string $telefon): bool
    {
        $telefon_length = strlen($telefon);

        return $telefon
            && preg_match_all('/^[0-9 ]{3,}$/', $telefon) == $telefon_length;
    }

    private function validate_name(string $name): bool
    {
        $name_length = strlen($name);

        return $name
            && preg_match_all('/^[a-z]{3,}$/i', $name) == $name_length;
    }

    private function validate_email(string $email): bool
    {
        return $email
            && preg_match('/^[-._a-z1-9]+[@][a-z1-9]+[.][a-z]{2,3}$/i', $email);
    }

    private function validate_fuehrung_id(int $fuehrung_id): bool
    {
        $Fuehrungen = Fuehrung::findeAlleFuehrungen();
        foreach ($Fuehrungen as $Fuehrung) {

            if ($Fuehrung->getId() == $fuehrung_id) return  true;
        }

        return false;
    }

    private function validate_anzahl(int $anzahl, int $fuehrung_id): bool
    {
        if ($anzahl) {
            $Fuehrungen = Fuehrung::findeAlleFuehrungen();
            $Anmeldungen = Anmeldung::findeAlleAnmeldungen_von_fuehrung($fuehrung_id);

            if ($Anmeldungen) {
                $summe = 0;
                foreach ($Anmeldungen as $Anmeldung) {
                    $summe += $Anmeldung->getAnzahl();
                }
                $summe += $anzahl;

                foreach ($Fuehrungen as $Fuehrung) {
                    if ($Fuehrung->getId() == $fuehrung_id)
                        return $summe <= $Fuehrung->getKapazitaet();
                }
            }
        }

        return false;
    }
}
