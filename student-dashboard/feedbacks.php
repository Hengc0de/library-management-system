
<?php

include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
?>


        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>



            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Request a book, Feedbacks</h1>
                <form action="feedbacks-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Request </span>
                            <input type="text" required   name="request">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Book URL <small style="color:grey;">(optional)</small> </span>
                            <input type="text"   name="url">
                        </div>
                    </div>
                    <div class="submit">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </form>           
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['feedbacks'])) : ?>
    <div class="alert error">
        <p><?= $_SESSION['feedbacks'] ?><?php unset($_SESSION['feedbacks']) ?></p>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['feedbacks-success'])) : ?>
    <div class="alert success">
        <p><?= $_SESSION['feedbacks-success'] ?><?php unset($_SESSION['feedbacks-success']) ?></p>
    </div>
    <?php endif; ?>
    <!-- =========== Scripts =========  -->
    <script src="../admin/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>