<?php

include 'config.php';



if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

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
<a href="body.php" style="color: white;">

    <button class="btn white">
        Go Back
    </button>
</a>
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
        <div class="f-m">
           
            <div class="form">
                <form action="" method="post">
                    <h3 style="color:  rgb(7, 58, 201 ); font-family: sans-serif;">Give Your Feedback Here!</h3>
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
                    <input type="submit" value="send message" name="send" class="btn">
                </form>
            </div>
            <div class="map1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.6687532560422!2d73.06459211468712!3d33.61389814815063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df94bfa6b32b4d%3A0x28563595f310ea76!2sCommittee%20Chowk%20Water%20Filter%20Plant!5e0!3m2!1sen!2s!4v1672788154172!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>

            </div>
        </div>
    </section>
    <section>
        <footer>
            </footer>
        </section>
    </body>
    
    </html>
     