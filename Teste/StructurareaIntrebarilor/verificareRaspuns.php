<?php

$q = $_REQUEST["varianteAleseIntrebare"];

if(!isset($_SESSION)) { 
    session_start();
}


//echo $q;

$_SESSION['raspunsCorectIntrebare'] = 1;
if(strstr($q, 'pA')==false && $_SESSION['raspunsVariantaA']==1){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}
if(strstr($q, 'pB')==false && $_SESSION['raspunsVariantaB']==1){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}
if(strstr($q, 'pC')==false && $_SESSION['raspunsVariantaC']==1){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}
if(strstr($q, 'pA') && $_SESSION['raspunsVariantaA']==0){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}
if(strstr($q, 'pB') && $_SESSION['raspunsVariantaB']==0){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}
if(strstr($q, 'pC') && $_SESSION['raspunsVariantaC']==0){
    $_SESSION['raspunsCorectIntrebare'] = 0;
}


//echo $_SESSION['raspunsVariantaA'];
//echo $_SESSION['raspunsVariantaB'];
//echo $_SESSION['raspunsVariantaC'];
if($_SESSION['raspunsCorectIntrebare']==1){
    //echo "Ati raspuns corect";
    $_SESSION['raspunsuriCorecte'] += 1;
}
else {
    //echo "Ati raspuns gresit";
    $_SESSION['raspunsuriGresite'] += 1;
}
?>