<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Schulführung</title>
</head>

<body>

	<h1>Abmelden</h1>
	<p>Ändern</p>
	<p>Termin: <?= $datum ?></p>

	<a href="<?= URL ?>?aktion=abmelden&token=<?= $token ?>">Abmelden</a>
	<a href="<?= URL ?>?aktion=bearbeiten&token=<?= $token ?>">Bearbeiten</a>

</body>

</html>