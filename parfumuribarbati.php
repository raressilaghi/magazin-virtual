<?php 
// Initialize the session 
session_start();   
?>
<?php
    include("Conection.php"); 
    $query="Select * from produse Where categorie='Barbati'";
    $result=$mysqli->query($query);
    if(isset($_POST["add"])){
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
                 echo'<script>alert("Produsul a fost adaugat!")</script>';
             }
             else
             {
                echo'<script>alert("Produsul este deja in cos!")</script>';
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
            echo'<script>alert("Produsul a fost adaugat!")</script>';
        }
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
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfume shop</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css"/>

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
                    <form action="cautare.php" method="post" class="search">
                         <input type="text" name="search" placeholder="Cauta produse..."/>
                        <input type="submit" name="search1" value=">>"/>
                    </form>
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
                            <span id="user"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></span>
                            <ul>
                            <li class="dropdown">
                                <a href="#">Settings</a>
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

        <main>
            

            <section class="second-section">
                <h1>Produse pentru Barbati</h1>
            <div class="product-list">
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                
                <form method="post" div class="container" action="parfumuribarbati.php?action=add&id_prod=<?php echo $row["id_prod"]; ?>">
                        <div class="product-title">
                            <h3><?php echo $row["nume_prod"]; ?></h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <a href="<?php echo $row["id_prod"]."."."php";?>">
                                    <img src="<?php echo $row["imagine"]; ?>" >
                                </a>
                            </div>
                            <p><?php echo $row["pret"]; ?></p>
                            <input type="text" name="quantity" value="1"/>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["nume_prod"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["pret"]; ?>" />
                            <input type="submit" name="add" value="Add" class="add"/>
                        </div>
                    </form>
                
                <?php
                    }
                ?>
            </div>
            </section>

            <section class="third-section">
                <div class="third-content">
                    <div class="img1">
                    </div>
                    <div class="img2">
                    </div>
                    <div class="img3">
                    </div>
                </div>
            </section>

            
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-item">
                     <h1 class="title-footer-item">Contacts</h1>
                    <div>
                     <div class="contact">
                        <p>Adresa: Str. Avram Iancu Nr. 4</p>
                        <p>Telefon: 0748486620</p>
                        <p>Email: email.site@yahoo.com</p>
                     </div>
                     <div class="social">
                         <a href="https://ro-ro.facebook.com/"><img src="facebook.png"  height="30" width="30"></a>
                         <a href="https://twitter.com/?lang=ro"><img src="twitter.png"  height="30" width="30"></a>
                         <a href="https://www.instagram.com/?hl=ro"><img src="Insta.jfif"  height="30" width="30"></a>
                     </div>
                     </div>
                </div>
                <div class="footer-item">
                    <h1 class="title-footer-item">Quick Links</h1>
                    <ul>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">Terms and conditions</a></li>  
                    </ul>
                </div>
               
            </div>

            <div class="footer-bottom" >
                <p>&copy; mysite.com | Designed by Rares Silaghi</p>
            </div>
        </footer>
        <script src="login.js"></script>
    </body>
</html>  