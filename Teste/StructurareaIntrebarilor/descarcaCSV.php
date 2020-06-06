<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");
ob_start();
require("intrebare.php");
$file1 = ob_get_contents();
ob_clean();

error_reporting(0);
ini_set('display_errors', 0);

$csvName = "../../Teste/StructurareaIntrebarilor/" . $_SESSION['login_user'] . "_test.csv";
echo $csvName;
?>