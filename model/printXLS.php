<?php

function cleanData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// filename for download
$filename = "open_day_" . date('Y.m.d') . ".xls";

//header("Content-Disposition: attachment; filename=\"$filename\"");
//header("Content-Type: application/vnd.ms-excel; charset=UTF-8");

header("Content-Type: text/plain");




$result = Fuehrung::findeAlleFuehrungenXLS();


if ($result) {
    $title = $result[0]->toArray();
    echo implode("\t", array_keys($title)) . "\n";

    foreach ($result as $fuehrung) {

        $fuehrung = cleanUmlaute($fuehrung->toArray(true));
        echo implode("\t", $fuehrung) . "\n";
    }
}

function cleanUmlaute(array $array)
{
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue");
        return str_replace($search, $replace, $array);

    $return = [];

    foreach ($array as $string) {
        $return[] = str_replace($search, $replace, $string);
    }

    return $return;
}

exit;
