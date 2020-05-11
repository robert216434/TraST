<!DOCTYPE html>
<html lang="ro">
<head>
<title>Home Page</title>
<link rel="stylesheet" href="leg.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="leg">

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


<div class="butoane1">
 <button class="buton1"   name="B1" onclick="loadCapitol(0)" > Capitolul 1</button>
 <button class="buton1"  name="B2"  onclick="loadCapitol(1)">Capitolul 2</button>
 <button class="buton1"  name="B3"  onclick="loadCapitol(2)"> Capitolul 3</button>
 <button class="buton1"  name="B4"  onclick="loadCapitol(3)"> Capitolul 4</button>
 <button class="buton1"  name="B5" onclick="loadCapitol(4)">Capitolul 5</button>
 <button class="buton1"  name="B6" onclick="loadCapitol(5)"> Capitolul 6</button>
 <button class="buton1"  name="B7" onclick="loadCapitol(6)"> Capitolul 7</button>
 <button class="buton1"  name="B8" onclick="loadCapitol(7)"> Capitolul 8</button>
 <button class="buton1"  name="B9" onclick="loadCapitol(8)"> Capitolul 9</button>
 <button class="buton1"  name="B10" onclick="loadCapitol(9)"> Capitolul 10</button>

  
 
</div>

<div class="continut" id="capitol"></div>

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

<footer class="homeF">Good Bye!</footer>

</body>


</html>
