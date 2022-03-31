<?php

    function stringsVergleichen($string1, $string2){
        if($eingabePW === $benutztesPW){
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