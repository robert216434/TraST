<?php

require_once('../../simple_html_dom.php');
define('URL', 'http://www.euroavocatura.ro/print2.php?print2=lege&idItem=1344'); // URL-ul sitului oferind date
class ScrapingRo
{ var $cArray;
  
function __construct(){

  $html = file_get_html(URL); 
  $body =$html-> getElementsByTagName('body');
  $span=$body->getElementsByTagName('span');
foreach($span as $section)
if($section->hasAttribute("class"))
{
   if($section->getAttribute("class")=="content_material") $capitole=$section;
          
}

  $chapters=$capitole->getElementsByTagName('p');

for($i=1;$i<count($chapters);$i++)
  $cArray1[]=$chapters[$i];
 
$indexes[]=0;

for($t=1;$t<count($cArray1);$t++){

$strong=$cArray1[$t]->getElementsByTagName('strong');
$ceva=(string)$strong[0];






$result=strpos($ceva,"CAPITOLUL");



if(strpos($ceva,"CAPITOLUL")!=false){

$indexes[]=$t;

}

}

for($i=0;$i<9;$i++)
{$obiect=new DomDocument();
for($j=$indexes[$i];$j<$indexes[$i+1];$j++)
{$altceva=$obiect->createCDATASection($cArray1[$j]->innertext."<br></br>");
  $obiect->appendChild($altceva);

} 

$this->cArray[]=$obiect;
}

$obiect=new DomDocument();
$altceva=$obiect->createCDATASection($cArray1[$indexes[9]]->innertext."<br></br>");
$obiect->appendChild($altceva);
$this->cArray[]=$obiect;
}


function get_Chapter($index)
{
return $this->cArray[$index]->textContent;

}



}
?>