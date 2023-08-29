<?php
ob_start();
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
if (isset($_GET['id'])){
    $book_id = $_GET['id'];
}
?>
    
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>


                <!-- ======================= Cards ================== -->


                <!-- ================ Order Details List ================= -->
                <!-- <div class="overlay">
                </div> -->
                
                <div class="table">
                    <div class="table-list">
                        <div class="table-header">
                            <h2>Options</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Book Cover</td>

                                    <td>Book Title</td>

                                    <td>Requested by</td>
                                    <td>Requested on</td>
                                    <td>Return on</td>
                                    <td>Fine if late per day</td>
                                    <td>Secret Code</td>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $waiting_books_query = "SELECT * FROM waiting_books where id = '$book_id'";
                                    $waiting_books_result = mysqli_query($connection, $waiting_books_query);
                                    $waiting_books = mysqli_fetch_assoc($waiting_books_result);
                                ?>
                                <tr>
                                    <?php 
                                    $secret_code = time() . $book_id;
                                    ?>
                                    <td><img src="../images/<?= $waiting_books['cover']?>" alt=""></td>
                                    <td><?= $waiting_books['title']?></td>
                                    <td><?= $waiting_books['request_by']?></td>
                                    <td><?= $waiting_books['request_date']?></td>
                                    <td><?= $waiting_books['return_date']?></td>
                                    <td><?= $waiting_books['fine'] . ' $'?></td>
                                    <td><?= $waiting_books['secret_code']?></td>

                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="book-form" >
                            <!-- <h1 class="page-title">Options</h1> -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="<?= $waiting_books['id']?>" name="approve_id">
                                    <!-- <div class="input-box">
                                        <span class="title">Return date</span>
                                        <input class="date" type="date" required placeholder="date" name="date">
                                    </div> -->
                                </div>
                                <div class="row">
                                    <button style="padding: 15px 30px; border: 0; cursor:pointer; background-color: lime; border-radius: 4px; " name="submit" type="submit">Approve</button>
                                 <a class="delete" style="background-color: red; border-radius: 4px; color: black; padding: 15px 10px" href="reject-book.php?id=<?= $waiting_books['id']?>">Reject</a>

                                </div>
                                
                            </form>

                        </div>

                    </div>
                    <?php 
                        if (isset($_POST['submit'])){
                            
                            $waiting_title = $waiting_books['title'];
                            $waiting_request_by = $waiting_books['request_by'];
                            $waiting_cover = $waiting_books['cover'];
                            $waiting_request_date = $waiting_books['request_date'];
                            $waiting_secret_code = $waiting_books['secret_code'];
                            $return_date = $waiting_books['return_date'];
                            $waiting_fine = $waiting_books['fine'];

                            $books_available_query = "SELECT * from books where title = '$waiting_title'";
                            $books_available_result = mysqli_query($connection, $books_available_query);
                            $books_available = mysqli_fetch_array($books_available_result);
                            $books_available_decrement = $books_available['available'];
                            $books_borrowed_times = $books_available['borrowed_times'];
                            $books_borrowed_times++;
                            $books_available_decrement--;
                            $update_available_query = "UPDATE books SET available = $books_available_decrement, borrowed_times = $books_borrowed_times  where title  = '$waiting_title'";
                            $update_available_result = mysqli_query($connection, $update_available_query);
                            // @unlink("../images/$waiting_cover");
                            $insert_query = "INSERT INTO issued_books (title, cover, request_date, return_date, fine, issued_by, secret_code)
                                            VALUES ('$waiting_title', '$waiting_cover', '$waiting_request_date', '$return_date','$waiting_fine', '$waiting_request_by',  '$waiting_secret_code')";
                            
                            $insert_result = mysqli_query($connection, $insert_query);
                            $delete_from_waiting_books = "DELETE FROM waiting_books WHERE id = '$book_id' ";
                            
                            $delete_from_waiting_books_result = mysqli_query($connection, $delete_from_waiting_books);
                            if ($delete_from_waiting_books_result){
                                @header('location: approve-book.php');
                            }
                            
                        }
                    ?>
                    

                    <!-- ================= New Customers ================ -->
                
                    </div>
                </div>

        </div>
        <!-- <div class="options" style="position:absolute; ">
              <div class="option-card">
                <h1 class="title" style="font-size: 50px;">Options</h1>
                                
              </div>          
        </div> -->

    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>