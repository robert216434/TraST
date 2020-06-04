<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Teste</title>
<link rel="stylesheet" href="pagina_dupa_test.css">
<link rel="stylesheet" href="butoane.css">
<link rel="stylesheet" href="semafor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
<?php
error_reporting(0);
ini_set('display_errors', 0);

?>

  
	<?php
    require_once('barasus.html');
  ?>

<div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">

<br><br><br><br><br><br><br><br>
<p class="asd">Ne pare rau dar ai picat testul!</p>​
<br><br><br><br>
 <div class="cbd">
  <a class="cb" id="elementAfisareDescarcare">Descarca testul in format csv</a>
  <button class="cb" onclick="document.location='categorii.php'">Incepe un test nou!</button>
</div>

<script>


var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("elementAfisareDescarcare").href = this.responseText;
  }
};
xhttp.open("GET", "descarcaCSV.php", true);
xhttp.send();


function ceas ( )
{
  var timp= new Date ( );

  var ore = timp.getHours ( );
  var minute = timp.getMinutes ( );
  var secunde = timp.getSeconds ( );

if(minute<10) minute="0" + minute;
if(secunde<10) secunde="0" + secunde;
if(ore<10)ore="0"+ ore;
  
  var currentTimeString = ore + ":" + minute + ":" + secunde + " " ;
var data=timp.getDate();
var luni=timp.getMonth()+1;
var an=timp.getFullYear();
currentTimeString="Data: "+ an+" / "+luni+" / "+data+" Ora: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
<footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>
</div>
</body>
</html>