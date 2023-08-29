<?php
        require '../assets/database.php';
        if (isset($_POST['submit'])){
            $edit_id = $_POST['edit_id'];
            $pdf_query = "SELECT pdf FROM books where id = '$edit_id'";
            $pdf_result = mysqli_query($connection, $pdf_query);
            $cover_query = "SELECT cover FROM books where id = '$edit_id'";
            $cover_result = mysqli_query($connection, $cover_query);
            $db_pdf = mysqli_fetch_assoc($pdf_result);
            $db_cover = mysqli_fetch_assoc($cover_result);
            $old_pdf = $db_pdf['pdf'];
            $is_trending = $_POST['is_trending'];
            $is_latest = $_POST['is_latest'];
            $is_featured = $_POST['is_featured'];
            
            $old_cover = $db_cover['cover'];

            $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $year = $_POST['year'];
            $stock = filter_var($_POST['stock'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $available = filter_var($_POST['available'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $cover = $_FILES['cover'];
            $pdf = $_FILES['pdf'];
            $genre = $_POST['genre'];
            $author = filter_var($_POST['author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $featured_background = $_FILES['featured_background'];
            $featured_background_name = $featured_background['name'];
            if ($featured_background_name != ""){
                echo ('FEATUERD ');
                $time = time(); //this is unique second from this time
                $featured_background_name = $time . $featured_background['name'];
                
                    $featured_background_tmp_name = $featured_background['tmp_name'];
                    $featured_background_destination_path = '../images/' . $featured_background_name;
                    // make sure file is image 
                    $allowed_files = ['png', 'jpg', 'jepg'];
                    $extension = explode(".", $featured_background_name);
                    $extension = end($extension);
                    if (in_array($extension, $allowed_files)){
                        // make no large file 
                        if ($featured_background['size'] < 100000000){
                            move_uploaded_file($featured_background_tmp_name, $featured_background_destination_path);
                        }
                    }
                    else {
                        echo("FILE must be png, jpg, or jpeg");
                        $_SESSION['signup'] = "FILE must be png, jpg, or jpeg";
                    }
            }
            else {
                $featured_background = '0';
            }
            
            

            
                // ter ka on avatar mdg 
                //rename avatar 
            $cover_name = $cover['name'];
            echo ('dol nujs');
            if ($cover_name != ""){
            $time = time(); //this is unique second from this time
            $cover_name = $time . $cover['name'];
            
                $cover_tmp_name = $cover['tmp_name'];
                $cover_destination_path = '../images/' . $cover_name;
                // make sure file is image 
                $allowed_files = ['png', 'jpg', 'jepg'];
                $extension = explode(".", $cover_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_files)){
                    // make no large file 
                    if ($cover['size'] < 100000000){
                        move_uploaded_file($cover_tmp_name, $cover_destination_path);
                    }
                }
                else {
                    echo("FILE must be png, jpg, or jpeg");
                    $_SESSION['signup'] = "FILE must be png, jpg, or jpeg";
                }
            }
            else {
                echo ('dol nis');
                $cover_name = $old_cover;
            }
            //readirect back frfr ber khos 
            // ter pdf 
            $pdf_name = $pdf['name'];
            
            if ($pdf_name != ""){
                echo("dol pdf");
                $pdf_type = $pdf['type'];
                $pdf_size = $pdf['size'];
                $pdf_tmp_name = $pdf['tmp_name'];
                $pdf_store = "../pdf/".$pdf_name;
                move_uploaded_file($pdf_tmp_name, $pdf_store);
    
            }
            else {
                echo("otd fg");

                $pdf_name = $old_pdf;
            }




            $insert_user_query = "UPDATE  books SET title = '$title',featured_background = '$featured_background_name' , is_featured = '$is_featured', cover = '$cover_name', author = '$author', year = '$year', description = '$description', stock = '$stock', pdf = '$pdf_name', genre_id = '$genre', is_trending = '$is_trending', is_latest = '$is_latest', available = '$available' where id = '$edit_id'"  ;
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            header('location: all-books.php');
        }
      ?>