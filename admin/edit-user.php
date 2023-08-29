<?php
include 'partials/header.php';

$get_id = $_GET['id'];
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
              
                $user_query = "SELECT * from users  where id = '$get_id'";
                $user_result = mysqli_query($connection, $user_query);
                $edit_user = mysqli_fetch_assoc($user_result);
                
            ?>
            <!-- ======================= Add user form================== -->
            <div class="book-form" >
                <h1 class="page-title">Edit user</h1>
                
                <form action="edit-user-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?= $get_id ?>">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Name</span>
                            <input type="text" required value="<?= $edit_user['name'] ?>" name="name">
                        </div>
                        <div class="input-box">
                            <span class="title">Username</span>
                            <input type="text" required value="<?= $edit_user['username'] ?>" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Avatar  <small style="color: grey;">skip to keep the same</small></span>
                                <input type="file"   placeholder="Cover" name="avatar">
                            </div>
                            <div class="input-box">
                                <span class="title">Email</span>
                                <input type="email"  value="<?= $edit_user['email'] ?>" required placeholder="user Published Year" name="email">
                            </div>

                        </div>

       
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Phone Number</span>
                            <input type="text" value="<?= $edit_user['phone'] ?>" required placeholder="Add Stock Quantity" name="phone">
                        </div>
                        <div class="input-box">
                            <span class="title">Address</span>
                            <input type="text" value="<?= $edit_user['address'] ?>" required placeholder="Add Stock Quantity" name="address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                        <span class="title">Is Librarian</span>
                        <select name="is_admin" value= "<?= $edit_user['is_admin'] ?>">
                            <option value="2">No   </option>
                            <option value="1">Yes   </option>
                        </select>
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

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>