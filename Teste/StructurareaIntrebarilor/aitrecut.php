<!DOCTYPE html>
<html lang='ro'>

<head>
  <meta charset="UTF-8">
  <title>Teste</title>
  <link rel="stylesheet" href="pagina_dupa_test.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
  <?php
  error_reporting(0);
  ini_set('display_errors', 0);

  $a = $_SESSION['raspunsuriCorecte'];
  $b = $_SESSION['raspunsuriGresite'];

  ?>


  <?php
  require_once('../../IncludedNavbars/navbarRomania.html');
  ?>

  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <br><br><br><br><br><br><br><br>
    <p class="asd">Ai trecut testul!</p>​
    <br><br><br><br>
    <div class="cbd">
      <a class="cb" id="elementAfisareDescarcare">Descarca testul in format csv</a>
      <button class="cb" onclick="document.location='../SelectareaCategoriilor/categorii.php'">Incepe un test nou!</button>
    </div>


    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("elementAfisareDescarcare").href = this.responseText;
        }
      };
      xhttp.open("GET", "descarcaCSV.php", true);
      xhttp.send();
    </script>

    <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>
  </div>

</body>

</html>