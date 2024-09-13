<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fontawesome.com/icons' rel='stylesheet'>
    <title>Michigan Auto Spares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" type="image/x-icon" href="images/bgnone.png">
    <script src="https://kit.fontawesome.com/cf6a7efb30.js" crossorigin="anonymous"></script>
</head>
<body>



<div class="container"> 
    <div class="header">
        <a href="homepage.php" ><img src="images/bgnone.png" alt="logo" class="logo"></a>


         <input type="checkbox" id="check">
         <label for="check" class="icons">
             <i class='bx bx-menu' id="menu-icon"></i>
             <i class='bx bx-x' id="close-icon"></i>
         </label>
         <nav class="navbar">

             <a href="homepage.php" ><i class='bx bx-home' id="navicon"> Home</i></a>
             <a href="aboutus.html"><i class='bx bxs-user' id="navicon"> About Us</i></a>
             <a href="feedback.html" ><i class='bx bx-message-rounded-dots' id="navicon"> Feedback</i></a>
             <a href="product.html" ><i class='bx bxl-product-hunt' id="navicon"> Product</i></a>
         </nav>

         <div class="icon">
            <form action="">
                <input type="search" placeholder="Search here ...">
                <i class="fa fa-search"></i>
            </form>

<!----------------------------------------------------------------------------------------------------------------->

                <div class="nav container">
            
                    <!-- CART ICON  -->
                    <i class='bx bx-shopping-bag' id="cart-icon"></i>
        
                    <!-- CART  -->
                    <div class="cart">
                        <h2 class="cart-title">Your Cart</h2>
        
                        <!-- CONTENT  -->
                        <div class="cart-content">
        
        
                        </div>
        
                        <!-- TOTAL   -->
                        <div class="total">
                            <div class="total-title">Total</div>
                            <div class="total-price">$0</div>
                        </div>
                        <!-- BUY BUTTON  -->
                        <button type="button" class="btn-buy">Buy Now</button>
                        <!-- CART CLOSE  -->
                        <i class='bx bx-x' id="cart-close"></i>
                    </div>
                </div>
            </div>
 
         </div>
    </div>

    <!--User name show-->
    <div class="usernames">
      <p>
       Hi  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
       <i class='bx bxs-user-circle'></i>
      </p>
      <a href="logout.php"><i class='bx bx-log-out-circle'></i>Logout</a>
    </div>


    <!-- SHOP SECTION  -->
    <section class="shop container">
        <h2 class="section-title">Shop Products</h2>

        <!-- CONTENT  -->
        <div class="shop-content">
            <!-- BOX 1 -->
            <div class="product-box">
                <img src="images/p1.jpg" alt="" class="product-img">
                <h2 class="product-title">Head Lamp</h2>
                <span class="product-price">RS. 13000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 2 -->
            <div class="product-box">
                <img src="images/p2.jpg" alt="" class="product-img">
                <h2 class="product-title">Tail Lamp</h2>
                <span class="product-price">RS. 10000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 3 -->
            <div class="product-box">
                <img src="images/p3.jpg" alt="" class="product-img">
                <h2 class="product-title">Frot Bumper</h2>
                <span class="product-price">RS. 15000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 4 -->
            <div class="product-box">
                <img src="images/p4.jpeg" alt="" class="product-img">
                <h2 class="product-title">Rear Bumper</h2>
                <span class="product-price">RS. 12000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 5 -->
            <div class="product-box">
                <img src="images/p5.jpeg" alt="" class="product-img">
                <h2 class="product-title">Rear Door</h2>
                <span class="product-price">RS. 16000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 6 -->
            <div class="product-box">
                <img src="images/p6.jpeg" alt="" class="product-img">
                <h2 class="product-title">Steering Wheel</h2>
                <span class="product-price">RS. 11000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 7 -->
            <div class="product-box">
                <img src="images/p7.jpeg" alt="" class="product-img">
                <h2 class="product-title">Engine Top Cover</h2>
                <span class="product-price">RS. 8500.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 8 -->
            <div class="product-box">
                <img src="images/p8_.jpg" alt="" class="product-img">
                <h2 class="product-title">Engine Under Guard</h2>
                <span class="product-price">RS.9500.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 9 -->
            <div class="product-box">
                <img src="images/p9.jpeg" alt="" class="product-img">
                <h2 class="product-title">Hybrid Battery</h2>
                <span class="product-price">RS. 110000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 10 -->
            <div class="product-box">
                <img src="images/p10.jpeg" alt="" class="product-img">
                <h2 class="product-title">Windscreen</h2>
                <span class="product-price">RS. 28000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 11 -->
            <div class="product-box">
                <img src="images/p11.jpeg" alt="" class="product-img">
                <h2 class="product-title">Side Mirror</h2>
                <span class="product-price">RS.12000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 12 -->
            <div class="product-box">
                <img src="images/p12.jpg" alt="" class="product-img">
                <h2 class="product-title">AC Compressor</h2>
                <span class="product-price">RS. 16000.00</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
    </section>
    <!-- link js  -->
    <script src="maincart.js"></script>
       
<!----------------------------------------------------------------------------------------------------------------->

<div class="footerContainer">
    <div class="social-icon">
      <a target="_blank" href="https://www.facebook.com/login.php"><i class='bx bxl-facebook-circle'></i></a>
      <a target="_blank" href="https://www.instagram.com/?hl=en"><i class='bx bxl-instagram-alt'></i></a>
      <a target="_blank" href="https://www.bing.com/search?q=twitter&qs=ds&form=QBRE"><i class='bx bxl-twitter'></i></a>
      <a target="_blank" href="https://www.reddit.com/?rdt=33477"><i class='bx bxl-reddit'></i></a>
      <a target="_blank" href="https://www.tiktok.com/explore"><i class='bx bxl-tiktok'></i></a>
    </div>
    <div class="footerNav">
      <div class="footerTitle">
        <a href="index.php">Home</a>
        <a href="aboutus.html">About Us</a>
        <a href="aboutus.html">Contact Us</a>
        <a href="product.html">Product</a>
        <a href="feedback.html">Feedback</a>
      </div>
  </div>
  <div class="footerBottom">
    <p>Copyright &copy;2024 Designed by <span class="designer">Gayashan Balasooriya</span></p>
  </div>
</div>

    
</body>
</html>