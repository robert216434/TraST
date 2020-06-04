<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Pagina intermediara</title>
<link rel="stylesheet" href="paginaintermediara.css">
<link rel="stylesheet" href="butoane.css">
<link rel="stylesheet" href="semafor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">


  <div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">

<?php
 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
 require_once('barasus.html');
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


$indexPagIntermediara=$_SESSION['i'];

if($indexPagIntermediara==1){

echo "<h1 class='titluCapitol'>INDICATOARE DE AVERTIZARE</h1>";

}
if($indexPagIntermediara==2){

  echo "<h1 class='titluCapitol'>INDICATOARE DE PRIORITATE</h1>";
  
  }

  if($indexPagIntermediara==3){

    echo "<h1 class='titluCapitol'>INDICATOARE DE RESTRICTIE SAU INTERDICTIE</h1>";
    
    }

    if($indexPagIntermediara==4){

      echo "<h1 class='titluCapitol'>INDICATOARE DE OBLIGARE</h1>";
      
      }
         
      if($indexPagIntermediara==5){

        echo "<h1 class='titluCapitol'>INDICATOARE ORIENTATIVE</h1>";
        
        }
        
        if($indexPagIntermediara==6){

          echo "<h1 class='titluCapitol'>INDICATOARE DE INFORMARE</h1>";
          
          }
          if($indexPagIntermediara==7){

            echo "<h1 class='titluCapitol'>PANOURI ADITIONALE</h1>";
            
            }
                      
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