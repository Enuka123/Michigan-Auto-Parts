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

             <a href="index.html" ><i class='bx bx-home' id="navicon"> Home</i></a>
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
        $query=mysqli_query($conn, "SELECT user.* FROM user WHERE user.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['fname'].' '.$row['lname'];
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

        <?php
include_once "./config/dbconnect.php";
$sql="SELECT * from product";
$result=$conn-> query($sql);
$count=1;
if ($result-> num_rows > 0){
  while ($row=$result-> fetch_assoc()) {
?>
            <div class="product-box">
            <div class="card">
            <img height='250px' width='250px' src='<?=$row["product_image"]?>'  alt="" class="product-img"><br>
            <h3 class="product_name"><?=$row["product_name"]?></h3>
            <p class="product-price"><?=$row["price"]?></p>
            <p class="product_desc"><?=$row["product_desc"]?></p>
            <i class='bx bx-shopping-bag add-cart'></i>
            </div>


</div>
<?php
      $count=$count+1;
    }
  }
?>

        </div>
    </section>
    <!-- link js  -->
    <script src="maincart.js"></script>
 
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
        <a href="index.html">Home</a>
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