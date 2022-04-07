<?php

class DB {
    private static $db = null;
    
    // Konstruktor privat machen, damit er nicht aufgerufen werden kann
    private function __construct() {
        ;
    }

    public static function getDB() {
       
       if (self::$db == NULL){
        try{
         self::$db = new PDO('mysql:host=localhost;dbname=schulfuehrung;charset=utf8', DB_USER, DB_PASS);
         self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
       }
       return self::$db;
    }
}
