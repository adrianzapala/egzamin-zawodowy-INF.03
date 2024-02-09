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
				$conn = mysqli_connect($host, $user, $pwd, $db);

				$q1 = "SELECT nazwa, cena FROM towary LIMIT 4;";
				$res1 = mysqli_query($conn, $q1);
				$rows = mysqli_num_rows($res1);

				echo "<table>";
				for ($i = 0; $i < $rows; ++$i)
				{
					$row = mysqli_fetch_array($res1, MYSQLI_NUM);
					echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
				}
				echo "</table>";
			?>
		</section>
		<section id="pctr">
			<h2>Koszt zakupów</h2>
			<form action="index.php" method="post">
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
					$res2 = mysqli_query($conn, $q2);
					$row = mysqli_fetch_array($res2, MYSQLI_NUM);

					echo "wartość zakupów: " . $row[0] * $_POST['num'];
				}

				mysqli_close($conn);
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