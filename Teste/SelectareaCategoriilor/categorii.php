<!DOCTYPE html>
<html lang='ro'>

<head>
  <meta charset="UTF-8">
  <title>Categorii de permise</title>
  <link rel="stylesheet" href="../StructurareaIntrebarilor/categoriiStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">
    <?php
    require_once("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");
    require_once('../../IncludedNavbars/navbarRomania.html');
    ?>
    <script>
      sessionStorage.setItem("refresh", "0");

      function setColorA(btn1, btn2, btn3, btn4, btn5) {
        property = document.getElementById(btn1);
        property.style.border = "2px solid yellow";
        property = document.getElementById(btn2);
        property.style.border = "none";
        property = document.getElementById(btn3);
        property.style.border = "none";
        property = document.getElementById(btn4);
        property.style.border = "none";
        property = document.getElementById(btn5);
        property.style.border = "none";
      }

      function selectareCategorie(indcat) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "../StructurareaIntrebarilor/setareIndexCat.php?indexCategorie=" + indcat, true);
        xhttp.send();
      }
    </script>



    <h1>Va rugam selectati categoria de permis:</h1>
    <div class="Diviziuni">
      <button id="A" onclick="setColorA('A','B','C','D','E');selectareCategorie(0);">A, A1, A2, AM</button>
      <button id="B" onclick="setColorA('B','A','C','D','E');selectareCategorie(1);">B, B1</button>
      <button id="C" onclick="setColorA('C','A','B','D','E');selectareCategorie(2);">C, C1</button>
      <button id="D" onclick="setColorA('D','A','B','C','E');selectareCategorie(3);">D, D1</button>
      <button id="E" onclick="setColorA('E','B','C','A','D');selectareCategorie(4);">E</button>
      <button onclick="document.location='../StructurareaIntrebarilor/test.php'">Incepe testul</button>
      <button onclick="document.location='../../HomePages/RomaniaHomePage.html'">Inapoi la pagina principala</button>
    </div>





    <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

  </div>

</body>

</html>