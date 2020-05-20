<!DOCTYPE html>
<html lang='ro'>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="test.css">
<title>Teste</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


<div style="float: left;display: block;"><p>Timp ramas: <span id="time">30:00</span></p>

<br>
<p > Raspunsuri corecte: <span id="raspunsuriCorecte"></span></p>
<br>
<p > Raspunsuri gresite: <span id="raspunsuriGresite"></span></p>
<br>
<br>
<div id="intrebare" class="center">

</div>



<script>
//javascript


//afisare intrebare reload pagina

var afisat=0;
if(afisat==0){
    if(sessionStorage.getItem("refresh")!="0"){
        alert("Ai dat refresh, testul s-a terminat!");
        document.location='categorii.php';
    }
    sessionStorage.setItem("refresh","1");
    loadIntrebare();
    raspunsuriCorecte();
    raspunsuriGresite();
    afisat=1;
}

//afisare raspunsuri corecte gresite
function raspunsuriCorecte(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("raspunsuriCorecte").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "afisareRaspunsuriCorecte.php", true);
  xhttp.send();
}
function raspunsuriGresite(){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("raspunsuriGresite").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "afisareRaspunsuriGresite.php", true);
  xhttp.send();
}

//timer+butoane
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
    x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  }

  function showButton() {
  var obj = document.getElementById('backButton');
  var asd = document.getElementById('mytext');

    setTimeout(function() {
      obj.style.display = 'block';
    }, 5000);

    setTimeout(function() {
      asd.style.display = 'block';
    }, 5000);

}

  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (timer > 0) {
            timer--;
        }
    }, 1000);
 
setTimeout( function () { alert( "Timpul a expirat!" ); window.location.href="pagina_dupa_test.html"; }, 1800000 );
}

window.onload = function () {
    var starttime = 1800;
    display = document.querySelector('#time');
    startTimer(starttime, display);
    showButton();
}

function setColorA(btn){
  property=document.getElementById(btn);
  property.style.border = "2px solid red";
}

function undoAll(btn1,btn2,btn3){
  property=document.getElementById(btn1);
  property.style = "default";
  property=document.getElementById(btn2);
  property.style = "default";
  property=document.getElementById(btn3);
  property.style = "default";
}

//ajax

function loadIntrebare() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("intrebare").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "intrebare.php", true);
  xhttp.send();
}
var variante = "";
function adunareRaspunsuri(str){
    variante += str;
    //document.getElementById("afisareRaspuns").innerHTML = variante;
}

function stergeRaspunsuri(){
    variante = "";
    //document.getElementById("afisareRaspuns").innerHTML = "";
}

function verificaRaspunsuri() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("afisareRaspuns").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "verificareRaspuns.php?verifRasp=" + variante, true);
    xmlhttp.send();
    variante = "";
}

function verificareCastig(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText==1){
              document.location='aitrecut.php';
            }
            if(this.responseText==2){ 
              document.location='aipicat.php';
            }
        }
    };
    xmlhttp.open("GET", "conditiiCastig.php", true);
    xmlhttp.send();
}

</script>

<br>

<div class="butoaneJos">
<button id='pA' onclick="setColorA('pA');adunareRaspunsuri('pA');">A</button>
<button id='pB' onclick="setColorA('pB');adunareRaspunsuri('pB');">B</button>
<button id='pC' onclick="setColorA('pC');adunareRaspunsuri('pC');">C</button>
<button onclick="undoAll('pA','pB','pC');">Anuleaza raspunsurile</button>

<button onclick="undoAll('pA','pB','pC');verificaRaspunsuri();loadIntrebare();raspunsuriCorecte();raspunsuriGresite();verificareCastig();">Confirma Raspunsurile</button>
<button onclick="document.location='navbar.html'">Paraseste testul</button>
</div>



</body>

</html>