<!DOCTYPE HTML > 
<html>
	<head>
		<title> Vizualizare Produse</title>
		<meta  http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Inregistrariile din tabela produse</h1>
		<p><b>Toate inregistrariile din produse</b></p>
		<?php
			//conectare baza de date
			include("Conection.php");
			//se preiau inregistrariile din baza de date
			if($result=$mysqli->query("SELECT * FROM produse ORDER BY id_prod"))
			{
				//Afisare inregistrari pe ecran
				if($result->num_rows>0)
				{
					//afisarea inregistrariilor intr-o tabela
					echo "<table border='1' cellpadding='10'>";
					
					//antetul tabelului
					echo "<tr><th>ID</th><th>Nume_Produs</th><th>Pret</th><th>Categorie</th><th>Descriere</th><th>Imagine</th><th></th><th></th></tr>";
					
					while($row=$result->fetch_object())
					{
						//definirea unei linii pt fiecare inregistrare
						echo "<tr>";
						echo "<td>".$row->id_prod."</td>";
						echo "<td>".$row->nume_prod."</td>";
						echo "<td>".$row->pret."</td>";
						echo "<td>".$row->categorie."</td>";
                        echo "<td>".$row->descriere."</td>";
                        echo "<td>".$row->imagine."</td>";
						echo "<td><a href='Updateprod.php?id=" . $row->id_prod . "'>Modificare</a></td>";
						echo "<td><a href='Stergereprod.php?id=" . $row->id_prod . "'>Stergere</a></td>";
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
		<a href="Inserareprod.php">Adaugarea unei noi inregistrari</a>
	</body>
</html>