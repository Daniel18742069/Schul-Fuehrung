<?php

function ersetze_platzhalter(string $string, array $pattern_replacement)
{
    foreach ($pattern_replacement as $p_r) {
        $pattern = '/&>' . $p_r[0] . '/';
        $replacement = $p_r[1];

        $string = preg_replace($pattern, $replacement, $string);
    }

    return $string;
}

function stringsVergleichen($string1, $string2)
{
    if ($string1 === $string2) {
        return true;
    } else {
        return false;
    }
}

function logge_ein($benutzername)
{
    $_SESSION['eingeloggt'] = $benutzername;
    $_SESSION['id'] = "true";
}
function erstelle_Fuehrungen($fuehrungsDaten){
    //fach_anzahl
    var_dump($fuehrungsDaten);
    echo "<br>";
    echo $fuehrungsDaten['offenerTag']."<br>"; //offenerTagID
    foreach ($fuehrungsDaten as $key => $daten) { 
        //echo $key ."=> ". $value ."<br/>";
        
        if(substr($key,0,17) == "fuehrungspersonen"){
            $stringArray = explode('_',substr($key,17));
            $fach = $stringArray[0];
            $anzahl = $stringArray[1] +1;
            for ($i=0; $i < $anzahl; $i++) {
                
                

                echo$fach . "_" . $anzahl."<br>";
        }
        


    }
    /*
    Die Ausgabe ist:
    
    Gütersloh =>98000
    Bielefeld =>326715
*/
}

function arrayManipulieren($assotiativesArrayPost){

$array = [];
for ($i=0; $i < count($assotiativesArrayPost)-1; $i++) {
    $variable = $i + 1;
    if(array_key_exists('fachID'.$variable, $assotiativesArrayPost) && 
    array_key_exists('anzahl'.$i, $assotiativesArrayPost)
    ) {
        $variable2 = $assotiativesArrayPost['fachID'.$variable] +1;
        array_push($array,$variable2.
         "_". $assotiativesArrayPost['anzahl'.$i]);
        
}
}
return $array;
}

