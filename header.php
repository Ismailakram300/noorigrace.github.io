<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <link rel="stylesheet" href="css/style_admin.css"> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      
   </style>
</head>
<body>
   
<header class="header " >
   <div class="header-2">
      <div class="flex" >
      <h1 class="logo logo_res"  ><span style="color: while;" >Noori</span> <span style="color: black;">Grace</span></h1>

         <nav class="navbar">
            <a href="body.php">Home</a>
            <!-- <a href="home.php">Home</a> -->
            <!-- <a href="home.php">Home</a> -->
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>
         <!-- <a href="about.php">about</a> -->

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <!-- <a href="search_page.php" class="fas fa-search"></a> -->
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
               ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
         
         <div class="">
            
            <div id="" class="">

               <a href="logout.php" class="delete-btn">logout</a>
            </div>
         </div>
      </div>
   </div>

</header>
</body>
</html>