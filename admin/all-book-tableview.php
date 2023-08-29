<?php
        include 'partials/header.php';
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);
    ?>
    
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>


            <?php $book_query = "SELECT * from books";
                    $book_result = mysqli_query($connection, $book_query);

            ?>
            <!-- ======================= Cards ================== -->
            <div style="display: flex; justify-content:space-between; align-items: center;">
            <h1 class="page-title" style="margin:20px">All Books</h1>
            <a href= "all-books.php"style=" text-decoration:none; border-radius:4px; padding: 10px; color:black; background-color: var(--blue); " class="show">Show table View</a>
            </div>

            
                <div class="table all-book-table hide" >
                    <div class="table-list" style="overflow-x: scroll;">
                        <div class="table-header">
                            <h2>Manage Books</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Cover</td>
                                    <td>Title</td>
                                    <td>Author</td>
                                    <td>Year</td>
                                    <td>Stock</td>
                                    <td>Available</td>
                                    <td>Genre</td>
                                    <td>Trending</td>
                                    <td>Latest</td>
                                    <td>PDF</td>

                                </tr>
                            </thead>

                            <tbody>

                                <?php while ($book = mysqli_fetch_assoc($book_result )) : ?>
                                    <?php 
                        $genre_id = $book['genre_id']; $genre_query = "SELECT name from genres where id = '$genre_id'";
                        $genre_result = mysqli_query($connection, $genre_query);
                        ?>
                                <tr>
                                    <td><img src="../images/<?= $book['cover']?>" alt=""></td>
                                    <td><?= $book['title']?></td>
                                    <td><?= $book['author']?></td>
                                    <td><?= $book['year']?></td>
                                    <td><?= $book['stock']?></td>
                                    <td><?= $book['available']?></td>
                                    <td><?php $genre = mysqli_fetch_assoc($genre_result);?><?= $genre['name'] ?></td>
                                    <td><?= $book['is_trending']?></td>
                                    <td><?= $book['is_latest']?></td>
                                    <td><?= $book['pdf']?></td>
                                    <td><a href="edit-book.php?id=<?= $book['id']?>">Edit</a></td>
                                    <td>
                                    <a href="delete-book.php?id=<?= $book['id']?>"><ion-icon class="trash" name="trash-outline"></ion-icon></a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                                
                            </tbody>
                        </table>
                    </div>
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