<?php
        include 'partials/header.php';
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);
    ?>
    
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>


            <?php $user_query = "SELECT * from users where id != '$user_id'";
                    $user_result = mysqli_query($connection, $user_query);

            ?>
            <!-- ======================= Cards ================== -->
            <div style="display: flex; justify-content:space-between; align-items: center;">
            <h1 class="page-title" style="margin:20px">All Users</h1>
            <a href= "all-users.php"style=" text-decoration:none; border-radius:4px; padding: 10px; color:black; background-color: var(--blue); " class="show">Show table View</a>
            </div>

            
                <div class="table all-user-table hide" >
                    <div class="table-list" style="overflow-x: scroll;">
                        <div class="table-header">
                            <h2>Manage Users</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Avatar</td>
                                    <td>Name</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Is_Librarian</td>
                                    <td>Address</td>
                                    <td>Phone Number</td>


                                </tr>
                            </thead>

                            <tbody>

                                <?php while ($user = mysqli_fetch_assoc($user_result )) : ?>

                                <tr>
                                    <td><img style="width: 40px; height: 40px; border-radius: 50%" src="../images/<?= $user['avatar']?>" alt=""></td>
                                    <td><?= $user['name']?></td>
                                    <td><?= $user['username']?></td>
                                    <td><?= substr($user['email'] , 7 , 100)?></td>
                                    <td><?php $is_admin = $user['is_admin'];
                                        if ($is_admin == 1) {
                                            $admin = "Yes";
                                        }
                                        else {
                                            $admin = "No";
                                        }
                                    ?><?= $admin ?></td>
                                    <td><?= $user['address']?></td>
                                    <td><?= substr($user['phone'], 0, 5). 'xxx'?></td>
       
                                    <td><a style="background-color: var(--blue)" href="edit-user.php?id=<?= $user['id']?>">Edit</a></td>
                                    <td>
                                    <a style="background-color: brown;" href="delete-user.php?id=<?= $user['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                                
                            </tbody>
                        </table>
                    </div>
            </div>

          
           

        </div>
    </div>


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