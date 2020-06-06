<!doctype html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Profil</title>
  <link rel="stylesheet" href="profilStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
  <link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">



  <div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">





    <?php
    include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");
    $user = $_SESSION['login_user'];
    require_once('../../IncludedNavbars/navbarRomania.html');
    $statement = $db->prepare("SELECT punctaj FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($punctaj);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();

    $statement = $db->prepare("SELECT nume FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($nume);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();

    $statement = $db->prepare("SELECT email FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($email);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();


    $statement = $db->prepare("SELECT localitate FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($localitate);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();


    $statement = $db->prepare("SELECT telefon FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($telefon);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();


    $statement = $db->prepare("SELECT datanasterii FROM user WHERE username = ? ");
    $statement->bind_param("s", $user);
    $statement->execute();
    $statement->bind_result($datanasterii);
    $okay = true;
    while ($statement->fetch()) {
    }
    $statement->close();

    ?>

    <div class="profile">
      <div class="person-information">
        <img src="../../MediaContent/imagini/userExample.png" alt="profile_image" class="profile-image">
        <h2 class="person-name"> <?php echo $user ?> </h2>
        <h4 class="person-short-info">Punctaj: <span class="textPersonInfo"> <?php echo $punctaj; ?> </span> </h4>
        <p class="person-details">
          Nume: <?php echo $nume; ?> <br>
          Localitate: <?php echo $localitate ?> <br>
          E-mail: <?php echo $email; ?> <br>
          Data nasterii: <?php echo $datanasterii; ?> <br>
          Telefon: <?php echo $telefon; ?>
        </p>
      </div>
    </div>



    <footer class="homeF">La revedere!.<br><span id="ceas"></span></footer>

  </div>
</body>

</html>