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

function erstelle_Fuehrungen($fuehrungsDaten)
{
    $offener_tag = Offener_tag::findeOffenenTag($fuehrungsDaten['offenerTag']);
    //fach_anzahl
    $startzeit = strtotime($offener_tag->getStartWelformed());
    $endzeit = strtotime($offener_tag->getEndeWelformed());
    //Subtrahiere die Endzeit von der Startzeit und Teile durch 60 um den Wert in Minuten zu bekommen
    $wieVielePerioden = intdiv((($endzeit - $startzeit) / 60), $offener_tag->getIntervall()); //intdiv keine Kommastellen
    $kapazitaetArray = [];

    $counter = 0;

    foreach ($fuehrungsDaten as $key => $daten) {
        if (substr($key, 0, 10) == "kapazitaet") {
            array_push($kapazitaetArray, $daten);
        }
    }

    foreach ($fuehrungsDaten as $key => $daten) { //fach_anzahl
        $heute = new DateTime($offener_tag->getStartWelformed());

        if (substr($key, 0, 17) == "fuehrungspersonen") {
            $stringArray = explode('_', substr($key, 17));
            $fach = $stringArray[0];
            $anzahl = $stringArray[1] + 1;

            for ($i = 0; $i < $wieVielePerioden; $i++) {
                $fuehrung = new Fuehrung();
                $fuehrung->setFuehrungspersonen($daten);
                $fuehrung->setSichtbar(1);
                $fuehrung->setKapazitaet($kapazitaetArray[$counter]);
                $fuehrung->setFachrichtung_id($fach);
                $fuehrung->setOffener_tag_id($offener_tag->getId());
                $fuehrung->setUhrzeit(date_format($heute, 'H:i'));
                $fuehrung->setGemeinsame_id($fach . "_" . $anzahl);
                $fuehrung->speichere();

                $minutes_to_add = $offener_tag->getIntervall();
                $heute->add(new DateInterval('PT' . $minutes_to_add . 'M'));
            }

            $counter++;
//            echo $fach . "_" . $anzahl . " fuehrungsperson: " . $daten . "<br>";
        }
    }

}
function arrayManipulieren($assotiativesArrayPost)
{
    $array = [];

    for ($i = 0; $i < Fachrichtung::groeßteID()['id'] + 1; $i++) { //fach_menge
        if (
            array_key_exists('checkbox' . $i, $assotiativesArrayPost) &&
            array_key_exists('number' . $i, $assotiativesArrayPost)
        ) {
            $fach = $assotiativesArrayPost['checkbox' . $i];
            array_push($array, $fach .
                "_" . $assotiativesArrayPost['number' . $i]);
        }
    }

    return $array;
}
function isUpdate($request)
{
    for ($i = 0; $i < Fuehrung::countFuehrungFuerOD()->getId() + 1; $i++) {
        
        if (
            array_key_exists($i, $request)  && array_key_exists('fuehrungspersonen' . $i, $request)
        ) {
            $fuehrung = Fuehrung::findeFuehrung($request[$i]);

            if (array_key_exists("checkbox" . $i, $request) && $fuehrung->getSichtbar() == 0) {
                $fuehrung->setSichtbar(1);
            } elseif (!array_key_exists("checkbox" . $i, $request) && $fuehrung->getSichtbar() == 1) {
                $fuehrung->setSichtbar(0);
            }

            if ($fuehrung->getFuehrungspersonen() !== $request['fuehrungspersonen' . $i]) {
                $fuehrung->setFuehrungspersonen($request['fuehrungspersonen' . $i]);
            }
            $fuehrung->speichere();
        }
    }
}

function ist_eingeloggt()
{
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}

function logge_aus()
{
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

function addiere_minuten(int $timestamp, int $minutes = 30)
{
    return $timestamp + (60 * $minutes);
}

/**
 * @author Andreas Codalonga
 */
function mindestens_1_tag_entfernt($date1, $date2): bool
{
    return strtotime('+1 day', strtotime($date1)) < strtotime($date2);
}
