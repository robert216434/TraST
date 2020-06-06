<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="UTF-8">
  <title>Road signs</title>
  <link rel="stylesheet" href="selectareaSemnelorStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveAnglia.php");

?>

<body onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('BT1');setInterval(function() { changeButtonColor('BT1'); },5100);
changeButtonColor('BT2');setInterval(function() { changeButtonColor('BT2'); },5100);changeButtonColor('BT3');setInterval(function() { changeButtonColor('BT3'); },5100);
changeButtonColor('BT4');setInterval(function() { changeButtonColor('BT4'); },5100);changeButtonColor('BT5');setInterval(function() { changeButtonColor('BT5'); },5100);
changeButtonColor('BT6');setInterval(function() { changeButtonColor('BT6'); },5100);changeButtonColor('BT7');setInterval(function() { changeButtonColor('BT7'); },5100);
changeButtonColor('BT8');setInterval(function() { changeButtonColor('BT8'); },5100);changeButtonColor('BT9');setInterval(function() { changeButtonColor('BT9'); },5100);
changeButtonColor('BT10');setInterval(function() { changeButtonColor('BT10'); },5100);changeButtonColor('BT11');setInterval(function() { changeButtonColor('BT11'); },5100);
changeButtonColor('BT12');setInterval(function() { changeButtonColor('BT12'); },5100);changeButtonColor('BT13');setInterval(function() { changeButtonColor('BT13'); },5100);
changeButtonColor('BT14');setInterval(function() { changeButtonColor('BT14'); },5100);changeButtonColor('BT15');setInterval(function() { changeButtonColor('BT15'); },5100);">



  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <?php
    require_once("../../IncludedNavbars/navbarAnglia.html");
    ?>



    <h1 class="titlu"> Road signs and markings</h1>
    <form action="paginaCuToateSemneleAnglia.php" method="POST">
      <button id="BT1" name="BT1" class="butone1">WARNING SIGNS</button>
      <button id="BT2" name="BT2" class="butone1">REGULATORY SIGNS</button>
      <button id="BT3" name="BT3" class="butone1">SPEED LIMIT SIGNS</button>
      <button id="BT4" name="BT4" class="butone1">LOW BRIDGE SIGNS</button>
      <button id="BT5" name="BT5" class="butone1">LEVEL CROSSING SIGNS</button>
      <button id="BT6" name="BT6" class="butone1">BUS AND CYCLE SIGNS</button>
      <button id="BT7" name="BT7" class="butone1">PEDESTRIAN ZONE SIGNS</button>
      <button id="BT8" name="BT8" class="butone1">LOADING BAYS AND PARKING SIGNS</button>
      <button id="BT9" name="BT9" class="butone1">MOTORWAY SIGNS</button>
      <button id="BT10" name="BT14" class="butone1">DIRECTIONAL ROAD SIGNS</button>
      <button id="BT11" name="BT15" class="butone1">TOURIST DESTINATIONS</button>
      <button id="BT12" name="BT16" class="butone1">DIVERSION ROUTES</button>
      <button id="BT13" name="BT17" class="butone1">INFORMATIONAL SIGNS</button>
      <button id="BT14" name="BT18" class="butone1">ROADWORKS AND TEMPORARY SIGNS</button>

    </form>

    <form action="../ComparareaTarilor/paginaComparareAnglia.php" method="POST">

      <button id="BT15" name="Compara" class="butone1">Compare countries</button>


    </form>









    <script>
      function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
      }

      var switch1 = 0;
      async function changeButtonColor(butonId) {

        var switch2 = switch1;




        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.9;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.8;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.7;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.6;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.5;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.4;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.3;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.2;
        await sleep(150);
        if (switch2 == 0) {
          document.getElementById(butonId).style.backgroundColor = "darkred";
          document.getElementById(butonId).style.color = "whitesmoke";
          document.getElementById(butonId).style.borderColor = "whitesmoke";
          switch1 = 1;
        } else {

          document.getElementById(butonId).style.backgroundColor = "whitesmoke";
          document.getElementById(butonId).style.color = "darkred";
          document.getElementById(butonId).style.borderColor = "darkred";
          switch1 = 0;
        }

        await sleep(150);

        document.getElementById(butonId).style.opacity = 0.3;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.4;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.5;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.6;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.7;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 0.8;
        await sleep(150);
        document.getElementById(butonId).style.opacity = 1;
        await sleep(150);



      }
    </script>
    <footer class="homeF-en">Good bye!</br> <span id="ceas"></span></footer>

  </div>

</body>

</html>