<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<title>Road signs</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<form action="pagina_comparare.php" method="POST">

<p>Optiuni valabile:Romania,Austria,UK,Franta,Estonia,Danemarca,Cehia.</p>
<label for="cname">Tara 1:</label><br>
  <input type="text" id="cname" name="cname" ><br>
  <label for="c1name">Tara 2:</label><br>
  <input type="text" id="c1name" name="c1name" ><br><br>
  <p>Compara dupa:</p>
   </br>
   <input type="radio" id="1" name="categorie" value="1">
   <label for="1">Indicatoare de prioritate</label>
   <input type="radio" id="2" name="categorie" value="2">
   <label for="2">Indicatoare de avertizare</label>
   <input type="radio"  id="3"name="categorie" value="3">
   <label for="3">Indicatoare de interzicere</label>
   <input type="radio"  id="4" name="categorie" value="4">
   <label for="4">Sfarsitul interzicerii</label>
   <input type="radio" id="5" name="categorie" value="5">
   <label for="5">Limite de viteza</label><br>
   <input type="radio" id="6" name="categorie" value="6">
   <label for="6">Indicatoare de obligare</label>
   <input type="radio" id="7" name="categorie" value="7">
   <label for="7">Indicatoare pentru reguli speciale</label>
   <input type="radio" id="8" name="categorie" value="8">
   <label for="8">Indicatii</label><br>
   <input type="radio" id="9" name="categorie" value="9">
   <label for="9">Vamale</label>
   <input type="radio" id="10" name="categorie" value="10">
   <label for="10">Pentru intrarea in orase</label>
   <input type="radio" id="11" name="categorie" value="11">
   <label for="11">Puncte de interes</label><br>
  <input type="submit" value="Confirma" name="Confirma">
  <input type="reset" value="Reseteaza">
 


</form>

<button onclick="document.location='semne_de_circulatie.html'">Inapoi</button>
<?php
require_once("Scraping_Semne_Ro.php");
if(isset($_POST["Confirma"])  and $_SERVER['REQUEST_METHOD'] == "POST")
{
$okey=true;


if(isset($_POST["categorie"])){$okey=false;$position=$_POST['categorie'];}


if($okey==true){

echo "</br>"."Nu ati ales un criteriu de comparare"."</br>";

}
else{
$c1=$_POST['cname'];
$c2=$_POST['c1name'];
if($c1==$c2){echo "</br> Trebuie sa comparati 2 tari diferite </br>";}
else{
if($c1=="Danemarca")$c1="Denmark";
if($c2=="Danemarca")$c2="Denmark";
if($c1=="Cehia")$c1="Czech Republic";
if($c2=="Cehia")$c2="Czech Republic";
if($c1=="Franta")$c1="France";
if($c2=="Franta")$c2="France";
$countries=array("Austria","Estonia","Denmark","Czech Republic","Romania","France","UK");

$ok=true;

for($in=0;$in<count($countries);$in++)
if($countries[$in]==$c1) $ok=false;

if($ok==true) {
    echo "</br>"."Ne pare rau,dar nu ati ales una dintre tarile specificate!"."</br>";
}else{

$ok=true;
for($in=0;$in<count($countries);$in++)
if($countries[$in]==$c1) $ok=false;

if($ok==true) {
    echo "</br>"."Ne pare rau,dar nu ati ales una dintre tarile specificate"."</br>";
}
else{

$obiect=new scrapperSigns();
$obiect->getSigns($c1,$c2,$position);

$var=$obiect->getComparations();
$var1=$obiect->getComparations1();
$var2=$obiect->getComparations2();
if($c1=="Denmark")$c1="Danemarca";
if($c2=="Denmark")$c2="Danemarca";
if($c1=="Czech Republic")$c1="Cehia";
if($c2=="Czech Republic")$c2="Cehia";
if($c1=="France")$c1="Franta";
if($c2=="France")$c2="Franta";
echo "</br>";
echo $c1.":"."</br>";
if($var!=null)
foreach($var as $vr)
echo $vr." ";

echo "</br>";
echo $c2.":"."</br>";
if($var1!=null)
foreach($var1 as $vr1)
echo $vr1." ";

echo "</br>";
echo "Legenda:"."</br>";
foreach($var2 as $vr2)
echo $vr2."</br>";
}
}


}

}
}
?>



</body>