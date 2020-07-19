<?php
	//conectarea la baza de date database
	include("Conection.php");
	//se verifica daca id a fost primit
	if(isset($_GET['id'])&& is_numeric($_GET['id']))
	{
		//preluam var id din URL
		$id=$_GET['id'];
		//stergem inregistrariile cu ibstudent=$id
		if($stmt=$mysqli->prepare("DELETE FROM produse WHERE id_prod=? LIMIT 1"))
		{
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->close();
		}
		else
		{
			echo "ERROR: Nu se poate executa delete.";
		}
		$mysqli->close();
		echo"<div>Inregistrarea a fost stearsa!!!</div>";
    }
    else{echo'Nu';}
	echo"<p><a href=\"produsedb.php\">Index</a></p>";
?>