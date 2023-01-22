<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'shop_db';
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
  echo mysqli_connect_error();
}

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($check_cart_numbers) > 0) {
    $message[] = 'already added to cart!';
  } else {
    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
    $message[] = 'product added to cart!';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- bootstrap link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="Mainhome.css">
  <link rel="stylesheet" href="img.css">
  <link rel="stylesheet" href="Product.css">
  <link rel="stylesheet" href="body_style.css">
  <style>
    

  </style>
  
</head>

<body>

  <!-- NavBar section Star -->
  <div class="page-header">
    <!-- <div class="panel">
      <a href="">
        <button class="panel-btn">Sign up</button>
      </a>
      <a href="">
        <button class="panel-btn">Login</button>
      </a>
      <ul class="ul-items">
        <li class="panel-li"><i class="fas fa-shopping-cart  "></i>
          <span style="padding-left: 10px;">

            <i class="fas fa-search"></i><input class="search-bar" type="text" placeholder="Search here">
        </li>
        </span>
      </ul>
    </div> -->
    <!-- <div class="logo"> <img src="logo-grace_2x.png" width="70%" height="150px" alt=""></div> -->
    <?php include "nav.php" ?>

    <div class="hero">
      &nbsp;
      &nbsp;
    </div>

  </div>
  <!-- NavBar Section End -->
  <!-- Board start -->
  <section class="home">

    <div class="content">
      <h3>Latest Product Here! to your door.</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
      <a href="footer.php" class="white-btn">discover more</a>
    </div>

  </section>

  <!-- board End -->
  <!-- Home Banner Section Start -->
  <div class="sell mt-10 ">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-60" src="/Project/image/banner1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-60" src="/Project/image/banner2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-60" src="/Project/image/banner3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- banner ends here -->

  <!-- Product section start here -->

  <section class="Cloth" id="product">
    <center>


      <div class="product-heading">
        <a href="#items">

          <h1>Exculsive<span> Products</span></h1>
        </a>
      </div>
    </center>
    <div class="product-heading">
      <a href="#items">

        <h2 class="headi" style="color: rgb(33 27 46 / 90%);">Clothing<span> Products</span></h3>
      </a>
    </div>
    <div class="p1" id="clothes">

      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          if ($fetch_products['p_type'] == 'cloth') {
      ?>
            <div class="bo">
              <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">Rs: <?php echo $fetch_products['price']; ?>/-</div>
                 <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
            </div>
      <?php    }
        }
      } else {
        echo "no data found";
      }

      ?>

  </section>
  <section class="" id="Fragrances">
    <div class="product-heading">
      <a href="#items">

        <h2 class="headi" style="color: rgb(33 27 46 / 90%);">Fragrances<span>/ Products</span></h3>
      </a>
    </div>
    <div class="p1" id="items">


      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          if ($fetch_products['p_type'] == 'frag') {
      ?>
            <div class="bo">
              <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">Rs: <?php echo $fetch_products['price']; ?>/-</div>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
            </div>
      <?php    }
        }
      } else {
        echo "no data found";
      }

      ?>



      <!-- <div class="col">
        2 of 3
      </div>
      <div class="col">
        3 of 3
      </div> -->
      <!-- <div class="product-container" id="product">
      <div class="heading">
        <h1> Exclusive <span>Product</span></h1>
      </div>
      <div class="box-container">
        <div class="box">
          <div class="img">
            <img src="/image/product_img2.jpg" alt="">
          </div>
          <div class="container">
            <h3>Product Name</h3>
            <div class="price">
              <div class="amout">$20.5</div>
              <div class="offer">50% off</div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="/image/product_img1.jpg" alt="">
          </div>
          <div class="container">
            <h3>Product Name</h3>
            <div class="price">
              <div class="amout">$20.5</div>
              <div class="offer">50% off</div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="/image/product_img3.jpg" alt="">
          </div>
          <div class="container">
            <h3>Product Name</h3>
            <div class="price">
              <div class="amout">$20.5</div>
              <div class="offer">50% off</div>
            </div>
          </div>
        </div>



      </div>
    </div> -->
  </section>
  <!-- Product Section End here -->
  <!-- contact -->
  <section class="contacts">

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="contact.css">
    </head>
    
    <body>
        <h2 class="headi">Contact<span  style="color: rgba(241, 176, 91,0.9);" > Here</span></h3>
        <section class="contact">
            <div class="icons-container">
    
              <div class="icons">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Address</h3>
                <p>Murree Road/ Rawalpindi/ Pakistan</p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>IsmailAkram@gmail.com</p>
                <p>Ismai@Hotmain.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-solid fa-phone"></i>
                <h3>Phone</h3>
                <p>+92-0302-7890</p>
                <p>+92=-222-3333</p>
            </div>
    
            </div>
            <a href="http://localhost/clothing_website/login.php">
            <div class="f-m">

                 <div class="form">
                   <form action="" method="post">
                     <h3>say something!</h3>
                     <div >
                       <input type="text" name="name" required placeholder="Enter your Name" class="box   input">
                       
                      </div>
                      <div >
                        
                        <input type="email" name="email" required placeholder="Enter your Email" class="box inputBox">
                      </div>
                      <div >
                        
                        <input type="number" name="number" required placeholder="Enter your Number" class="box inputBox">
                      </div>
                      <textarea name="message" class="box" placeholder="Enter your message" id="" cols="30" rows="10"></textarea>
                    
                       <input tpe="submit" value="send message" name="send" class="btn">
                     </a> 
                    </form>
                  </div>
                  <div class="map1">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.6687532560422!2d73.06459211468712!3d33.61389814815063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df94bfa6b32b4d%3A0x28563595f310ea76!2sCommittee%20Chowk%20Water%20Filter%20Plant!5e0!3m2!1sen!2s!4v1672788154172!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>

</div>
                </div>
            
        </section>
    </body>
    
    </html>
  </section>
  <!-- contact -->
  <section id="about">

    <?php include 'footer.php'; ?>
  </section>
  <!-- <footer></footer> -->
  <script src="js/script.js"></script>
  <script src="index.js"></script>
  <script src="home.js"></script>
</body>

</html>