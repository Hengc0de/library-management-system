<?php
    include '../assets/database.php';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $delete_query = "DELETE FROM reading_list where id = '$id'";
        $delete_result = mysqli_query($connection , $delete_query);

        if ($delete_result){
            $_SESSION['delete-from-reading-list-success'] = "Book deleted from reading list";
            header('location: reading-list.php');
        }
        
    }