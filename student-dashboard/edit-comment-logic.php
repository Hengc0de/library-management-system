<?php
        require '../assets/database.php';
        if (isset($_POST['submit'])){
            $edit_id = $_POST['edit_id'];
            $comment = $_POST['comment'];




            $insert_user_query = "UPDATE comments SET comment='$comment' where id='$edit_id'";
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            header('location: manage-comment.php');
        }
      ?>