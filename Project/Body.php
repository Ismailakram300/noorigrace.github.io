<?php
$servername='localhost';
$username='root';
$password='';
$db_name='shop_db';
$conn=mysqli_connect($servername,$username,$password,$db_name);
if(!$conn){
  echo mysqli_connect_error();
}
else{
  echo "Connection establish";
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
  <!-- bootstrap link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="Product.css">
  <link rel="stylesheet" href="img.css">
</head>

<body>
  <!-- NavBar section Star -->
  <div class="page-header">
    <div class="panel">
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
    </div>
  </div>
    <!-- <div class="logo"> <img src="logo-grace_2x.png" width="70%" height="150px" alt=""></div> -->
    <div class="menu_bar menu-bar-res">
      <h1 class="logo logo_res">Noori<span>Grace</span></h1>
      <!-- <img src="Logo.png" width="20%" height="0px"  alt="" style="color: aliceblue;"> -->
      <ul class="menubar_ul menu-bar-ul-res">
        <li class="nav-li"><a href="#home">Home</a></li>
        <li class="nav-li"><a href="#">About</a></li>
        <li class="nav-li"><a href="#">Pages <i class="fas fa-caret-down"></i></a>

          <div class="dropdown-menu">
            <ul>
              <li><a href="#">Pricing</a></li>
              <li><a href="#">Portfolio</a></li>
              <li>
                <a href="#">Team <i class="fas fa-caret-right"></i></a>

                <div class="dropdown-menu-1">
                  <ul>
                    <li><a href="#">Team-1</a></li>
                    <li><a href="#">Team-2</a></li>
                    <li><a href="#">Team-3</a></li>
                    <li><a href="#">Team-4</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-li"><a href="#">Blog</a>
        </li>
        <li class="nav-li"><a href="#">Contact us</a></li>
      </ul>
      <button class="btn btn-primary">ll</button>
      <div>
        <!-- <input type="checkbox" id="checkbox_toggle" /> -->
        <label class="hamburger">&#9776;</label>

      </div>

    </div>

  <!-- Home Banner Section Start -->
  <section class="home" id="home">

    <!-- for slide -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/banner_90.webp" style="width:100%">
        <div class="text">Caption Text</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/fnc_10.webp" style="width:100%">
        <div class="text">Caption Two</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img3.jpg" style="width:100%">
        <div class="text">Caption Three</div>
      </div>

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>
  </section>
  <!-- Home Section End here -->

  <!-- Product section start here -->
  <section>
    <div class="row">
      <div class="col">
        <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image  " src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price"><?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
      </div>
      <!-- <div class="col">
        2 of 3
      </div>
      <div class="col">
        3 of 3
      </div> -->
    </div>
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
  <script src="index.js"></script>
  <script src="home.js"></script>
</body>

</html>