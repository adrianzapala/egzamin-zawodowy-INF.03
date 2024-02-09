<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Biblioteka</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
	<h1>Biblioteka w Książkowicach Małych</h1>
</header>
<main>
	<section id="pleft">
		<h4>Dodaj czytelnika</h4>
		<form action="biblioteka-oop.php" method="post">
			<label>imię: <input name="first_name"><br></label>
			<label>nazwisko: <input name="last_name"><br></label>
			<label>symbol: <input type="number" name="symbol"><br></label>
			<button name="accept">AKCEPTUJ</button>
		</form>
		<?php
			require_once 'connect.php';
			$conn = new mysqli($host, $user, $pwd, $db);

			if (isset($_POST['accept'])) 
			{
				$q1 = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['symbol'] . "');";
				$res1 = $conn->query($q1);

				echo "Dodano czytelnika " . $_POST['first_name'] . " " . $_POST['last_name'];
			}
		?>
	</section>
	<section id="pctr">
		<img src="biblioteka.png" alt="biblioteka">
		<h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
		<p>e-mail: <a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
	</section>
	<section id="pright">
		<h4>Nasi czytelnicy:</h4>
		<?php
			$q2 = "SELECT imie, nazwisko FROM czytelnicy ORDER BY nazwisko;";
			$res2 = $conn->query($q2);
			$rows = $res2->num_rows;

			echo "<ol>";
			for ($i = 0; $i < $rows; ++$i)
			{
				$row = $res2->fetch_array(MYSQLI_NUM);
				echo "<li>$row[0] $row[1]</li>";
			}
			echo "</ol>";

			$conn->close();
		?>
	</section>
</main>
<footer>
	<p>Projekt witryny: 00000000000</p>
</footer>
</body>
</html>