<!DOCTYPE html>
<html>

<head>
<base href="<?= CONF['BASE'] ?>" />
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?= CONF['BACKSLASH'] ?>view/CSS/style.css" />
    <title>Neuer Open Day</title>

</head>

<body>

    <?php require 'view/snippets/header.sp.php'; ?>

    <section id="wrapper">
        <div class="wrapper-fuehrung_hinzufuegen">

            <h2>Neuer Open Day</h2>
            <form action="AlleOpenDay" method="post">


                <div class="neuer-od-formular">
                    <span>
                        <p>Bezeichnung:</p>
                    </span>
                    <span><input type="text" name="bezeichnung" id="bezeichnung" required class="felder-neuer-od feld-neuer-od-bez" /></span>
                </div>


                <div class="neuer-od-formular">

                    <span>
                        <p>Datum:</p><input type="date" name="datum" id="datum" required class="felder-neuer-od" />
                    </span>

                    <span>
                        <p>Intervall:</p><input type="number" name="intervall" id="intervall" min="10" placeholder="Minuten" required class="felder-neuer-od" />
                    </span>

                    <span>
                        <p>Startuhrzeit:</p><input type="time" name="start" id="start" required class="felder-neuer-od" />
                    </span>

                    <span>
                        <p>Enduhrzeit:</p><input type="time" name="ende" id="ende" required class="felder-neuer-od" />
                    </span>

                </div>

                <input type="submit" value="Erstellen" class="neuer-od-erstellen">
                <a href="AlleOpenDay">
                    <input type="button" id="btn-zurueck" value="Zurück" />
                </a>

            </form>

        </div>
    </section>

    <?php require 'view/snippets/footer.sp.php'; ?>

</body>

</html>