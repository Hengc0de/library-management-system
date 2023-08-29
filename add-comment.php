<?php   
    require 'assets/database.php';
    if (isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        
        $comment = $_POST['comment'];
        if ($comment != ""){
            $insert_comment_query = "INSERT into comments (comment, book_id, user_id) VALUES ('$comment', '$book_id', '$user_id')";
            $insert_result = mysqli_query($connection, $insert_comment_query);
            header('location: book-preview.php?id='.$book_id);
        }
        else {
            header('location: book-preview.php?id='.$book_id);

        }
        // $user_query = "SELECT * FROM users where id = '$user_id'";
        // $user_result = mysqli_query($connection, $user_query);
        // $book_query = "SELECT * FROM books where id = '$book_id'";
        // $book_result = mysqli_query($connection, $book_query);

    }