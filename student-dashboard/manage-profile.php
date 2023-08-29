<?php
ob_start();

include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
$name = $_SESSION['edit-user-data']['name'] ?? null;
$username = $_SESSION['edit-user-data']['username'] ?? null;
 unset($_SESSION['edit-user-data']);
?>


        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>

    <?php 
                $userquery = "SELECT * from users  where id = '$user_id' ";
        $userresult = mysqli_query($connection, $userquery);
        $edit_user = mysqli_fetch_assoc($userresult);
$edit_id = $edit_user['id'];

    ?>


            <!-- ======================= Add user form================== -->
            <div class="book-form" >
                <h1 class="page-title">Manage Profile</h1>
                <form action="manage-profile-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Name</span>
                            <input type="text" required  value="<?= $edit_user['name'] ?>" name="name">
                        </div>
                        <div class="input-box">
                            <span class="title">Username</span>
                            <input type="text" required   value="<?= $edit_user['username'] ?>" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Avatar  <small style="color: grey;">skip to keep the same</small> </span>
                                <input type="file"    placeholder="Cover" name="avatar">
                            </div>
                            <div class="input-box">
                                <span class="title">Email</span>
                                <input type="email" required   value="<?= $edit_user['email'] ?>" placeholder="user Published Year" name="email">
                            </div>

                        </div>

       
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Phone Number</span>
                            <input type="text" value="<?= $edit_user['phone'] ?>" required  placeholder="Add Stock Quantity" name="phone">
                        </div>
                        <div class="input-box">
                            <span class="title">Address</span>
                            <input type="text" value="<?= $edit_user['address'] ?>" required   placeholder="Add Stock Quantity" name="address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                            <span class="title">New Password <small style="color: grey;">skip to keep the same</small>  </span>
                            <input type="password" value=""  placeholder="Enter New Password" name="new-password">
                        </div>
                        <div class="input-box">
                            <span class="title">Confirm New Password <small style="color: grey;">skip to keep the same</small> </span>
                            <input type="password" value=""  placeholder="Confirm New Password" name="confirm-new-password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Old Password</span>
                            <input type="password" value="" required placeholder="Enter Old Password" name="password">
                        </div>

                    </div>



                    <div class="submit">
                        <button type="submit" name="submit">Edit user</button>
                    </div>
                </form>           
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['edit-user'])) : ?>
    <div class="alert error">
        <p><?= $_SESSION['edit-user'] ?><?php unset($_SESSION['edit-user']) ?></p>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['edit-user-success'])) : ?>
    <div class="alert success">
        <p><?= $_SESSION['edit-user-success'] ?><?php unset($_SESSION['edit-user-success']) ?></p>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['delete-user-success'])) : ?>
    <div class="alert success">
        <p><?= $_SESSION['delete-user-success'] ?><?php unset($_SESSION['delete-user-success']) ?></p>
    </div>
    <?php endif; ?>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php ob_flush() ?>