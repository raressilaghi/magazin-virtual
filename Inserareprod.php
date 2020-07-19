<?php
	include("Conection.php");
	if(isset($_POST['submit'])){
        //preluam datele de pe formular
        $id_prod=htmlentities($_POST['id_prod'],ENT_QUOTES);
		$nume_prod=htmlentities($_POST['nume_prod'],ENT_QUOTES);
		$pret = htmlentities($_POST['pret'], ENT_QUOTES);
		$categorie =htmlentities($_POST['categorie'], ENT_QUOTES);
        $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
        $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
		//verificam daca sunt completate
		if($id_prod== '' || $nume_prod== ''|| $pret=='' || $categorie=='' || $descriere=='' || $imagine==''){
			//daca sunt goale se afiseaza mesajul
			$error = 'ERROR: Campuri goale!';
		}
		else{
			//insert
			if($stmt = $mysqli->prepare("INSERT INTO produse(id_prod, nume_prod, pret, categorie, descriere, imagine) VALUES(?,?,?,?,?,?)")){
				$stmt->bind_param("ssssss",$id_prod,$nume_prod,$pret,$categorie,$descriere,$imagine);
				$stmt->execute();
				$stmt->close();
			}
			//eroare inserare
			else{
				 echo "ERROR: Nu se poate executa insert."; 
			}
		}
			
			
	}
	 // se inchide conexiune mysqli 
	$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		 <title><?php echo "Inserare inregistrare"; ?> </title>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	</head>
	<body>
	<h1><?php echo "Inserare inregistrare"?></h1>
	<?php
		if($error!=''){
			 echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";
			 } 
		
	?>
	<form action="" method="POST"> 
		<div>
            <strong>ID_prod: </strong> <input type="int" name="id_prod" value=""/><br/> 
			<strong>Nume_prod: </strong> <input type="text" name="nume_prod" value=""/><br/> 
			<strong>Pret: </strong> <input type="double" name="pret" value=""/><br/> 
			<strong>Categorie: </strong> <input type="text" name="categorie" value=""/><br/>
			<strong>Descriere: </strong> <input type="text" name="descriere" value=""/> <br/> 
            <strong>Imagine: </strong> <input type="text" name="imagine" value=""/> <br/> 
			<input type="submit" name="submit" value="Submit" /> 
			<a href="produsedb.php">Index</a> 
		</div>
	</form>
	</body>
</html>