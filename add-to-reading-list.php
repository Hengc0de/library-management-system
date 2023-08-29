<?php
    include 'assets/database.php';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $select_user_id = $_SESSION['user_id'];
        $select_query = "SELECT * FROM books where id = '$id'";
        $select_result = mysqli_query($connection, $select_query);
        $select = mysqli_fetch_array($select_result);
        $select_title = $select['title'];
        $select_cover = $select['cover'];
        $select_author = $select['author'];
        $select_genre_id = $select['genre_id'];
        $select_book_id = $select['id'];
        $check_query = "SELECT * FROM reading_list where title = '$select_title' and user_id = '$select_user_id'";
        $check_result = mysqli_query($connection, $check_query);
        if (mysqli_num_rows($check_result)){
            $_SESSION['add-to-reading-list'] = "Book is already in your reading list";
            header('location: student-dashboard/reading-list.php');
        }
        else {
            $insert_query = "INSERT INTO reading_list (title, cover, author, genre_id, book_id, user_id) VALUES 
            ('$select_title', '$select_cover', '$select_author', '$select_genre_id', '$select_book_id', '$select_user_id')";
            $insert_result = mysqli_query($connection, $insert_query);
            if ($insert_result){
                $_SESSION['add-to-reading-list-success'] = "Book added to reading list";
                header('location: student-dashboard/reading-list.php');
            }
        }

        
    }