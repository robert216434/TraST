<?php

include("config.php");

$username = $_REQUEST["usr"];
$parola = $_REQUEST["par"];
$email = $_REQUEST["ema"];
$nume = $_REQUEST["num"];
$localitate = $_REQUEST["lcl"];
$datanasterii = $_REQUEST["dtn"];
$telefon = $_REQUEST["tel"];
$punctaj = $_REQUEST["pct"];
$intrebariparcuse = $_REQUEST["itr"];

$sql = "UPDATE user SET ";
$sql .= "" . $username . "'";

$sql .= ",";
$sql .= "'" . $parola . "'";

$sql .= ",";
$sql .= "'" . $email . "'";

$sql .= ",";
$sql .= "'" . $nume . "'";

$sql .= ",";
$sql .= "'" . $localitate . "'";

$sql .= ",";
$sql .= "'" . $datanasterii . "'";

$sql .= ",";
$sql .= "'" . $telefon . "'";

$sql .= ")";
echo $sql;
$result = mysqli_query($db,$sql);

?>