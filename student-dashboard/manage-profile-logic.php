<?php 
include '../assets/database.php';
        if (isset($_POST['edit_id'])){
            $id = $_POST['edit_id'];
            $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
               
            $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $query = "SELECT * from users where id = $id";
            $result = mysqli_query($connection, $query);
            $zin = mysqli_fetch_assoc($result);
            $avatar_name = $zin['avatar'];
            $is_admin = $zin['is_admin'];
            $password = $_POST['password'];
            $confirm_password = $zin['password'];
            // $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (isset($_FILES['avatar'])){
                $avatar = $_FILES['avatar'];
                $old_avatar_name = $avatar['name'];
                if ($old_avatar_name != ""){
                    $avatar_name = $old_avatar_name;
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
                            if (password_verify($password, $confirm_password)){

                                if (isset($_POST['new-password']) && isset($_POST['confirm-new-password'])){
                                $new_password = $_POST['new-password'];
                                $confirm_new_password = $_POST['confirm-new-password'];
                                    if ($new_password == $confirm_new_password){
                                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                                        $insert_user_query = "UPDATE users SET name = '$name', is_admin = '$is_admin', username = '$username', password = '$hashed_password', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                                        $insert_user_result = mysqli_query($connection, $insert_user_query);
                                        if ($insert_user_result){
                                            $_SESSION['edit-user-success'] = "User edited successfully";
                                            header('location: manage-profile.php');
                                        }
                                        else{
                                            $_SESSION['edit-user'] = "New Password don't match";
        
                                        }
                                    } 
        

                                }
                                else {
                                    $insert_user_query = "UPDATE users SET name = '$name', is_admin = '$is_admin', username = '$username', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                                    $insert_user_result = mysqli_query($connection, $insert_user_query);
                                    if ($insert_user_result){
                                        $_SESSION['edit-user-success'] = "User edited successfully";
                                        header('location: manage-profile.php');
                                    }
                                }
                            }
                            else{
                            $_SESSION['edit-user'] = "Old Password is incorrect";
                            }
                           
                        }
                        else {
                            $_SESSION['edit-user'] = "FILE SIZE CANNOT BE BIGGER THAN 1MB";
                            header('location: edit-user.php');
                        
                        }
    
                    }
                    else {
                        $_SESSION['edit-user'] = "FILE must be png, jpg, or jpeg";
                        header('location: edit-user.php');
                    }
    
                }
                else {

                    // // $avatar_tmp_name = $avatar['tmp_name'];
                    // $avatar_destination_path = '../images/'. $avatar_name;
                    // // make sure file is image 
                    // $allowed_files = ['png', 'jpg', 'jepg'];
                    // $extension = explode(".", $avatar_name);
                    // $extension = end($extension);
                    // if (in_array($extension, $allowed_files)){
                    //     // make no large file 
                    //     if ($avatar['size'] < 10000000){
                    //         move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    if (password_verify($password, $confirm_password)){

                        if (isset($_POST['new-password']) && isset($_POST['confirm-new-password'])){
                        $new_password = $_POST['new-password'];
                        $confirm_new_password = $_POST['confirm-new-password'];
                            if ($new_password == $confirm_new_password){
                            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                                $insert_user_query = "UPDATE users SET name = '$name', is_admin = '$is_admin', username = '$username', password = '$hashed_password', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                                $insert_user_result = mysqli_query($connection, $insert_user_query);
                                if ($insert_user_result){
                                    $_SESSION['edit-user-success'] = "User edited successfully";
                                    header('location: manage-profile.php');
                                }
                                else{
                                    $_SESSION['edit-user'] = "New Password don't match";

                                }
                            } 


                        }
                        else {
                            $insert_user_query = "UPDATE users SET name = '$name', is_admin = '$is_admin', username = '$username', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                            $insert_user_result = mysqli_query($connection, $insert_user_query);
                            if ($insert_user_result){
                                $_SESSION['edit-user-success'] = "User edited successfully";
                                header('location: manage-profile.php');
                            }
                        }
                    }
                    else{
                        $_SESSION['edit-user'] = "Old Password is incorrect";
                    }
                
                }
            }
            
          
            if (isset($_SESSION['edit-user'])){
                $_SESSION['edit-user-data'] = $_POST;
                header('location: manage-profile.php');

            }
        }

      ?>