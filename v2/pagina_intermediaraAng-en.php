<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Pagina intermediara</title>
<link rel="stylesheet" href="paginaintermediara.css">
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
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
 $indx=0;
require_once("signScraperAng.php");
$ceva=new signScrapperAng();


for($i=1;$i<=18;$i++)
{

 
  $string="BT".$i;
if(isset($_POST[$string])  and $_SERVER['REQUEST_METHOD'] == "POST")
{
$_SESSION['i1']=$i;
 

}}
$indx=$_SESSION['i1'];

$ceva->currentSignTable($indx);

  
$variab=$ceva->getCurrentImg();


echo "<form action='pagina_indicatoareAng-en.php' method='POST'>";
echo "<div class='container'>";
for($j=0;$j<count($variab);$j++)
echo "<button name='R".$j."'>".$variab[$j]."</button>"."</br>";
echo "</div>";
echo"</form>";




?>





	<footer class='norisF'>Good bye!</footer>
</body>
</html>