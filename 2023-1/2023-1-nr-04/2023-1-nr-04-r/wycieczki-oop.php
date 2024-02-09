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
		$conn = new mysqli($host, $user, $pwd, $db);

		$q1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki;";
		$res1 = $conn->query($q1);
		$rows = $res1->num_rows;

		echo "<ul>";
		for ($i = 0; $i < $rows; ++$i)
		{
			$row = $res1->fetch_array(MYSQLI_NUM);
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
			$res2 = $conn->query($q2);
			$rows = $res2->num_rows;

			for ($i = 0; $i < $rows; ++$i)
			{
				$row = $res2->fetch_array(MYSQLI_NUM);
				echo "<img src=$row[0] alt=$row[1]>";
			}

			$conn->close();
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