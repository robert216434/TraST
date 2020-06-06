<!doctype html>
<html lang="ro">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="loginStyleSheet.css">
	<link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
	<link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">
	<div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">
		<?php
		include("../SesiuniSiConfig/configurareBD.php");

		if (!isset($_SESSION)) {
			session_start();
		}


		$loginErr = "";

		error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$loginErr = "";
			$myusername = mysqli_real_escape_string($db, $_POST['username']);
			$mypassword = mysqli_real_escape_string($db, $_POST['password']);
			$statement = $db->prepare("SELECT username FROM user WHERE username = ? and password=? ");
			$statement->bind_param("ss", $myusername, $mypassword);
			$statement->execute();
			$statement->bind_result($result);
			$okay = true;
			while ($statement->fetch()) {
			}

			$statement->close();

			if ($result != "") {
				$_SESSION['login_user'] = $myusername;

				if ($_SESSION['login_user'] == "admin")
					header("location: ../../ModulAdministrare/Administrare/administrareRomania.php");
				else header("location: ../../HomePages/RomaniaHomePage.html");
			} else {
				$loginErr = "Numele utilizatorului sau parola invalida";
			}
		}

		require_once('../../IncludedNavbars/navbarRomania.html');
		?>



		<div class="card">
			<h3 class="form-text">Login</h3>
			<form method="post">
				<h2 id="username-title">Username:</h2>
				<input type="text" name="username" placeholder="Email adress or username" class="username">
				<h2 id="password-title">Password:</h2>
				<input type="password" name="password" placeholder="Password" class="password">
				<span class="error"><?php echo $loginErr; ?></span>
				<input type="submit" onclick="location.href='';" value="Submit" class="submit-button">
			</form>
			<input type="button" onclick="location.href = '../Register/registerPageRomania.php';" class="sign-up-button" value='Sign up'>
		</div>

		<footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

	</div>

</body>


</html>