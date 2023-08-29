<?php
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
?>
        <!-- ========================= Main ==================== -->

        <?php include 'partials/main.php' ?>

            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Add New Genre</h1>
                <form action="add-genre-logic.php" method="post" enctype="multipart/form-data">
                        <div class="input-box">
                            <span class="title">Genre Name</span>
                            <input type="text" required placeholder="Genre Name" name="name">
                        </div>
                        <div class="input-box">
                            <span class="title">Description</span>
                            <textarea name="description" id="" cols="80" rows="10"></textarea>
                        </div>
                    

                    <div class="submit">
                        <button type="submit" name="submit">Add Genre</button>
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