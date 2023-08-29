<?php 
    include '../assets/database.php';
    if (isset($_POST['submit'])){
        $book_id = $_POST['id'];
        $book_query = "SELECT * FROM issued_books WHERE id = '$book_id'";
        $book_result = mysqli_query($connection, $book_query);
        $book = mysqli_fetch_array($book_result);
        $return_date = $book['return_date'];

     
        $date = ($_POST['date']);

        $extended_date = date('Y-m-d', strtotime($return_date . " +$date day"));
        $update_query = "UPDATE issued_books SET return_date = '$extended_date' WHERE id = '$book_id'";
        $update_result = mysqli_query($connection, $update_query);
        header('location: issued-penalty.php?id='.$book_id);
        $_SESSION['extend-book'] = "Book extended by " . $extended_date;        
    }
?>
                    

                    <!-- ================= New Customers ================ -->
                