<?php
     session_start();   
    include("Conection.php");
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
        <section class="admin">
            <div class="gestiune">
                <h1 >Administrare baze de date:</h1><br/>
                <a href="produsedb.php">Gestionati tabela Produse</a><br/>
                <a href="usersdb.php">Gestionati tabela Users</a><br/>
                <a href="comenzidb.php">Gestionati tabela Comenzi</a>
            </div>
        </section>
    </body>
</html>