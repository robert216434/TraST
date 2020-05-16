<?php
if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['logat']==1){
    header("location: navbarAngl-en.html");
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" href="login.css">
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
		
		header("location: navbarAngl-en.html");
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
			<input type = "button" onclick = "location.href = 'registerAng-en.php';" class="sign-up-button" value='Sign up'>
	</div>
    
<footer style="margin-top: 189px">
	Good bye!
</footer>
</body>

	
</html>