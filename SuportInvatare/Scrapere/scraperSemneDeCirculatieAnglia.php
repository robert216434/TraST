<?php
require_once("../../simple_html_dom.php");
function dlPage() {

    $curl = curl_init('https://en.wikipedia.org/wiki/Road_signs_in_the_United_Kingdom');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $str = curl_exec($curl);
    curl_close($curl);
    $dom = new simple_html_dom();
    $dom->load($str);
  
    return $dom;
    }
class signScrapperAng
{
private $currentTableImg=null;
private $currentTableExp=null;


function currentSignTable($index)
{
    $html = dlPage();
    $body=$html->getElementsByTagName("body");
    $content=$body->getElementByID("content");
    $bodyContent=$content->getElementByID("bodyContent");
    $contentxt=$bodyContent->getElementByID("mw-content-text");
    $parser=$contentxt->getElementsByTagName("div");
    $parsermw=$parser[0];
    $uls=$parsermw->getElementsByTagName("ul");
    $listArray=null;
    foreach($uls as $list)
    {
      if($list->hasAttribute("class") and $list->getAttribute("class")=="gallery mw-gallery-traditional")
      {
        $listArray[]=$list;
        
          
      }

    

    }


    if($index==9)
    {
     for($t=9;$t<=13;$t++)
       {
           
        $listAtIndex=$listArray[$t];
        $li=$listAtIndex->getElementsByTagName("li");
        foreach($li as $listElement)
        {
   
           $div1=$listElement->getElementsByTagName("div");
           $div2=$div1[0]->getElementsByTagName("div");
           $em1=$div2[0];
           $em1d=$em1->GetElementsByTagName("div");
           $a=$em1d[0]->getElementsByTagName("a");
           $img=$a[0]->getElementsByTagName("img");
           $this->currentTableImg[]=$img[0];
           $em2=$div2[2];
           $p=$em2->getElementsByTagName("p");
           $this->currentTableExp[]=$p[0];
           
   
   
   
   
        }






       }

    }
    else
    {
     $listAtIndex=$listArray[$index];
     $li=$listAtIndex->getElementsByTagName("li");
     foreach($li as $listElement)
     {

        $div1=$listElement->getElementsByTagName("div");
        $div2=$div1[0]->getElementsByTagName("div");
        $em1=$div2[0];
        $em1d=$em1->GetElementsByTagName("div");
        $a=$em1d[0]->getElementsByTagName("a");
        $img=$a[0]->getElementsByTagName("img");
        $this->currentTableImg[]=$img[0];
        $em2=$div2[2];
        $p=$em2->getElementsByTagName("p");
        if($p != null){
        if(is_array($p)){
        $this->currentTableExp[]=$p[0];
        }
        else{
            $this->currentTableExp[]=$p;   
        }
    }
    else{

        $this->currentTableExp[]="No description";  
    }



     }

  

    }


//or($l=0;$l<count($this->currentTableExp);$l++)
//echo $this->currentTableExp[$l];



}


function getCurrentImg()
{


    return $this->currentTableImg;
}

function getCurrentExp()
{


    return $this->currentTableExp;
}









}
?>