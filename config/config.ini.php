<?php

$ini = '
	[URL zur Webseite]
	URL=127.0.0.1/schul-fuehrung/

	[Database Einstellungen]
	DB_USER=root
	DB_PASS=

	[Mail Einstellungen]
	MAIL_NAME=LBSHI Bozen NoReply
	MAIL_ADDRESS=berufsschulebozen.anmeldung@gmail.com
	MAIL_PASSWORD=Lbshi-12345

	[Admin Einstellungen]
	ADMIN_BN=PLATZHALTER
	ADMIN_PW=PLATZHALTER
';

$config = parse_ini_string($ini);
define('CONF', $config);
