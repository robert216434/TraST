<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Teste</title>
<link rel="stylesheet" href="pagina_dupa_test.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<?php

$a = $_SESSION['raspunsuriCorecte'];
$b = $_SESSION['raspunsuriGresite'];

?>
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

</div>
<br><br><br><br><br><br><br><br>
<p class="asd">Ai trecut testul!</p>​
<br><br><br><br>
 <div class="cbd">
  <button class="cb" onclick="document.location='categorii.php'">Incepe un test nou!</button>
</div>
	
<footer class="norisF">Good bye!</footer>
</body>
</html>