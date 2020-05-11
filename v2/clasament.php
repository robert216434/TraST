<!doctype html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Clasament</title>
	<link rel="stylesheet" href="clasament.css">
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
		</script>

<?php 
	include("sessions.php");
	$user = $_SESSION['login_user'];

	$result = mysqli_query($db,"SELECT * FROM user ORDER BY punctaj DESC LIMIT 10");
?>

<div class = "clasament">
	<h3>Top 10: </h3>
	<table class = "clasament-item">
		<tr>
			<th>Loc</th>
			<th>Username</th>
			<th>Punctaj</th>
		</tr>
		<?php $i=1; while($row = mysqli_fetch_array($result)): ?>
		<tr>
			<td><?php print $i; $i++;?></td>
			<td><?php print $row[0];?></td>
			<td><?php print $row[2];?></td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>

<footer style="margin-top: 239px">
	Good bye!</footer>
</body>

</html>