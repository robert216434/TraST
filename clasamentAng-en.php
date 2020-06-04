<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8">
<title>Clasament</title>
	<link rel="stylesheet" href="clasament.css">
	<link rel="stylesheet" href="butoane.css">
	<link rel="stylesheet" href="semafor.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

<div class="backgroundImage" style="background-image: url('imagini/audi.jpg');">



<?php 
	
	include("sessions-en.php");
	require_once('barasus-en.html');
	$user = $_SESSION['login_user'];

	$result = mysqli_query($db,"SELECT * FROM user ORDER BY punctaj DESC LIMIT 10");
?>

<div class = "clasament">
	<h3 class="h3Top10">Top 10: </h3>
	<br>
	<table class = "clasament-itemAng">
		<tr>
			<th id='eltab'>Place</th>
			<th id='eltab'>Username</th>
			<th id='eltab'>Points</th>
		</tr>
		<?php $i=1; while($row = mysqli_fetch_array($result)): ?>
		<tr>
			<td id='eltab'><?php print $i; $i++;?></td>
			<td id='eltab'><?php print $row[0];?></td>
			<td id='eltab'><?php print $row[2];?></td>
		</tr>
	<?php endwhile; ?>
	</table>
	<br>
	<a href="rss-en.php" class="button_rss">RSS feed users</a>
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

<footer class="homeF-en">Good bye!<br><span id="ceas"></span></footer>

</div>

</body>

</html>