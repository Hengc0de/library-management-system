<?php 
    require '../assets/database.php';
if (isset($_GET['id'])){
    $book_id = $_GET['id'];
    $book_query = "SELECT * FROM books WHERE id = '$book_id'";
    $book_result = mysqli_query($connection, $book_query);
    $book = mysqli_fetch_assoc($book_result);
    $cover = $book['cover'];
    $pdf = $book['pdf'];
    @unlink("../images/. $cover"); 
    @unlink("../pdf/ . $pdf "); 
    $delete_query = "DELETE FROM books where id = '$book_id'";
    $delete_result = mysqli_query($connection, $delete_query);
    $_SESSION['delete-book-success'] = "Deleted book successfully";
    header('location: all-books.php');
}