<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Clasament</title>
	<link rel="stylesheet" href="butoane.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="leg" onload="ceas(); setInterval('ceas()', 1000 )">

	<header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
	
	</header>
	<div class="topnav" id="myTopnav">
  <a href="navbar.html">Acasa</a>
  <a href="login.php">Autentificare</a>
  <div class="dropdown">
    <button class="dropbtn">Selecteaza tara
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="navbar.html">Romania</a>
    <a href="navbarAngl-en.html">Anglia</a>
    </div>
  </div>
  <a href="legislatie1.php">Legislatie</a>
  <a href="semne_de_circulatie.php">Semne de circulatie</a>
  <a href="categorii.php">Teste</a>
  <a href="clasament.php">Clasament</a>
  <a href="profil.php">Profil</a>
  <a href="logout.php" class="logout" id="logoutt" style="visibility: hidden;" onlick="logoutUser()">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
  
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
		</script>

<?php 
	include("sessions.php");
	$user = $_SESSION['login_user'];

    $result = mysqli_query($db,"SELECT * FROM user ORDER BY username ASC");
    
?>

<div class = "clasament">
	<h3>Utilizatori: </h3>
	<table class = "clasament-item">
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Punctaj</th>
            <th>Intrebari parcuse</th>
            <th>Nume</th>
            <th>Localitate</th>
            <th>Email</th>
            <th>Data nasterii</th>
            <th>Telefon</th>
		</tr>
		<?php $i=1; while($row = mysqli_fetch_array($result)): ?>
		<tr>
			<td><?php print $row[0];?></td>
            <td><?php print $row[1];?></td>
			<td><?php print $row[2];?></td>
            <td><?php print $row[3];?></td>
            <td><?php print $row[4];?></td>
            <td><?php print $row[5];?></td>
            <td><?php print $row[6];?></td>
            <td><?php print $row[7];?></td>
            <td><?php print $row[8];?></td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>


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