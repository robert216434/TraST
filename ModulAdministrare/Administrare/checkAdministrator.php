<?php
include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveRomania.php");
if($_SESSION['login_user']=="admin")
{echo "1";}
else {
    echo "0";
}
?>