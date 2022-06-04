<?php

$ini = '
	[Anmelden]
	ce6=Ihre Anmeldung war Erfolgreich
	b8d=Manche der eingegebenen Daten sind nicht Valide
	c8f=Manche der Eingaben sind leer
	
	[Abmelden]
	2c4=Ihre Abmeldung war Erfolgreich
	8c5=Anmeldung kann nicht geändert werden, wenn der Offene Tag weniger als einen Tag entfernt ist
	2b0=Die zugehörige Führung wurde nicht gefunden
	fa3=Ihre Anmeldung wurde nicht gefunden
	
	[Aendern]
	57d=Ihre Änderung war Erfolgreich
	9b8=Ihre Eingabe überschreitet die maximale Teilnehmeranzahl
	734=Ihre Eingabe der Anzahl der Teilnehmer ist Leer
	a95=Anmeldung kann nicht geändert werden, wenn der Offene Tag weniger als einen Tag entfernt ist
	3b9=Die zugehörige Führung wurde nicht gefunden
	54e=Ihre Anmeldung wurde nicht gefunden

	[Backend]
	6g9=OPEN DAY wurde erfolgreich erstellt
	8b7=Open Day wurde nicht erstellt. Überprüfen Sie die Start- und Endzeit
	7x1=Fach wurde erfolgreich hinzugefügt
	9b0=Führung erfolgreich hinzugefügt
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