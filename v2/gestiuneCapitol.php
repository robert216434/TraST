<?php

require_once("scraping_legislatie.php");
$obiect=new ScrapingRo();
$indexCap=$_GET['Capitol'];
$capitol=$obiect->get_Chapter($indexCap);
echo $capitol;

?>