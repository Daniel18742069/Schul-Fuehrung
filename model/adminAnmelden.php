<?php

require_once 'funktionen.php';

session_start();
//$_POST

    //Werte nicht vorhanden
    if(empty($_POST['benutzername']) && empty($_POST['passwort'])){
        //header('Location: ../index...');
    }
    //PASSWORT UND BENUTZERNAME STIMMEN
    else if(stringsVergleichen($_POST['passwort'], CONF['ADMIN_PW']) && stringsVergleichen($_POST['benutzername'], CONF['ADMIN_BN'])){
        logge_ein($_POST['benutzername']);
        //header('Location: ../view/Backend/bg_startseite.tpl.html');
    }
    //PASSWORT UND BENUTZERNAME STIMMEN NICHT ÜBEREIN
    else{
        //header('Location: ../view/Backend/bg_login_admin.tpl.html'); //mit einen wert welcher einen Feher den benutzer anzeigt.
    }



?>