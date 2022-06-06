<!DOCTYPE html>
<html>

<head>
    <base href="openday.tschaufer.it/" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>
    <link rel="stylesheet" href="/view/fe_CSS/style_startseite.css" />
    <link rel="stylesheet" href="/view/fe_CSS/style_header.css" />
    <link rel="stylesheet" href="/view/fe_CSS/style_footer.css" />
    <link rel="stylesheet" href="/view/fe_CSS/style_subfooter.css" />
    <script type="text/javascript" src="/model/JS/script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="model/captcha/src/disk/slidercaptcha.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png" />

    <link rel="mask-icon" type="image/x-icon" href="/img/favicon.png" color="#111" />
</head>

<body>


    <?php require 'view/snippets/fe_xheader.sp.php'; ?>




    <div class="wrapper-subfooter">

        <div class="container-fluid">
            <div class="form-row">
                <div class="col-12">
                    <div class="slidercaptcha card">
                        <div class="card-header">
                            <span>Complete the security check</span>
                        </div>
                        <div class="card-body">
                            <div id="captcha"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="model/captcha/src/disk/longbow.slidercaptcha.min.js"></script>
        <script>
            var captcha = sliderCaptcha({
                id: 'captcha',
                repeatIcon: 'fa fa-redo',
                onSuccess: function() {
                    window.location = "http://www.google.de/";
                    var handler = setTimeout(function() {
                        window.clearTimeout(handler);
                        captcha.reset();
                    }, 500);
                }
            });
        </script>

    </div>




    <?php require 'view/snippets/fe_xfooter.sp.php'; ?>


</body>

</html>