<?php

if(!isset($_SESSION)) { 
    session_start();
    $_SESSION['raspunsuriCorecte']=0;
    $_SESSION['raspunsuriGresite']=0;
    $_SESSION['refresh']=0;
}
$_SESSION['raspunsuriCorecte']=0;
$_SESSION['raspunsuriGresite']=0;
$_SESSION['refresh']=0;
$_SESSION['indexCat'] = $_REQUEST['indexCategorie'];
?>