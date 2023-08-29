<?php
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
?>
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>
            <?php
                $genre_query = "SELECT * from genres";
                $genre_result = mysqli_query($connection, $genre_query);
            ?>
            <!-- ======================= Add book form================== -->
            <div class="book-form" >
                <h1 class="page-title">Add New Book</h1>
                <form action="add-book-logic.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Title</span>
                            <input type="text" required placeholder="Book Title" name="title">
                        </div>
                        <div class="input-box">
                            <span class="title">Author</span>
                            <input type="text" required placeholder="Book Author" name="author">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-box">
                                <span class="title">Cover</span>
                                <input type="file" required placeholder="Cover" name="cover">
                            </div>
                            <div class="input-box">
                                <span class="title">Published Year</span>
                                <input type="text" required placeholder="Book Published Year" name="year">
                            </div>

                        </div>
                    <div class="input-box">
                            <span class="title">Genre</span>
                            <select name="genre">
                                <?php while ($genre = mysqli_fetch_assoc($genre_result)) : ?>
                                    <?php $id = $genre['id']?>
                                <option value="<?=$id?>">  <?= $genre['name']?>   </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    <div class="input-box">
                            <span class="title">Description</span>
                            <textarea name="description" id=""  cols="80" required rows="10"></textarea>
                        </div>
                    <div class="row">
                        <div class="input-box">
                            <span class="title">Quantity</span>
                            <input type="text" required placeholder="Add Stock Quantity" name="stock">
                        </div>
                        <div class="input-box">
                            <span class="title">PDF File</span>
                            <input type="file" name="pdf" required >
                        </div>
                    </div>

                    <div class="submit">
                        <button type="submit" name="submit">Add Book</button>
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