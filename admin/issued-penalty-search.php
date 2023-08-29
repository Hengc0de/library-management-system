<?php 

if (isset($_POST['search'])) {
    $search = $_POST['search'];

}
?>
<?php
        include 'partials/header.php';
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);
    ?>
    
        <?php include 'partials/main.php' ?>
        <!-- ========================= Main ==================== -->
                <!-- ======================= Cards ================== -->


                <!-- ================ Order Details List ================= -->
                <!-- <div class="overlay">
                </div> -->
                
                <div class="table">
                    <div class="table-list">
                        <div class="table-header">
                            <h2>Approved</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Book Cover</td>

                                    <td>Book Title</td>

                                    <td>Requested by</td>
                                    <td>Requested on</td>
                                    <td>Expected return date</td>
                                    <td>Secret Code</td>

                                    <td>Options</td>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $issued_books_query = "SELECT * FROM issued_books where secret_code like '%$search%' or issued_by like '%$search%' or title like '%$search%'";
                                    $issued_bookss_result = mysqli_query($connection, $issued_books_query);
                                ?>
                                <?php while ($issued_books = mysqli_fetch_assoc($issued_bookss_result )) : ?>
                                <?php
                                    $request_date = $issued_books['request_date'];
                                    $return_date = $issued_books['return_date'];
                                    $daydiff=floor((abs(strtotime($return_date) - strtotime($request_date))/(60*60*24)));

                                ?>
                                <?php if ($daydiff >= 0) : ?>
                                <?php if ($daydiff=floor((abs(strtotime($return_date) - strtotime($request_date))/(60*60*24))) <= 3) : ?>
                                <tr  class="warning">
                                <?php else : ?>
                                <tr >

                                <?php endif ?>
                                    <td><img src="../images/<?= $issued_books['cover']?>" alt=""></td>
                                    <td><?= $issued_books['title']?></td>
                                    <td><?= $issued_books['issued_by']?></td>
                                    <td><?= $issued_books['request_date']?></td>
                                    <td><?= $issued_books['return_date']?></td>
                                    <td><?= $issued_books['secret_code']?></td>

                                    <td><a   style="background-color: var(--blue);" href="return-book.php?id=<?= $issued_books['id']?>">Return</a></td>
                                    <td><a style="background-color:blue;" href="extend-book.php?id=<?= $issued_books['id']?>">Extend</a></td>
                                </tr>
                                <?php endif ?>
                                <?php endwhile ?>
                                
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= New Customers ================ -->

                </div>

                <div class="table">
                    <div class="table-list">
                        <div class="table-header">
                            <h2>Penalty</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                                 <?php
                                    $issued_books_query = "SELECT * FROM issued_books where secret_code like '%$search%' or issued_by like '%$search%' or title like '%$search%'";
                                    $issued_books_result = mysqli_query($connection, $issued_books_query);
                                ?>

                            <?php if (!mysqli_num_rows($issued_books_result)) : ?>
                                <p>No books found</p>
                            <?php else: ?>

                            <thead>
                                <tr>
                                    <td>Book Cover</td>

                                    <td>Book Title</td>

                                    <td>Requested by</td>
                                    <td>Requested on</td>
                                    <td>Expected return date</td>
                                    <td>Secret Code</td>

                                    <td>Late by</td>
                                    <td style="color:red">Fine</td>

                                    <td>Options</td>
                                </tr>
                            </thead>

                            <tbody>

       
                                <?php while ($issued_books = mysqli_fetch_assoc($issued_books_result )) : ?>
                                <?php
                                    $request_date = $issued_books['request_date'];
                                    $return_date = $issued_books['return_date'];
                                    $daydiff=floor(((strtotime($return_date) - strtotime($request_date))/(60*60*24)));
                                    
                                ?>
                                <?php if ($daydiff <= 0) : ?>
                                <tr class="danger">
                                    <td><img src="../images/<?= $issued_books['cover']?>" alt=""></td>
                                    <td><?= $issued_books['title']?></td>
                                    <td><?= $issued_books['issued_by']?></td>
                                    <td><?= $issued_books['request_date']?></td>
                                    <td><?= $issued_books['return_date']?></td>
                                    <td><?= $issued_books['secret_code']?></td>
                                    <td><?= abs($daydiff) . ' Days'?></td>
                                    <td><?= abs($daydiff * 0.20) . ' $'?></td>
                                    <td><a   style="background-color: var(--blue);" href="return-book.php?id=<?= $issued_books['id']?>">Return</a></td>
                                    <td><a style="background-color:blue; color:white;" href="extend-book.php?id=<?= $issued_books['id']?>">Extend</a></td>
                                </tr>
                                <?php endif ?>
                                <?php endwhile ?>

                                
                            </tbody>
                            <?php endif ?>
                        </table>
                    </div>

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