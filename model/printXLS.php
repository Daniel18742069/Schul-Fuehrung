<?php

/**
 * @author Daniel Kienzl
 */

require_once 'view/template/printXLS.tpl.php';

// filename for download
$filename = "open_day_" . date('Y.m.d') . ".xls";

//header("Content-Disposition: attachment; filename=\"$filename\"");
//header('Content-Type: application/xls');

// header("Content-Type: text/plain");


$alleAnmeldungen = Anmeldung::findeAlleAnmeldungenSortiertDatum();
$alleFachrichtungen = Fachrichtung::findeAlleFachrichtungen();
$alleFuehrungen = Fuehrung::findeAlleFuehrungen();

if ($alleAnmeldungen && $alleFachrichtungen && $alleFuehrungen) {
?>

    <table id="tbl_exporttable_to_xls">
        <thead>
            <tr>
                <th class="order">Datum</th>
                <th class="order">Uhrzeit</th>
                <th class="order">Vorname</th>
                <th class="order">Nachname</th>
                <th class="order">Anzahl</th>
                <th class="order">Email</th>
                <th class="order">Telefon</th>
                <th class="order">Beschreibung</th>
                <th class="order">Fuehrungspersonen</th>
                <th class="order">Kapazitaet</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($alleAnmeldungen as $Anmeldung) :
                $fuehrung_id = $Anmeldung->getFuehrung_id();

                $Fuehrung = $alleFuehrungen[$fuehrung_id];
                $Fachrichtung = $alleFachrichtungen[$Fuehrung->getFachrichtung_id()];
            ?>

                <tr class="">
                    <td>
                        <?= datum_formatieren($Anmeldung->getDatum(), 'd.m.Y');
                        $letztes_datum = datum_formatieren($Anmeldung->getDatum(), 'd.m.Y'); ?>
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
                        <?= cleanUmlaute($Fachrichtung->getBeschreibung()); ?>
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

        <script src = "https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"
        integrity = "sha512-XmZS54be9JGMZjf+zk61JZaLZyjTRgs41JLSmx5QlIP5F+sSGIyzD2eJyxD4K6kGGr7AsVhaitzZ2WTfzpsQzg=="
        crossorigin = "anonymous"
        referrerpolicy = "no-referrer" >
            TableExport(document.getElementsByTagName("table"), {
                filename: 'excelfile',
                sheetname: "sheet1"
            });
    </script>
    <script>
        table_sort()
    </script>

<?php

}

function cleanUmlaute(string $string)
{
    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü");
    $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue");

    return str_replace($search, $replace, $string);
}

/*function cleanData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
*/

exit;

?>