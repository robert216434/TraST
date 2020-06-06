<?php
error_reporting(0);
ini_set('display_errors', 0);

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="UTF-8">
  <title>Road signs</title>
  <link rel="stylesheet" href="paginaComparareStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="changeButtonColor('15');setInterval(function() { changeButtonColor('15'); },5100);changeButtonColor('16');setInterval(function() { changeButtonColor('16'); },5100)
;changeButtonColor('17');setInterval(function() { changeButtonColor('17'); },5100)" class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

  <form action="paginaComparareAnglia.php" method="POST">

    <p class="CompareParagraphs">Available options:Romania,Austria,UK,France,Estonia,Denmark,Czech Republic.</p>
    <label for="fname">Country 1:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Country 2:</label><br>
    <input type="text" id="lname" name="lname"><br><br>
    <p class="CompareParagraphs">Compare by:</p>
    </br>
    <input type="radio" id="1" name="category" value="1">
    <label for="1">Priority signs</label>
    <input type="radio" id="2" name="category" value="2">
    <label for="2">Warning signs</label>
    <input type="radio" id="3" name="category" value="3">
    <label for="3">Prohibitory signs</label>
    <input type="radio" id="4" name="category" value="4">
    <label for="4">End of prohibition signs</label>
    <input type="radio" id="5" name="category" value="5">
    <label for="5">Speed limit signs</label><br>
    <input type="radio" id="6" name="category" value="6">
    <label for="6">Mandatory signs</label>
    <input type="radio" id="7" name="category" value="7">
    <label for="7">Special regulation signs</label>
    <input type="radio" id="8" name="category" value="8">
    <label for="8">Indication signs</label><br>
    <input type="radio" id="9" name="category" value="9">
    <label for="9">Border Crossing</label>
    <input type="radio" id="10" name="category" value="10">
    <label for="10">Built-up Area Limits</label>
    <input type="radio" id="11" name="category" value="11">
    <label for="11">Checkpoints</label><br>

    <br></br>
    <input id="15" class="CompareButtonsAng" type="submit" value="Submit" name="Submit">
    <input id="16" class="CompareButtonsAng" type="reset">



  </form>


  <button id="17" class="CompareButtonsAng" onclick="document.location='../SemneDeCirculatie/selectareaSemnelorAnglia.php'">Back</button>
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




  <?php
  require_once("../Scrapere/scraperPentruComparareaTarilor.php");
  if (isset($_POST["Submit"])  and $_SERVER['REQUEST_METHOD'] == "POST") {
    $okey = true;


    if (isset($_POST["category"])) {
      $okey = false;
      $position = $_POST['category'];
    }


    if ($okey == true) {

      echo "</br>" . "You didn't select a comparison criteria!" . "</br>";
    } else {
      $c1 = $_POST['fname'];
      $c2 = $_POST['lname'];
      if ($c1 == $c2) echo "</br> You can't compare the same country </br>";
      else {
        $countries = array("Austria", "Estonia", "Denmark", "Czech Republic", "Romania", "France", "UK");

        $ok = true;

        for ($in = 0; $in < count($countries); $in++)
          if ($countries[$in] == $c1) $ok = false;

        if ($ok == true) {
          echo "</br>" . "We are sorry,but you didn't choose one of the specified countries" . "</br>";
        } else {

          $ok = true;
          for ($in = 0; $in < count($countries); $in++)
            if ($countries[$in] == $c1) $ok = false;

          if ($ok == true) {
            echo "</br>" . "We are sorry,but you didn't choose one of the specified countries" . "</br>";
          } else {

            $obiect = new scrapperSigns();
            $obiect->getSigns($c1, $c2, $position);

            $var = $obiect->getComparations();
            $var1 = $obiect->getComparations1();
            $var2 = $obiect->getComparations2();
            echo "</br>";
            echo "<table>";

            echo " <tr class='redColumn'>";
            echo "<th>Semnificatie</th>";
            echo "<th>" . $c1 . "</th>";
            echo "<th>" . $c2 . "</th>";
            echo "</tr>";


            for ($i = 0; $i < count($var2); $i++) {

              if ($i % 2 == 0) $columnId = "whiteColumn";
              if ($i % 2 == 1) $columnId = "redColumn";

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