<?php

function umlauteEntfernen()
{
    $inputString = "Á,Â,Ã,Ä,Å,Æ,Ç,È,É,Ê,Ë,Ì,Í,Î,Ï,Ð,Ñ,Ò,Ó,Ô,Õ,Ö,Ù,Ú,Û,Ü,Ý,Þ,ß,à,á,â,ã,ä,å,æ,ç,è,é,ê,ë,ì,í,î,ï,ð,ñ,ò,ó,ô,õ,ö,ù,ú,û,ü,ý,þ,ÿ";
}

function cleanData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// filename for download
$filename = "open_day_" . date('Ymd') . ".xls";

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");

//header("Content-Type: text/plain");




$result = Fuehrung::findeAlleFuehrungen();
if ($result) {
    $first = $result[0]->toArray();
    echo implode("\t", array_keys($first)) . "\n";

    foreach ($result as $fuehrung) {

        $fuehrung = cleanUmlauts($fuehrung->toArray(true));
        echo implode("\t", $fuehrung) . "\n";
    }
}

function cleanUmlauts(array $array)
{
    $extraCharsToRemove = "\"";
    $return = [];

    foreach ($array as $string) {
        $return[] = str_replace($extraCharsToRemove, "", iconv("utf-8", "ASCII//TRANSLIT", $string));
    }

    return $return;
}

exit;
