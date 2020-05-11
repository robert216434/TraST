<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<link rel="stylesheet" href="butoane.css">
<link rel="stylesheet" href="leg.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="leg">

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

<div class="butoane1">
   
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



    <footer class="homeF">Good Bye!</footer>


</body>


</html>
