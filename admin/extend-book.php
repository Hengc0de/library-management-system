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
                                    <?php
                                    $request_date = $issued_books['request_date'];
                                    
                                    $request_date = strtotime($issued_books['request_date']);
                                    $return_date =strtotime( $issued_books['return_date']);
                                    $diff = (floor($request_date- $return_date) / (60*60*24));
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
                            <form action="extend-book-logic.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $issued_books['id']?>" name="id">
                                <div class="row">
                                <div class="input-box">
                                    <span class="title"> Enter how days you want to Extend <small style="color: gray;">(your fine stays the same)</small></span>
                                    <input type="number"  required class="date" id="date" name="date">
                                    <!-- <select onchange="selectNum()" class="date" style="margin: 20px 0; font-size: 20px;" name="date" id="date">
                                        <option selected value="3">3 days</option>
                                        <option value="7">7 days</option>
                                        <option value="14">14 days</option>
                                        <option value="21">21 days</option>
                                        <option value="28">28 days</option>
                                    </select> -->
                                <button style="padding: 15px 30px; margin: 20px; border: 0; cursor:pointer; background-color: lime; border-radius: 4px; " name="submit" type="submit">Extend</button>

                                </div>
                                <!-- <div class="input-box">
                                    <span style="color: yellow " class="title">Fine if late per day in $</span>
                                    <input type="text"  style="margin: 20px 0;pointer-events: none; user-select: none;" id="fine" name="fine" value="0" placeholder="0.30 $">
                                </div> -->
                                
                                <!-- <button style="padding: 15px 30px; border: 0; cursor:pointer; background-color: lime; border-radius: 4px; " name="submit" type="submit">Return</button> -->
                                
                            </form>

                        </div>

                    </div>
                   
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