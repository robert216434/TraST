<?php

include('sessions.php');
ob_start();
require("intrebare.php");
$file1 = ob_get_contents();
ob_clean();

$csvName = $_SESSION['login_user'] . "_test.csv";
echo $csvName;

?>