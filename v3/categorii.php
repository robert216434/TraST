<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Categorii de permise</title>
<link rel="stylesheet" href="categorii.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
  
  </header>
  <?php
  require_once('sessions.php');
  require_once('barasus.html');
  ?>  
		<script>

        
  sessionStorage.setItem("refresh","0");

function setColorA(btn1,btn2,btn3,btn4,btn5){
  property=document.getElementById(btn1);
  property.style.border = "2px solid red";
  property=document.getElementById(btn2);
  property.style.border ="none";
  property=document.getElementById(btn3);
  property.style.border ="none";
  property=document.getElementById(btn4);
  property.style.border ="none";
  property=document.getElementById(btn5);
  property.style.border ="none";
}

function selectareCategorie(indcat){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "setareIndexCat.php?indexCategorie=" + indcat, true);
  xhttp.send();
}
</script>


<?php

include("sessions.php");

?>


<h1>Va rugam selectati categoria de permis:</h1>
<div class="Diviziuni">
<button id="A" onclick="setColorA('A','B','C','D','E');selectareCategorie(0);">A, A1, A2, AM</button>
<button id="B" onclick="setColorA('B','A','C','D','E');selectareCategorie(1);">B, B1</button>
<button id="C" onclick="setColorA('C','A','B','D','E');selectareCategorie(2);">C, C1</button>
<button id="D" onclick="setColorA('D','A','B','D','E');selectareCategorie(3);">D, D1</button>
<button id="E" onclick="setColorA('E','B','C','A','E');selectareCategorie(4);">E</button>
</div>
<div>
<button class="buton" onclick="document.location='test.php'">Incepe testul</button>
<button class="buton" onclick="document.location='navbar.html'">Inapoi la pagina principala</button>
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




<footer class="homeF">Good bye!</br>
<span id="ceas"></span>

</footer>

</body>
</html>