<?php

/**
 * Syntax: &>PLATZHALTER; zB. &>name
 * 
 * @author Andreas Codalonga
 * 
 * @param string $string String mit Platzhaltern.
 * @param array $pattern_replacement Ein 2D Array, dass den Platzhalterbegriff (zB. "name") und den String (zB. "John Doe") der eingefügt werden soll.
 */
function ersetze_platzhalter(string $string, array $pattern_replacement): string
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
    return $string1 === $string2;
}

function logge_ein($benutzername)
{
    $_SESSION['eingeloggt'] = $benutzername;
    $_SESSION['aktiv'] = "true";
}

function erstelle_Fuehrungen($fuehrungsDaten){
    $offener_tag = Offener_tag::findeOffenenTag($fuehrungsDaten['offenerTag']);
    $tempKapazitaet=0;
    // var_dump($offener_tag);
    //fach_anzahl
    $startzeit = strtotime($offener_tag->getStartWelformed());
    $endzeit = strtotime($offener_tag->getEndeWelformed());
 
//Subtrahiere die Endzeit von der Startzeit und Teile durch 60 um den Wert in Minuten zu bekommen
$wieVielePerioden = intdiv((($endzeit - $startzeit)/60),$offener_tag->getIntervall());  //intdiv keine Kommastellen

    $kapazitaetArray = [];
    $counter = 0;
    foreach ($fuehrungsDaten as $key => $daten){
        if(substr($key,0,10) == "kapazitaet"){
            array_push($kapazitaetArray,$daten);
        }
    }
    
    foreach ($fuehrungsDaten as $key => $daten) { //fach_anzahl
        
        $heute = new DateTime($offener_tag->getStartWelformed());

        
        if(substr($key,0,17) == "fuehrungspersonen"){
            $stringArray = explode('_',substr($key,17));
            $fach = $stringArray[0];
            $anzahl = $stringArray[1]+1;
            for ($i=0; $i < $wieVielePerioden; $i++) {

                      $fuehrung = new Fuehrung();
                      $fuehrung->setFuehrungspersonen($daten);
                      $fuehrung->setSichtbar(0);
                      $fuehrung->setKapazitaet($kapazitaetArray[$counter]);
                      $fuehrung->setFachrichtung_id($fach);
                      $fuehrung->setOffener_tag_id($offener_tag->getId());
                      $fuehrung->setUhrzeit(date_format($heute, 'H:i'));
                      $fuehrung->setGemeinsame_id($fach."_".$anzahl);
                      $fuehrung->speichere();
                      
                      

                $minutes_to_add = $offener_tag->getIntervall();
                $heute->add(new DateInterval('PT' . $minutes_to_add . 'M'));
 
            }
            $counter++;
            echo $fach . "_" . $anzahl." fuehrungsperson: " . $daten ."<br>";
    }
}
}

function arrayManipulieren($assotiativesArrayPost)
{

    $array = [];
    for ($i = 0; $i < count($assotiativesArrayPost); $i++) {
        $variable = $i + 1;
        for ($z=$i+1; $z < 25; $z++) { 
            if (
                array_key_exists('f' . $variable, $assotiativesArrayPost) &&
                array_key_exists('a' . $z, $assotiativesArrayPost)
            ) {
                $z = 25;
                $variable2 = $assotiativesArrayPost['f' . $variable] + 1;
                array_push($array, $variable2 .
                    "_" . $assotiativesArrayPost['a' . $i]);
            }
        }
        
    }
    return $array;
}
function fuehrungenSortieren($unsortiertesArray){

    
    $alleGemeinsammeIds = "funktion";
    foreach ($unsortiertesArray as $key => $value) {


        for ($i=0; $i < sizeof($alleGemeinsammeIds); $i++) {
            if($value->setGemeinsame_id() == $alleGemeinsammeIds[$i]);
        
        }
    }
    




        //var_dump($unsortiertesArray);
            return $unsortiertesArray;
}

function ist_eingeloggt() {
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}

function logge_aus() {
    unset($_SESSION['eingeloggt']);
    unset($_SESSION['id']);
}


/**
 * @author Andreas Codalonga
 */
function datum_formatieren($datum, $format = 'Y-m-d'): string
{
    $DateTime = new DateTime($datum);
    return $DateTime->format($format);
}

/**
 * @author Andreas Codalonga
 */
function mindestens_1_tag_entfernt($date1, $date2): bool
{
    return strtotime('+1 day', strtotime($date1)) < strtotime($date2);
}
