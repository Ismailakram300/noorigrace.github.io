<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $p_type=$_POST['p_type'];

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      echo' <div class="alert alert-DANGER alert-dismissible " role="alert">
      Product Already Added <a href="#" class="alert-link"> </a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> </div>';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image , p_type) VALUES('$name', '$price', '$image', '$p_type')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
           echo' <div class="alert alert-success alert-dismissible " role="alert">
  Product Added <a href="#" class="alert-link"> Successfully</a>
</div>';
         }
      }else{
            echo' <div class="alert alert-danger alert-dismissible " role="alert">
  Product Cant Added  <a href="#" class="alert-link"> Successfully</a>
</div>';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style_admin.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title" style="color:  Red;"> shop products</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="enter product name" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <select name="p_type" class="box">
         <option value="cloth">Clothes</option>
         <option value="frag">Fragrances</option>
      </select>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<h1 class="head">Product/ <span style="color:  rgba(241, 176, 91, 0.9)">Clothes</span> </h1>
<section class="show-products">

<div class="clothes">
<div class="box-container">
<?php
   $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
   if (mysqli_num_rows($select_products) > 0) {
     while ($fetch_products = mysqli_fetch_assoc($select_products)) {
       if ($fetch_products['p_type'] == 'cloth') {
   ?>
   <div class="box">
      <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
      <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
   <?php
      }}
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
</div>
<h1 class="head">Product/ <span style="color:  rgba(241, 176, 91, 0.9);">Fragrances</span> </h1>
<div class="Fragrences">
<div class="box-container">
<?php
   $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
   if (mysqli_num_rows($select_products) > 0) {
     while ($fetch_products = mysqli_fetch_assoc($select_products)) {
       if ($fetch_products['p_type'] == 'frag') {
   ?>
   <div class="box">
      <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs:<?php echo $fetch_products['price']; ?>/-</div>
      <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
      <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
   <?php
      }}
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
</div>
</div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>