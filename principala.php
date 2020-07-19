<?php 
    // Initialize the session 
    session_start();   
    // Check if the user is logged in, if not then redirect him to login page 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    { 
        header("location: login.php");  
        exit; 
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
                <a href="#" class="brand">Logo</a>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <a href="#" class="cart">Cart</a>
                <a href="Logout.php" id="autentification">Log out</a>
                
                <span id="user"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1></span>
            </nav>
        </header>

        <main>
            <section class="first-section">
               
                <!-- <img src="section1.jpg"> -->
                
               <div>
                    <h1>Nume</h1>
                    <p>Whatever the craft demands, that’s what I desire to do. I build websites. That means writing, it means architecting, coding, and it has always meant design.Whatever the craft demands, that’s what I desire to do. I build websites. That means writing, it means architecting, coding, and it has always meant design.</p>
                </div>
            </section>

            <section class="second-section">
                <h1>Popular Products For Men</h1>
                <div class="product-list">
                    <div class="container">
                        <div class="product-title">
                            <h3>Apa de Toaleta Hugo Boss Bottled, 100ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p1b.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add" class="add">
                        </div>
                    </div>
                    <div class="container" id="myBtn">
                        <div class="product-title">
                            <h3>Apa de Toaleta Versace Dylan Blue, 50ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p2b.jpg">
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class='popup_content'>
                                    <div class="pop_img">
                                        <h2 class="pop_title">Versace Dylan Blue</h2>
                                        <img src="p2b.jpg"></div>
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
                                                        </tr><tr>
                                                            <td >Tip</td>
                                                            <td >Luxury</td>
                                                        </tr><tr class="rand_culoare">
                                                            <td >Pentru</td>
                                                            <td >Barbati</td>
                                                        </tr><tr>
                                                            <td >Forma/Textura</td>
                                                            <td >Fluid</td>
                                                        </tr><tr >
                                                            <td >Tip aplicare</td>
                                                            <td >Vaporizator</td>
                                                        </tr><tr>
                                                            <td >Continut pachet</td>
                                                            <td >1 x Apa de toaleta</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Giorgio Armani Acqua Di Gio Profumo, 75 ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p3b.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Paco Rabanne 1 million Prive, 100 ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p4b.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Chanel Bleu de Chanel, 50ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p5b.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                   
                </div>
                
                <h1>Popular Products For Women</h1>
                <div class="product-list">
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Carolina Herrera Good Girl, 80 ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p1f.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Versace Eros, 100ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p2f.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>       
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Jean Paul Gaultier Scandal, 80 ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p3f.jpg" >
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Yves Saint Laurent Black Opium, 50ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p4f.jpg">
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-title">
                            <h3>Parfum Chanel Coco Mademoiselle, Femei, 50ml</h3>
                        </div>
                        <div class="price">
                            <div class="img-product">
                                <img src="p5f.jpg">
                            </div>
                            <p>00.00$</p>
                            <input type="button" value="Add">
                        </div>
                    </div>                      
                </div>
            </section>

            <section class="third-section">
                <div class="third-content">
                    <div class="img1">
                        <!--<img src="s3.jpg">-->
                    </div>
                    <div class="img2">
                        <!--<img src="s32.jpg">-->
                    </div>
                    <div class="img3">
                        <!--<img src="s34.jpg">-->
                    </div>
                </div>
            </section>

            <section class="fourth-section">
                    <h1>Best sales of the month</h1>
                    <div class="product-list">
                        <div class="container">
                            <div class="product-title">
                                <h3>Apa de Toaleta Hugo Boss Bottled, 100ml</h3>
                            </div>
                            <div class="price">
                                <div class="img-product">
                                    <img src="p1b.jpg" >
                                </div>
                                <p>00.00$<sup>00.00$</sup></p>
                                <input type="button" value="Add" class="add">
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-title">
                                <h3>Apa de Toaleta Versace Dylan Blue, 50ml</h3>
                            </div>
                            <div class="price">
                                <div class="img-product">
                                    <img src="p2b.jpg">
                                </div>
                                <p>00.00$<sup>00.00$</sup></p>
                                <input type="button" value="Add">
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-title">
                                <h3>Parfum Giorgio Armani Acqua Di Gio Profumo, 75 ml</h3>
                            </div>
                            <div class="price">
                                <div class="img-product">
                                    <img src="p3b.jpg" >
                                </div>
                                <p>00.00$<sup>00.00$</sup></p>
                                <input type="button" value="Add">
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-title">
                                <h3>Parfum Paco Rabanne 1 million Prive, 100 ml</h3>
                            </div>
                            <div class="price">
                                <div class="img-product">
                                    <img src="p4b.jpg" >
                                </div>
                                <p>00.00$<sup>00.00$</sup></p>
                                <input type="button" value="Add">
                            </div>
                        </div>
                        <div class="container">
                            <div class="product-title">
                                <h3>Parfum Chanel Bleu de Chanel, 50ml</h3>
                            </div>
                            <div class="price">
                                <div class="img-product">
                                    <img src="p5b.jpg" >
                                </div>
                                <p>00.00$<sup>00.00$</sup></p>
                                <input type="button" value="Add">
                            </div>
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
                <div class="footer-item">
                    <div><h1 class="title-footer-item">Contact us</h1></div>
                    
                    <div> 
                        <form action="site.html" method="post">
                            <div><input type="email" name="email" id="text-input" placeholder="Enter your email"></div>
                            <div><textarea name="message" id="placeholder" placeholder="Enter your message"></textarea></div>
                            <div><button type="submit" class="btn" onclick="test()">Send</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="footer-bottom" >
                <p>&copy; mysite.com | Designed by Rares Silaghi</p>
            </div>
        </footer>
        <script src="login.js"></script>
    </body>
</html>    