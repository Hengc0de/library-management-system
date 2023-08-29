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
                            <h2>Return Book</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Book Cover</td>

                                    <td>Book Title</td>

                                    <td>Requested by</td>
                                    <td>Requested on</td>
                                    <td>Expected Return on</td>
                                    <td>Fine if late per day</td>
                                    <td>Late By</td>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $issued_books_query = "SELECT * FROM issued_books where id = '$book_id'";
                                    $issued_books_result = mysqli_query($connection, $issued_books_query);
                                    $issued_books = mysqli_fetch_assoc($issued_books_result);
                                ?>
                                <tr>
                                    <td><img src="../images/<?= $issued_books['cover']?>" alt=""></td>
                                    <td><?= $issued_books['title']?></td>
                                    <td><?= $issued_books['issued_by']?></td>
                                    <td><?= $issued_books['request_date']?></td>
                                    <td><?= $issued_books['return_date']?></td>
                                    <td><?= $issued_books['fine']?></td>
                                    
                                    <?php
                                       $today_date = date("Y-m-d");
                                       $return_date = $issued_books['return_date'];
                                       $diff=(((strtotime($today_date) - strtotime($return_date))/(60*60*24)));
                                       
                                ?>
                                    <td><?php
                                        if ($diff <= 0){
                                            $diff = 0;
                                        }
                                    ?><?= $diff?> Days</td>

                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="book-form" >
                            <h1 class="page-title">Options</h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="<?= $issued_books['id']?>" name="approve_id">
                                    <div class="input-box">
                                        <span class="title">Late by</span>
                                        <input class="date" type="text" value="" style = "pointer-events:none;" placeholder="<?=$diff ?> days" id="date" name="date">
                                    </div>
                                    <div class="input-box">
                                        <span class="title">Fine to pay</span>
                                        
                                        <input class="fine" type="text" id="fine" placeholder="<?= $issued_books['fine']?>" style = "pointer-events:none; color: red;"  required value="<?= $diff * $issued_books['fine']?> $" name="fine">

                                    </div>
                                </div>
                                <div class="row">
                                    <button style="padding: 15px 30px; border: 0; cursor:pointer; background-color: var(--blue); border-radius: 4px; " name="submit" type="submit">Return</button>
                                </div>
                                
                            </form>

                        </div>

                    </div>
                    <?php 
                        if (isset($_POST['submit'])){
                            
                            

                            // @unlink("../images/$issued_cover");
                            $issued_books_title = $issued_books['title'];
                            $delete_from_issued_books = "DELETE FROM issued_books WHERE id = '$book_id' ";
                            $books_available_query = "SELECT * from books where title = '$issued_books_title'";
                            $books_available_result = mysqli_query($connection, $books_available_query);
                            $books_available = mysqli_fetch_array($books_available_result);
                            $books_available_decrement = $books_available['available'];
                            $books_available_decrement++;
                            $update_available_query = "UPDATE books SET available = $books_available_decrement where title = '$issued_books_title'";
                            $update_available_result = mysqli_query($connection, $update_available_query);
                            $delete_from_issued_books_result = mysqli_query($connection, $delete_from_issued_books);
                            if ($delete_from_issued_books_result){
                                @header('location: issued-penalty.php');
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