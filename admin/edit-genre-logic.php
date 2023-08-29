<?php
        require '../assets/database.php';
        if (isset($_POST['submit'])){
            $edit_id = $_POST['edit_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];




            $insert_user_query = "UPDATE  genres SET name='$name', description='$description' where id='$edit_id'";
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            header('location: manage-genres.php');
        }
      ?>