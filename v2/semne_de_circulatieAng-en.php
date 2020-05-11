<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Road signs</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

	<header style="margin:0px;background-image: url(imagini/Anglia.png);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  <div class="topnav" id="myTopnav">
    <a href="navbarAngl-en.html">Home</a>
    <a href="loginAng-en.php">Authentification</a>
    <div class="dropdown">
      <button class="dropbtn">Select country
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
      <a href="navbar.html">Romania</a>
      <a href="navbarAngl-en.html">England</a>
      </div>
    </div>
    <a href="legislatie2-en.php">Legislation</a>
    <a href="semne_de_circulatieAng-en.php">Road signs</a>
    <a href="categoriiAng-en.php">Tests</a>
    <a href="clasamentAng-en.php">Ranking</a>
    <a href="profilAng-en.php">Profile</a>
    <a href="">Romana</a>
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

include("sessions-en.php");

?>

<h1>Road signs and markings</h1>
<form action="pagina_intermediaraAng-en.php" method="POST">
<button name="BT1" class="butone">WARNING SIGNS</button>
<button name="BT2" class="butone">REGULATORY SIGNS</button>
<button name="BT3" class="butone">SPEED LIMIT SIGNS</button>
<button name="BT4" class="butone">LOW BRIDGE SIGNS</button>
<button name="BT5" class="butone">LEVEL CROSSING SIGNS</button>
<button name="BT6" class="butone">BUS AND CYCLE SIGNS</button>
<button name="BT7" class="butone">PEDESTRIAN ZONE SIGNS</button>
<button name="BT8" class="butone">LOADING BAYS AND PARKING SIGNS</button>
<button name="BT9" class="butone">MOTORWAY SIGNS</button>
<button name="BT14" class="butone">DIRECTIONAL ROAD SIGNS</button>
<button name="BT15" class="butone">TOURIST DESTINATIONS</button>
<button name="BT16" class="butone">DIVERSION ROUTES</button>
<button name="BT17" class="butone">INFORMATIONAL SIGNS</button>
<button name="BT18" class="butone">ROADWORKS AND TEMPORARY SIGNS</button>

</form>

<form action="pagina_comparareAng-en.php" method="POST">

  <button name="Compara" class="butone">Compare countries</button>


</form>
<footer class="homeF">Good bye!</footer>

</body>
</html>