<!DOCTYPE html>
<html lang="en">

<head>
    <title>OPEN DAY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="model/JS/script.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="view/be_CSS/style_xls.css">
    <link rel="stylesheet" href="view/fe_CSS/style_startseite.css">
    <link rel="stylesheet" href="view/fe_CSS/style_header.css">
    <link rel="stylesheet" href="view/fe_CSS/style_footer.css">

</head>

<body>


    <?php require 'view/snippets/fe_xheader.sp.php'; ?>

    <?php require_once('model/printXLS.php'); ?>

    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>

</body>

</html>