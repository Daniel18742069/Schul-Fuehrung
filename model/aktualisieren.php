
    <?php 
    require_once '../config/config.ini.php';
    require_once 'db.php';
    require_once 'entities/entity.php';
    require_once 'entities/offener_tag.php';
    

    $offenerTag = Offener_tag::findeOffenenTag($_POST['offenerTag']);
    $offenerTag->aendereStatus();
    $offenerTag->speichere();
?>
