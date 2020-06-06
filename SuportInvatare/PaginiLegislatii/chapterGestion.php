<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");
if(!isset($_SESSION)) { 
    session_start();
   }
$user = $_SESSION['login_user'];
$result = mysqli_query($db,"SELECT legislatieAnglia FROM user WHERE username= '$user' ");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//$row['legislatie']

require_once("../Scrapere/scraperLegislatieAnglia.php");
$indexChap=$_GET['Chapter'];
$obiect=new ScrapingAng($indexChap);

$string = $row['legislatieAnglia'];
if($string[$indexChap]=='0'){
    $string[$indexChap]='1';
    $result = mysqli_query($db,"SELECT punctaj FROM user WHERE username= '$user' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $punctaj = $row['punctaj'];
    $punctaj = $punctaj + 1;
    $result = mysqli_query($db,"UPDATE user SET punctaj= '$punctaj' WHERE username= '$user' "); 
    $result = mysqli_query($db,"UPDATE user SET legislatieAnglia= '$string' WHERE username= '$user' ");
}

echo $obiect->returneaza_capitol();
?>