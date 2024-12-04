<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Poznaj Europę</title>
	<link rel="stylesheet" href="styl9.css">
</head>
<body>
<header>
	<h1>BIURO PODRÓŻY</h1>
</header>
<main>
	<section id="pleft">
		<h2>Promocje</h2>
		<table>
			<tr><td>Warszawa</td><td>od 600 zł</td></tr>
			<tr><td>Wenecja</td><td>od 1200 zł</td></tr>
			<tr><td>Paryż</td><td>od 1200 zł</td></tr>
		</table>
	</section>
	<section id="pctr">
		<h2>W tym roku jedziemy do...</h2>
		<?php
			$host = 'localhost';
			$user = 'root';
			$pwd = '';
			$db = 'podroze';
			$conn = mysqli_connect($host, $user, $pwd, $db, 3307);
		
			$q2 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis;";
			$res2 = mysqli_query($conn, $q2);
			$rows = mysqli_num_rows($res2);

			for ($i = 0; $i < $rows; ++$i)
			{
				$row = mysqli_fetch_array($res2, MYSQLI_NUM);
				echo "<img src=$row[0] alt=$row[1]>";
			}
		?>
	</section>
	<section id="pright">
		<h2>Kontakt</h2>
		<a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
		<p>telefon: 444555666</p>
	</section>
</main>
<section id="data">
	<h3>W poprzednich latach byliśmy...</h3>
	<?php
		$q1 = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = FALSE;";
		$res1 = mysqli_query($conn, $q1);
		$rows = mysqli_num_rows($res1);

		echo "<ol>";
		for ($i = 0; $i < $rows; ++$i)
		{
			$row = mysqli_fetch_array($res1, MYSQLI_NUM);
			echo "<li>Dnia $row[1]. pojechaliśmy do $row[0]</li>";
		}
		echo "</ol>";
		
		mysqli_close($conn);
	?>
</section>
<footer>
	<p>Stronę wykonał: 00000000000</p>
</footer>
</body>
</html>