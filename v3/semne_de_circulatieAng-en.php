<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Road signs</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

	<header style="margin:0px;background-image: url(imagini/Anglia.png);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  <?php
  require_once('barasus-en.html');
  ?>

<?php

include("sessions-en.php");

?>

<h1>Road signs and markings</h1>
<form action="pagina_intermediaraAng-en.php" method="POST">
<button name="BT1" class="butone">WARNING SIGNS</button>
<button name="BT2" class="butone">REGULATORY SIGNS</button>
<button name="BT3" class="butone">SPEED LIMIT SIGNS</button>
<button name="BT4" class="butone">LOW BRIDGE SIGNS</button>
<button name="BT5" class="butone">LEVEL CROSSING SIGNS</button>
<button name="BT6" class="butone">BUS AND CYCLE SIGNS</button>
<button name="BT7" class="butone">PEDESTRIAN ZONE SIGNS</button>
<button name="BT8" class="butone">LOADING BAYS AND PARKING SIGNS</button>
<button name="BT9" class="butone">MOTORWAY SIGNS</button>
<button name="BT14" class="butone">DIRECTIONAL ROAD SIGNS</button>
<button name="BT15" class="butone">TOURIST DESTINATIONS</button>
<button name="BT16" class="butone">DIVERSION ROUTES</button>
<button name="BT17" class="butone">INFORMATIONAL SIGNS</button>
<button name="BT18" class="butone">ROADWORKS AND TEMPORARY SIGNS</button>

</form>

<form action="pagina_comparareAng-en.php" method="POST">

  <button name="Compara" class="butone">Compare countries</button>


</form>
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
currentTimeString="Date: "+ an+" / "+luni+" / "+data+" Time: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
<footer class="homeF">Good bye!</br><span id="creat"></span></footer>

</body>
</html>