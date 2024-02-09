<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Biblioteka publiczna</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
	<h1>Biblioteka w Książkowicach Wielkich</h1>
</header>
<main>
	<section id="pleft">
		<h3>Polecamy dzieła autorów:</h3>
		<?php
			require_once 'connect.php';
			$conn = new mysqli($host, $user, $pwd, $db);
			
			$q1 = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko;";
			$res1 = $conn->query($$q1);
			$rows = $res1->num_rows;

			echo "<ol>";
			for ($i = 0; $i < $rows; ++$i)
			{
				$row = $res1->fetch_array(MYSQLI_NUM);
				echo "<li>$row[0] $row[1]</li>";
			}
			echo "</ol>";
		?>
	</section>
	<section id="pctr">
		<h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
		<p><a href="sekretariat@biblioteka.pl">Napisz do nas</a></p>
		<img src="biblioteka.png" alt="książki">
	</section>
	<section id="sect">
		<section id="pright1">
			<h3>Dodaj czytelnika</h3>
			<form action="biblioteka-oop.php" method="post">
				<label>imię: <input name="first_name"><br></label>
				<label>nazwisko: <input name="last_name"><br></label>
				<label>symbol: <input type="number" name="symbol"><br></label>
				<button name="add">DODAJ</button>
			</form>
			<?php
				$info = "";

				if (isset($_POST['add'])) 
				{
					$q2 = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['symbol'] . "');";
					$res2 = $conn->query($q2);

					$info = "Dodano czytelnika " . $_POST['first_name'] . " " . $_POST['last_name'];
				}
			?>
		</section>
		<section id="pright2">
			<?php
				echo $info;

				$conn->close();
			?>
		</section>
	</section>
</main>
<footer>
	<p>Projekt strony: 00000000000</p>
</footer>
</body>
</html>