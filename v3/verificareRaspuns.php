<?php

$q = $_REQUEST["verifRasp"];

if(!isset($_SESSION)) { 
    session_start();
}

$_SESSION['corect'] = 1;
if(strstr($q, 'pA')==false && $_SESSION['raspA']==1){
    $_SESSION['corect'] = 0;
}
if(strstr($q, 'pB')==false && $_SESSION['raspB']==1){
    $_SESSION['corect'] = 0;
}
if(strstr($q, 'pC')==false && $_SESSION['raspC']==1){
    $_SESSION['corect'] = 0;
}
if(strstr($q, 'pA') && $_SESSION['raspA']==0){
    $_SESSION['corect'] = 0;
}
if(strstr($q, 'pB') && $_SESSION['raspB']==0){
    $_SESSION['corect'] = 0;
}
if(strstr($q, 'pC') && $_SESSION['raspC']==0){
    $_SESSION['corect'] = 0;
}

//echo "ABC";
//echo $_SESSION['raspA'];
//echo $_SESSION['raspB'];
//echo $_SESSION['raspC'];
if($_SESSION['corect']==1){
    //echo "Ati raspuns corect";
    $_SESSION['raspunsuriCorecte'] += 1;
}
else {
    //echo "Ati raspuns gresit";
    $_SESSION['raspunsuriGresite'] += 1;
}
?>