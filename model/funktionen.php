<?php

function logge_ein($benutzername)
{
	$_SESSION['eingeloggt'] = $benutzername;
	$_SESSION['id'] = "true";
}

function ersetze_platzhalter(string $string, array $pattern_replacement)
{
	foreach ($pattern_replacement as $p_r) {
		$pattern = '/&>' . $p_r[0] . '/';
		$replacement = $p_r[1];

		$string = preg_replace($pattern, $replacement, $string);
	}

	return $string;
}
