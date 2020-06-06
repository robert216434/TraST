<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="administrareStyleSheet.css">
    <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
    <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 )">


    <?php
    include('../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php');
    if ($_SESSION['login_user'] != "admin")
        header("location: ../../HomePages/RomaniaHomePage.html");
    
    include('../../IncludedNavbars/navbarRomania.html');

    ?>

    <script>
        var vhtp = new XMLHttpRequest();
        vhtp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "1") {
                    document.getElementById("logoutt").style.visibility = "visible";
                }
            }
        };
        vhtp.open("GET", "../../ConectareaUseruluiLaWebsite/Logout/checkLogout.php", true);
        vhtp.send();

        function logoutUser() {
            var phtp = new XMLHttpRequest();
            phtp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "1") {
                        document.getElementById("logoutt").style.visibility = "visible";
                    }
                }
            };
            phtp.open("GET", "../../ConectareaUseruluiLaWebsite/Logout/logoutRomania.php", true);
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
                xhttp.open("GET", "../OperatiiPeBazaDeDate/getname.php?q=" + str, true);
                xhttp.send();
            }
        }

        function deleteUser() {
            var userDeleteQuery = document.getElementById("usertodelete").value;
            if (userDeleteQuery == "") {
                alert("nu ai scris nimic");
                document.getElementById("rezstergere").innerHTML = "";
                return;
            } else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("rezstergere").innerHTML = this.responseText;
                        if (this.responseText) {
                            alert('Ai sters utilizatorul');
                        }
                    }
                };
                xhttp.open("GET", "../OperatiiPeBazaDeDate/deleteUser.php?q=" + userDeleteQuery, true);
                xhttp.send();
            }
        }

        function createUser() {
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
                xhttp.open("GET", "../OperatiiPeBazaDeDate/createUser.php?usr=" + usr + "&par=" + par + "&ema=" + ema + "&num=" + num + "&lcl=" + lcl + "&dtn=" + dtn + "&tel=" + tel, true);
                xhttp.send();
            }
        }

        function modifyUser() {
            if (document.getElementById("usernama").value == "") {
                alert('nu ai scris username-ul');
                return;
            } else var usr = document.getElementById("usernama").value;
            //if(document.getElementById("parolee").value!="")
            var par = document.getElementById("parolee").value;
            //if(document.getElementById("punctaje").value!="")
            var pct = document.getElementById("punctaje").value;
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
            xhttp.open("POST", "../OperatiiPeBazaDeDate/modifyUser.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("usr=" + usr + "&par=" + par + "&ema=" + ema + "&num=" + num + "&lcl=" + lcl + "&dtn=" + dtn + "&tel=" + tel + "&pct=" + pct);
            //xhttp.send();
        }
    </script>

    <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

        <div class="operatiiAdministrare">
            <span id="interg"></span>
            <p>Creare utilizator:</p>
            <form class="formularAdministrare" action="javascript:createUser()">
                <input class="inputFormularAdministrare" type="text" id="usrnm" size="50" placeholder="Username">
                <input class="inputFormularAdministrare" type="password" id="parol" size="50" placeholder="Parola">
                <input class="inputFormularAdministrare" type="text" id="numpr" size="50" placeholder="Nume prenume">
                <input class="inputFormularAdministrare" type="text" id="loclt" size="50" placeholder="Localitate">
                <input class="inputFormularAdministrare" type="text" id="email" size="50" placeholder="Email">
                <input class="inputFormularAdministrare" type="text" id="dtnas" size="50" placeholder="Data nasterii">
                <input class="inputFormularAdministrare" type="text" id="telef" size="50" placeholder="Telefon">
                <input class="submitFormularAdministrare" type="submit" value="Submit">
            </form>
            <span id="rezuser"></span>

            <p>Stergere utilizator:</p>
            <form class="formularAdministrare" action="javascript:deleteUser()">
                <input class="inputFormularAdministrare" type="text" id="usertodelete" size="50" placeholder="Username">
                <input class="submitFormularAdministrare" type="submit" value="Submit">
            </form>
            <span id="rezstergere"></span>

            <p>Modificare utilizator:</p>
            <form class="formularAdministrare" action="javascript:modifyUser()">
                <input class="inputFormularAdministrare" type="text" id="usernama" size="50" placeholder="Username">
                <input class="inputFormularAdministrare" type="password" id="parolee" size="50" placeholder="Parola">
                <input class="inputFormularAdministrare" type="text" id="punctaje" size="50" placeholder="Punctaj">
                <input class="inputFormularAdministrare" type="text" id="numeprena" size="50" placeholder="Nume prenume">
                <input class="inputFormularAdministrare" type="text" id="localita" size="50" placeholder="Localitate">
                <input class="inputFormularAdministrare" type="text" id="emailado" size="50" placeholder="Email">
                <input class="inputFormularAdministrare" type="text" id="datanas" size="50" placeholder="Data nasterii">
                <input class="inputFormularAdministrare" type="text" id="telefono" size="50" placeholder="Telefon">
                <input class="submitFormularAdministrare" type="submit" value="Submit">
            </form>
            <span id="moduser"></span>

            <p>Cautare utilizator:</p>
            <form class="formularAdministrare">
                <input class="inputFormularAdministrare" type="text" size="50" placeholder="Username" onkeyup="showHint(this.value)">
            </form>

        </div>

        <div id="txtHint" class="spanCautareUtilizator"></div>

        <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

    </div>
</body>

</html>