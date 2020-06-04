<?php
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

include("config.php");

$sql = "SELECT * FROM user WHERE username LIKE '";
$sql .= $q;
$sql .= "%' ORDER BY username ASC";
$result = mysqli_query($db,$sql);

$inceput = <<<XYZ
<div class = "clasament">
	<h3>Utilizatori gasiti: </h3>
	<table class = "clasament-item">
		<tr>
			<th id='eltab'>Username</th>
			<th id='eltab'>Password</th>
			<th id='eltab'>Punctaj</th>
      <th id='eltab'>Nume</th>
      <th id='eltab'>Localitate</th>
      <th id='eltab'>Email</th>
      <th id='eltab'>Data nasterii</th>
      <th id='eltab'>Telefon</th>
		</tr>
		<tr>
XYZ;

$sfarsit = <<<XYZ

</td>
</tr>
</table>
</div>

XYZ;

echo $inceput;

while($row = mysqli_fetch_array($result)){
    echo "<tr>";

    echo "<td id='eltab'>";
    echo $row[0];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[1];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[2];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[4];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[5];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[6];
    echo "</td>";

    echo "<td id='eltab'>";
    echo $row[7];
    echo "</td>";
    
    echo "<td id='eltab'>";
    echo $row[8];
    echo "</td>";

    echo "</tr>";
}

echo $sfarsit;
?>