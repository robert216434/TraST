<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Semne de circulatie</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('D0');setInterval(function() { changeButtonColor('D0'); },5100);changeButtonColor('D1');setInterval(function() { changeButtonColor('D1'); },5100)
;changeButtonColor('D2');setInterval(function() { changeButtonColor('D2'); },5100);changeButtonColor('D3');setInterval(function() { changeButtonColor('D3'); },5100)
;changeButtonColor('D4');setInterval(function() { changeButtonColor('D4'); },5100);changeButtonColor('D5');setInterval(function() { changeButtonColor('D5'); },5100)
;changeButtonColor('D6');setInterval(function() { changeButtonColor('D6'); },5100);changeButtonColor('D7');setInterval(function() { changeButtonColor('D7'); },5100)">

	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  
  <?php
  require_once('sessions.php');
  require_once('barasus.html');
  ?>

 <script>
   function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }
async function changeButtonColor(butonId)
{
var buttons=document.getElementsByClassName("butone");    





    await sleep(150);
document.getElementById(butonId).style.opacity=0.9;
await sleep(150);
document.getElementById(butonId).style.opacity=0.8;
await sleep(150);
document.getElementById(butonId).style.opacity=0.7;
await sleep(150);
document.getElementById(butonId).style.opacity=0.6;
await sleep(150);
document.getElementById(butonId).style.opacity=0.5;
await sleep(150);
document.getElementById(butonId).style.opacity=0.4;
await sleep(150);
document.getElementById(butonId).style.opacity=0.3;
await sleep(150);
document.getElementById(butonId).style.opacity=0.2;
await sleep(150);

if(document.getElementById(butonId).style.backgroundColor=="darkred") document.getElementById(butonId).style.backgroundColor="yellow";
else{

   if( document.getElementById(butonId).style.backgroundColor=="yellow")document.getElementById(butonId).style.backgroundColor="blue";
   else document.getElementById(butonId).style.backgroundColor="darkred";
}
await sleep(150);

document.getElementById(butonId).style.opacity=0.3;
await sleep(150);
document.getElementById(butonId).style.opacity=0.4;
await sleep(150);
document.getElementById(butonId).style.opacity=0.5;
await sleep(150);
document.getElementById(butonId).style.opacity=0.6;
await sleep(150);
document.getElementById(butonId).style.opacity=0.7;
await sleep(150);
document.getElementById(butonId).style.opacity=0.8;
await sleep(150);
document.getElementById(butonId).style.opacity=1;
await sleep(150);

}

  </script>

<h1>Indicatoare și marcaje rutiere</h1>
<form action="pagina_intermediara.php" method="POST">
<button id="D0" name="D1" class="butone">INDICATOARE DE AVERTIZARE</button>
<button id="D1"name="D2" class="butone" >INDICATOARE DE PRIORITATE</button>
<button id="D2"name="D3" class="butone" >INDICATOARE DE RESTRICTIE SAU INTERDICTIE</button>
<button id="D3" name="D4"class="butone" >INDICATOARE DE OBLIGARE</button>
<button id="D4" name="D5"class="butone" >INDICATOARE ORIENTATIVE</button>
<button id="D5"name="D6"class="butone" >INDICATOARE DE INFORMARE</button>
<button id="D6" name="D7"  class="butone" >PANOURI ADITIONALE</button>

</form>
<form action="pagina_comparare.php" method="POST">
<button id="D7" name="Comp" class="butone">Compara tarile dupa semne de circulatie</button>




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