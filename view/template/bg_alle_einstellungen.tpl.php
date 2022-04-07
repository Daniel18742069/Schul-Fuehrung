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

            <?php  foreach ($bg_alle_einstellungen as $key => $einstellung) { ?>
                
                <div>
                <input type="checkbox" name="i<?=$einstellung['id']?>" value="c<?=$einstellung['id']?>">
                <label for="c<?=$einstellung['id']?>"><?=$einstellung['beschreibung']?></label>
                </div>

            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden"/>


            </form>



        </main>



    </body>

</html>