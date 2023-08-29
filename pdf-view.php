<?php
include 'assets/database.php';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * from books where id = '$id'";
        $result = mysqli_query($connection, $query); 
        $book = mysqli_fetch_array($result);
        $pdf = $book['pdf'];
        header('Content-type: application/pdf');
        
        // header('Content-Disposition: inline; filename="' . $pdf . '"');
        
        // header('Content-Transfer-Encoding: binary');
        // header('Content-Disposition: attachment; filename="'.$pdf . '.' . $format.'"');
        readfile('pdf/'. $pdf);
    }
  
?>

    
    

