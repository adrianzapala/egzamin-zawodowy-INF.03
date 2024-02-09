<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Kwiaty</title>
	<link rel="stylesheet" href="styl3.css">
</head>
<body>
<header>
	<h1>Grupa Polskich Kwiaciarni</h1>
</header>
<main>
	<section id="pleft">
		<h2>Menu</h2>
		<ol>
			<li><a href="index.html">Strona główna</a></li>
			<li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
			<li><a href="znajdz.php">Znajdź kwiaciarnię</a></li>
			<ul>
				<li>w Warszawie</li>
				<li>w Malborku</li>
				<li>w Poznaniu</li>
			</ul>
		</ol>
	</section>
	<section id="pright">
		<h2>Znajdź kwiaciarnię</h2>
		<form action="znajdz.php" method="post">
			<label>Podaj nazwę miasta: <input type="text" name="city"></label>
			<button name="check">SPRAWDŹ</button>
		</form>
		<?php
			require_once 'connect.php';	
			$conn = mysqli_connect($host, $user, $pwd, $db);

			if (isset($_POST['check'])) 
			{
				$q = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '" . $_POST['city'] . "';";
				$res = mysqli_query($conn, $q);
				$row = mysqli_fetch_array($res, MYSQLI_NUM);

				echo "<h3>$row[0], $row[1]</h3>";
			}

			mysqli_close($conn);
		?>
	</section>
</main>
<footer>
	Stronę opracował: 00000000000
</footer>
</body>
</html>