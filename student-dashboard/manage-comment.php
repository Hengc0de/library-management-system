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
            <?php 
                $comments_query = "SELECT * FROM comments where user_id = '$user_id'";
                $comments_result = mysqli_query($connection, $comments_query);
            
            ?>
            <div class="table">
                <div class="table-list">
                    <div class="table-header">
                        <h2>Manage comment</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Book Cover</td>
                                <td>Book ID</td>
                                <td>Comment</td>
                                <td>Commented by</td>
                                <td>Commenter Avatar</td>
                                <td>Options</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($comments = mysqli_fetch_assoc($comments_result)) :  ?>
                            <?php $comments_user_id = $comments['user_id'];
                                $comments_book_id = $comments['book_id'];
                                $comments_book_query = "SELECT * FROM books where id = $comments_book_id";
                                $comments_book_result = mysqli_query($connection, $comments_book_query);
                                $comments_user_query = "SELECT * from users where id = $comments_user_id";
                                $comments_user_result = mysqli_query($connection, $comments_user_query);
                                $comments_book = mysqli_fetch_assoc($comments_book_result);
                                $comments_user = mysqli_fetch_assoc($comments_user_result);
                                
                            ?>
                            <tr>
                                <td><img src="../images/<?= $comments_book['cover']?>" alt=""></td>
                                <td><?= $comments_book['id'] ?></td>
                                <td><?= $comments['comment'] ?></td>
                                <td><?= $comments_user['username'] ?></td>
                                <td><img style="width: 50px;  height: 50px; border-radius: 50%;" src="../images/<?= $comments_user['avatar']?>" alt=""></td>
                                <td><a class="edit" href="edit-comment.php?id=<?= $comments['id']?>">Edit</a></td>
                                <td><a class="delete" href="delete-comment.php?id=<?= $comments['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
               
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="../admin/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>