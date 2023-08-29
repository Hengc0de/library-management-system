<!-- start 3/29 2am  -->
<?php include 'partials/header.php' ?>
<?php include 'partials/main.php' ?>

        <div class="right-side">


            <div class="trending">
            <div class="title">

                <h1>All Books</h1>
            </div>
                <div class="book-shelf">
                    <?php
                        $book_query = "SELECT * from books ";
                        $book_result = mysqli_query($connection, $book_query);
                    ?>
                    <?php if (mysqli_num_rows($book_result)) : ?>
                    <?php
                        while ($book = mysqli_fetch_array($book_result)) : ?>
                        <?php 
                            $book_genre_id = $book['genre_id']; 
                            $book_genre_query = "SELECT * from genres where id = '$book_genre_id'";
                            $book_genre_result = mysqli_query($connection, $book_genre_query);
                            $book_genre = mysqli_fetch_assoc($book_genre_result);
                        ?>
                    <div class="book-container">
                        <div class="book">
                            <div class="top">
                                <img src="./images/<?= $book['cover'] ?>" class="cover" alt="">
                                <a href="#" class="add"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                <a href="book-preview.php?id=<?= $book['id']?>" class="preview"><i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                <div class="overlay"></div>
                            </div>
                            
                            
                        </div>
                        <h3><?= $book['title'] ?></h3>
                        <p><?= $book['author'] ?></p>

                        <div class="bot">
                            <div>
                                <p><?= $book['year'] ?></p>
                            </div>
                            <div>
                                <a href="<?= $book_genre['id']?>"><?= $book_genre['name'] ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                    <?php else : ?>
                        <div style="display: flex; margin-top:40px; width:100%; justify-content: center; align-items:center">
                        <p style="color: var(--color-black-light); font-size: 40px; text-align:center">No book found in this genre</p>

                        </div>
                    <?php endif ?>
                    


                </div>

            </div>

            
        </div>
    </section>
    <script src="./app.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    
</body>
</html>