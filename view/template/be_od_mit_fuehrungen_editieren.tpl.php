<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle OpenDays</title>
    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="view/be_CSS/style_alle_od.css" />
    <script type="text/javascript" src="model/JS/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>

    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <?php 
    /*
private $id = 0;
    private $fuehrungspersonen = "";
    private $sichtbar = 0;
    private $kapazitaet = 0;
    private $uhrzeit = "";
    private $fachrichtung_id = 0;
    private $offener_tag_id  = 0;
    private $gemeinsame_id  = "";
    */
    $gemID = 0;
    foreach ($fuehrungen as $key => $fuehrung) {

        $anzahlTeilnehmer =  Anmeldung::anzahlTeilnehmer($fuehrung->getId());
            if($anzahlTeilnehmer == NULL){  //anzahl Formatieren
             $anzahlTeilnehmer = 0;
            }
            if($gemID == 0){
                $gemID = $fuehrung->getGemeinsame_id();
            }else if($gemID !== $fuehrung->getGemeinsame_id()){
                    echo "<br>";
                    $gemID = $fuehrung->getGemeinsame_id();
            }
        ?>
        <form action="index.php?aktion=be_od_mit_fuehrungen_editieren&id=<?=$offenerTag->getID() ?>" method="post">
        <!--input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"-->
        <?php echo $fuehrung->getUhrzeit() ." ";  ?>
        <input type="text" name="fuehrungspersonen" class="fuehrungspersonen" value="<?=$fuehrung->getFuehrungspersonen()?>" required />
        <input type="number" name="f_id" value="<?=$fuehrung->getID() ?>" hidden="hidden" /> <!-- secreat -->
        <?php 
        
        echo $anzahlTeilnehmer. " / ". $fuehrung->getKapazitaet() ."<br>";
        $anmeldungen = Anmeldung::findeAlleAnmeldungen_von_fuehrung($fuehrung->getId());
        var_dump($anmeldungen);
        //echo $fuehrung->getGemeinsame_id();
        ?>
        <input type="submit" name="anmelden" value="Anmelden" />
        </form>

        <?php 
    }
    
    //var_dump($fuehrungen);?>


    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>