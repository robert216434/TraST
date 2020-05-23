<?php

include("sessions.php");
$_SESSION['logat']=0;
$_SESSION['login_user']="";
session_destroy();

header("location: navbar.html");
?>