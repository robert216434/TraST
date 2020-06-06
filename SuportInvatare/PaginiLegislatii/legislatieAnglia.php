<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="legislatieStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveAnglia.php");
?>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('buttonsAng');setInterval(function() { changeButtonColor('buttonsAng'); },5100);">


  <?php
  require_once('../../IncludedNavbars/navbarAnglia.html');
  ?>

  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <div class="butoane2" id="buttonsAng">

      <button name="C1" onclick="loadChap(0)">Chapter 1 </button>
      <button name="C2" onclick="loadChap(1)">Chapter 2 </button>
      <button name="C3" onclick="loadChap(2)">Chapter 3 </button>
      <button name="C4" onclick="loadChap(3)">Chapter 4 </button>
      <button name="C5" onclick="loadChap(4)">Chapter 5 </button>
      <button name="C6" onclick="loadChap(5)">Chapter 6 </button>
      <button name="C7" onclick="loadChap(6)">Chapter 7 </button>
      <button name="C8" onclick="loadChap(7)">Chapter 8 </button>
      <button name="C9" onclick="loadChap(8)">Chapter 9 </button>
      <button name="C10" onclick="loadChap(9)">Chapter 10 </button>
      <button name="C11" onclick="loadChap(10)">Chapter 11 </button>
      <button name="C12" onclick="loadChap(11)">Chapter 12 </button>
      <button name="C13" onclick="loadChap(12)">Chapter 13 </button>

    </div>

    <div class="content" id="chapter"></div>

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



    <script>
      function loadChap(index) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chapter").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "chapterGestion.php?Chapter=" + index, true);
        xmlhttp.send();

      }
    </script>



    <footer class="homeF-en">Good bye!.<br><span id="ceas"></span></footer>

  </div>

</body>


</html>