<?php
require 'assets/database.php';



    
        if (isset($_POST['submit'])){
        
            // get form data 
            echo 'hi';
            $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ;
            $password = $_POST['password'];
            if (empty($username_email)){
                $_SESSION['signin'] = "Username or Email required";
                header('location: login.php');

            } else if (empty($password)){
                $_SESSION['signin'] = "Password required";	
                header('location: login.php');

            } else {
                // fecth user from database 
                $fetch_user_query = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email' ";
                $fetch_user_result = mysqli_query($connection, $fetch_user_query);
                if (mysqli_num_rows($fetch_user_result)){
                    // convert the record into assoc array 
                echo 'user found';

                $user_record = mysqli_fetch_assoc($fetch_user_result);
                $db_password = $user_record['password']; // get hashed password from database
                // compare hashed password to password user enter in form 
                    if (password_verify($password, $db_password)){
                        $_SESSION['user_id'] = $user_record['id'];
                        header('location: index.php');
                        // a lot of reason to use id 
                        // set session if user admin 
                        if ($user_record['is_admin'] == 1){
                            $_SESSION['user-is-admin'] = true;
                            header('location: index.php');	

                        }
                    }
                    else {
                        $_SESSION['signin'] = "Password or Username is incorrect";
                    }
                }
                else {
                    $_SESSION['signin'] = "User not found";
                }
                // if (isset($_SESSION['signin'])){
                //     $_SESSION['signin-data'] = $_POST;
                //     header ('Location: ' . ROOT_URL . 'login.php');
                //     die();
                // }
            }
            if (isset($_SESSION['signin'])){

                header('location: login.php');
            }
        }
    


