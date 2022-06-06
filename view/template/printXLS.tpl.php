<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= CONF['DB_HOST'] ?>" />
    <title>OPEN DAY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/model/JS/script.js"></script>
    <link rel="stylesheet" href="view/be_CSS/style_xls.css">
    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css">
    <link rel="stylesheet" href="view/fe_CSS/style_header.css">
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png" />
    <script src="plugin/js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="plugin/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugin/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="plugin/js/buttons.print.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="plugin/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="plugin/css/buttons.dataTables.min.css">

    <link rel="mask-icon" type="image/x-icon" href="/img/favicon.png" color="#111" />

</head>

<body>


    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <?php require_once('model/printXLS.php'); ?>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>