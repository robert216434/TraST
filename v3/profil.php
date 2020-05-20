<!doctype html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Profil</title>
    <link rel="stylesheet" href="profil.css">
	<link rel="stylesheet" href="butoane.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

    <header style="margin:0px;background-image: url(imagini/Romania.jpg);background-size: 100% 100%;padding: 1cm;border: 0px;">
    
    </header>
    <?php
  require_once('barasus.html');
  ?>

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

<footer>La revedere!</br>
<span id="ceas"></span>
</footer>
</body>
</html>