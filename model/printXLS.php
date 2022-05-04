<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
        </script>
        <script src="jquery.table2excel.js"></script>
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
//header('Content-Type: application/xls');

// header("Content-Type: text/plain");


$alleAnmeldungen = Anmeldung::findeAlleAnmeldungenSortiertDatum();
$alleFachrichtungen = Fachrichtung::findeAlleFachrichtungen();
$alleFuehrungen = Fuehrung::findeAlleFuehrungen();

if ($alleAnmeldungen && $alleFachrichtungen && $alleFuehrungen) {
?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@100;300;400;700&display=swap');

        @media print {
            * {
                display: none;
            }

            #printableTable {
                display: block;
            }
        }

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

        table thead {
            cursor: pointer;
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

    <table id="table">
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
    <button class="exportBtnClass">
                  Export to XLS file
         </button>
    <input type="hidden" name="file_content" id="file_content" />
    <button type="button" name="convert" id="convert" class="btn btn-primary">Convert</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php

}

?>


<script>
    function table_sort() {
        const styleSheet = document.createElement('style')
        styleSheet.innerHTML = `
          .order-inactive span {
              visibility:hidden;
          }
          .order-inactive:hover span {
              visibility:visible;
          }
          .order-active span {
              visibility: visible;
          }
      `
        document.head.appendChild(styleSheet)

        document.querySelectorAll('th.order').forEach(th_elem => {
            let asc = true
            const span_elem = document.createElement('span')
            span_elem.style = "font-size:0.8rem; margin-left:0.5rem"
            span_elem.innerHTML = "▼"
            th_elem.appendChild(span_elem)
            th_elem.classList.add('order-inactive')

            const index = Array.from(th_elem.parentNode.children).indexOf(th_elem)
            th_elem.addEventListener('click', (e) => {
                document.querySelectorAll('th.order').forEach(elem => {
                    elem.classList.remove('order-active')
                    elem.classList.add('order-inactive')
                })
                th_elem.classList.remove('order-inactive')
                th_elem.classList.add('order-active')

                if (!asc) {
                    th_elem.querySelector('span').innerHTML = '▲'
                } else {
                    th_elem.querySelector('span').innerHTML = '▼'
                }
                const arr = Array.from(th_elem.closest("table").querySelectorAll('tbody tr'))
                arr.sort((a, b) => {
                    const a_val = a.children[index].innerText
                    const b_val = b.children[index].innerText
                    return (asc) ? a_val.localeCompare(b_val) : b_val.localeCompare(a_val)
                })
                arr.forEach(elem => {
                    th_elem.closest("table").querySelector("tbody").appendChild(elem)
                })
                asc = !asc
            })
        })
    }
    table_sort()
</script>

<script>
    $(function() {
                  
                  $(".exportBtnClass").click(function(e){
                      var table = $(this).prev('.table2excel');
                      if(table && table.length){
                          var preserveColors = 
                         (table.hasClass('colorClass') ? true : false);
    
                          $(table).table2excel({
    
  // This class's content is excluded from getting exported
                              exclude: ".noExl", 
                              name: "Output excel file ",
                              filename: 
  "outputFile-" + new Date().toString().replace(/[\-\:\.]/g, "") + ".xls",
    
                              fileext: ".xls", //File extension type
                              exclude_img: true,
                              exclude_links: true,
                              exclude_inputs: true,
                              preserveColors: preserveColors
                          });
                      }
                  });        
              });
</script>

<?php

function cleanUmlaute(string $string)
{
    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü");
    $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue");

    return str_replace($search, $replace, $string);
}

exit;
