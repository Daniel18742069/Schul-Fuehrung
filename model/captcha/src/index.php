<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Slider Captcha Demo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="disk/slidercaptcha.min.css" rel="stylesheet" />
    
</head>

<body>
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
    <script src="disk/longbow.slidercaptcha.min.js"></script>
    <script>
        var captcha = sliderCaptcha({
            id: 'captcha',
            repeatIcon: 'fa fa-redo',
            onSuccess: function () {
                window.location = "http://www.google.de/";
                var handler = setTimeout(function () {
                    window.clearTimeout(handler);
                    captcha.reset();
                }, 500);
            }
        });</script>
</body>

</html>
