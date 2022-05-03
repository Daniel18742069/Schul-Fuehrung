<!DOCTYPE html>
<html lang="de">
<body>
<h1>AJAX Test</h1>
<form id="MyForm" name="MyForm">
  <label>Your Value: <input name="MyName" id="MyID" value="YourValue" /></label>
  <p><button type="button" onclick="CallPhpScript()">Call PHP-Script</button></p>
</form>
<div id="GenResult">
  <br>
</div>
<script>
function CallPhpScript()
{
  var xhttp;
  try {
    xhttp = new XMLHttpRequest();
  } catch (e) {
    try {
      xhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        return;
      }
    }
  } 
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("GenResult").innerHTML = this.responseText + "<br>";
    }
  };
  xhttp.open("POST", "ajax.php");
  formData = new FormData(MyForm);
  formData.append("Eins", 1); // add some extra post variables
  formData.append("Zwei", 2);
  formData.append("Drei", "Drei");
  xhttp.send(formData);
}
</script> 
</body>
</html>