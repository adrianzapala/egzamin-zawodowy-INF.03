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
		<form action="organizer.php" method="post">
			<label>Zapisz wydarzenie: <input name="event"></label>
			<button name="ok">OK</button>
		</form>
		<?php
			require_once 'connect.php';
			$conn = mysqli_connect($host, $user, $pwd, $db);

			if (isset($_POST['ok']) && isset($_POST['event'])) 
			{
				$q1 = "UPDATE zadania SET wpis = '" . $_POST['event'] . "' WHERE dataZadania = '2020-08-09';";
				$res1 = mysqli_query($conn, $q1);
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
		$res2 = mysqli_query($conn, $q2);
		$rows = mysqli_num_rows($res2);

		for ($i = 0; $i < $rows; ++$i)
		{
			$row = mysqli_fetch_array($res2, MYSQLI_NUM);
			echo "<div><h5>$row[0]</h5><p>$row[1]</p></div>";
		}

		mysqli_close($conn);
	?>
</main>
<footer>
	<p>Stronę wykonał: 00000000000</p>
</footer>
</body>
</html>