
<?php
if (isset($_GET['id'])){
    $comments_id = $_GET['id'];
}
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
?>


        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>

            
            <?php

                $comments_query = "SELECT * from comments where id = '$comments_id'";
                $comments_result = mysqli_query($connection, $comments_query);
                $comments = mysqli_fetch_array($comments_result);
            ?>

            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Edit comments</h1>
                <form action="edit-comment-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?= $comments_id ?>">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Comment </span>
                            <input type="text" required value="<?= $comments['comment'] ?>" name="comment">
                        </div>

                    </div>
                    
                    <div class="submit">
                        <button type="submit" name="submit">Edit comments</button>
                    </div>
                </form>           
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>