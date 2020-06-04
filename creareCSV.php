<?php

ob_start();
require("intrebare.php");
$file1 = ob_get_contents();
ob_clean();


if($_SESSION['raspunsuriCorecte']==0 && $_SESSION['raspunsuriGresite']==0){
    $list = array (
        array('Intrebare', 'VariantaA', 'VariantaB', 'VariantaC' , 'RaspunsCorect')
    );
    
    $csvName = $_SESSION['login_user'] . "_test.csv";
    $fp = fopen($csvName, 'w');
    
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}

?>