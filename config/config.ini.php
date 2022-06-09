<?php
$DEV_MODE = true;	// Ein-(true) oder Ausschalten(false) der Entwickler Einstellungen.

$ini = '
	[Standard Seite]
	DEFAULT_SITE=fe_termin

	[URL zur Webseite]
	URL=127.0.0.1/
	BASE=https://openday.tschaufer.it/
	BACKSLASH=/
	SCHUL-FUEHRUNG=/Schul-Fuehrung/

	[Database Einstellungen]
	DB_HOST=91.200.103.154:3306
	DB_NAME=tschaufe_openday
	DB_USER=tschaufe_openday
	DB_PASS=NilsStinkt132

	[Mail Einstellungen]
	MAIL_NAME=LBSHI Bozen NoReply
	MAIL_ADDRESS=openday@tschaufer.it
	MAIL_PASSWORD=erverhost.de:8443/phpM

	[Admin Einstellungen]
	ADMIN_BN=AdminBackend
	ADMIN_PW=AdminPasswort123*
';

if ($DEV_MODE) {
	include_once 'config/dev_config.ini.php';
}

$data = parse_ini_string($ini);
define('CONF', $data);

unset($ini);
unset($data);
