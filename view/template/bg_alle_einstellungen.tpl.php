<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Verwaltung</title>
        <link rel="stylesheet" type="text/css" href="bg_CSS/login.css" />

    </head>

    <body>


        <main>


            <h1>Einstellungen</h1>
            <form action="index.php?aktion=bg_alle_einstellungen&id=<?=$_GET['id']?>" method="post"> 
            
        <?php $alleFachrichtungen = Fachrichtung::findeAlleFachrichtungen();    ?>

            <?php foreach ($alleFachrichtungen as $fachrichtung) { ?>
                <input type="checkbox" name="<?=$fachrichtung->getId()?>" value="<?=$fachrichtung->getId()?>" id="<?=$fachrichtung->getId()?>">
	            <label for="<?=$fachrichtung->getId()?>"><?=$fachrichtung->getBeschreibung()?></label>              
                
            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden"/>


            </form>



        </main>



    </body>

</html>