<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Pagina indicatoare</title>
<link rel="stylesheet" href="paginaindicatoare.css">
<link rel="stylesheet" href="butoane.css">
<link rel="stylesheet" href="semafor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 );changeButtonColor('Back');setInterval(function() { changeButtonColor('Back'); },5100);changeButtonColor('Next');setInterval(function() { changeButtonColor('Next'); },5100)
;changeButtonColor('BackB');setInterval(function() { changeButtonColor('BackB'); },5100)">

	
 
<div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">
 
<?php

require_once("signScraperRo.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once("barasus.html");
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
  <button id="Back" name="Back">Inapoi</button>
  <button id="Next" name="Next" >Urmatorul</button>
  </form>
    
	  <button id="BackB" onclick="document.location='pagina_intermediara.php'">Inapoi la pagina cu semne</button>

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



<script>
   function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }
async function changeButtonColor(butonId)
{
var buttons=document.getElementsByClassName("butone");    





    await sleep(150);
document.getElementById(butonId).style.opacity=0.9;
await sleep(150);
document.getElementById(butonId).style.opacity=0.8;
await sleep(150);
document.getElementById(butonId).style.opacity=0.7;
await sleep(150);
document.getElementById(butonId).style.opacity=0.6;
await sleep(150);
document.getElementById(butonId).style.opacity=0.5;
await sleep(150);
document.getElementById(butonId).style.opacity=0.4;
await sleep(150);
document.getElementById(butonId).style.opacity=0.3;
await sleep(150);
document.getElementById(butonId).style.opacity=0.2;
await sleep(150);

if(document.getElementById(butonId).style.backgroundColor=="darkred") document.getElementById(butonId).style.backgroundColor="yellow";
else{

   if( document.getElementById(butonId).style.backgroundColor=="yellow")document.getElementById(butonId).style.backgroundColor="blue";
   else document.getElementById(butonId).style.backgroundColor="darkred";
}
await sleep(150);

document.getElementById(butonId).style.opacity=0.3;
await sleep(150);
document.getElementById(butonId).style.opacity=0.4;
await sleep(150);
document.getElementById(butonId).style.opacity=0.5;
await sleep(150);
document.getElementById(butonId).style.opacity=0.6;
await sleep(150);
document.getElementById(butonId).style.opacity=0.7;
await sleep(150);
document.getElementById(butonId).style.opacity=0.8;
await sleep(150);
document.getElementById(butonId).style.opacity=1;
await sleep(150);



}

  </script>
<footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

</div>
</body>
</html>