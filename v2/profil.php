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
	$statement=$db->prepare("SELECT punctaj FROM user WHERE username = ? ");
    $statement->bind_param("s",$user);
  $statement->execute();
  $statement->bind_result($punctaj);
  $okay=true;
  while($statement->fetch())
  {   

  }
   $statement->close();

   $statement=$db->prepare("SELECT intrebariparcurse FROM user WHERE username = ? ");
   $statement->bind_param("s",$user);
 $statement->execute();
 $statement->bind_result($intrebari);
 $okay=true;
 while($statement->fetch())
 {   

 }
  $statement->close();
  $statement=$db->prepare("SELECT nume FROM user WHERE username = ? ");
  $statement->bind_param("s",$user);
$statement->execute();
$statement->bind_result($nume);
$okay=true;
while($statement->fetch())
{   

}
 $statement->close();

 $statement=$db->prepare("SELECT email FROM user WHERE username = ? ");
 $statement->bind_param("s",$user);
$statement->execute();
$statement->bind_result($email);
$okay=true;
while($statement->fetch())
{   

}
$statement->close();


$statement=$db->prepare("SELECT localitate FROM user WHERE username = ? ");
$statement->bind_param("s",$user);
$statement->execute();
$statement->bind_result($localitate);
$okay=true;
while($statement->fetch())
{   

}
$statement->close();


$statement=$db->prepare("SELECT telefon FROM user WHERE username = ? ");
$statement->bind_param("s",$user);
$statement->execute();
$statement->bind_result($telefon);
$okay=true;
while($statement->fetch())
{   

}
$statement->close();


$statement=$db->prepare("SELECT datanasterii FROM user WHERE username = ? ");
$statement->bind_param("s",$user);
$statement->execute();
$statement->bind_result($datanasterii);
$okay=true;
while($statement->fetch())
{   

}
$statement->close();

?>

<div class="profile">
	<div class="person-information">
		<img src="imagini/userExample.png" alt="profile_image" class="profile-image">
		<h2 class="person-name"> <?php echo $user ?> </h2>
		<h4 class="person-short-info ">Punctaj: <?php echo $punctaj; ?> </h4>
		<h4 class="person-short-info ">Intrebari parcurse: <?php echo $intrebari; ?> </h4>
		<p class="person-details">
				Nume: <?php echo $nume; ?> <br>
				Localitate: <?php echo $localitate?> <br>
				E-mail: <?php echo $email;?> <br>
				Data nasterii: <?php echo $datanasterii; ?> <br>
				Telefon: <?php echo $telefon; ?>
		</p>
	</div>
</div>

<footer>La revedere!</footer>
</body>
</html>