<?php

/**
 * Syntax: &>PLATZHALTER; zB. &>name
 * 
 * @author Andreas Codalonga
 * 
 * @param string $string String mit Platzhaltern.
 * @param array $pattern_replacement Ein 2D Array, dass den Platzhalterbegriff (zB. "name") und den String (zB. "John Doe") der eingefügt werden soll.
 */
function ersetze_platzhalter(string $string, array $pattern_replacement): string
{
    foreach ($pattern_replacement as $p_r) {
        $pattern = '/&>' . $p_r[0] . '/';
        $replacement = $p_r[1];

        $string = preg_replace($pattern, $replacement, $string);
    }

    return $string;
}

function stringsVergleichen($string1, $string2)
{
    return $string1 === $string2;
}

function logge_ein($benutzername)
{
    $_SESSION['eingeloggt'] = $benutzername;
    $_SESSION['id'] = "true";
}

/**
 * @author Andreas Codalonga
 */
function datum_formatieren($datum, $format = 'Y-m-d'): string
{
    $DateTime = new DateTime($datum);
    return $DateTime->format($format);
}

/**
 * @author Andreas Codalonga
 */
function mindestens_1_tag_entfernt($date1, $date2): bool
{
    return strtotime('+1 day', strtotime($date1)) < strtotime($date2);
}
