<?php

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");

$username = $_POST["usr"];
$parola = $_POST["par"];
$email = $_POST["ema"];
$nume = $_POST["num"];
$localitate = $_POST["lcl"];
$datanasterii = $_POST["dtn"];
$telefon = $_POST["tel"];
$punctaj = $_POST["pct"];

$sql = "UPDATE user SET ";

if($parola!=""){
$sql .= "password='" . $parola . "'";
}

if($punctaj!=""){
    if($parola!="")
        $sql .= ",";
$sql .= "punctaj='" . $punctaj . "'";
}

if($nume!=""){
    if($parola!="" || $punctaj!="")
        $sql .= ",";
$sql .= "nume='" . $nume . "'";
}

if($localitate!=""){
    if($parola!="" || $punctaj!="" || $nume!="")
        $sql .= ",";
$sql .= "localitate='" . $localitate . "'";
}

if($email!=""){
    if($parola!="" || $punctaj!="" || $nume!="" || $localitate!="")
        $sql .= ",";
$sql .= "email='" . $email . "'";
}

if($datanasterii!=""){
    if($parola!="" || $punctaj!="" || $nume!="" || $localitate!="" || $email!="")
        $sql .= ",";
$sql .= "datanasterii='" . $datanasterii . "'";
}

if($telefon!=""){
    if($parola!="" || $punctaj!="" || $nume!="" || $localitate!="" || $email!="" || $telefon!="")
        $sql .= ",";
$sql .= "telefon='" . $telefon . "'";
}

$sql .= " WHERE username='" . $username . "'";
echo $sql;
$result = mysqli_query($db,$sql);
?>