<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Verwaltung</title>
    <link rel="stylesheet" type="text/css" href="view/be_CSS/login.css" />

</head>

<body>


    <main>


        <h1>Anmeldung</h1>


        <form action="index.php?aktion=adminAnmeldung" method="post">


            <input type="text" name="benutzername" placeholder="Benutzername" class="benutzername" required /><br />
            <input type="password" name="passwort" placeholder="Passwort" class="passwort" required /><br />

            <input type="submit" name="anmelden" value="Anmelden" />


        </form>


    </main>



</body>

</html>