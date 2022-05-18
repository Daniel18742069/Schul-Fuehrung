
    <?php 
    require_once '../config/config.ini.php';
    require_once 'db.php';
    require_once 'entities/entity.php';
    require_once 'entities/offener_tag.php';
    require_once 'entities/anmeldung.php';


    $anmeldung = Anmeldung::findeAnmeldung($token);
    $anmeldung->loesche();
    

    

?>
<script>
location.reload();
console.log("asda");
</script>
