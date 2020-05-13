<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Clasament</title>
	<link rel="stylesheet" href="butoane.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="leg">

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
  <a href="">English</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
  </div>

	
		<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
			x.className += " responsive";
			} else {
			x.className = "topnav";
			}
		}

        function showHint(str) {
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
		</script>

<?php 
	include("sessions.php");
    $user = $_SESSION['login_user'];
    function interogare($str){
        $interogare = "SELECT * FROM user ORDER BY ";
        $interogare .= $str;
        $interogare .= " ASC";
        $result = mysqli_query($db,$interogare);
    }
?>

<p><b>Scrieti numele: </b></p>
<form>
Nume: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Rezultate: <span id="txtHint">

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

</span></p>

<footer style="margin-top: 239px">
	Good bye!</footer>
</body>

</html>