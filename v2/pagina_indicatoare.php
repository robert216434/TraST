<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Pagina indicatoare</title>
<link rel="stylesheet" href="paginaindicatoare.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  
  <?php
  require_once('barasus.html');
  ?>

<?php
require_once("signScraperRo.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$cevaa=new signScrapperRo();
$j=$_SESSION['i'];
$cevaa->setCurrentTable($j);
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

if($j==1){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex-1] == '0'){
    $string[$stringIndex-1] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==2){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+48] == '0'){
    $string[$stringIndex+48] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==3){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+54] == '0'){
    $string[$stringIndex+54] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==4){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+100] == '0'){
    $string[$stringIndex+100] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==5){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+115] == '0'){
    $string[$stringIndex+115] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==6){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+152] == '0'){
    $string[$stringIndex+152] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==7){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+202] == '0'){
    $string[$stringIndex+202] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
  }
}

if($j==8){
  include('config.php');
  $user = $_SESSION['login_user'];
  //echo "asd";
  $result = mysqli_query($db,"SELECT semne FROM user WHERE username= '$user' ");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $string = $row['semne'];

  $stringIndex = $_SESSION['index'];
  if($string[$stringIndex+217] == '0'){
    $string[$stringIndex+217] = '1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET semne= '$string' WHERE username= '$user' ");
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
	<script>
function ceas ( )
{
  var timp= new Date ( );

  var ore = timp.getHours ( );
  var minute = timp.getMinutes ( );
  var secunde = timp.getSeconds ( );

if(minute<10) minute="0" + minute;
if(secunde<10) secunde="0" + secunde;
if(ore<10)ore="0"+ ore;
  
  var currentTimeString = ore + ":" + minute + ":" + secunde + " " ;
var data=timp.getDate();
var luni=timp.getMonth()+1;
var an=timp.getFullYear();
currentTimeString="Data: "+ an+" / "+luni+" / "+data+" Ora: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
<footer class='norisF'>La revedere!</br>
<span id="ceas"></span>
</footer>
</body>
</html>