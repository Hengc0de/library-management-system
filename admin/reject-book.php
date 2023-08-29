<?php 
    require '../assets/database.php';
    if (isset($_GET['id'])){
        $book_id = $_GET['id'];

        $delete_query = "DELETE FROM waiting_books where id = $book_id";
        $delete_result = mysqli_query($connection, $delete_query);
        header('location: approve-book.php');
    }