<!DOCTYPE html>
<html lang="ro">

<head>
	<meta charset="utf-8">
	<title>Clasament</title>
	<link rel="stylesheet" href="clasamentStyleSheet.css">
	<link rel="stylesheet" href="../../IncludedNavbars/navbarStyleSheet.css">
	<link rel="stylesheet" href="../../IncludedNavbars/semaforStyleSheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="ceas(); setInterval('ceas()', 1000 )">

	<div class="backgroundImage" style="background-image: url('../../MediaContent/imagini/audi.jpg');">



		<?php

		include("../../ConectareaUseruluiLaWebsite/SesiuniSiConfig/sesiuniActiveAnglia.php");
		require_once('../../IncludedNavbars/navbarAnglia.html');
		$user = $_SESSION['login_user'];

		$result = mysqli_query($db, "SELECT * FROM user ORDER BY punctaj DESC LIMIT 10");
		?>

		<div class="clasament">
			<h3 class="h3Top10">Top 10: </h3>
			<br>
			<table class="clasament-itemAng">
				<tr>
					<th class='eltab'>Place</th>
					<th class='eltab'>Username</th>
					<th class='eltab'>Points</th>
				</tr>
				<?php $i = 1;
				while ($row = mysqli_fetch_array($result)) : ?>
					<tr>
						<td class='eltab'><?php print $i;
											$i++; ?></td>
						<td class='eltab'><?php print $row[0]; ?></td>
						<td class='eltab'><?php print $row[2]; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>
			<br>
			<a href="../ClasamentRss/ClasamentRssAnglia.php" class="button_rss">RSS feed users</a>
		</div>


		<footer class="homeF-en">Good bye!<br><span id="ceas"></span></footer>

	</div>

</body>

</html>