<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="registerStyleSheet.css">
    <link rel="stylesheet" type="text/css" href="../../IncludedNavbars/navbarStyleSheet.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>TraST</title>
</head>

<body class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">

    <?php

    include("../SesiuniSiConfig/configurareBD.php");

    //session_start();
    $usernameErr = $nameErr = $emailErr = $passwordErr = $password1Err = $localitateErr = $datanasteriiErr = $telefonErr = "";
    //error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $usernameErr = "Numele utilizatorului este necesar";
            $eroare = 1;
        } else {
            $usernameUnChecked = $_POST["username"];
            $username = mysqli_real_escape_string($db, $_POST["username"]);
            $username = trim($username);
            $username = stripslashes($username);
            $username = htmlspecialchars($username);

            if ($usernameUnChecked != $username) {
                $usernameErr = "Nu incercati caractere speciale";
                $eroare = 1;
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Este necesar emailul";
            $eroare = 1;
        } else {
            $emailUnchecked = $_POST["email"];
            $email = mysqli_real_escape_string($db, $_POST["email"]);
            $email = trim($email);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);



            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Formatul emailului este invalid";
                $eroare = 1;
            }

            if ($email != $emailUnchecked) {
                $eroare = 1;
                $emailErr = "Evitati caracterele speciale";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Parola este necesara";
            $eroare = 1;
        } else {
            $passwordUn = $_POST["password"];
            $password = mysqli_real_escape_string($db, $_POST["password"]);
            $password = trim($password);
            $password = stripslashes($password);
            $password = htmlspecialchars($password);
            if (strlen($password) < 6) {

                $passwordErr = "Parola trebuie sa aiba minim 6 caractere";
                $eroare = 1;
            }

            if ($passwordUn != $password) {
                $passwordErr = "Evitati caracterele speciale";
                $eroare = 1;
            }
        }

        if (empty($_POST["password1"])) {
            $password1Err = "Rescrieti parola";
            $eroare = 1;
        } else {
            $passwordUn1 = $_POST["password1"];
            $password1 = mysqli_real_escape_string($db, $_POST["password1"]);
            $password1 = trim($password1);
            $password1 = stripslashes($password1);
            $password1 = htmlspecialchars($password1);
            if (strlen($password1) < 6) {

                $password1Err = "Parola trebuie sa aiba minim 6 caractere";
                $eroare = 1;
            }

            if ($passwordUn1 != $password1) {
                $password1Err = "Evitati caracterele speciale";
                $eroare = 1;
            }
        }

        if (!empty($_POST["password"]) && !empty($_POST["password1"])) {
            if (strcmp($password, $password1) != 0) {
                $password1Err = "Parolele nu se potrivesc";
                $eroare = 1;
            }
        }

        if (empty($_POST["nume"])) {
            $nameErr = "Numele este necesar";
            $eroare = 1;
        } else {
            $nameUn = $_POST["nume"];
            $name = mysqli_real_escape_string($db, $_POST["nume"]);
            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);


            if ($nameUn != $name) {
                $eroare = 1;
                $nameErr = "Evitati caracterele speciale";
            }
        }

        if (empty($_POST["localitate"])) {
            $localitateErr = "Localitatea este necesara";
        } else {
            $localitateUn = $_POST["localitate"];
            $localitate = mysqli_real_escape_string($db, $_POST["localitate"]);
            $localitate = trim($localitate);
            $localitate = stripslashes($localitate);
            $localitate = htmlspecialchars($localitate);
            if ($localitateUn != $localitate) {
                $localitateErr = "Evitati caracterele speciale";
                $eroare = 1;
            }
        }

        if (empty($_POST["datanasterii"])) {
            $datanasteriiErr = "Data nasterii este necesara";
        } else {
            $datanasteriiUn = $_POST["datanasterii"];
            $datanasterii = mysqli_real_escape_string($db, $_POST["datanasterii"]);
            $datanasterii = trim($datanasterii);
            $datanasterii = stripslashes($datanasterii);
            $datanasterii = htmlspecialchars($datanasterii);
            if ($datanasterii != $datanasteriiUn) {
                $datanasteriiErr = "Evitati caracterele speciale";
                $eroare = 1;
            }
            if (!preg_match("/[1-2][09][0-9][0-9].[01][0-9].[0-3][0-9]/", $datanasterii))
                {$eroare = 1;
                    $datanasteriiErr = "formatul datei de nastere este invalid";}
        }

        if (empty($_POST["telefon"])) {
            $telefonErr = "Numarul de telefon este necesar";
        } else {
            $telefonUn = $_POST["telefon"];
            $telefon = mysqli_real_escape_string($db, $_POST["telefon"]);
            $telefon = trim($telefon);
            $telefon = stripslashes($telefon);
            $telefon = htmlspecialchars($telefon);
            if ($telefonUn != $telefon) {
                $telefonErr = "Evitati caracterele speciale";
                $eroare = 1;
            } else {


                for ($i = 0; $i < strlen($telefon); $i++)
                    if ($telefon[$i] > '9' || $telefon[$i] < '0') {
                        $telefonErr = "Formatul numarului de telefon nu este acceptat";
                        $eroare = 1;
                    }
            }
        }
        $statement = $db->prepare("SELECT username FROM user WHERE username = ?");
        $statement->bind_param("s", $username);
        $sqlusername = $statement->execute();
        $statement->bind_result($result);

        $number = $statement->num_rows;
        $statement->fetch();
        $statement->close();
        if ($number > 0) {
            $usernameErr = "userul exista deja";
            $eroare = 1;
        }
        $statement1 = $db->prepare("SELECT username FROM user WHERE email = ?");
        $statement1->bind_param("s", $email);
        $statement1->execute();
        $statement1->bind_result($result1);
        $number1 = $statement1->num_rows;

        $statement1->fetch();

        $statement1->close();
        if ($result1 != "") {
            $emailErr = "email-ul exista deja";
            $eroare = 1;
        }


        //$sql = "INSERT INTO user VALUES ('$username','$password',0,0,'$name','$localitate','$email',CONVERT(datetime,'$datanasterii',101),'$telefon',CURRENT_DATE,CURRENT_DATE)";
        //if($usernameErr =""&& $nameErr =""&& $emailErr = ""&& $passwordErr =""&& $password1Err = ""&& $localitateErr =""&& $datanasteriiErr =""&& $telefonErr = ""){
        //if($usernameErr ="" && $nameErr ="" && $emailErr = "" && $passwordErr ="" && $password1Err = "" && $localitateErr ="" && $datanasteriiErr ="" && $telefonErr = ""){
        if ($eroare != 1) {
            $legislatie = "0000000000";
            $legislatieAnglia = "0000000000000";
            $semne = "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
            $semneAnglia = "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
            $statement2 = $db->prepare("INSERT INTO user VALUES (?,?,0,?,?,?,?,?,CURRENT_DATE,CURRENT_DATE,'$legislatie','$legislatieAnglia','$semne','$semneAnglia')");
            $statement2->bind_param("sssssss", $username, $password, $name, $localitate, $email, $datanasterii, $telefon);

            $statement2->execute();
            $statement2->fetch();
            $statement2->close();
            header("location: ../Login/loginRomania.php");
        }
    }
    ?>
    <div class="card">
        <h3 class="form-text">Inregistrare:</h3>
        <form class="form" method="post">
            <h2 id="username-title">Utilizator:</h2>
            <input type="text" name="username" placeholder="Username" class="username">
            <span class="error"><?php echo $usernameErr; ?></span>

            <h2 id="email-title">Email:</h2>
            <input type="text" name="email" placeholder="Email" class="email">
            <span class="error"><?php echo $emailErr; ?></span>

            <h2 class="password-title">Parola:</h2>
            <input type="password" name="password" placeholder="Password" class="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <h2 class="password-title">Rescrieti parola:</h2>
            <input type="password" name="password1" placeholder="Password" class="password">
            <span class="error"><?php echo $password1Err; ?></span>

            <h2 class="nume-title">Nume prenume:</h2>
            <input type="text" name="nume" placeholder="Nume prenume" class="email">
            <span class="error"><?php echo $nameErr; ?></span>

            <h2 class="localitate-title">Localitate:</h2>
            <input type="text" name="localitate" placeholder="Localitate" class="email">
            <span class="error"><?php echo $localitateErr; ?></span>

            <h2 class="localitate-title">Data nasterii:</h2>
            <input type="text" name="datanasterii" placeholder="Data nasterii AAAA.LL.ZZ" class="email">
            <span class="error"><?php echo $datanasteriiErr; ?></span>

            <h2 class="localitate-title">Telefon: </h2>
            <input type="text" name="telefon" placeholder="Numar telefon" class="email">
            <span class="error"><?php echo $telefonErr; ?></span>
            <input type="submit" onclick="location.href = 'login.html'" value="submit" class="submit-button">
        </form>
    </div>

</body>

</html>