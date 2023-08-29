<?php
include '../assets/database.php';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $select = "SELECT * from users where id = '$id'";
        $select_result = mysqli_query($connection, $select);
        $select_fetch = mysqli_fetch_array($select_result);
        $select_fetch_img = $select_fetch['avatar'];
        @unlink('../images/'.$select_fetch_img);
        $delete = "DELETE from users WHERE id = '$id'";
        $delete_result = mysqli_query($connection, $delete);
        if ($delete_result){
            $_SESSION['delete-user-success'] = "User deleted successfully";
            header('location: manage-users.php');
        }
    }   
    else {
        header('location: manage-users.php');
    } 
