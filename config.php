<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'userdb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   //$db = new PDO('mysql:host='.DB_SEVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
?>
