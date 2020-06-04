<?php
require_once("simple_html_dom.php");
function dlPage() {

    $curl = curl_init('https://ro.wikipedia.org/wiki/Indicatoarele_rutiere_din_Rom%C3%A2nia');
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $str = curl_exec($curl);
    curl_close($curl);
    $dom = new simple_html_dom();
    $dom->load($str);
  
    return $dom;
    }
  


class signScrapperRo{
private $currentTableImg=null;
private $currentTableExp=null;


function setCurrentTable($index)
{
    $html = dlPage();
    $body=$html->getElementsByTagName("body");
    $content=$body->getElementByID("content");
    $bodyContent=$content->getElementByID("bodyContent");
    $contentxt=$bodyContent->getElementByID("mw-content-text");
    $tables=$contentxt->getElementsByTagName("table");
    $currentTable=$tables[$index];
    $tBody=$currentTable->getElementsByTagName("tbody");
    $tr=$tBody[0]->getElementsByTagName("tr");
     $contor=0;
    foreach($tr as $row )
    { $contor=$contor+1;
         
        if($index==2 and $contor==4)
        {
      


        
      $td=$row->getElementsByTagName("td");
      $del=$td[0]->getElementsByTagName("a");
      if($del!=null)
     { $imgs=$del[0]->GetElementsByTagName("img");


      $vrb=null;
      foreach($imgs as $img)
      {   
          $vrb=$vrb.$img."</br>";
      }
     
    
        $vrb=$vrb."</br>";
      
      $this->currentTableImg[]=$vrb;
      $this->currentTableExp[]=$td[2];
    }}
    else{




        
        $td=$row->getElementsByTagName("td");
        $del=$td[0]->getElementsByTagName("a");
        if($del!=null)
       { $imgs=$del[0]->GetElementsByTagName("img");
  
  
        $vrb=null;
        foreach($imgs as $img)
        {   
            $vrb=$vrb.$img."</br>";
        }
        
  
          $vrb=$vrb."<b>".$td[1]->plaintext."</b>"."</br>";
        
        $this->currentTableImg[]=$vrb;
        $this->currentTableExp[]="<p>".$td[2]."</p>";



    }

    

}}}

function getImagesArray()
{


return $this->currentTableImg;


}


function getExplicationsArray()
{



return $this->currentTableExp;


}






}




?>


