<html>
    <head>
        <title>Produs</title>
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
                                <a href="#">Setings</a>
                                <div class="dropdown-content">
                                    <a href="Changepassword.php">Schimba parola</a>
                                    <a href="administrator.php">Gestionare baze de date</a>
                                </div>
                            </li></ul>
                <?php
                        }
                        else{
                ?>
                            <a href="cos.php" class="cart">Cart</a>
                            <a href="Logout.php" id="autentification">Log out</a>
                            <span id="user"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></span>
                            <ul>
                            <li class="dropdown">
                                <a href="#">Setings</a>
                                <div class="dropdown-content">
                                    <a href="Changepassword.php">Schimba parola</a>
                                </div>
                            </li></ul>
                
                <?php
                        }
                    }

                ?>
            </nav>
        </header>
        <div class="modal-content">
            
                <div class='popup_content'>
                    <div class="pop_img">
                        <h2 class="pop_title">Versace Dylan Blue</h2>
                        <img src="p2b.jpg">
                    </div>
                    <div class='description'>
                        <h2 class="pop_t_description"><strong>Descriere</strong></h2>
                        <p id="pop_description"> Noul parfum Dylan Blue de la Versace este un parfum Aromatic Fougere pentru barbati. Noul parfum Dylan Blue de la Versace a fost lansat la sfarsitul lunii iulie a anului 2016.
                                            Parfumul se deschide cu note de apa, bergamota de Calabria, grapefruit si frunze de smochin.
                                            Inima parfumului o reprezinta note de frunza de violeta, papirus, paciuli, piper negru si ambroxan.
                                            Parfumul se inchide cu note de mosc, tamaie, boabe de tonka si sofran.</p>
                        <p class="pop_t_description"><strong>Caracteristici generale</strong></p>
                        <table >
                            <tbody>
                                <tr class="rand_culoare">
                                    <td >Tip produs</td>
                                    <td >Apa de toaleta</td>
                                </tr>
                                <tr>
                                    <td >Tip</td>
                                    <td >Luxury</td>
                                </tr>
                                <tr class="rand_culoare">
                                    <td >Pentru</td>
                                    <td >Barbati</td>
                                </tr>
                                <tr>
                                    <td >Forma/Textura</td>
                                    <td >Fluid</td>
                                </tr>
                                <tr >
                                    <td >Tip aplicare</td>
                                    <td >Vaporizator</td>
                                </tr>
                                <tr>
                                    <td >Continut pachet</td>
                                    <td >1 x Apa de toaleta</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div><a href="Shop.php"> << Inapoi la Produse</a></div>
    </body>
</html>