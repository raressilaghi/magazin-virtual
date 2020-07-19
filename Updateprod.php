<?php // connectare bazadedate
include("Conection.php");
//Modificare datelor
// se preia id din pagina vizualizare
 if (!empty($_POST['id']))
    { if (isset($_POST['submit']))
        { // verificam daca id-ul din URL este unul valid
            if (is_numeric($_POST['id']))
            { // preluam variabilele din URL/form
                $id_prod = $_POST['id'];
                
		        $nume_prod=htmlentities($_POST['nume_prod'],ENT_QUOTES);
		        $pret = htmlentities($_POST['pret'], ENT_QUOTES);
		        $categorie =htmlentities($_POST['categorie'], ENT_QUOTES);
                $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
                $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
                // verificam daca numele, prenumele, an si grupa nu sunt goale
                if($id_prod== '' || $nume_prod== ''|| $pret=='' || $categorie=='' || $imagine=='')
                { // daca sunt goale afisam mesaj de eroare
                    echo "<div> ERROR: Completati campurile obligatorii!</div>";
                }
                else
                { // daca nu sunt erori se face update
                    if ($stmt = $mysqli->prepare("UPDATE produse SET nume_prod=?,pret=?,categorie=?,descriere=?,imagine=? WHERE id_prod='".$id_prod."'"))
                    {
                        $stmt->bind_param("sssss",$nume_prod,$pret,$categorie,$descriere,$imagine);
                        $stmt->execute();
                        $stmt->close();
                    }
                // mesaj de eroare in caz ca nu se poate face update
                    else
                    {
                        echo "ERROR: nu se poate executa update.";
                    }
                }
            }
            // daca variabila 'id' nu este valida, afisam mesaj de eroare
            else
            {
                echo "id incorect!";
            }
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title> <?php if ($_GET['id'] != ''){ echo "Modificare inregistrare"; } ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <h1><?php if ($_GET['id'] != '') { echo "Modificare Inregistrare"; }?></h1>
        <?php 
            /*if ($error != '') 
            {
                echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";
            }*/
        ?>
     <form action="" method="post">
        <div>
            <?php 
                if ($_GET['id'] != '') 
                { 
            ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <p>ID: <?php echo $_GET['id']; 
                        if ($result = $mysqli->query("SELECT * FROM produse where id_prod='".$_GET['id']."'"))
                        { 
                            if ($result->num_rows > 0)
                            { 
                               $row = $result->fetch_object();
                    ?></p>
                    
                    
            
            
			<strong>Nume_prod: </strong> <input type="text" name="nume_prod" value=""/><br/> 
			<strong>Pret: </strong> <input type="double" name="pret" value=""/><br/> 
			<strong>Categorie: </strong> <input type="text" name="categorie" value="<?php echo $row->$categorie;?>"/><br/>
			<strong>Descriere: </strong> <input type="text" name="descriere" value=""/><br/> 
            <strong>Imagine: </strong> <input type="text" name="imagine" value="<?php }}}?>"/> <br/> 
            <br/>
            <input type="submit" name="submit" value="Submit" />
            <a href="produsedb.php">Index</a>
        </div>
    </form>
    </body>
</html>
