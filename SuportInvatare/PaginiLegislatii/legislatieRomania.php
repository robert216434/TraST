<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="legislatieStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");
?>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('contentCapitole');setInterval(function() { changeButtonColor('contentCapitole'); },5100)">



  <?php
  require_once('../../IncludedNavbars/navbarRomania.html');
  ?>

  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <div class="butoane1" id="contentCapitole">
      <button class="buton1" name="B1" onclick="loadCapitol(0)"> Capitolul 1</button>
      <button class="buton1" name="B2" onclick="loadCapitol(1)">Capitolul 2</button>
      <button class="buton1" name="B3" onclick="loadCapitol(2)"> Capitolul 3</button>
      <button class="buton1" name="B4" onclick="loadCapitol(3)"> Capitolul 4</button>
      <button class="buton1" name="B5" onclick="loadCapitol(4)">Capitolul 5</button>
      <button class="buton1" name="B6" onclick="loadCapitol(5)"> Capitolul 6</button>
      <button class="buton1" name="B7" onclick="loadCapitol(6)"> Capitolul 7</button>
      <button class="buton1" name="B8" onclick="loadCapitol(7)"> Capitolul 8</button>
      <button class="buton1" name="B9" onclick="loadCapitol(8)"> Capitolul 9</button>
      <button class="buton1" name="B10" onclick="loadCapitol(9)"> Capitolul 10</button>
    </div>

    <div class="continut" id="capitol"></div>
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

        if (document.getElementById(butonId).style.backgroundColor == "darkred") {
          document.getElementById(butonId).style.backgroundColor = "yellow";
        } else {

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


    <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

  </div>

</body>


</html>