<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Administrator</title>
<link rel="stylesheet" href="clasament.css">
	<link rel="stylesheet" href="butoane.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 )">

	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
	
	</header>  
    <?php
    include('barasus.html');
    include('sessions.php');

    if($_SESSION['login_user']!="admin")
        header("location: navbar.html");

    ?>

		<script>

        var vhtp = new XMLHttpRequest();
        vhtp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText=="1"){
                    document.getElementById("logoutt").style.visibility = "visible";
                }
            }
        };
        vhtp.open("GET", "checkLogout.php", true);
        vhtp.send();

        function logoutUser(){
            var phtp = new XMLHttpRequest();
            phtp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText=="1"){
                    document.getElementById("logoutt").style.visibility = "visible";
                }
            }
            };
            phtp.open("GET", "logout.php", true);
            phtp.send();
        }

		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
			x.className += " responsive";
			} else {
			x.className = "topnav";
			}
		}

        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "getname.php?q=" + str, true);
                xhttp.send();
            }
        }

        function makeSearch(){
            var queryasd = document.getElementById("queryasd").value;
            if (queryasd == "") {
                alert("nu ai scris nimic");
                document.getElementById("interg").innerHTML = "";
                return;
            } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("interg").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "customQuery.php?q=" + queryasd, true);
            xhttp.send();
            }
        }

        function deleteUser(){
            var queryasd = document.getElementById("usertodelete").value;
            if (queryasd == "") {
                alert("nu ai scris nimic");
                document.getElementById("rezstergere").innerHTML = "";
                return;
            } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("rezstergere").innerHTML = this.responseText;
                    if(this.responseText){
                        alert('Ai sters utilizatorul');
                    }
                }
            };
            xhttp.open("GET", "deleteUser.php?q=" + queryasd, true);
            xhttp.send();
            }
        }

        function createUser(){
            var usr = document.getElementById("usrnm").value;
            var par = document.getElementById("parol").value;
            var num = document.getElementById("numpr").value;
            var lcl = document.getElementById("loclt").value;
            var ema = document.getElementById("email").value;
            var dtn = document.getElementById("dtnas").value;
            var tel = document.getElementById("telef").value;
            if (usr == "" || par == "" || ema == "" || num == "" || lcl == "" || dtn == "" || tel == "") {
                alert("ai uitat sa completezi un camp");
                document.getElementById("rezuser").innerHTML = "";
                return;
            } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("rezuser").innerHTML = this.responseText;
                }
            };
            //trebuie cu encode
            //encodeURI
            //in createUSER decodeURI
            xhttp.open("GET", "createUser.php?usr=" + usr + "&par=" + par + "&ema=" + ema + "&num=" + num + "&lcl=" + lcl + "&dtn=" + dtn + "&tel=" + tel, true);
            xhttp.send();
            }
        }

        function modifyUser(){
            if(document.getElementById("usernama").value==""){
                alert('nu ai scris username-ul');
                return;
            }
            else var usr = document.getElementById("usernama").value;
            //if(document.getElementById("parolee").value!="")
                var par = document.getElementById("parolee").value;
            //if(document.getElementById("punctaje").value!="")
                var pct = document.getElementById("punctaje").value;
            //if(document.getElementById("intrebarr").value!="")
                var itr = document.getElementById("intrebarr").value;
            //if(document.getElementById("numeprena").value!="")
                var num = document.getElementById("numeprena").value;
            //if(document.getElementById("localita").value!="")
                var lcl = document.getElementById("localita").value;
            //if(document.getElementById("emailado").value!="")
                var ema = document.getElementById("emailado").value;
            //if(document.getElementById("datanas").value!="")
                var dtn = document.getElementById("datanas").value;
            //if(document.getElementById("telefono").value!="")
                var tel = document.getElementById("telefono").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("moduser").innerHTML = this.responseText;
                }
            };
            //trebuie cu encode
            //encodeURI
            //in createUSER base64_decode(urldecode($str));
            //xhttp.open("GET", "modifyUser.php?usr=" + usr + "&par=" + par + "&ema=" + ema + "&num=" + num + "&lcl=" + lcl + "&dtn=" + dtn + "&tel=" + tel + "&pct=" + pct + "&itr=" + itr, true)
            xhttp.open("POST","modifyUser.php",true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("usr=" + usr + "&par=" + par + "&ema=" + ema + "&num=" + num + "&lcl=" + lcl + "&dtn=" + dtn + "&tel=" + tel + "&pct=" + pct + "&itr=" + itr);
            //xhttp.send();
        }
</script>

<p>Interogare:</p>
<form action="javascript:makeSearch()">
<input type="text" id="queryasd" size="100">
<input type="submit" value="Submit">
</form>
<span id="interg"></span>

<p>Creare utilizator:</p>
<form action="javascript:createUser()">
Username: <input type="text" id="usrnm">
Parola: <input type="password" id="parol">
Nume prenume: <input type="text" id="numpr">
Localitate: <input type="text" id="loclt">
Email: <input type="text" id="email">
Data nasterii: <input type="text" id="dtnas">
Telefon: <input type="text" id="telef">
<input type="submit" value="Submit">
</form>
<span id="rezuser"></span>

<p>Stergere utilizator:</p>
<form action="javascript:deleteUser()">
Username: <input type="text" id="usertodelete">
<input type="submit" value="Submit">
</form>
<span id="rezstergere"></span>

<p>Modificare utilizator:</p>
<form action="javascript:modifyUser()">
Username: <input type="text" id="usernama">
Parola: <input type="password" id="parolee">
Punctaj: <input type="text" id="punctaje">
Intrebari parcurse: <input type="text" id="intrebarr">
Nume prenume: <input type="text" id="numeprena">
Localitate: <input type="text" id="localita">
Email: <input type="text" id="emailado">
Data nasterii: <input type="text" id="datanas">
Telefon: <input type="text" id="telefono">
<input type="submit" value="Submit">
</form>
<span id="moduser"></span>

<p>Cautare utilizator: </p>
<form>
Username: <input type="text" onkeyup="showHint(this.value)">
</form>

<span id="txtHint"></span>
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
currentTimeString="Data: "+ an+" / "+luni+" / "+data+" Ora: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>

<footer style="margin-top: 239px">
    La revedere!</br>
<span id="ceas"></span>

</footer>
</body>

</html>