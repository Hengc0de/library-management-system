<?php
        require '../assets/database.php';
        if (isset($_POST['submit'])){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                    $insert_user_query = "INSERT INTO genres (name, description) VALUES ('$name', '$description')"  ;
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            header('location: manage-genres.php');

        }