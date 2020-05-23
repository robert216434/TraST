<!DOCTYPE html>
<html lang="ro">
<head>
<title>Home Page</title>
<link rel="stylesheet" href="leg.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 )">

     <header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  
  <?php
  require_once('barasus.html');
  ?>


<?php

include("sessions.php");

?>


<div class="butoane1">
 <button class="buton1"   name="B1" onclick="loadCapitol(0)" > Capitolul 1</button>
 <button class="buton1"  name="B2"  onclick="loadCapitol(1)">Capitolul 2</button>
 <button class="buton1"  name="B3"  onclick="loadCapitol(2)"> Capitolul 3</button>
 <button class="buton1"  name="B4"  onclick="loadCapitol(3)"> Capitolul 4</button>
 <button class="buton1"  name="B5" onclick="loadCapitol(4)">Capitolul 5</button>
 <button class="buton1"  name="B6" onclick="loadCapitol(5)"> Capitolul 6</button>
 <button class="buton1"  name="B7" onclick="loadCapitol(6)"> Capitolul 7</button>
 <button class="buton1"  name="B8" onclick="loadCapitol(7)"> Capitolul 8</button>
 <button class="buton1"  name="B9" onclick="loadCapitol(8)"> Capitolul 9</button>
 <button class="buton1"  name="B10" onclick="loadCapitol(9)"> Capitolul 10</button>

  
 
</div>

<div class="continut" id="capitol"></div>

<script>
function loadCapitol(index) {
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("capitol").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gestiuneCapitol.php?Capitol=" + index, true);
    xmlhttp.send();
  
}


</script>

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




<footer class="homeF">La revedere!</br>
<span id="ceas"></span>

</footer>

</body>


</html>
