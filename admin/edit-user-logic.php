<?php 
include '../assets/database.php';
        if (isset($_POST['edit_id'])){
            $id = $_POST['edit_id'];
            $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
               
            $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $utype = "Student";
            $is_admin = $_POST['is_admin'];  
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
                            $insert_user_query = "UPDATE users SET name = '$name', username = '$username', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                            $insert_user_result = mysqli_query($connection, $insert_user_query);
                            if ($insert_user_result){
                                $_SESSION['edit-user-success'] = "User edited successfully";
                                header('location: manage-users.php');
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
                    $query = "SELECT * from users where id = $id";
                    $result = mysqli_query($connection, $query);
                    $zin = mysqli_fetch_assoc($result);
                    $avatar_name = $zin['avatar'];
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
                    $insert_user_query = "UPDATE users SET name = '$name', username = '$username', email = '$email', avatar = '$avatar_name', utype = '$utype', address = '$address' , phone = '$phone', is_admin = '$is_admin' where id = '$id'"  ;
                    $insert_user_result = mysqli_query($connection, $insert_user_query);
                            if ($insert_user_result){
                                $_SESSION['edit-user-success'] = "User edited successfully";
                                header('location: manage-users.php');
                            }
                        // }
                        else {
                            $_SESSION['edit-user'] = "FILE SIZE CANNOT BE BIGGER THAN 1MB";
                            header('location: edit-user.php');
                        
                        }
    
                    
    
                
                }
            }
            
          
            if (isset($_SESSION['edit-user'])){
                $_SESSION['edit-user-data'] = $_POST;
                header('location: edit-user.php?id='. $id);

            }
        }

      ?>