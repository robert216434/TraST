<?php
ob_start();
require("intrebare.php");
$file1 = ob_get_contents();
ob_clean();

$list = array (
    array($_SESSION['testIntrebareText']->innertext, $_SESSION['textVariantaA'], $_SESSION['textVariantaB'], $_SESSION['textVariantaC'] , $_SESSION['corect'])
);
$csvName = $_SESSION['login_user'] . "_test.csv";
$fp = fopen($csvName, 'a');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
?>