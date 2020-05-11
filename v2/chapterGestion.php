<?php
require_once("scraping_legislatieAng.php");
$indexChap=$_GET['Chapter'];
$obiect=new ScrapingAng($indexChap);

echo $obiect->returneaza_capitol();






?>