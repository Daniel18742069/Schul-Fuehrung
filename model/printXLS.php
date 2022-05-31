<?php

/**
 * @author Daniel Kienzl
 */

?>

<?php
if ($alleAnmeldungen && $alleFachrichtungen && $alleFuehrungen) {
?>

<script>
        $(document).ready(function() {
            $('#tbl_exporttable_to_xls').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

    <table id="tbl_exporttable_to_xls" class="display" style="width:100%">

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

                <tr>
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

<?php

}

function cleanUmlaute(string $string)
{
    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü");
    $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue");

    return str_replace($search, $replace, $string);
}

?>