<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Verwaltung</title>
    <link rel="stylesheet" type="text/css" href="bg_CSS/login.css" />

</head>

<body>


    <?php //require 'view/snippets/fe_xheader.sp.php'; ?>

    <main>
        <?php  if(empty($_POST)){ ?>
        <h1>Wähle Fächer aus</h1>
        <form action="index.php?aktion=bg_alle_einstellungen&id=<?=$_GET['id']?>" method="post">


            <?php  foreach ($bg_alle_einstellungen as $key => $einstellung) { ?>

            <input type="checkbox" name="fachID<?=$einstellung->getId()?>" value="<?=$key?>" />
            <label for="c<?=$einstellung->getId()?>"><?=$einstellung->getBeschreibung()?></label>

            <input type="radio" id="contact<?=$key?>" name="anzahl<?=$key?>" value="1" checked>
            <label for="contact<?=$key?>">1</label>

            <input type="radio" id="contact<?=$key?>" name="anzahl<?=$key?>" value="2">
            <label for="contact<?=$key?>">2</label>

            <input type="radio" id="contact<?=$key?>" name="anzahl<?=$key?>" value="3">
            <label for="contact<?=$key?>">3</label>


            <br>

            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden" />

        </form>
        <?php
            }else{ 
                $array = arrayManipulieren($_POST);
                var_dump($array);
                
                ?>
        <form action="index.php?aktion=be_alle_od" method="post">

            <?php for ($i=0; $i < count($array); $i++) { 
                $stringArray = explode('_',$array[$i]);
                $fach = $stringArray[0];
                $anzahl = $stringArray[1];

                echo Fachrichtung::getFachrichtungBeiID($fach)."<br>";
                for ($j=0; $j < $anzahl; $j++) {  //fach_anzahl  ?>
            <input type="text" name="fuehrungspersonen<?php echo $fach."_".$j ?>" placeholder="fuehrungspersonen"
                class="fuehrungspersonen" required /><br />
            <?php
                }

            }
                
                ?>




            <input type="text" name="offenerTag" value="<?=$_GET['id']?>" hidden/>
            <input type="submit" name="anmeldebn" value="Anmelden" />

        </form>

        <?php } ?>
    </main>



</body>

</html>