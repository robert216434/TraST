<?php
require_once("../../simple_html_dom.php");

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


$currentImg=null;
$intrebare=null;

$variantaA;
$variantaB;
$variantaC;
$script;
$intrb;

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
    $imaginePrincipala[0]->alt="No Image found";

    echo $intrb[0]->find('img',0);

    //echo $intrb[0]->innertext;
    echo "<p class='intrebareTest'>" . $intrb[0]->find('text',0) . "</p>";
    $indexVarianta = 3;
    $indexCautareVarianta = 1;
    while($indexVarianta!=0){
        $cautareText = $intrb[0]->find('text',$indexCautareVarianta);
        //echo $cautareText;
        if(preg_match('/^[\s]*[a-z]+/',$cautareText)!=0){
            echo "<p class='varianteIntrebare'>" . $cautareText . "</p>";
            if($indexVarianta==3){
                $_SESSION['textVariantaA'] = $cautareText;
            }
            if($indexVarianta==2){
                $_SESSION['textVariantaB'] = $cautareText;
            }
            if($indexVarianta==1){
                $_SESSION['textVariantaC'] = $cautareText;
            }
            $indexVarianta--;
        }
        $indexCautareVarianta++;
        if($indexCautareVarianta>=20){
            break;
        }
    }

    $_SESSION['intrb']=$intrb[0]->innertext;
    $_SESSION['testIntrebareText']=$intrb[0]->find('text',0);
    
    $_SESSION['raspA']=0;
    $_SESSION['raspB']=0;
    $_SESSION['raspC']=0;

    $script = $html->find("script");
    echo $script[11];
    $_SESSION['script']=$script[11];
    //!=1 - raspunsul e corect
    $functie = $script[11];
    if(strstr($functie,'raspunsulstr[1]!=1')){
        $variantaA = 1;
        $_SESSION['raspA']=1;
    }
    else $variantaA = 0;
    if(strstr($functie,'raspunsulstr[2]!=1')){
        $variantaB = 1;
        $_SESSION['raspB']=1;
    }
    else $variantaB = 0;
    if(strstr($functie,'raspunsulstr[3]!=1')){
        $variantaC = 1;
        $_SESSION['raspC']=1;
    }
    else $variantaC = 0;
}

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed == 1) {
    echo 981324;
   header("../../HomePages/RomaniaHomePage.html");
}

$index = $_SESSION["indexCat"];

get($index);


if($_SESSION['raspunsuriCorecte']==0 && $_SESSION['raspunsuriGresite']==0){
    $list = array (
        array('Intrebare', 'VariantaA', 'VariantaB', 'VariantaC', 'VarianteAlese' , 'RaspunsCorect')
    );
    
    $csvName = $_SESSION['login_user'] . "_test.csv";
    $fp = fopen($csvName, 'w');
    
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}

//$_SESSION['asd'] = new teste;
//$_SESSION['asd']-> get();
?>