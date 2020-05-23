<?php

$q = $_REQUEST["verifRasp"];
ob_start();
require("intrebare.php");
$file1 = ob_get_contents();
ob_clean();
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


//csv

if($_SESSION['raspunsuriCorecte']==0 && $_SESSION['raspunsuriGresite']==0){
    $list = array (
        array('Intrebare', 'VariantaA', 'VariantaB', 'VariantaC', 'VarianteAlese' , 'RaspunsCorect')
    );
    
    $csvName = $_SESSION['login_user'] . "_test.csv";
    $fp = fopen($csvName, 'w');
    
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
    
}

$list = array (
    array($_SESSION['testIntrebareText']->innertext, $_SESSION['textVariantaA'], $_SESSION['textVariantaB'], $_SESSION['textVariantaC'], $q , $_SESSION['corect'])
);
$csvName = $_SESSION['login_user'] . "_test.csv";
$fp = fopen($csvName, 'a');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);

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