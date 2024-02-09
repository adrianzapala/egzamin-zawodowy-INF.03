<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Hurtownia szkolna</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>
	<header>
		<h1>Hurtownia z najlepszymi cenami</h1>
	</header>
	<main>
		<section id="pleft">
			<h2>Nasze ceny</h2>
			<?php
				require_once 'connect.php';	
				$conn = new mysqli($host, $user, $pwd, $db);

				$q1 = "SELECT nazwa, cena FROM towary LIMIT 4;";
				$res1 = $conn->query($q1);
				$rows = $res1->num_rows;

				echo "<table>";
				for ($i = 0; $i < $rows; ++$i)
				{
					$row = $res1->fetch_array(MYSQLI_NUM);
					echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
				}
				echo "</table>";
			?>
		</section>
		<section id="pctr">
			<h2>Koszt zakupów</h2>
			<form action="index-oop.php" method="post">
				<label>wybierz artykuł:
				<select name="products">
					<option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
					<option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
					<option value="Cyrkiel">Cyrkiel</option>
					<option value="Linijka 30 cm">Linijka 30 cm</option>
				</select>
				<br></label>
				<label>liczba sztuk: <input type="number" name="num"><br></label>
				<button name="calc">OBLICZ</button>
			</form>
			<?php
				if (isset($_POST['calc']) && isset($_POST['num'])) 
				{
					$q2 = "SELECT cena FROM towary WHERE nazwa = '" . $_POST['products'] . "';";
					$res2 = $conn->query($q2);
					$row = $res2->fetch_array(MYSQLI_NUM);

					echo "wartość zakupów: " . $row[0] * $_POST['num'];
				}

				$conn->close();
			?>
		</section>
		<section id="pright">
			<h2>Kontakt</h2>
			<img src="zakupy.png" alt="hurtowania">
			<p>e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
		</section>
	</main>
	<footer>
		<h4>Witrynę wykonał: 00000000000</h4>
	</footer>
</body>
</html>