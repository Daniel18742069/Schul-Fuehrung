<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Verwaltung</title>
    <link rel="stylesheet" type="text/css" href="bg_CSS/login.css" />

</head>

<body>


    <main>

        <?php var_dump($_POST);
     ?>

        <?php  if(empty($_POST)){ ?>
        <h1>Wähle Fächer aus</h1>
        <form action="index.php?aktion=bg_alle_einstellungen" method="post">


            <?php  foreach ($bg_alle_einstellungen as $key => $einstellung) { ?>

            <div>
                <input type="checkbox" name="i<?=$einstellung['id']?>" value="c<?=$einstellung['id']?>">
                <label for="c<?=$einstellung['id']?>"><?=$einstellung['beschreibung']?></label>
            </div>

            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden" />

        </form>
        <?php
            }else{ ?>
        <form action="index.php?aktion=bg_alle_einstellungen?>" method="post">
            <?php  foreach ($_POST as $key => $test) { 
                    if ($key == 'anmelden') {continue;}?>
            <p><?= //Fachrichtung::getFachrichtungBeiID(substr($test[''])); ?>
                <input type="text" name="fuehrungspersonen" placeholder="fuehrungspersonen" class="fuehrungspersonen"
                    required /><br />
                <input type="radio" id="contactChoice1" name="contact<?=$key?>" value="email" checked>
                <label for="contactChoice1">1</label>

                <input type="radio" id="contactChoice2" name="contact<?=$key?>" value="phone">
                <label for="contactChoice2">2</label>

                <input type="radio" id="contactChoice3" name="contact<?=$key?>" value="mail">
                <label for="contactChoice3">3</label>
            </p>



            <?php } ?>



            <?php } ?>
    </main>



</body>

</html>