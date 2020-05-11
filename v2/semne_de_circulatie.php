<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Semne de circulatie</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  <div class="topnav" id="myTopnav">
  <a href="navbar.html">Acasa</a>
  <a href="login.php">Autentificare</a>
  <div class="dropdown">
    <button class="dropbtn">Selecteaza tara
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="navbar.html">Romania</a>
    <a href="navbarAngl-en.html">Anglia</a>
    </div>
  </div>
  <a href="legislatie1.php">Legislatie</a>
  <a href="semne_de_circulatie.php">Semne de circulatie</a>
  <a href="categorii.php">Teste</a>
  <a href="clasament.php">Clasament</a>
  <a href="profil.php">Profil</a>
  <a href="">English</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
  </div>

  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
    x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  }
  </script>

<?php

include("sessions.php");

?>

<h1>Indicatoare și marcaje rutiere</h1>
<form action="pagina_intermediara.php" method="POST">
<button name="D1" class="butone" >INDICATOARE DE AVERTIZARE</button>
<button name="D2" class="butone" >INDICATOARE DE PRIORITATE</button>
<button name="D3" class="butone" >INDICATOARE DE RESTRICTIE SAU INTERDICTIE</button>
<button  name="D4"class="butone" >INDICATOARE DE OBLIGARE</button>
<button  name="D5"class="butone" >INDICATOARE ORIENTATIVE</button>
<button name="D6"class="butone" >INDICATOARE DE INFORMARE</button>
<button name="D7"  class="butone" >PANOURI ADITIONALE</button>

</form>
<form action="pagina_comparare.php" method="POST">
<button name="Comp" class="butone">Compara tarile dupa semne de circulatie</button>

</form>




<footer class="homeF">Good bye!</footer>

</body>
</html>