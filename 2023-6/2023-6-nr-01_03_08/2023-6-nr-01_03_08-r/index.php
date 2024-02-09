<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Sklep dla uczniów</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
	<h1>Dzisiejsze promocje naszego sklepu</h1>
</header>
<main>
	<section id="pleft">
		<h2>Taniej o 30%</h2>
		<?php
			require_once 'connect.php';
			$conn = mysqli_connect($host, $user, $pwd, $db);
			
			$q1 = "SELECT nazwa FROM towary WHERE promocja = 1;";
			$res1 = mysqli_query($conn, $q1);
			$rows = mysqli_num_rows($res1);

			echo "<ul>";
			for ($i = 0; $i < $rows; ++$i)
			{
				$row = mysqli_fetch_array($res1, MYSQLI_NUM);
				echo "<li>$row[0]</li>";
			}
			echo "</ul>";
		?>
	</section>
	<section id="pctr">
		<h2>Sprawdź cenę</h2>
		<form action="index.php" method="post">
			<select name="products">
				<option value="Gumka do mazania">Gumka do mazania</option>
				<option value="Cienkopis">Cienkopis</option>
				<option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
				<option value="Markery 4 szt.">Markery 4 szt.</option>
			</select>
			<button name="check">SPRAWDŹ</button>
		</form>
		<?php
			if (isset($_POST['check'])) 
			{
				$q2 = "SELECT cena FROM towary WHERE nazwa = '" . $_POST['products'] . "';";
				$res2 = mysqli_query($conn, $q2);
				$row = mysqli_fetch_array($res2, MYSQLI_NUM);

				echo "<div id='price'>cena regularna: $row[0]<br>cena w promocji 30%: " . $row[0] - 0.3 * $row[0] . "</div>";
			}

			mysqli_close($conn);
		?>
	</section>
	<section id="pright">
		<h2>Kontakt</h2>
		<p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
		<img src="promocja.png" alt="promocja">
	</section>
</main>
<footer>
	Autor strony: 00000000000
</footer>
</body>
</html>