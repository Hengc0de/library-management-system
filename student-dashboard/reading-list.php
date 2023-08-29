<?php
        include 'partials/header.php';
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);
        ob_start();
    ?>
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>

            <?php $book_query = "SELECT * from reading_list where user_id = '$user_id'";
                    $book_result = mysqli_query($connection, $book_query);

            ?>
            <!-- ======================= Cards ================== -->
            <div style="display: flex; justify-content:space-between; align-items: center;">
            <h1 class="page-title" style="margin:20px">Your Reading List</h1>
            <!-- <a href= "all-book-tableview.php"style=" text-decoration:none; border-radius:4px; padding: 10px; color:black; background-color: var(--blue); " class="show">Show table View</a> -->
            </div>

           <div class="all-books all-book-normal">
                <?php if (mysqli_num_rows($book_result)) : ?>
                <?php while ($book = mysqli_fetch_assoc($book_result)) : ?>
                    <?php 
                        $genre_id = $book['genre_id']; $genre_query = "SELECT name from genres where id = '$genre_id'";
                        $genre_result = mysqli_query($connection, $genre_query);
                        ?>
                    <div class="book-container">

                    <a class="booklink" href="../book-preview.php?id=<?=$book['book_id']?>">
                        <div class="book">
                            <div class="top">
                                <img src="<?='../images/'. $book['cover'] ?>" class="cover" alt="">
                            </div>
                        </div>
                     </a>
                        <h3><?= $book['title'] ?></h3>
                        <p><?= $book['author'] ?></p>
                        <div class="bot">
                            <div>
                                <a href="delete-from-reading-list.php?id=<?= $book['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a>
                            </div>
                            <div>
                                <p><?php $genre = mysqli_fetch_assoc($genre_result);?><?= $genre['name'] ?></p>
                            </div>
                        </div>
                        
                        <!-- <a class="delete" href="delete.php">Delete</a> -->
                    </div>
             
                <?php endwhile ?>
                <?php else : ?>
                    <p style="color:var(--gray)">No Book Found In Your Reading List.</p>
                <?php endif?>
           </div>

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../admin/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php
    ob_flush();
?>