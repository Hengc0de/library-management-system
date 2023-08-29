<?php 
    require '../assets/database.php';
if (isset($_GET['id'])){
    $genre_id = $_GET['id'];
    $genre_query = "SELECT * FROM genres WHERE id = '$genre_id'";
    $genre_result = mysqli_query($connection, $genre_query);
    $genre = mysqli_fetch_assoc($genre_result);
   
    $delete_query = "DELETE FROM genres where id = '$genre_id'";
    $delete_result = mysqli_query($connection, $delete_query);
    $_SESSION['delete-genre-success'] = "Deleted genre successfully";
    header('location: manage-genres.php');
}