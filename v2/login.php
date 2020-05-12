<?php
if(!isset($_SESSION)){
	session_start();
}
else header("location: navbar.html");
?>

<!doctype html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" href="login.css">
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
	include("config.php");

	$loginErr = "";

	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$loginErr = "";
	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']);
	
	$sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	
	$count = mysqli_num_rows($result);
		
	if($count == 1) {
		$_SESSION['login_user'] = $myusername;
		
		header("location: navbar.html");
	}else {
		$loginErr = "Your username or password is invalid";
	}
	}
	?>

	<div class="card">
        <h3 class="form-text">Login</h3>
            <form action="" method="post">
                <h2 id="username-title">Username:</h2>
                <input type="text" name="username" placeholder="Email adress or username" class="username">
                <h2 id="password-title">Password:</h2>
				<input type="password" name="password" placeholder="Password" class="password">
				<span class = "error"><?php echo $loginErr;?></span>
                <input type="submit" onclick = "location.href='';" value="Submit" class="submit-button">
            </form>
			<input type = "button" onclick = "location.href = 'register.php';" class="sign-up-button" value='Sign up'>
	</div>
	
<footer style="margin-top: 189px">
	Good bye!
</footer>
</body>

	
</html>