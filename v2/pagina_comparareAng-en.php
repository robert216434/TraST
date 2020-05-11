<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Road signs</title>
<link rel="stylesheet" href="semne_de_circulatie.css">
<link rel="stylesheet" href="butoane.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<form action="pagina_comparareAng-en.php" method="POST">

<p>Available options:Romania,Austria,UK,France,Estonia,Denmark,Czech Republic.</p>
<label for="fname">Country 1:</label><br>
  <input type="text" id="fname" name="fname" ><br>
  <label for="lname">Country 2:</label><br>
  <input type="text" id="lname" name="lname" ><br><br>
  <p>Compare by:</p>
   </br>
   <input type="radio" id="1" name="category" value="1">
   <label for="1">Priority signs</label>
   <input type="radio" id="2" name="category" value="2">
   <label for="2">Warning signs</label>
   <input type="radio"  id="3"name="category" value="3">
   <label for="3">Prohibitory signs</label>
   <input type="radio"  id="4" name="category" value="4">
   <label for="4">End of prohibition signs</label>
   <input type="radio" id="5" name="category" value="5">
   <label for="5">Speed limit signs</label><br>
   <input type="radio" id="6" name="category" value="6">
   <label for="6">Mandatory signs</label>
   <input type="radio" id="7" name="category" value="7">
   <label for="7">Special regulation signs</label>
   <input type="radio" id="8" name="category" value="8">
   <label for="8">Indication signs</label><br>
   <input type="radio" id="9" name="category" value="9">
   <label for="9">Border Crossing</label>
   <input type="radio" id="10" name="category" value="10">
   <label for="10">Built-up Area Limits</label>
   <input type="radio" id="11" name="category" value="11">
   <label for="11">Checkpoints</label><br>
  <input type="submit" value="Submit" name="Submit">
  <input type="reset" >
 


</form>

<button onclick="document.location='semne_de_circulatieAng-en.html'">Back</button>
<?php
require_once("Scraping_Semne_Ro.php");
if(isset($_POST["Submit"])  and $_SERVER['REQUEST_METHOD'] == "POST")
{
$okey=true;


if(isset($_POST["category"])){$okey=false;$position=$_POST['category'];}


if($okey==true){

echo "</br>"."You didn't select a comparison criteria!"."</br>";

}
else{
$c1=$_POST['fname'];
$c2=$_POST['lname'];
if($c1==$c2) echo "</br> You can't compare the same country </br>";
else{
$countries=array("Austria","Estonia","Denmark","Czech Republic","Romania","France","UK");

$ok=true;

for($in=0;$in<count($countries);$in++)
if($countries[$in]==$c1) $ok=false;

if($ok==true) {
    echo "</br>"."We are sorry,but you didn't choose one of the specified countries"."</br>";
}else{

$ok=true;
for($in=0;$in<count($countries);$in++)
if($countries[$in]==$c1) $ok=false;

if($ok==true) {
    echo "</br>"."We are sorry,but you didn't choose one of the specified countries"."</br>";
}
else{

$obiect=new scrapperSigns();
$obiect->getSigns($c1,$c2,$position);

$var=$obiect->getComparations();
$var1=$obiect->getComparations1();
$var2=$obiect->getComparations2();
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
echo "Legend:"."</br>";
foreach($var2 as $vr2)
echo $vr2."</br>";

}

}
}

}
}
?>



</body>