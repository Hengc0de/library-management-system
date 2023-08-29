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
  <img src="./images/bookstacks (1).png" class="img1" alt="">
    
  <div class="container">
    <div style="display:flex; justify-content: space-between; align-items: center;">
    <div class="title">Login</div>
    <div>

    </div>
    </div>
    <div class="content">
      <form  method="post"  action="./signin-logic.php" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span >Username or Email</span>
                    <input type="text" name="username_email" placeholder="Enter your username">
                </div>
                <div class="input-box">
                    <span >Password </span>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Login" name="submit"></input>
            </div>
            <div class="zin" >
               <p>New to Bookmark?</p>
                <a href="signup.php" style="margin: 0 20px; padding: 10px; background-color: var(--blue); border-radius: 4px; text-decoration: none; color: black;">Register Here</a>
            </div>
      </form>

        <!-- // if (isset($_POST['submit'])){
        //     $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //     $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // } -->

    </div>
  </div>
  <?php if (isset($_SESSION['signin'])) : ?>
    <div class="alert error">
        <p><?= $_SESSION['signin'] ?><?php unset($_SESSION['signin']) ?></p>
    </div>
    <?php endif; ?>
</body>
</html>
