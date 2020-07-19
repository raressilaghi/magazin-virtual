<!DOCTYPE HTML > 
<html>
	<head>
		<title> Vizualizare Produse</title>
		<meta  http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Inregistrariile din tabela users</h1>
		<p><b>Toate inregistrariile din users</b></p>
		<?php
			//conectare baza de date
			include("Conection.php");
			//se preiau inregistrariile din baza de date
			if($result=$mysqli->query("SELECT * FROM users ORDER BY id"))
			{
				//Afisare inregistrari pe ecran
				if($result->num_rows>0)
				{
					//afisarea inregistrariilor intr-o tabela
					echo "<table border='1' cellpadding='10'>";
					
					//antetul tabelului
					echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Created_at</th><th></th><th></th></tr>";
					
					while($row=$result->fetch_object())
					{
						//definirea unei linii pt fiecare inregistrare
						echo "<tr>";
						echo "<td>".$row->id."</td>";
						echo "<td>".$row->username."</td>";
						echo "<td>".$row->password."</td>";
						echo "<td>".$row->created_at."</td>";
						echo "<td><a href='Updateusers.php?id=" . $row->id . "'>Modificare</a></td>";
						echo "<td><a href='Stergeusers.php?id=" . $row->id . "'>Stergere</a></td>";
						echo "</tr>";
					}
					echo"</table>";
					
					
				}
				// daca nu sunt inregistrari se afiseaza un rezultat de eroare
				else{
					echo "Nu sunt inregistrari in tabel!";
				}
			}
			// eroare in caz de insucces in interogare 
			else{
				echo "Error:".$mysqli->error();
			}
			// se inchide
			$mysqli->close();
			
		?>
		<a href="Inserare.php">Adaugarea unei noi inregistrari</a>
	</body>
</html>