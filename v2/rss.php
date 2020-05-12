<?php

function connect() {

    return new PDO('mysql:host=localhost;dbname=userdb', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = connect();

$sql = 'SELECT * FROM user ORDER BY punctaj DESC';

$query = $pdo->prepare($sql);

$query->execute();

$rows = $query->fetchAll();

$users = '<?xml version="1.0" encoding="UTF-8" ?>';

$users .= '<rss version="2.0">';

$users .= '<channel>';

$users .= '<username>Username</username>';

$users .= '<punctaj>Punctaj</punctaj>';


foreach ($rows as $row) {

    $users .= '<item>';

    $users .= '<username>'.$row['username'].'</username>';

    $users .= '<punctaj>'.$row['punctaj'].'</punctaj>';


    $users .= '</item>';

}

$users .= '</channel>';

$users .= '</rss> '; 

header('Content-Type: application/xml');

echo $users;

?>