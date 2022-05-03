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

// header("Content-Type: text/plain");


$alleAnmeldungen = Anmeldung::findeAlleAnmeldungenSortiertDatum();
$alleFachrigungen = Fachrichtung::findeAlleFachrichtungen();
$alleFuehrungen = Fuehrung::findeAlleFuehrungen();

if ($alleAnmeldungen && $alleFachrigungen && $alleFuehrungen) {
?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@100;300;400;700&display=swap');

        table,
        th,
        td {
            border: .5px solid black;
        }

        table td:first-child::first-letter {
            text-transform: uppercase;
        }

        table {
            font-size: 12px;
            color: #333333;
            width: 100%;
            border-width: 1px;
            border-color: #a9a9a9;
            border-collapse: collapse;
        }

        table th {
            font-size: 12px;
            background-color: #b8b8b8;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9a9a9;
            text-align: left;
        }

        table .active {
            background-color: #ffffff;
        }
        
        table  {
            background-color: grey;
        }
        /* zweite tabellen farbe */

        table td {
            font-size: 12px;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9a9a9;
        }
        table tr:hover {
            background-color: #ffff99;
        }
    </style>

    <table class="tftable">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Anzahl</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Beschreibung</th>
                <th>Fuehrungspersonen</th>
                <th>Kapazitaet</th>
            </tr>
        </thead>
        <tbody>
            <?php $letztes_datum = 'datum_formatieren($Anmeldung->getDatum()';
             foreach ($alleAnmeldungen as $Anmeldung) :
               if ($letztes_datum < datum_formatieren($Anmeldung->getDatum())) { ?>
                <script>
                $("table").removeClass("active")
                </script>
                <?php
            }

                $fuehrung_id = $Anmeldung->getFuehrung_id();

                $Fuehrung = $alleFuehrungen[$fuehrung_id];
                $Fachrichung = $alleFachrigungen[$Fuehrung->getFachrichtung_id()];
            ?>
                <tr class="active">
                    <td>
                        <?= datum_formatieren($Anmeldung->getDatum()); ?>
                    </td>
                    <td>
                        <?= datum_formatieren($Fuehrung->getUhrzeit(), 'H:i'); ?> Uhr
                    </td>
                    <td>
                        <?= cleanUmlaute($Anmeldung->getVorname()); ?>
                    </td>
                    <td>
                        <?= cleanUmlaute($Anmeldung->getNachname()); ?>
                    </td>
                    <td>
                        <?= $Anmeldung->getAnzahl(); ?>
                    </td>
                    <td>
                        <?= $Anmeldung->getEmail(); ?>
                    </td>
                    <td>
                        <?= $Anmeldung->getTelefon(); ?>
                    </td>
                    <td>
                        <?= cleanUmlaute($Fachrichung->getBeschreibung()); ?>
                    </td>
                    <td>
                        <?= cleanUmlaute($Fuehrung->getFuehrungspersonen()); ?>
                    </td>
                    <td>
                        <?= $Fuehrung->getKapazitaet(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php

}


function cleanUmlaute(string $string)
{
    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü");
    $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue");

    return str_replace($search, $replace, $string);
}

exit;
