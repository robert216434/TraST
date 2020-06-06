<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");

if(!isset($_SESSION)) { 
    session_start();
   }
$user = $_SESSION['login_user'];
$result = mysqli_query($db,"SELECT legislatie FROM user WHERE username= '$user' ");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//$row['legislatie']

require_once("../Scrapere/scraperLegislatieRomania.php");
$obiect=new ScrapingRo();
$indexCap=$_GET['Capitol'];
$capitol=$obiect->get_Chapter($indexCap);

$string = $row['legislatie'];
if($string[$indexCap]=='0'){
    $string[$indexCap]='1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' ");
    $result = mysqli_query($db,"UPDATE user SET legislatie= '$string' WHERE username= '$user' ");
}
$indexString=0;

$capitolString="";
$ok=true;
while($ok==true)
{
if($indexString==0){

    $capitolString=$capitolString.substr($capitol,0,strpos($capitol,"Articolul",$indexString));


}
$indexString=strpos($capitol,"Articolul",$indexString);
$ok=$indexString;
if($ok==false){

    $capitolString=$capitolString."<p class='articol'>".substr($capitol,$indexIntermediarString)."</p>";


}
else{
$indexIntermediarString=strpos($capitol,"Articolul",$indexString+1);
$ok=$indexIntermediarString;
if($ok==false){

    $capitolString=$capitolString."<p class='articol'>".substr($capitol,$indexString)."</p>";


}
else{

    $capitolString=$capitolString."<p class='articol'>".substr($capitol,$indexString,$indexIntermediarString-$indexString)."</p>";
    $indexString=$indexIntermediarString;
}



}
}

echo $capitolString;
?>