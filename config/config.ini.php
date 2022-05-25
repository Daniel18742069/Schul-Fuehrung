<?php

$ini = '
	[Standard Seite]
	DEFAULT_SITE=fe_startseite

	[URL zur Webseite]
	URL=localhost:3306/schul-fuehrung/

	[Database Einstellungen]
	DB_USER=tschaufe_openday
	DB_PASS=NilsStinkt132

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
