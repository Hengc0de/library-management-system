<?php
include '../assets/database.php';
    if (isset($_POST['submit'])){
        $id = $_POST['user_id'];
        $request = $_POST['submit'];
        $url = $_POST['url'];
        $insert_query = "INSERT INTO feedbacks (request, url, user_id) VALUES ('$request', '$url', '$id')";
        $insert_result = mysqli_query($connection, $insert_query);
        $_SESSION['feedbacks-success'] = "Request or Feedback has been sent";
        header('location: feedbacks.php');
    }
    else {
        $_SESSION['feedbacks'] = "Request or Feedback failed to be sent";
        header('location: feedbacks.php');
    }