<?php
include '../assets/database.php';
        if (isset($_POST['submit'])){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $avatar = $_FILES['avatar'];
            $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $utype = "Student";
           
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
            // check if username or email exist alreaedy in db 
            $user_check_query = "SELECT * FROM users WHERE username = '$username'
                                    OR email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exists";
                header('location: signup.php');

            }
            else {
                // ter ka on avatar mdg 
                //rename avatar 
                $time = time(); //this is unique second from this time
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/'. $avatar_name;
                // make sure file is image 
                $allowed_files = ['png', 'jpg', 'jepg'];
                $extension = explode(".", $avatar_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_files)){
                    // make no large file 
                    if ($avatar['size'] < 10000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }
                    else {
                        $_SESSION['signup'] = "FILE SIZE CANNOT BE BIGGER THAN 1MB";
                        header('location: signup.php');
                    
                    }

                }
                else {
                    $_SESSION['signup'] = "FILE must be png, jpg, or jpeg";
                    header('location: signup.php');
                }
            }//readirect back frfr ber khos 
            $insert_user_query = "INSERT INTO users (name, username, email, password, avatar, utype, address, phone) VALUES ('$name', '$username', '$email', '$hashedpassword', '$avatar_name', '$utype', '$address', '$phone')"  ;
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            if ($insert_user_result){
                header('location:../login.php');
            }
        }
      ?>