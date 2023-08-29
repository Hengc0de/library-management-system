<?php
if (isset($_GET['id'])){
    $genre_id = $_GET['id'];
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

                $genre_query = "SELECT * from genres where id = '$genre_id'";
                $genre_result = mysqli_query($connection, $genre_query);
                $genre = mysqli_fetch_array($genre_result);
            ?>

            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Edit Genre</h1>
                <form action="edit-genre-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?= $genre_id ?>">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Name</span>
                            <input type="text" required value="<?= $genre['name'] ?>" name="name">
                        </div>
                        <div class="input-box">
                            <span class="title">Description</span>
                            <input type="text" required value="<?= $genre['description'] ?>" name="description">
                        </div>
                    </div>
                    
                    <div class="submit">
                        <button type="submit" name="submit">Edit Genre</button>
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