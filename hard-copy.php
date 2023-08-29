<!-- start 3/29 2am  -->
<?php include 'partials/header.php' ?>
<section class="main">
        <div class="left-side" >
            <div class="topper">
                <i class="fa-solid fa-bars bars2"></i>

                <h1>Bookmark</h1>
            </div>
            <div class="search-side">
                <form action="#">
                    <div class="search">
                        <input type="text" placeholder="Search books, author.. " />
                        <button type="submit" name="search-side"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>

                </form>
            </div>
            <div class="top">
                <a href="index.php" >Home</a>
                <a href="hard-copy.php" class="active" >Hard Copy Available</a>
                <a href="./student-dashboard/index.php" >My Reading List</a>
            </div>
            <div class="top">
                <div class="genre-switch-container active">
                <a href="#" class="genre-switch">Genres</a>
                <i class="fa-sharp fa-solid fa-chevron-down down-arrow"></i>
                </div>
                <?php
                    $all_genre_query = "SELECT * FROM genres";
                    $all_genre_result = mysqli_query($connection, $all_genre_query);
                ?>

                <div class="genre genre-hide">
                    <?php while ($all_genre = mysqli_fetch_assoc($all_genre_result)) : ?>
                    <a  style="text-transform:capitalize;" href="genre.php?id=<?= $all_genre['id'] ?>"><?= $all_genre['name'] ?></a>
                    <?php endwhile ?>
                </div>

            </div>
            <div class="middle">
                <a href="contact-form.php">Contact Us</a>
                <a href="how-it-works.php">How it works?</a>
                <a href="about-us.php">About Us</a>
                <a href="faq.php">FAQ</a>
            </div>
        </div>

        <div class="right-side">


            <div class="trending">
            <div class="title">

                <h1>All Hard Copy Available Books</h1>
            </div>
                <div class="book-shelf">
                    <?php
                        $book_query = "SELECT * from books where books.available > 0 ";
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