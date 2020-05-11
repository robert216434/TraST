<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Categorii de permise</title>
<link rel="stylesheet" href="categorii.css">
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
    <p id="txtHint">  </p>
  <script>
  sessionStorage.setItem("refresh","0");
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
    x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  }

function setColorA(btn1,btn2,btn3,btn4,btn5){
  property=document.getElementById(btn1);
  property.style.border = "2px solid red";
  property=document.getElementById(btn2);
  property.style.border ="none";
  property=document.getElementById(btn3);
  property.style.border ="none";
  property=document.getElementById(btn4);
  property.style.border ="none";
  property=document.getElementById(btn5);
  property.style.border ="none";
}

function selectareCategorie(indcat){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "setareIndexCat.php?indexCategorie=" + indcat, true);
  xhttp.send();
}
</script>


<?php

include("sessions.php");

?>


<h1>Va rugam selectati categoria de permis:</h1>
<div class="Diviziuni">
<button id="A" onclick="setColorA('A','B','C','D','E');selectareCategorie(0);">A, A1, A2, AM</button>
<button id="B" onclick="setColorA('B','A','C','D','E');selectareCategorie(1);">B, B1</button>
<button id="C" onclick="setColorA('C','A','B','D','E');selectareCategorie(2);">C, C1</button>
<button id="D" onclick="setColorA('D','A','B','D','E');selectareCategorie(3);">D, D1</button>
<button id="E" onclick="setColorA('E','B','C','A','E');selectareCategorie(4);">E</button>
</div>
<div>
<button class="buton" onclick="document.location='test.php'">Incepe testul</button>
<button class="buton" onclick="document.location='navbar.html'">Inapoi la pagina principala</button>
</div>

<footer class="homeF">Good bye!</footer>

</body>
</html>