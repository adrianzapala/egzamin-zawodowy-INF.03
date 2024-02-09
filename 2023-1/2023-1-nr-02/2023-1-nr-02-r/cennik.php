<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Wynajem pokoi</title>
	<link rel="stylesheet" href="styl2.css">
</head>
<body>
<header>
	<h1>Pensjonat pod dobrym humorem</h1>
</header>
<main>
	<section id="pleft">
		<a href="index.html">GŁÓWNA</a>
		<img src="1.jpg" alt="pokoje">
	</section>
	<section id="pctr">
		<a href="cennik.php">CENNIK</a>
		<?php
			require_once 'connect.php';
			$conn = mysqli_connect($host, $user, $pwd, $db);

			$q = "SELECT * FROM pokoje;";
			$res = mysqli_query($conn, $q);
			$rows = mysqli_num_rows($res);

			echo "<table>";
			for ($i = 0; $i < $rows; ++$i)
			{
				$row = mysqli_fetch_array($res, MYSQLI_NUM);
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
			}
			echo "</table>";

			mysqli_close($conn);
		?>
	</section>
	<section id="pright">
		<a href="kalkulator.html">KALKULATOR</a>
		<img src="3.jpg" alt="pokoje">
	</section>
</main>
<footer>
	Stronę opracował: 00000000000
</footer>
</body>
</html>