<?php 
session_start();   

include("Conection.php"); 

$query="Select * from produse Order by id_prod";
    $result=$mysqli->query($query);
    
   
     if(isset($_POST["add"]))
    {
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
        {
        echo '<script>alert("Nu puteti cumpara produse daca nu va inregistrati")</script>';
        }
        else
     {

        if( isset($_SESSION["shopping_cart"]))
       {
            $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
            if(!in_array($_GET["id_prod"], $item_array_id))
            {
                $count= count($_SESSION["shopping_cart"]);
                $item_array= array(
                    'item_id' => $_GET["id_prod"],
                    'item_name' => $_POST["hidden_name"],
                    'item_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count]= $item_array;
                echo '<sctipt>alert("Produsul a fost adaugat!")</script>';
            }
            else
            {
                echo '<sctipt>alert("Produsul este deja adaugat!")</script>';
            }
       }
       else{
           $item_array= array(
               'item_id' => $_GET["id_prod"],
               'item_name' => $_POST["hidden_name"],
               'item_price' => $_POST["hidden_price"],
               'item_quantity' => $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0]= $item_array;
       }
      }
     }

     if(isset($_GET["action"]))
     {
        if($_GET["action"]== "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values){
                if($values["item_id"] == $_GET["id_prod"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Produs inlaturat")</script>';
                }
            }
        }
     }
    //search
     if(isset($_POST["search1"]))
     {
        $searchq=$_POST['search'];
        $query1= "Select * from produse WHERE nume_prod LIKE '%$searchq%'";
        $result1=$mysqli->query($query1);
        
        if($searchq===""){
            echo '<script>alert("Nu exista rezultate")</script>';
        }
        else{
        $i=0;
        while($row1 =mysqli_fetch_array($result1)){
            $nume_prod=$row1['nume_prod'];
            $pret=$row1['pret'];
            $imagine=$row1['imagine'];
            $item_array1= array(
                
                'item_nume' => $nume_prod,
                'item_pret' => $pret,
                'item_imagine' => $imagine
            );
            $_SESSION["cautare"][$i]= $item_array1;
            $i=$i+1;
        }
     }
     
    }
    

?>
<html>
    <head>
        <title>Cautare</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css"/>
    <head>
    <body>
    
     <?php
        if(!empty($_SESSION["cautare"]))
        {
     
            foreach($_SESSION["cautare"] as $keys => $values)
            {
     ?>
     <div class="product-list">
        <form method="post"  class="container" action="Shop.php?action=add&id_prod=<?php echo $row["id_prod"]; ?>">
                        <div class="product-title">
                            <h3><?php echo $values["item_nume"] ;?></h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <a href="#">
                                    <img src="<?php echo $values["item_imagine"] ;?>" >
                                </a>
                            </div>
                            <p><?php echo $values["item_pret"] ;?>$</p>
                            <input type="text" name="quantity" value="1"/>
                            <input type="hidden" name="hidden_name" value="<?php echo $values["item_nume"] ;?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $values["item_pret"] ;?>" />
                            <input type="submit" name="add" value="Add" class="add"/>
                        </div>
                    </form>
    </div>
        <?php
            }
        }
        else{
            echo '<script>alert("Nu exista rezultate")</script>';
        }
        ?>
    </body>
</html>