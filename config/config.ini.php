<?php

$ini = '
	[Standard Seite]
	DEFAULT_SITE=fe_termin

	[URL zur Webseite]
	URL=127.0.0.1/Schul-Fuehrung/

	[Database Einstellungen]
	DB_HOST=91.200.103.154:3306
	DB_NAME=tschaufe_openday
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

$data = parse_ini_string($ini);
define('CONF', $data);

unset($ini);
unset($data);
