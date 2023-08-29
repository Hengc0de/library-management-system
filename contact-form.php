<?php
    require 'assets/database.php';
    if (isset($_SESSION['user-id'])){
      header('location:index.php');
   }
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./admin/assets/css/form.css">
    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
    
  <div class="container">
    <div style="display:flex; justify-content: space-between; align-items: center;">
    <div class="title">Contact Us</div>
    <div>

    </div>
    </div>
    <div class="content">
      <form method="post" action="send-mail.php" >
            <div class="user-details">
                <div class="input-box">
                    <span >Username </span>
                    <input type="text" id="username" name="username" placeholder="Enter your username">
                </div>
                <div class="input-box">
                    <span >Email </span>
                    <input type="email" id="email" name="email"  placeholder="Enter your username">
                </div>
            </div>
            
            <div class="user-details">
                <div class="input-box">
                    <span >Subject </span>
                    <input type="text" id="subject" name="subject" placeholder="Enter the subject">
                </div>

            </div>
            <div class="user-details">
                <div class="input-box">
                    <span >What can we help you with? </span>
                    <textarea name="body" id="body" cols="100" rows="10"></textarea>
                </div>
            </div>
            <div class="button">
                <button  style="background-color: var(--blue); padding: 10px 15px" id="ok" class="yes"  value="Send" type="submit" name="send">SEND</button>
            </div>
      </form>
    </div>
  </div>
  <?php if (isset($_SESSION['success'])) : ?>
    <div class="alert success">
        <p><?= $_SESSION['success'] ?><?php unset($_SESSION['success']) ?></p>
    </div>
    <?php endif; ?>
</body>
</html>
