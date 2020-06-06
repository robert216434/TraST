<?php

error_reporting(0);
ini_set('display_errors', 0);


?>


<!DOCTYPE html>
<html lang='ro'>

<head>
  <meta charset="UTF-8">
  <title>Road signs</title>
  <link rel="stylesheet" href="paginaComparareStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="changeButtonColor('13');setInterval(function() { changeButtonColor('13'); },5100);changeButtonColor('14');setInterval(function() { changeButtonColor('14'); },5100)
;changeButtonColor('12');setInterval(function() { changeButtonColor('12'); },5100)" class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

  <form action="paginaComparareRomania.php" method="POST">

    <p class="CompareParagraphs">Optiuni valabile:Romania,Austria,UK,Franta,Estonia,Danemarca,Cehia.</p>
    <label for="cname">Tara 1:</label><br>
    <input type="text" id="cname" name="cname"><br>
    <label for="c1name">Tara 2:</label><br>
    <input type="text" id="c1name" name="c1name"><br><br>
    <p class="CompareParagraphs">Compara dupa:</p>
    </br>
    <input type="radio" id="1" name="categorie" value="1">
    <label for="1">Indicatoare de prioritate</label>
    <input type="radio" id="2" name="categorie" value="2">
    <label for="2">Indicatoare de avertizare</label>
    <input type="radio" id="3" name="categorie" value="3">
    <label for="3">Indicatoare de interzicere</label>
    <input type="radio" id="4" name="categorie" value="4">
    <label for="4">Sfarsitul interzicerii</label>
    <input type="radio" id="5" name="categorie" value="5">
    <label for="5">Limite de viteza</label><br>
    <input type="radio" id="6" name="categorie" value="6">
    <label for="6">Indicatoare de obligare</label>
    <input type="radio" id="7" name="categorie" value="7">
    <label for="7">Indicatoare pentru reguli speciale</label>
    <input type="radio" id="8" name="categorie" value="8">
    <label for="8">Indicatii</label><br>
    <input type="radio" id="9" name="categorie" value="9">
    <label for="9">Vamale</label>
    <input type="radio" id="10" name="categorie" value="10">
    <label for="10">Pentru intrarea in orase</label>
    <input type="radio" id="11" name="categorie" value="11">
    <label for="11">Puncte de interes</label><br>
    <br></br>
    <input id="13" class="CompareButtons" type="submit" value="Confirma" name="Confirma">
    <input id="14" class="CompareButtons" type="reset" value="Reseteaza">



  </form>

  <button id="12" class="CompareButtons" onclick="document.location='../SemneDeCirculatie/selectareaSemnelorRomania.php'">Inapoi</button>

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





  <?php
  require_once("../Scrapere/scraperPentruComparareaTarilor.php");
  if (isset($_POST["Confirma"])  and $_SERVER['REQUEST_METHOD'] == "POST") {
    $okey = true;


    if (isset($_POST["categorie"])) {
      $okey = false;
      $position = $_POST['categorie'];
    }


    if ($okey == true) {

      echo "</br>" . "Nu ati ales un criteriu de comparare" . "</br>";
    } else {
      $c1 = $_POST['cname'];
      $c2 = $_POST['c1name'];
      if ($c1 == $c2) {
        echo "</br> Trebuie sa comparati 2 tari diferite </br>";
      } else {
        if ($c1 == "Danemarca") $c1 = "Denmark";
        if ($c2 == "Danemarca") $c2 = "Denmark";
        if ($c1 == "Cehia") $c1 = "Czech Republic";
        if ($c2 == "Cehia") $c2 = "Czech Republic";
        if ($c1 == "Franta") $c1 = "France";
        if ($c2 == "Franta") $c2 = "France";
        $countries = array("Austria", "Estonia", "Denmark", "Czech Republic", "Romania", "France", "UK");

        $ok = true;

        for ($in = 0; $in < count($countries); $in++)
          if ($countries[$in] == $c1) $ok = false;

        if ($ok == true) {
          echo "</br>" . "Ne pare rau,dar nu ati ales una dintre tarile specificate!" . "</br>";
        } else {

          $ok = true;
          for ($in = 0; $in < count($countries); $in++)
            if ($countries[$in] == $c1) $ok = false;

          if ($ok == true) {
            echo "</br>" . "Ne pare rau,dar nu ati ales una dintre tarile specificate" . "</br>";
          } else {

            $obiect = new scrapperSigns();
            $obiect->getSigns($c1, $c2, $position);

            $var = $obiect->getComparations();
            $var1 = $obiect->getComparations1();
            $var2 = $obiect->getComparations2();
            if ($c1 == "Denmark") $c1 = "Danemarca";
            if ($c2 == "Denmark") $c2 = "Danemarca";
            if ($c1 == "Czech Republic") $c1 = "Cehia";
            if ($c2 == "Czech Republic") $c2 = "Cehia";
            if ($c1 == "France") $c1 = "Franta";
            if ($c2 == "France") $c2 = "Franta";
            echo "</br>";
            echo "<table>";

            echo " <tr class='redColumn'>";
            echo "<th>Semnificatie</th>";
            echo "<th>" . $c1 . "</th>";
            echo "<th>" . $c2 . "</th>";
            echo "</tr>";


            for ($i = 0; $i < count($var2); $i++) {

              if ($i % 3 == 0) $columnId = "yellowColumn";
              if ($i % 3 == 1) $columnId = "blueColumn";
              if ($i % 3 == 2) $columnId = "redColumn";
              echo " <tr class=" . $columnId . " >";
              echo "<td>" . "<p>" . $var2[$i]->innertext . "</p>" . "</td>";
              echo "<td>" . "<p>" . $var[$i] . "</p>" . "</td>";
              echo "<td>" . "<p>" . $var1[$i] . "</p>" . "</td>";
              echo "</tr>";
            }
          }
        }
      }
    }
  }
  ?>



</body>