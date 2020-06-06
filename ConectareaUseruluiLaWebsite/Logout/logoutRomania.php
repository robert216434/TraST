<?php

include("../SesiuniSiConfig/sesiuniActiveRomania.php");
$_SESSION['logat']=0;
$_SESSION['login_user']="";
session_destroy();

header("location: ../../HomePages/RomaniaHomePage.html");
?>