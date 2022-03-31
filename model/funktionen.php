<?php

    function stringsVergleichen($string1, $string2){
        if($string1 === $string2){
            return true;
        }else{
            return false;
        }
    }

    function logge_ein($benutzername) {
        $_SESSION['eingeloggt'] = $benutzername;
        $_SESSION['id'] = "true";
    }

?>