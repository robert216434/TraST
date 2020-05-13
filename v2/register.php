<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css" href = "register.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>TraST</title>
</head>
<body>
<?php
	include("config.php");
    //session_start();
    $usernameErr = $nameErr = $emailErr = $passwordErr = $password1Err = $localitateErr = $datanasteriiErr = $telefonErr = "";
	//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	
    // $username = mysqli_real_escape_string($db,$_POST['username']);
    // $name = mysqli_real_escape_string($db,$_POST['nume']);
    // $password = mysqli_real_escape_string($db,$_POST['password']);
    // $password1 = mysqli_real_escape_string($db,$_POST['password1']);
    // $email = mysqli_real_escape_string($db,$_POST['email']);
    // $localitate = mysqli_real_escape_string($db,$_POST['localitate']);
    // $datanasterii = mysqli_real_escape_string($db,$_POST['datanasterii']);
    // $telefon = mysqli_real_escape_string($db,$_POST['telefon']);

    // echo $username;
    // echo $name;
    // echo $password;
    // echo $password1;
    // echo $localitate;
    // echo $datanasterii;

    $usernameErr = $nameErr = $emailErr = $passwordErr = $password1Err = $localitateErr = $datanasteriiErr = $telefonErr = "";
    $username = $name = $email = $password = $password1 = $localitate = $datanasterii = $telefon = "";
    $eroare = 0;

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
        $eroare = 1;
     }else {
        $username = $_POST["username"];
    }
     
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $eroare = 1;
    }else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $eroare = 1;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $eroare = 1;
     }else {
        $password = $_POST["password"];
    }

    if (empty($_POST["password1"])) {
        $password1Err = "Rewriting password is required";
        $eroare = 1;
     }else {
        $password1 = $_POST["password1"];
    }

    if(!empty($_POST["password"]) && !empty($_POST["password1"])){
        if(strcmp($password,$password1)!=0){
            $password1Err = "Passwords don't match";
            $eroare = 1;
        }
    }

    if (empty($_POST["nume"])) {
        $nameErr = "Birthdate is required";
        $eroare = 1;
     }else {
        $name = $_POST["nume"];
    }

    if (empty($_POST["localitate"])) {
        $localitateErr = "City is required";
     }else {
        $localitate = $_POST["localitate"];
    }
    
    if (empty($_POST["datanasterii"])) {
        $datanasteriiErr = "Birthdate is required";
     }else {
        $datanasterii = $_POST["datanasterii"];
    }

    if (empty($_POST["telefon"])) {
        $telefonErr = "Birthdate is required";
     }else {
        $telefon = $_POST["telefon"];
    }

    $sqlusername = "SELECT username FROM user WHERE username = '$username'";
    $resultusername = mysqli_query($db,$sqlusername);
    $countusername = mysqli_num_rows($resultusername);
    if($countusername>0){
        $usernameErr = "username already exists";
        $eroare = 1;
    }

    $sqlemail = "SELECT username FROM user WHERE email = '$email'";
    $resultemail = mysqli_query($db,$sqlemail);
    $countmail = mysqli_num_rows($resultemail);
    if($countmail>0){
        $emailErr = "email already exists";
        $eroare = 1;
    }

    //$sql = "INSERT INTO user VALUES ('$username','$password',0,0,'$name','$localitate','$email',CONVERT(datetime,'$datanasterii',101),'$telefon',CURRENT_DATE,CURRENT_DATE)";
    //if($usernameErr =""&& $nameErr =""&& $emailErr = ""&& $passwordErr =""&& $password1Err = ""&& $localitateErr =""&& $datanasteriiErr =""&& $telefonErr = ""){
    //if($usernameErr ="" && $nameErr ="" && $emailErr = "" && $passwordErr ="" && $password1Err = "" && $localitateErr ="" && $datanasteriiErr ="" && $telefonErr = ""){
    if($eroare!=1){
        $sql = "INSERT INTO user VALUES ('$username','$password',0,0,'$name','$localitate','$email','$datanasterii','$telefon',CURRENT_DATE,CURRENT_DATE)";
        $result = mysqli_query($db,$sql);
        header("location: login.php");
    }
    }
    ?>
    <div class="card">
            <h3 class="form-text">Inregistrare:</h3>
            <form class="form" method="post">
                <h2 id="username-title">Utilizator:</h2>
                <input type="text" name="username" placeholder="Username" class="username">
                <span class = "error"><?php echo $usernameErr;?></span>

                <h2 id="email-title">Email:</h2>
                <input type="text" name="email" placeholder="Email" class="email">
                <span class = "error"><?php echo $emailErr;?></span>

                <h2 class="password-title">Parola:</h2>
                <input type="password" name="password" placeholder="Password" class="password">
                <span class = "error"><?php echo $passwordErr;?></span>

                <h2 class="password-title">Rescrieti parola:</h2>
                <input type="password" name="password1" placeholder="Password" class="password">
                <span class = "error"><?php echo $password1Err;?></span>

                <h2 class="nume-title">Nume prenume:</h2>
                <input type="text" name="nume" placeholder="Nume prenume" class="email">
                <span class = "error"><?php echo $nameErr;?></span>

                <h2 id="localitate-title">Localitate:</h2>
                <input type="text" name="localitate" placeholder="Localitate" class="email">
                <span class = "error"><?php echo $localitateErr;?></span>

                <h2 id="localitate-title">Data nasterii:</h2>
                <input type="text" name="datanasterii" placeholder="Data nasterii AAAA.LL.ZZ" class="email">
                <span class = "error"><?php echo $datanasteriiErr;?></span>

                <h2 id="localitate-title">Telefon: </h2>
                <input type="text" name="telefon" placeholder="Numar telefon" class="email">
                <span class = "error"><?php echo $telefonErr;?></span>
                <input type="submit" onclick = "location.href = 'login.html'" value="submit" class="submit-button">
            </form> 
    </div>
</body>
</html>