<?php
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/configurareBD.php");

$sql = "SELECT * FROM user WHERE username LIKE '";
$sql .= $q;
$sql .= "%' ORDER BY username ASC";
$result = mysqli_query($db,$sql);

$inceput = <<<XYZ
<div class = "clasament">
	<h3>Utilizatori gasiti: </h3>
	<table class = "clasament-item">
		<tr>
			<th class='eltab'>Username</th>
			<th class='eltab'>Password</th>
			<th class='eltab'>Punctaj</th>
      <th class='eltab'>Nume</th>
      <th class='eltab'>Localitate</th>
      <th class='eltab'>Email</th>
      <th class='eltab'>Data nasterii</th>
      <th class='eltab'>Telefon</th>
		</tr>
	
XYZ;

$sfarsit = <<<XYZ

</td>

</table>
</div>

XYZ;

echo $inceput;

while($row = mysqli_fetch_array($result)){
    echo "<tr>";

    echo "<td class='eltab'>";
    echo $row[0];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[1];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[2];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[4];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[5];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[6];
    echo "</td>";

    echo "<td class='eltab'>";
    echo $row[7];
    echo "</td>";
    
    echo "<td class='eltab'>";
    echo $row[8];
    echo "</td>";

    echo "</tr>";
}

echo $sfarsit;
?>