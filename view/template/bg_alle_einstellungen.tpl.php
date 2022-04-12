<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Verwaltung</title>
    <link rel="stylesheet" type="text/css" href="bg_CSS/login.css" />

</head>

<body>


    <main>
        <?php  if(empty($_POST)){ ?>
        <h1>Wähle Fächer aus</h1>
        <form action="index.php?aktion=bg_alle_einstellungen&id=<?=$_GET['id']?>" method="post">
            

            <?php  foreach ($bg_alle_einstellungen as $key => $einstellung) { ?>

            <div>
                <input type="checkbox" name="<?=$einstellung['id']?>" value="<?=$einstellung['id']?>">
                <label for="c<?=$einstellung['id']?>"><?=$einstellung['beschreibung']?></label>
            </div>

            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden" />

        </form>
        <?php
            }else{ ?>
        <form action="index.php?aktion=be_alle_od" method="post">
            <?php  foreach ($_POST as $key => $test) {
                    if ($key == 'anmelden') {continue;}
                    ?>

            <p><?=Fachrichtung::getFachrichtungBeiID($_POST[$key]); ?>
                <input type="text" name="fuehrungspersonen" placeholder="fuehrungspersonen" class="fuehrungspersonen"
                    required /><br />
                <input type="radio" id="contact<?=$key?>" name="<?=$key?>" value="1" checked>
                <label for="contact<?=$key?>">1</label>

                <input type="radio" id="contact<?=$key?>" name="<?=$key?>" value="2">
                <label for="contact<?=$key?>">2</label>

                <input type="radio" id="contact<?=$key?>" name="<?=$key?>" value="3">
                <label for="contact<?=$key?>">3</label>
            </p>



            <?php } ?>

            <input type="submit" name="anmelden" value="Anmelden" />

        </form>

        <?php } ?>
    </main>



</body>

</html>