<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Teste</title>
<link rel="stylesheet" href="pagina_dupa_test.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
<?php
error_reporting(0);
ini_set('display_errors', 0);

?>
<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
	
  </header>
  
	<?php
    require_once('barasus.html');
  ?>

</div>
<br><br><br><br><br><br><br><br>
<p class="asd">Ne pare rau dar ai picat testul!</p>​
<br><br><br><br>
 <div class="cbd">
  <button class="cb" onclick="document.location='categorii.php'">Incepe un test nou!</button>
</div>
<script>
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
<footer class="norisF">La revedere!</br><span id="ceas"></span></footer>
</body>
</html>