<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Sierpniowy kalendarz</title>
	<link rel="stylesheet" href="styl5.css">
</head>
<body>
<header>
	<section id="pleft">
		<h1>Organizer: SIERPIEŃ</h1>
	</section>
	<section id="pctr">
		<form action="organizer-oop.php" method="post">
			<label>Zapisz wydarzenie: <input name="event"></label>
			<button name="ok">OK</button>
		</form>
		<?php
			require_once 'connect.php';
			$conn = new mysqli($host, $user, $pwd, $db);

			if (isset($_POST['ok']) && isset($_POST['event'])) 
			{
				$q1 = "UPDATE zadania SET wpis = '" . $_POST['event'] . "' WHERE dataZadania = '2020-08-09';";
				$res1 = $conn->query($q1);
			}
		?>
	</section>
	<section id="pright">
		<img src="logo2.png" alt="sierpień">
	</section>
</header>
<main>
	<?php
		$q2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien';";
		$res2 = $conn->query($q2);
		$rows = $res2->num_rows;

		for ($i = 0; $i < $rows; ++$i)
		{
			$row = $res2->fetch_array(MYSQLI_NUM);
			echo "<div><h5>$row[0]</h5><p>$row[1]</p></div>";
		}

		$conn->close();
	?>
</main>
<footer>
	<p>Stronę wykonał: 00000000000</p>
</footer>
</body>
</html>