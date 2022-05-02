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

//header("Content-Type: text/plain");


$result = Anmeldung::findeAlleAnmeldungen_limitierteColumns([
    'datum',
    'vorname',
    'nachname',
    'anzahl',
    'email',
    'telefon'
]);

$result2 = Fachrichtung::findeAlleFachrichtungen_limitierteColumns([
    'beschreibung'
], 1);

$result3 = Fuehrung::findeAlleFuehrungen_limitierteColumns([
    'fuehrungspersonen',
    'kapazitaet',
    'uhrzeit'
]);



if ($result) {

?>

    <style>
        table,
        th,
        td {
            border: .5px solid black;
        }

        table td:first-child::first-letter {
            text-transform: uppercase;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($result))); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) : array_map('htmlentities', $row); ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php

}
if ($result2) {
?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($result2))); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result2 as $row) : array_map('htmlentities', $row); ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php
}
if ($result3) {
?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($result3))); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result3 as $row) : array_map('htmlentities', $row); ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php
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
