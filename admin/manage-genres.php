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
                $genre_query = "SELECT * FROM genres";
                $genre_result = mysqli_query($connection, $genre_query);
            
            ?>
            <div class="table">
                <div class="table-list">
                    <div class="table-header">
                        <h2>Manage Genres</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table>
                        <?php if (!mysqli_num_rows($genre_result)) : ?>
                        <p>No genre found</p>
                        <?php else: ?>
                        <thead>
                            <tr>
                                <td>Genre Name</td>

                                <td>Genre Description</td>
                                <td>Options</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($genre = mysqli_fetch_assoc($genre_result)) :  ?>
                            <tr>
                                <td><?= $genre['name'] ?></td>
                                <td><?= $genre['description'] ?></td>
                                <td><a class="edit" href="edit-genre.php?id=<?= $genre['id']?>">Edit</a></td>
                                <td><a class="delete" href="delete-genre.php?id=<?= $genre['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                        <?php endif ?>
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