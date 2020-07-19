<?php 
// Initialize the session 
    session_start();   

    include("Conection.php"); 
    $query="Select * from produse Order by id_prod";
    $result=$mysqli->query($query);

    if(isset($_POST["add"])){
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
                echo'<sctipt>alert("Produsul a fost adaugat in cos!")</script>';
            }
            else
            {
                echo'<sctipt>alert("Produsul este deja adaugat!")</script>';
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

    if(isset($_GET["action"])){
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

    if(isset($_POST["comanda"]))
    {
        if(!empty($_SESSION["shopping_cart"]))
        {
            $produse='';
            $cantitate='';
            $suma=0;
            $data= date("Y-m-d H:i:s");
            $client=$_SESSION["username"];
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $produse=$produse.", ".$values["item_name"];
                $cantitate=$cantitate.", ".$values["item_quantity"];
                $suma= $suma +($values["item_quantity"]* $values["item_price"]);
            }
        
        //insert
            if($stmt = $mysqli->prepare("INSERT INTO comenzi(produse, cantitate, pret, client, dataa) VALUES(?,?,?,?,?)"))
            {
				$stmt->bind_param("sssss", $produse,$cantitate,$suma,$client,$data);
				$stmt->execute();
                $stmt->close();
                echo'<script>alert("Comanda a fost plasata cu succes!")</script>';
                
                
            }
            else
            {
                echo "ERROR: Nu se poate plasa comanda."; 
            }
            
        }
        else{
            echo'<script>alert("Cosul este gol!")</script>';
        }
           // se inchide conexiune mysqli 
        $mysqli->close();
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Perfume shop</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    <body>
    <header>
            <nav>
            
                <a href="#" class="brand"><img src="logoo.png"/></a>
                <ul>
                    <li><a href="Shop.php">Home</a></li>
                    <li class="dropdown">
                        <a href="Shop.php">Products</a>
                        <div class="dropdown-content">
                            <a href="parfumuribarbati.php">Parfumuri Barbati</a>
                            <a href="parfumurifemei.php">Parfumuri Femei</a>
                            
                        </div>
                    </li>
                    
                </ul>
                
                <?php
                    // Check if the user is logged in and if the user is the administrator 
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                ?>
                    <a href="cos.php" class="cart">Cart</a>
                    <a href="Login.php" id="autentification">Sign in</a>
                    <span id="user"></span>
                <?php
                    }
                    else
                    {
                        if($_SESSION["username"]=="administrator")
                        {
                ?>
                            <a href="Logout.php" id="autentification">Log out</a>
                            <span id="user"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></span>
                            <ul>
                            <li class="dropdown">
                                <a href="#">Settings</a>
                                <div class="dropdown-content">
                                    <a href="Changepassword.php">Schimba parola</a>
                                    <a href="administrator.php">Gestionare baze de date</a>
                                </div>
                            </li></ul>
                            <form action="cautare.php" method="post" class="search">
                                <input type="text" name="search" placeholder="Cauta produse..."/>
                                <input type="submit" name="search1" value=">>"/>
                            </form>
                <?php
                        }
                        else{
                ?>
                            <a href="cos.php" class="cart">Cart</a>
                            <a href="Logout.php" id="autentification">Log out</a>
                            <span id="user"><h1 id="user">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></span>
                            <ul>
                            <li class="dropdown">
                                <a href="#">Setings</a>
                                <div class="dropdown-content">
                                    <a href="Changepassword.php">Schimba parola</a>
                                </div>
                            </li></ul>
                            <form action="cautare.php" method="post" class="search">
                                <input type="text" name="search" placeholder="Cauta produse..."/>
                                <input type="submit" name="search1" value=">>"/>
                            </form>
                
                <?php
                        }
                    }

                ?>
            </nav>
        </header>
    <section>
                    <h3>Cos de cumparaturi</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="rand_culoare">
                            <th width="40%">Nume Produs</th>
                            <th width="10%">Cantitate</th>
                            <th width="20%">Pret</th>
                            <th width="15%">Total</th>
                            <th width="5%">Action</th>
                        </tr>
                        <?php
                            if(!empty($_SESSION["shopping_cart"]))
                            {
                                $total=0;
                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                {
                        ?>
                        <tr >
                            <td ><?php echo $values["item_name"] ;?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>$<?php echo $values["item_price"]; ?></td>
                            <td><?php echo number_format($values["item_quantity"]* $values["item_price"],2); ?></td>
                            <td><a href="cos.php?action=delete&id_prod=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                        <?php       
                                $total= $total +($values["item_quantity"]* $values["item_price"]);
                                }
                        ?>
                        <tr class="rand_culoare">
                            <td colspan="3" align="right">Total</td>
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>
						    <td></td>
                        </tr>

                        <?php
                            }
                
                        ?>
                    </table>
                </div>
            </section>
            <form method="post">
                <input type="submit" name="comanda" value="Comanda" class="comanda"/>
            </form>
    </body>
</html>