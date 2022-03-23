<?php



//$offener_tag  Objekt
    //$fahrichtungen Array
function createFuehrungen($offener_tag, $fahrichtungen, $pause_dauer, $){
    
    $array['offener_tag_id'] = $offener_tag->getId();
    $$array['sichtbar'] = 0;
    $intervallOffenertag = $offener_tag->getIntervall();

    for ($i=0; $i < sizeof($fahrichtungen); $i++) { 

        for ($i=0; $i < ; $i++) {
            if($zweiterRundgang == true){
                //gleiche wie unten, nur doppelt
                $fuehrung2 = new Fuehrung($array);
                $fuehrung2->speichere();

            }

            //private $fuehrungspersonen = "";
           // private $sichtbar = 0;
            //private $kapazitaet = 0;
            //private $uhrzeit = "";
            //private $fachrichtung_id = 0;
            //private $offener_tag_id  = "";
            
            $fuehrung1 = new Fuehrung($inserts);
            $fuehrung1->speichere();
            
        }

    }






}
?>