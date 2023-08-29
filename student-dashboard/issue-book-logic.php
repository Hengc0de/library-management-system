<?php 
    include '../assets/database.php';
    if (isset($_POST['submit'])){
        $book_id = $_POST['issue_id'];
        $db_book_query = "SELECT * FROM books WHERE id = '$book_id'";
        $db_book_result = mysqli_query($connection, $db_book_query);
        $db_book = mysqli_fetch_assoc($db_book_result);
        $id = $db_book['id'];
        $title = $db_book['title'];
        $cover = $db_book['cover'];
    
        $expected_return_date = $_POST['date'];
        echo $expected_return_date;
        $date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+$expected_return_date day"));
        echo ($return_date);
        $fine = $_POST['fine'];
        echo ($fine);
    
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * FROM users WHERE id = '$user_id'";
        $user_result = mysqli_query($connection , $user_query);
        $user = mysqli_fetch_array($user_result);
        $username = $user['username'];
        $secret_code  = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
        // check if requested already  
        $book_check_query = "SELECT * FROM waiting_books WHERE title = '$title'
        AND request_by = '$username'";
    $book_check_result = mysqli_query($connection, $book_check_query);
    if (mysqli_num_rows($book_check_result) > 0){
        echo'already requested once';
    
            echo("You have already issued this book, please wait for admin's approval patiently and check your issued lists");
            $_SESSION['issue-book'] = "You have already issued this book, please wait for admin's approval patiently and check your issued lists";
            header('location: ../index.php');
        }

        else {
            $insert_query = "INSERT INTO waiting_books (request_by, request_date, return_date, fine ,secret_code, title, cover) VALUES ( '$username', '$date', '$return_date', '$fine', '$secret_code', '$title', '$cover')";
            $insert_result = mysqli_query($connection , $insert_query);
            $_SESSION['issue-book-success'] = "Book issued, Please wait for admin's approval secret code.";

            header('location: issued-penalty.php');
        }


    }
