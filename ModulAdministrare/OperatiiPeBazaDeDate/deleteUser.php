<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");

$username = $_REQUEST["q"];

$sql = "DELETE FROM user WHERE username = '" . $username . "'";
$result = mysqli_query($db,$sql);
?>