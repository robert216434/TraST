<?php

if(!isset($_SESSION)) { 
    session_start();
  }
  $conditiePierdere = 5;
  $conditieCastig = 21;
  if($_SESSION['categorieTestAleasa']==0){
    $conditiePierdere = 4;
    $conditieCastig = 17;
  }
  if($_SESSION['categorieTestAleasa']==4){
    $conditiePierdere = 3;
    $conditieCastig = 9;
  }
  if($_SESSION['raspunsuriGresite'] >= $conditiePierdere){
    echo 2;
  }
  if($_SESSION['raspunsuriCorecte'] >= $conditieCastig){
    include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");
    $user = $_SESSION['login_user'];
  
    $sqlpunctaj = mysqli_query($db,"SELECT punctaj FROM user WHERE username = '$user'");
    $punctaj = mysqli_fetch_row($sqlpunctaj);
    
    $punctaj[0] = $punctaj[0] + 2;
    
    mysqli_query($db,"UPDATE user SET punctaj='$punctaj[0]' WHERE username = '$user'");

    echo 1;
  }
?>