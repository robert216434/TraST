<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Pagina intermediara</title>
<link rel="stylesheet" href="paginaintermediara.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

<header style="margin:0px;background-image: url(imagini/Anglia.png);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
  </header>
  
  <?php
  require_once('barasus-en.html');
  ?>
	

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
currentTimeString="Date: "+ an+" / "+luni+" / "+data+" Time: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
	<footer class='norisF'>Good bye!</br><span id="ceas"></span></footer>
</body>
</html>