<?php 
    include '../assets/database.php';
    if (isset($_POST['approve_id'])) {
        $approve_id = $_POST['approve_id'];
        $waiting_books_query = "SELECT * FROM books WHERE id = $approve_id";
    }