<?php
   
require_once('../../simple_html_dom.php');

class scrapperSigns{
 private $currentSignTable=NULL;
 private $currentSignTable1=NULL;
 private $currentSignNames=NULL;

 
function getImageOnly($column)
{
  $images=NULL;
  if($column!=NULL)
{$content=$column->getElementsByTagName("a");

foreach($content as $a)
{
$img=$a->getElementsByTagName("img");
$images[]=$img[0];

}
}
return $images;

}


function getSigns($country,$country1,$position){
  $this->currentSignTable=NULL;
  $html = dlPage(); 
  $images=NULL;
  $body=$html->getElementsByTagName("body");
  $content=$body->getElementByID("content");
  $bodyContent=$content->getElementByID("bodyContent");
  $mwContent=$bodyContent->getElementByID("mw-content-text");
  $div=$mwContent->getElementsByTagName("div");
  $tables=$div[0]->getElementsByTagName("table");


    $tabs=NULL;
    foreach($tables as $tab)
    if($tab->hasAttribute("class") && $tab->getAttribute("class")=="wikitable")
     $tabs[]=$tab;$imgToAdd=NULL; $imgToAdd1=NULL;

 $cIndex=$this->getCountryIndexByName($country,$position);
  $c1Index=$this->getCountryIndexByName($country1,$position);
  
   $tbody=$tabs[$position]->getElementsByTagName("tbody");
    $rows=$tbody[0]->getElementsByTagName("tr");
 
 for($i=1;$i<count($rows)-1;$i++)
 {
   $columnF=$rows[$i]->children(0);
  $columnN=$rows[$i]->children($cIndex);
  $columnN1=$rows[$i]->children($c1Index);
 if($this->not_used($rows[$i],$country)==false){
   $images=$this->getImageOnly($columnN);} 


   if($this->not_used($rows[$i],$country1)==false){
    $images1=$this->getImageOnly($columnN1);}
  

if($images[0]!=null and $images1[0]!=null)
{

$this->currentSignTable[]=$images[0];
$this->currentSignTable1[]=$images1[0];
$this->currentSignNames[]=$columnF;


}
else{

if($images[0]==null && $images1[0]==null){}
else{  
if($images[0]!=null)
{

  $this->currentSignTable[]=$images[0];
  $this->currentSignNames[]=$columnF;

}
else{

  $this->currentSignTable[]="<img src='../../MediaContent/imagini/NotUsedSmall.png' alt='img' style='width:100px;height:50px;'/>";



}

if($images1[0]!=null)
{

  $this->currentSignTable1[]=$images1[0];
  $this->currentSignNames[]=$columnF;

}
else{

  $this->currentSignTable1[]="<img src='../../MediaContent/imagini/NotUsedSmall.png' alt='img' style='width:100px;height:50px;' />";



}

}

}







}

}
function getCountryIndexByName($country,$poz)
{
if($country=="Romania" and $poz==1) return 20;
if($country=="Romania") return 19;
if($country=="UK" and $poz==1) return 29;
if($country=="UK")return 28;
if($country=="Austria")return 1;
if($country=="Belgium")return 2;
if($country=="Czech Republic")return 3;
if($country=="Denmark")return 4;
if($country=="Estonia")return 5;
if($country=="Finland")return 6;
if($country=="France") return 7;
return -1;




}

function not_used($row,$index)
{


$child=$row->children($index);
if($child==NULL) return false;
$b=$child->getElementsByTagName("b");


if(count($b)==0) return false;
return true;


}


function getComparations()
{


 return $this->currentSignTable;


}
function getComparations1()
{


 return $this->currentSignTable1;


}
function getComparations2()
{


 return $this->currentSignNames;


}




}


function dlPage() {

  $curl = curl_init('https://en.wikipedia.org/wiki/Comparison_of_European_road_signs');
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  $str = curl_exec($curl);
  curl_close($curl);
  $dom = new simple_html_dom();
  $dom->load($str);

  return $dom;
  }
?>