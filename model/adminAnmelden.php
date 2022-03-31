<?php

require_once 'funktionen.php';

session_start();
//$_POST

    //Werte nicht vorhanden
    if(empty($_POST['benutzername']) && empty($_POST['passwort'])){
        header('Location: ../index...');
    }
    //PASSWORT UND BENUTZERNAME STIMMEN
    else if(stringsVergleichen($_POST['passwort'], "STATISCHE PASSWORT") && stringsVergleichen($_POST['benutzername'], "STATISCHER BENUTZERNAME")){
        logge_ein($_POST['benutzername']);
    }
    //PASSWORT UND BENUTZERNAME STIMMEN NICHT ÜBEREIN
    else{
        header('Location: ../index...'); //mit einen wert welcher einen Feher den benutzer anzeigt.
    }



?>