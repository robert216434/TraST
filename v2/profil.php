<!doctype html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Profil</title>
    <link rel="stylesheet" href="profil.css">
	<link rel="stylesheet" href="butoane.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

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

	$sqlpunctaj = mysqli_query($db,"SELECT punctaj FROM user WHERE username = '$user'");
	$punctaj = mysqli_fetch_row($sqlpunctaj);

	$sqlintrebari = mysqli_query($db,"SELECT intrebariparcurse FROM user WHERE username = '$user'");
	$intrebari = mysqli_fetch_row($sqlintrebari);

	$sqlnume = mysqli_query($db,"SELECT nume FROM user WHERE username = '$user'");
	$nume = mysqli_fetch_row($sqlnume);

	$sqlemail = mysqli_query($db,"SELECT email FROM user WHERE username = '$user'");
	$email = mysqli_fetch_row($sqlemail);

	$sqllocalitate = mysqli_query($db,"SELECT localitate FROM user WHERE username = '$user'");
	$localitate = mysqli_fetch_row($sqllocalitate);

	$sqltelefon = mysqli_query($db,"SELECT telefon FROM user WHERE username = '$user'");
	$telefon = mysqli_fetch_row($sqltelefon);

	$sqldatanasterii = mysqli_query($db,"SELECT datanasterii FROM user WHERE username = '$user'");
	$datanasterii = mysqli_fetch_row($sqldatanasterii);
?>

<div class="profile">
	<div class="person-information">
		<img src="imagini/userExample.png" alt="profile_image" class="profile-image">
		<h2 class="person-name"> <?php echo $user ?> </h2>
		<h4 class="person-short-info ">Punctaj: <?php print implode(", ", $punctaj); ?> </h4>
		<h4 class="person-short-info ">Intrebari parcurse: <?php print implode(", ", $intrebari); ?> </h4>
		<p class="person-details">
				Nume: <?php print implode(", ", $nume); ?> <br>
				Localitate: <?php print implode(", ", $localitate); ?> <br>
				E-mail: <?php print implode(", ", $email); ?> <br>
				Data nasterii: <?php print implode(", ", $datanasterii); ?> <br>
				Telefon: <?php print implode(", ", $telefon); ?>
		</p>
	</div>
</div>

<footer>La revedere!</footer>
</body>
</html>