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
                $feedbacks_query = "SELECT * FROM feedbacks";
                $feedbacks_result = mysqli_query($connection, $feedbacks_query);
            
            ?>
            <div class="table">
                <div class="table-list">
                    <div class="table-header">
                        <h2>Feedbacks or Request</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>By</td>
                                <td>Request</td>
                                <td>URL</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($feedbacks = mysqli_fetch_assoc($feedbacks_result)) :  ?>
                            <?php $request_user = $feedbacks['user_id'];
                                    $fetch = "SELECT * FROM users where id = '$request_user'";
                                    $result = mysqli_query($connection, $fetch);
                                    $fetched = mysqli_fetch_assoc($result);

                            ?>
                            <tr>
                                <td><?= $fetched['username'] ?></td>
                                <td><?= $feedbacks['request'] ?></td>
                                <td><?= $feedbacks['url'] ?></td>
                                <td><a  style="padding: 10px 10px;"  class="delete" href="delete-comment.php?id=<?= $feedbacks['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
               
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>