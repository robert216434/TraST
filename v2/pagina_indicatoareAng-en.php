<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Pagina indicatoare</title>
<link rel="stylesheet" href="paginaindicatoare.css">
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
require_once("signScraperAng.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$refresh=false;
$cevaa=new signScrapperAng();
$i1=$_SESSION['i1'];
$cevaa->currentSignTable($i1);
$explicatii1=$cevaa->getCurrentExp();
$var1=$cevaa->getCurrentImg();

for($i=0;$i<count($var1);$i++)
 if(isset($_POST["R".$i]) and $_SERVER['REQUEST_METHOD'] == "POST")
 {
   

  $index1=$i;
  echo "<div class='container1'>";
  echo $var1[$i]."</br>".$explicatii1[$i];
  echo "</div>";
  $_SESSION['index1']=$index1;
  $refresh=true;
 }

if(isset($_POST["Back1"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  if($_SESSION['index1']-1>=count($var1) || $_SESSION['index1']-1<1)
  {
    echo "<p class='error'> </br>"."We are sorry,but you've reached the limit of road signs on this page"."</br> </p>";

  }
  else{
    echo "<div class='container1'>";
echo $var1[$_SESSION['index1']-1]."</br>".$explicatii1[$_SESSION['index1']-1];
echo "</div>";
$_SESSION['index1']=$_SESSION['index1']-1;
$refresh=true;
  }
}
if(isset($_POST["Next1"]) and $_SERVER['REQUEST_METHOD'] == "POST")
{if($_SESSION['index1']+1>=count($var1) || $_SESSION['index1']+1<1)
  {
    echo "<p class='error'> </br>"."We are sorry,but you've reached the limit of road signs on this page"."</br> </p>";

  }
  else{echo "<div class='container1'>";
  echo $var1[$_SESSION['index1']+1]."</br>".$explicatii1[$_SESSION['index1']+1];
  echo "</div>";
  $_SESSION['index1']=$_SESSION['index1']+1;
  $refresh=true;}
}

if($i1==1){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex] == '0'){
    $string[$stringIndex] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==2){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+87] == '0'){
    $string[$stringIndex+87] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==3){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+134] == '0'){
    $string[$stringIndex+134] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==4){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+146] == '0'){
    $string[$stringIndex+146] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==5){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+152] == '0'){
    $string[$stringIndex+152] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==6){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+168] == '0'){
    $string[$stringIndex+168] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==7){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+184] == '0'){
    $string[$stringIndex+184] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==8){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+187] == '0'){
    $string[$stringIndex+187] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==9){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+201] == '0'){
    $string[$stringIndex+201] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==14){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+232] == '0'){
    $string[$stringIndex+232] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==15){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+238] == '0'){
    $string[$stringIndex+238] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==16){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+256] == '0'){
    $string[$stringIndex+256] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==17){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+263] == '0'){
    $string[$stringIndex+263] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}

if($i1==18){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semneAnglia FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semneAnglia'];

  $stringIndex = $_SESSION['index1'];
  if($string[$stringIndex+270] == '0'){
    $string[$stringIndex+270] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semneAnglia= '$string' WHERE username= '$user' ");
  }
}


if($refresh==false){

echo "<div class='container1'>";
echo $var1[$_SESSION['index1']]."</br>".$explicatii1[$_SESSION['index1']];
echo "</div>";



}


?>
<div class="NBQ">
  <form action="pagina_indicatoareAng-en.php" method="POST"> 
  <button name="Back1">Back</button>
    <button name="Next1" >Next</button>
</form>

	  <button onclick="document.location='pagina_intermediaraAng-en.php'">Back to the road sign page</button>

	</div>
<footer class='norisF'>Good bye!</footer>

</body>
</html>