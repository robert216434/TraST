<?php
 
require_once('simple_html_dom.php');

class ScrapingAng
{
    var $cArray;


function __construct($index)
{
    $cai = [ 
        "https://thehighway-code.co.uk/highway/code/1-to-35/rules-for-pedestrians.html",
        "https://thehighway-code.co.uk/highway/code/36-to-46/rules-for-users-of-powered-wheelchairs-and-powered-mobility-scooters.html",
        "https://thehighway-code.co.uk/highway/code/47-to-58/rules-about-animals.html",
        "https://thehighway-code.co.uk/highway/code/59-to-82/rules-for-cyclists.html" ,
        "https://thehighway-code.co.uk/highway/code/83-to-88/rules-for-motorcyclists.html",
        "https://thehighway-code.co.uk/highway/code/89-to-102/rules-for-drivers-and-motorcyclists.html" ,
        "https://thehighway-code.co.uk/highway/code/103-to-158/general-rules-techniques-and-advice-for-all-drivers-and-riders.html" ,
        "https://thehighway-code.co.uk/highway/code/204-to-225/road-users-requiring-extra-care.html ",
        "https://thehighway-code.co.uk/highway/code/226-to-237/driving-in-adverse-weather-conditions.html" ,
        "https://thehighway-code.co.uk/highway/code/238-to-252/waiting-and-parking.html ",
        "https://thehighway-code.co.uk/highway/code/253-to-273/motorways.html ",
        "https://thehighway-code.co.uk/highway/code/274-to-287/breakdowns-and-incidents.html" ,
        "https://thehighway-code.co.uk/highway/code/288-to-307/road-works-level-crossings-and-tramways.html "
    ];

    

        $html = file_get_html($cai[$index]);
        $body=$html->GetElementsByTagName('body');
        $article=$body->GetElementsByTagName('article');
        $div=$article[0]->GetElementsByTagName('div');



        foreach($div as  $box){

            if($box->hasAttribute("class")==true and $box->getAttribute("class")=="box")
            {
       
               
               $rules=$box;
            }
       
           }
       
          
           $childsToBeRemoved=$rules->GetElementsByTagName('div');




           foreach($childsToBeRemoved as $child){



            $rules->removeChild($child);



            }

  

        $childs=$rules->children();
        
       
        $doc=new DomDocument();
        foreach($childs as $kid)
        {
          
          if($kid->tag=="table")
          {
            $data=$doc->createCDATASection($kid->outertext);

          }else{
        
          
           if($kid->tag=="ul"){
                
           $li=$kid->getElementsByTagName("li");

           $string="<ul>";

           foreach($li as $listElement)
           {

           $string=$string."<li>".$listElement->plaintext."</li>";

           }
            $string=$string."</ul>";
            $data=$doc->createCDATASection($string);}

           
           else
        {  $data=$doc->createCDATASection("<".$kid->tag.">".$kid->plaintext."</".$kid->tag.">");}
          
        $doc->appendChild($data);
        }

      }


       




        $this->cArray=$doc;

    








}









function returneaza_capitol()
{



  return $this->cArray->textContent;


}

}



?>