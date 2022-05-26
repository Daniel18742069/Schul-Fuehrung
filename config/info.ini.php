<?php

$ini = '
	[Anmelden]
	ce6=Ihre Anmeldung war Erfolgreich
	b8d=Manche der eingegebenen Daten sind nicht Valide
	c8f=Manche der eingaben sind Leer
	
	[Abmelden]
	2c4=Ihre Abmeldung war Erfolgreich
	8c5=Anmeldung kann nicht geändert werden, wenn der Offene Tag weniger als einen Tag entfernt ist
	2b0=Die zugehörige Führung wurde nicht gefunden
	fa3=Ihre Anmeldung wurde nicht gefunden
	
	[Aendern]
	57d=Ihre Änderung war Erfolgreich
	9b8=Ihre eingabe überschreitet die maximale Teilnehmeranzahl
	734=Ihre eingabe der anzahl der Teilnehmer ist Leer
	a95=Anmeldung kann nicht geändert werden, wenn der Offene Tag weniger als einen Tag entfernt ist
	3b9=Die zugehörige Führung wurde nicht gefunden
	54e=Ihre Anmeldung wurde nicht gefunden
';

$data = parse_ini_string($ini);
define('INFO', $data);

unset($ini);
unset($data);

function get_info(string $code)
{
	return (isset(INFO[$code]))
		? INFO[$code]
		: false;
}
