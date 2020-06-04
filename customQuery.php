<?php
include("config.php");

$sql = $_REQUEST["q"];
//echo $sql;

$result = mysqli_query($db,$sql);
$x=0;
while($row = mysqli_fetch_array($result)){
    while($row[$x]!=""){
        echo $row[$x];
        echo " ";
        $x++;
    }
    $x=0;
}

?>