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
        <div id="unsichtbar">
            <?php foreach ($fachrichtungen as $key => $value) {
                ?>
                <div id="form<?=$key?>">
            </div>
                <div >
                <label for="<?=$key?>"> <input type="checkbox" name="color" value="<?=$key?>" id="<?=$key?>"><?=$value->getBeschreibung()?></label>
            </div>
            
            <?php
            }
            ?>
        
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
                document.getElementById("form"+values[index]).innerHTML = values[index];
                
            };
            console.log('Hallo');
            


        }
    </script>
    
</body>
</html>