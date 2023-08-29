<?php
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
$name = $_SESSION['add-user-data']['name'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
 unset($_SESSION['add-user-data']);
?>
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>

            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Add New User</h1>
                <form action="add-user-logic.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Name</span>
                            <input type="text" required placeholder="Enter Name" value="<?= $name?>" name="name">
                        </div>
                        <div class="input-box">
                            <span class="title">Username</span>
                            <input type="text" required placeholder="Enter Username" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Password</span>
                                <input type="password" required placeholder="Enter Password" name="password">
                            </div>
                            <div class="input-box">
                                <span class="title">Confirm Password</span>
                                <input type="password" required placeholder="Retype password" name="confirm-password">
                            </div>

                        </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Address</span>
                                <input type="text" required placeholder="Address" name="address">
                            </div>
                            <div class="input-box">
                                <span class="title">E-Mail</span>
                                <input type="email" required placeholder="Enter Email" name="email">
                            </div>

                    </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Phone Number</span>
                                <input type="number" style="appearance: none;" required placeholder="Enter Phone number" name="phone">

                            </div>
                         <div class="input-box">
                            <span class="title">Is Librarian</span>
                            <select name="is_admin">
                                <option value="2">No   </option>
                                <option value="1">Yes   </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-box">
                            <span class="title">Profile Picture</span>
                            <input type="file" name="avatar" required >
                        </div>
                    </div>

                    <div class="submit">
                        <button type="submit" name="submit">Add Book</button>
                    </div>
                </form>           
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['add-user'])) : ?>
    <div class="alert error">
        <p><?= $_SESSION['add-user'] ?><?php unset($_SESSION['add-user']) ?></p>
    </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['add-user-success'])) : ?>
    <div class="alert success">
        <p><?= $_SESSION['add-user-success'] ?><?php unset($_SESSION['add-user-success']) ?></p>
    </div>
    <?php endif; ?>
    <!-- =========== Scripts =========  -->
    <script src="./assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>