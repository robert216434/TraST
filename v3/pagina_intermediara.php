<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Pagina intermediara</title>
<link rel="stylesheet" href="paginaintermediara.css">
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
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
 
require_once("signScraperRo.php");
$ceva=new signScrapperRo();

for($i=1;$i<=7;$i++)
{

 
  $string="D".$i;
if(isset($_POST[$string])  and $_SERVER['REQUEST_METHOD'] == "POST")
{
  $ceva->setCurrentTable($i);

  
  $var=$ceva->getImagesArray();
  $exp=$ceva->getExplicationsArray();
  
$_SESSION['var'] = $var;
$_SESSION['i']=$i;
 

}}
$var=$_SESSION['var'];


echo "<form action='pagina_indicatoare.php' method='POST'>";
echo "<div class='container'>";
for($j=1;$j<count($var);$j++)
echo "<button name='F".$j."'>".$var[$j]."</button>"."</br>";
echo "</div>";
echo"</form>";




?>

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

<footer class='norisF'>Good bye!</br>
<span id="ceas"></span>

</footer>
</body>
</html>