<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Wycieczki po Europie</title>
	<link rel="stylesheet" href="styl4.css">
</head>
<body>
<header>
	<h1>BIURO TURYSTYCZNE</h1>
</header>
<section id="data">
	<h3>Wycieczki, na które są wolne miejsca</h3>
	<?php
		require_once 'connect.php';
		$conn = mysqli_connect($host, $user, $pwd, $db);

		$q1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki;";
		$res1 = mysqli_query($conn, $q1);
		$rows = mysqli_num_rows($res1);

		echo "<ul>";
		for ($i = 0; $i < $rows; ++$i)
		{
			$row = mysqli_fetch_array($res1, MYSQLI_NUM);
			echo "<li>$row[0]. dnia $row[1] jedziemy do $row[2], cena: $row[3]</li>";
		}
		echo "</ul>";
	?>
</section>
<main>
	<section id="pleft">
		<h2>Bestselery</h2>
		<table>
			<tr><td>Wenecja</td><td>kwiecień</td></tr>
			<tr><td>Londyn</td><td>lipiec</td></tr>
			<tr><td>Rzym</td><td>wrzesień</td></tr>
		</table>
	</section>
	<section id="pctr">
		<h2>Nasze zdjęcia</h2>
		<?php
			$q2 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";
			$res2 = mysqli_query($conn, $q2);
			$rows = mysqli_num_rows($res2);

			for ($i = 0; $i < $rows; ++$i)
			{
				$row = mysqli_fetch_array($res2, MYSQLI_NUM);
				echo "<img src=$row[0] alt=$row[1]>";
			}

			mysqli_close($conn);
		?>
	</section>
	<section id="pright">
		<h2>Skontaktuj się</h2>
		<a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
		<p>telefon: 111222333</p>
	</section>
</main>
<footer>
	<p>Stronę wykonał: 00000000000</p>
</footer>
</body>
</html>