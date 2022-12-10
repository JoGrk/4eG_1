<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Port Lotniczy</title>
	<link rel="stylesheet" href="styl5.css" />
</head>
<body>
	<div id="baner1">
		<img src="zad5.png" alt="logo lotnisko" />
	</div>
	<div id="baner2">
		<h1>Przyloty</h1>
	</div>
	<div id="baner3">
		<h3>przydatne linki</h3>
		<a href="kwerendy.txt" target="_blank">Pobierz...</a>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>czas</th>
				<th>kierunek</th>
				<th>numer rejsu</th>
				<th>status</th>
			</tr>
			<?php
			
			$conn = new mysqli('localhost','root','','4eg_1_lotnisko');
			$sql = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
			$result = $conn -> query($sql);
			while($row = $result->fetch_row())
			{
				echo "<tr>";
				foreach($row as $value)
				{
					echo "<td>$value</td>";
				}

				echo "</tr>";
			}

			?>
		</table>
	</div>
	<div id="stopka1">
	<?php
		// skrypt 2
		if(isset($_COOKIE['ciacho'])){
			echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
			setcookie('ciacho',1,time()+2*60*60);
		}
		else{
			setcookie('ciacho',1,time()+2*60*60);
			echo "<p><b>Dzień dobry! Strona lotniska korzysta z ciasteczek</b></p>";
		}

	?>
	</div>
	<div id="stopka2">
		Autor: PESEL
	</div>
</body>
</html>