<?php

if(!isset($_SESSION)) { 
    session_start();
  }
  if($_SESSION['raspunsuriGresite'] >= 5){
    echo 2;
    //header("aipicat.php");
    
    //$_SESSION['raspunsuriGresite'] = 0;
    //$_SESSION['raspunsuriCorecte'] = 0;
  }
  
  if($_SESSION['raspunsuriCorecte'] + $_SESSION['raspunsuriGresite'] >= 26){
    echo 1;
    //header("aitrecut.php");
    //$_SESSION['raspunsuriGresite'] = 0;
    //$_SESSION['raspunsuriCorecte'] = 0;
  
    include("../../SesiuniSiConfig/sesiuniActiveRomania.php");
    $user = $_SESSION['login_user'];
  
    $sqlpunctaj = mysqli_query($db,"SELECT punctaj FROM user WHERE username = '$user'");
    $punctaj = mysqli_fetch_row($sqlpunctaj);
    
    $punctaj[0] = $punctaj[0] + 2;
    
    mysqli_query($db,"UPDATE user SET punctaj='$punctaj[0]' WHERE username = '$user'");
  }
?>