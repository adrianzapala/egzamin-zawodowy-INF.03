<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Zadania na lipiec</title>
	<link rel="stylesheet" href="styl6.css">
</head>
<body>
<header>
	<section id="pleft">
		<img src="logo1.png" alt="lipiec">
	</section>
	<section id="pright">
		<h1>TERMINARZ</h1>
		<p>najbliższe zadania:
		<!-- SKRYPT 1 -->
		<?php
			$host = 'localhost';
			$user = 'root';
			$pwd = '';
			$db = 'terminarz';
			
			$conn = mysqli_connect($host, $user, $pwd, $db, 3307);

			$q1 = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania >= '2020-07-01' and dataZadania <= '2020-07-07' and wpis != '';";
			$res1 = mysqli_query($conn, $q1);
			$rows = mysqli_num_rows($res1);
			
			for ($i = 0; $i < $rows; ++$i)
			{
				$row = mysqli_fetch_array($res1, MYSQLI_NUM);
				echo "$row[0]; ";
			} 
		?>
		</p>
	</section>	
</header>
<main>
	<?php
		$q2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";
		$res2 = mysqli_query($conn, $q2);
		$rows2 = mysqli_num_rows($res2);
		
		for ($i = 0; $i < $rows2; ++$i)
		{
			$row = mysqli_fetch_array($res2, MYSQLI_NUM);
			echo "<div><h6>$row[0]</h6><p>$row[1]</p></div>";
		}
		
		mysqli_close($conn);
	?>
</main>
<footer>
	<a href="sierpien.html">Terminarz na sierpień<a>
	<p>Stronę wykonał: 00000000000</p>
</footer>
</body>
</html>