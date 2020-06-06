<!DOCTYPE html>
<html lang='ro'>

<head>
  <meta charset="UTF-8">
  <title>Semne de circulatie</title>
  <link rel="stylesheet" href="selectareaSemnelorStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");

?>

<body onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('D0');setInterval(function() { changeButtonColor('D0'); },5100);changeButtonColor('D1');setInterval(function() { changeButtonColor('D1'); },5100)
;changeButtonColor('D2');setInterval(function() { changeButtonColor('D2'); },5100);changeButtonColor('D3');setInterval(function() { changeButtonColor('D3'); },5100)
;changeButtonColor('D4');setInterval(function() { changeButtonColor('D4'); },5100);changeButtonColor('D5');setInterval(function() { changeButtonColor('D5'); },5100)
;changeButtonColor('D6');setInterval(function() { changeButtonColor('D6'); },5100);changeButtonColor('D7');setInterval(function() { changeButtonColor('D7'); },5100)">



  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <?php
    require_once("../../IncludedNavbars/navbarRomania.html");
    ?>

    <script>
      function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
      }
      async function changeButtonColor(butonId) {
        var buttons = document.getElementsByClassName("butone");





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

        if (document.getElementById(butonId).style.backgroundColor == "darkred") document.getElementById(butonId).style.backgroundColor = "yellow";
        else {

          if (document.getElementById(butonId).style.backgroundColor == "yellow") document.getElementById(butonId).style.backgroundColor = "blue";
          else document.getElementById(butonId).style.backgroundColor = "darkred";
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


    <h1 class="titlu">Indicatoare și marcaje rutiere</h1>
    <form action="paginaCuToateSemneleRomania.php" method="POST">
      <button id="D0" name="D1" class="butone">INDICATOARE DE AVERTIZARE</button>
      <button id="D1" name="D2" class="butone">INDICATOARE DE PRIORITATE</button>
      <button id="D2" name="D3" class="butone">INDICATOARE DE RESTRICTIE SAU INTERDICTIE</button>
      <button id="D3" name="D4" class="butone">INDICATOARE DE OBLIGARE</button>
      <button id="D4" name="D5" class="butone">INDICATOARE ORIENTATIVE</button>
      <button id="D5" name="D6" class="butone">INDICATOARE DE INFORMARE</button>
      <button id="D6" name="D7" class="butone">PANOURI ADITIONALE</button>

    </form>
    <form action="../ComparareaTarilor/paginaComparareRomania.php" method="POST">
      <button id="D7" name="Comp" class="butone">Compara tarile dupa semne de circulatie</button>






      <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

  </div>

</body>

</html>