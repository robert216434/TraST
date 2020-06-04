<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>Pagina intermediara</title>
<link rel="stylesheet" href="paginaintermediara.css">
<link rel="stylesheet" href="butoane.css">
<link rel="stylesheet" href="semafor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">



    <div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">

<?php

 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
 require_once("barasus-en.html");
 $indx=0;
require_once("signScraperAng.php");
$ceva=new signScrapperAng();


for($i=1;$i<=18;$i++)
{

 
  $string="BT".$i;
if(isset($_POST[$string])  and $_SERVER['REQUEST_METHOD'] == "POST")
{
$_SESSION['i1']=$i;
 

}}
$indx=$_SESSION['i1'];

$ceva->currentSignTable($indx);

  
$variab=$ceva->getCurrentImg();
if($indx==1){

echo "<h1 class='titluCapitol'>WARNING SIGNS </h1>";


}
if($indx==2){

  echo "<h1 class='titluCapitol'>REGULATORY SIGNS </h1>";
  
  
  }
 if($indx==3){

    echo "<h1 class='titluCapitol'>SPEED LIMIT SIGNS </h1>";
    
    
    }
if($indx==4){

      echo "<h1 class='titluCapitol'>LOW BRIDGE SIGNS </h1>";
      
      
      }
if($indx==5){

        echo "<h1 class='titluCapitol'>LEVEL CROSSING SIGNS </h1>";
        
        
        }
if($indx==6){

          echo "<h1 class='titluCapitol'>BUS AND CYCLE SIGNS </h1>";
          
          
          }
 if($indx==7){

            echo "<h1 class='titluCapitol'>PEDESTRIAN ZONE SIGNS</h1>";
            
            
            }
 if($indx==8){

              echo "<h1 class='titluCapitol'>LOADING BAYS AND PARKING SIGNS </h1>";
              
              
              }
if($indx==9){

                echo "<h1 class='titluCapitol'>MOTORWAY SIGNS</h1>";
                
                
                }
if($indx==14){

                  echo "<h1 class='titluCapitol'>DIRECTIONAL ROAD SIGNS </h1>";
                  
                  
                  }
if($indx==15){

                    echo "<h1 class='titluCapitol'>TOURIST DESTINATIONS </h1>";
                    
                    
                    }
 if($indx==16){

                      echo "<h1 class='titluCapitol'>DIVERSION ROUTES </h1>";
                      
                      
                      }
  if($indx==17){

                        echo "<h1 class='titluCapitol'>INFORMATIONAL SIGNS </h1>";
                        
                        
                        }
 if($indx==18){

                          echo "<h1 class='titluCapitol'>ROADWORKS AND TEMPORARY SIGNS </h1>";
                          
                          
                          }

echo "<form action='pagina_indicatoareAng-en.php' method='POST'>";
echo "<div class='container'>";
for($j=0;$j<count($variab);$j++)
echo "<button name='R".$j."'>".$variab[$j]."</button>"."</br>";
echo "</div>";
echo"</form>";




?>




<script>

function ceas ( )
{
  var timp= new Date ( );

  var ore = timp.getHours ( );
  var minute = timp.getMinutes ( );
  var secunde = timp.getSeconds ( );

if(minute<10) minute="0" + minute;
if(secunde<10) secunde="0" + secunde;
if(ore<10)ore="0"+ ore;
  
  var currentTimeString = ore + ":" + minute + ":" + secunde + " " ;
var data=timp.getDate();
var luni=timp.getMonth()+1;
var an=timp.getFullYear();
currentTimeString="Date: "+ an+" / "+luni+" / "+data+" Time: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
<footer class="homeF-en">Good bye!.<br><span id="ceas"></span></footer>

</div>
</body>
</html>