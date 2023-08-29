<?php
        require '../assets/database.php';
        if (isset($_POST['submit'])){
            $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $year = $_POST['year'];
            $stock = filter_var($_POST['stock'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $cover = $_FILES['cover'];
            $pdf = $_FILES['pdf'];
            $genre = $_POST['genre'];
            $author = filter_var($_POST['author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
            
            // check if username or email exist alreaedy in db 
            $book_check_query = "SELECT * FROM books WHERE title = '$title'
                                    AND year = '$year'";
            $book_check_result = mysqli_query($connection, $book_check_query);
            if (mysqli_num_rows($book_check_result) > 0){
                $_SESSION['add-book'] = "Book Already Exists";
            }
            else {
                // ter ka on avatar mdg 
                //rename avatar 
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
            }//readirect back frfr ber khos 
            // ter pdf 
            $pdf_name = $pdf['name'];
            $pdf_type = $pdf['type'];
            $pdf_size = $pdf['size'];
            $pdf_tmp_name = $pdf['tmp_name'];
            $pdf_store = "../pdf/".$pdf_name;
            move_uploaded_file($pdf_tmp_name, $pdf_store);




            $insert_user_query = "INSERT INTO books (title, cover, author, year, description, stock, available, pdf, genre_id, is_latest) VALUES ('$title', '$cover_name', '$author', '$year', '$description', '$stock',  '$stock', '$pdf_name', '$genre', 1)"  ;
            $insert_user_result = mysqli_query($connection, $insert_user_query);
            header('location: all-books.php');
        }
      ?>