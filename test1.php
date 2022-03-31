<?php 
require_once 'model/entities/db.php';
require_once 'model/entities/entity.php';
require_once 'model/entities/anmeldung.php';
require_once 'model/entities/fachrichtung.php';
require_once 'model/entities/fuehrung.php';
require_once 'model/entities/offener_tag.php';

require_once 'controller/controller.php';
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./view/style/styles.css">
        <title>genauere detauls</title>
    </head>

    <?php   var_dump(Offener_tag::findeNeuestenOffenenTag());
            $fachrichtungen = Fachrichtung::findeAlleFachrichtungen();
     ?>

    <body>
        
            <p>Welche Fachrichtungen sollen angeboten werden?</p>
            <form action="asdas.php" method="post" >
            <?php foreach ($fachrichtungen as $key => $value) { ?>
                <p id="beschreibung<?=$key?>" style="display: none;"><?=$value->getBeschreibung()?></p>
                <div id="form<?=$key?>" style="display: none;">
                </div>
                
            
                <?php } ?>
                <input type="submit" value="Erstellen" />
            </form>
        <div>
                <?php foreach ($fachrichtungen as $key => $value) { ?>
                <div >
                    <label for="<?=$key?>"> <input type="checkbox" name="color" value="<?=$key?>" id="<?=$key?>"><?=$value->getBeschreibung()?></label>
                </div>
                <?php } ?>
            
            <p>
                <button id="btn">akzeptieren</button>
            </p>
        </div>

    <script>
        
        const btn = document.querySelector('#btn');
        btn.addEventListener('click', (event) => {
            let checkboxes = document.querySelectorAll('input[name="color"]:checked');
            let values = [];
            checkboxes.forEach((checkbox) => {
                values.push(checkbox.value);
            });
            if(values == ""){
                alert("nix");
            }
            else{
                alert(values);
                erstelleFormular(values);
            }
            
        });


        function erstelleFormular(values){
            document.getElementById("unsichtbar").style.display="none";
            for (let index = 0; index < values.length; index++) {
            document.getElementById("beschreibung"+values[index]).style.display="block";
            document.getElementById("form"+values[index]).style.display="block";
            document.getElementById("form"+values[index]).innerHTML ="<p>1 oder 2: <input type=\"number\" name=\"intervall" + values[index]
                + "\" id=\"intervall" + values[index]
                + "\" required/></p><p>Name des Lehrers: <input type=\"text\" name=\"text" + values[index]
                + "\" id=\"text" + values[index] + "\" required/></p>";
                
            };
            console.log('Hallo');
            


        }
    </script>
    
</body>
</html>