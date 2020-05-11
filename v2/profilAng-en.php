<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Profile</title>
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="butoane.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <header style="margin:0px;background-image: url(imagini/Anglia.png);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
    </header>
    
    <div class="topnav" id="myTopnav">
    <a href="navbarAngl-en.html">Home</a>
    <a href="loginAng-en.php">Authentification</a>
    <div class="dropdown">
      <button class="dropbtn">Select country
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
      <a href="navbar.html">Romania</a>
      <a href="navbarAngl-en.html">England</a>
      </div>
    </div>
    <a href="legislatie2-en.php">Legislation</a>
    <a href="semne_de_circulatieAng-en.php">Road signs</a>
    <a href="categoriiAng-en.php">Tests</a>
    <a href="clasamentAng-en.php">Ranking</a>
    <a href="profilAng-en.php">Profile</a>
    <a href="">Romana</a>
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
	include("sessions-en.php");
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
		<h4 class="person-short-info ">Score: <?php print implode(", ", $punctaj); ?> </h4>
		<h4 class="person-short-info ">Questions answered: <?php print implode(", ", $intrebari); ?> </h4>
		<p class="person-details">
				Name: <?php print implode(", ", $nume); ?> <br>
				City: <?php print implode(", ", $localitate); ?> <br>
				E-mail: <?php print implode(", ", $email); ?> <br>
				Birth date: <?php print implode(", ", $datanasterii); ?> <br>
				Phone number: <?php print implode(", ", $telefon); ?>
		</p>
	</div>
</div>

<footer>Good bye!</footer>
</body>
</html>