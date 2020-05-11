<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Pagina indicatoare</title>
<link rel="stylesheet" href="paginaindicatoare.css">
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
require_once("signScraperRo.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$cevaa=new signScrapperRo();
$i=$_SESSION['i'];
$cevaa->setCurrentTable($i);
$explicatii=$cevaa->getExplicationsArray();
$refresh=false;
$var=$_SESSION['var'];

for($i=1;$i<count($var);$i++)
 if(isset($_POST["F".$i]) and $_SERVER['REQUEST_METHOD'] == "POST")
 {
   
 echo "<div class='container1'>";
  $index=$i;
  echo $var[$i]."</br>".$explicatii[$i];
  $_SESSION['index']=$index;
  echo "</div>";
  $refresh=true;
 }


if(isset($_POST["Back"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  if($_SESSION['index']-1>=count($var) || $_SESSION['index']-1<1)
  {
    echo "<p class='error'> </br>"."Ne pare rau, dar nu se pot accesa mai multe indicatoare decat exista!"."</br> </p>";

  }
  else{
    echo "<div class='container1'>";
echo $var[$_SESSION['index']-1]."</br>".$explicatii[$_SESSION['index']-1];
$_SESSION['index']=$_SESSION['index']-1;
echo "</div>";
$refresh=true;
  }
}
if(isset($_POST["Next"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{if($_SESSION['index']+1>=count($var) || $_SESSION['index']+1<1)
  {
    echo "<p class='error'> </br>"."Ne pare rau, dar nu se pot accesa mai multe indicatoare decat exista!"."</br></p>";

  }
  else{
    echo "<div class='container1'>";
  echo $var[$_SESSION['index']+1]."</br>".$explicatii[$_SESSION['index']+1];
  $_SESSION['index']=$_SESSION['index']+1;
  echo "</div>";
  $refresh=true;
}
}

if($refresh==false){

  echo "<div class='container1'>";
  echo $var[$_SESSION['index']]."</br>".$explicatii[$_SESSION['index']];
  echo "</div>";
}



?>


<div class="NBQ">
  <form action="pagina_indicatoare.php" method="POST"> 
  <button name="Back">Inapoi</button>
  <button name="Next" >Urmatorul</button>
    </form>

	  <button onclick="document.location='pagina_intermediara.php'">Inapoi la pagina cu semne</button>

	</div>

<footer class='norisF'>Good bye!</footer>
</body>
</html>