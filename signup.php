<?php
    require 'assets/database.php';
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    

  <!-- <img src="./images/bookstacks (1).png" class="img1" alt=""> -->
    
  <div class="container">
    <div style="display:flex; justify-content: space-between; align-items: center;"
    >

    <div class="title" style="font-size: 2.5rem;">Sign up</div>
    <div>
    <p>Have an account?</p><a href="login.php" class="login">Login Here-></a>

    </div>
    </div>
    <div class="content">

      <form  method="post"  action="admin/signup-logic.php" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="name" placeholder="Enter your first name">
                </div>

                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" placeholder="Enter your username">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone" placeholder="Enter your number">
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" placeholder="Enter your address">
                </div>

                <div class="input-box">
                    <span class="details">Password <small style="color:grey">longer than 8 characters </small></span>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="input-box" >
                    <span class="details">Confirm Password</span>
                    <input type="password" name="confirmpassword" placeholder="Confirm your password">
                </div>
                <div class="input-box"> 
                    <span class="details">Upload your pic </span>
                    <input type="file" name="avatar" style="padding-top: 7px;" >
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register"name="submit"></input>
            </div>

      </form>
     
    </div>
  </div>

</body>
</html>
