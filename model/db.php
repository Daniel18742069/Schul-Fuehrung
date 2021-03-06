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
         self::$db = new PDO('mysql:host='.CONF['DB_HOST'].';dbname='.CONF['DB_NAME'].';charset=utf8', CONF['DB_USER'], CONF['DB_PASS']);
         self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
       }
       return self::$db;
    }
}
