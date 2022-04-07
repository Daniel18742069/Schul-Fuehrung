<?php

function ersetze_platzhalter(string $string, array $pattern_replacement)
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

function mindestens_1_tag_entfernt($date1, $date2)
{
    return strtotime('+1 day', $date1) < strtotime($date2);
}
