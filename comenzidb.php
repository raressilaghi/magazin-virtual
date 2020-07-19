<!DOCTYPE HTML > 
<html>
	<head>
		<title> Vizualizare Produse</title>
		<meta  http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Inregistrariile din tabela comenzi</h1>
		<p><b>Toate inregistrariile din comenzi</b></p>
		<?php
			//conectare baza de date
			include("Conection.php");
			//se preiau inregistrariile din baza de date
			if($result=$mysqli->query("SELECT * FROM comenzi ORDER BY id_comanda"))
			{
				//Afisare inregistrari pe ecran
				if($result->num_rows>0)
				{
					//afisarea inregistrariilor intr-o tabela
					echo "<table border='1' cellpadding='10'>";
					
					//antetul tabelului
					echo "<tr><th>ID</th><th>Produse</th><th>Cantitate</th><th>Pret</th><th>Client</th><th>Data</th><th></th><th></th></tr>";
					
					while($row=$result->fetch_object())
					{
						//definirea unei linii pt fiecare inregistrare
						echo "<tr>";
						echo "<td>".$row->id_comanda."</td>";
						echo "<td>".$row->produse."</td>";
						echo "<td>".$row->cantitate."</td>";
						echo "<td>".$row->pret."</td>";
                        echo "<td>".$row->client."</td>";
                        echo "<td>".$row->dataa."</td>";
						echo "<td><a href='Updateprod.php?id=" . $row->id_comanda . "'>Modificare</a></td>";
						echo "<td><a href='Stergereprod.php?id=" . $row->id_comanda . "'>Stergere</a></td>";
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