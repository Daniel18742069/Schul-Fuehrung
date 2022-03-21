<?php

class Anmeldung
{

    use Entity;

    private $token = "";
    private $datum = "";
    private $telefon = 0;
    private $vorname = "";
    private $nachname = "";
    private $email = "";
    private $fuehrung_id = 0;
    private $anzahl = 0;



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

    private static function generate_token(): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $random = mt_rand(0, strlen($characters) - 1);
        $letter = $characters[$random];

        $unixtime = microtime(true);

        return $letter . $unixtime;
    }

    public function validate_data(): bool
    {

        return true;
    }
}