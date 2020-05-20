<?php

include('config.php');
if(!isset($_SESSION)) { 
    session_start();
   }
$user = $_SESSION['login_user'];
$result = mysqli_query($db,"SELECT legislatie FROM user WHERE username= '$user' ");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//$row['legislatie']

require_once("scraping_legislatie.php");
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

echo $capitol;

?>