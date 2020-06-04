<?php
if(!isset($_SESSION)){
	session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="butoane.css">
    <link rel="stylesheet" href="semafor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">


<?php
    
	include("config.php");

	$loginErr = "";

	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
  
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$loginErr = "";
	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']);
	
	$statement=$db->prepare("SELECT username FROM user WHERE username = ? and password=? ");
    $statement->bind_param("ss",$myusername,$mypassword);
  $statement->execute();
  $statement->bind_result($result);
  $okay=true;
  while($statement->fetch())
  {   

  }
   
	$statement->close();

		
	if($result !="") {
		$_SESSION['login_user'] = $myusername;
		
  if($_SESSION['login_user']=="admin")
          header("location: administrare.php");
  else header("location: navbar.html");
	}else {
		$loginErr = "Your username or password is invalid";
	}
  }
  
  require_once('barasus-en.html');
	?>

<div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">
	
	<div class="card">
        <h3 class="form-text">Login</h3>
            <form action="" method="post">
                <h2 id="username-title">Username:</h2>
                <input type="text" name="username" placeholder="Email adress or username" class="username">
                <h2 id="password-title">Password:</h2>
				<input type="password" name="password" placeholder="Password" class="password">
				<span class = "error"><?php echo $loginErr;?></span>
                <input  type="submit" onclick = "location.href='';" value="Submit" class="submit-buttonAng">
            </form>
			<input  type = "button" onclick = "location.href = 'registerAng-en.php';" class="sign-up-buttonAng" value='Sign up'>
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
currentTimeString="Date: "+ an+" / "+luni+" / "+data+" Time: "+currentTimeString;
  document.getElementById("ceas").innerHTML = currentTimeString;
}

</script>
<footer class="homeF-en">Good bye!.<br><span id="ceas"></span></footer>

</div>
</body>

	
</html>