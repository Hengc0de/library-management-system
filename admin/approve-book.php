<?php
        include 'partials/header.php';
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);
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
                            <h2>Haven't approved</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                        <?php
                        $waiting_books_query = "SELECT * FROM waiting_books";
                        $waiting_books_result = mysqli_query($connection, $waiting_books_query);
                        ?>
                        <?php if (!mysqli_num_rows($waiting_books_result)): ?>

                                    <p style="color: var(--gray);">No books found</p>
                        <?php else : ?>
                            <thead>
                                <tr>
                                    <td>Book Cover</td>

                                    <td>Book Title</td>

                                    <td>Requested by</td>
                                    <td>Requested on</td>
                                    <td>Return on</td>
                                    <td>Secret Code</td>
                                    <td>Fine if late per day</td>
                                    <td>Options</td>
                                </tr>
                            </thead>

                            <tbody>

                                <?php while ($waiting_books = mysqli_fetch_assoc($waiting_books_result )) : ?>
                                <tr>
                                    <td><img src="../images/<?= $waiting_books['cover']?>" alt=""></td>
                                    <td><?= $waiting_books['title']?></td>
                                    <td><?= $waiting_books['request_by']?></td>
                                    <td><?= $waiting_books['request_date']?></td>
                                    <td><?= $waiting_books['return_date']?></td>
                                    <td><?= $waiting_books['secret_code']?></td>
                                    <td><?= $waiting_books['fine'] . ' $'?></td>

                                    <td><a href="options.php?id=<?= $waiting_books['id']?>">Options</a></td>
                                </tr>
                                <?php endwhile ?>

                                <?php endif ?>
                                
                            </tbody>
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