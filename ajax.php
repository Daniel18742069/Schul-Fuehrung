<html>
<h1>Result form PHP-Script (post variables):</h1>
<table cellpadding="3" border="1">
<?php 
  foreach ($_POST as $key => $value) {
    echo '<tr><td>';
    echo $key . ':';
    echo '</td><td>';
    echo $value;
    echo '</td></tr>';
  }
?>
</table>
</html>