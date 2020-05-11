<?php
require_once("simple_html_dom.php");

error_reporting(0);
ini_set('display_errors', 0);


function dlPage($index) {
    if($index==0){
        $url = "https://www.autoelev.ro/categoria-a.html";
    }
    if($index==1){
        $url = "https://www.autoelev.ro/categoria-b.html";
    }
    if($index==2){
        $url = "https://www.autoelev.ro/categoria-c.html";
    }
    if($index==3){
        $url = "https://www.autoelev.ro/categoria-d.html";
    }
    if($index==4){
        $url = "https://www.autoelev.ro/categoria-e.html";
    }
    $curl = curl_init($url);
    //$curl = curl_init('https://chestionare-az.ro/auto/chestionare-auto-drpciv-cat-abcde/categoria-b1b-intrebari/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $str = curl_exec($curl);
    curl_close($curl);
    $dom = new simple_html_dom();
    $dom->load($str);

    return $dom;
}

if(!isset($_SESSION)) { 
    session_start();
}

class teste{
        private $currentImg=null;
        private $intrebare=null;

        public $variantaA;
        public $variantaB;
        public $variantaC;
        public $script;
        public $intrb;

        function get($index){
                $html=dlPage($index);
                $body=$html->getElementsByTagName("body");
                $div=$body->getElementByID("boxinside2");
                $intrb = $div->getElementsByTagName("font");

                $imaginePrincipala = $body->find("img.xphoto");
                $img = "https://www.autoelev.ro/";
                $img .= $imaginePrincipala[0]->src;
                $imaginePrincipala[0]->src = $img;
                $imaginePrincipala[0]->style = "";

                echo $intrb[0];
                $_SESSION['intrb']=$intrb[0];
                
                $_SESSION['raspA']=0;
                $_SESSION['raspB']=0;
                $_SESSION['raspC']=0;

                $script = $html->find("script");
                echo $script[11];
                $_SESSION['script']=$script[11];
                //!=1 - raspunsul e corect
                $functie = $script[11];
                if(strstr($functie,'raspunsulstr[1]!=1')){
                    $this->variantaA = 1;
                    $_SESSION['raspA']=1;
                }
                else $this->variantaA = 0;
                if(strstr($functie,'raspunsulstr[2]!=1')){
                    $this->variantaB = 1;
                    $_SESSION['raspB']=1;
                }
                else $this->variantaB = 0;
                if(strstr($functie,'raspunsulstr[3]!=1')){
                    $this->variantaC = 1;
                    $_SESSION['raspC']=1;
                }
                else $this->variantaC = 0;
        }
}

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed == 1) {
    echo 981324;
   header("navbar.html");
}

$index = $_SESSION["indexCat"];

$asd = new teste;
$asd->get($index);


//$_SESSION['asd'] = new teste;
//$_SESSION['asd']-> get();
?>