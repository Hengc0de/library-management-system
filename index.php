<!-- start 3/29 2am  -->
<?php include 'partials/header.php';
    $view_query = "SELECT view FROM website_view order by id";
    $view_result = mysqli_query($connection, $view_query);
    $view = mysqli_fetch_assoc($view_result);
    $totalview = $view['view'];
    if ($totalview){
        $totalview = $totalview + 1 ;

    }
    // $totalview--;
    // $totalview--;
    // echo $totalview;
    $insert_view_query = "UPDATE website_view SET view = $totalview ";
    $insert_view_result = mysqli_query($connection, $insert_view_query);


?>
    <?php include 'partials/main.php' ?>
        <div class="right-side">
            <div class="title">
                <h1>Featured</h1>
            </div>
            <div class="featured">
                <div class="featured-container">
                    <?php
                    $featured_book_query = "SELECT * from books where is_featured = 1 limit 2";
                    $featured_book_result = mysqli_query($connection, $featured_book_query);
                    ?>
                    <?php while ( $featured_book = mysqli_fetch_array($featured_book_result)) : ?>
                    <div class="background">
                        <img  src="./images/<?=  $featured_book['featured_background'] ?>" class="background-cover" alt="">
                        <div class="book-container" style="margin: 0 auto;">
                            <div class="book-position">
                                <div class="book">
                                    <div class="top">
                                        <img src="./images/<?= $featured_book['cover'] ?>" class="cover" alt="">
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                                <div class="bot">
                                    <h1><?= $featured_book['title'] ?></h1>
                                    <p>By: <?= $featured_book['author'] ?></p>
                                    <small>Published Year: <?=$featured_book['year'] ?> </small>
                                </div>

                            </div>
                            <?php
                            $featured_book_genreID = $featured_book['genre_id'];
                            $featured_genre_query = "SELECT * FROM genres where id = $featured_book_genreID";
                            $featured_genre_result = mysqli_query($connection, $featured_genre_query);
                            $featured_genre = mysqli_fetch_array($featured_genre_result);
                            ?>
                            <a href="genre.php?id=<?=$featured_genre['id'] ?>" class="genre"><?= $featured_genre['name'] ?></a>
                            <a href="add-to-reading-list.php?id=<?= $featured_book['id']?>" class="add"><i class="fa-sharp fa-solid fa-plus"></i></a>
                            <a href="book-preview.php?id=<?=$featured_book['id'] ?>" class="preview">Read Now</a>
                        </div>
                    </div>
                    <?php endwhile ?>
                    

                </div>
            </div>
            <div class="trending">
                <div class="title"><h1>Trending</h1>
                </div>
                <div class="book-shelf">
                    <?php
                        $trending_query = "SELECT * from books where borrowed_times > 0 ORDER BY  borrowed_times DESC LIMIT 8 ";
                        $trending_result = mysqli_query($connection, $trending_query);
                    ?>
                    <?php
                        while ($trending = mysqli_fetch_array($trending_result)) : ?>
                        <?php 
                            $trending_genre_id = $trending['genre_id']; 
                            $trending_genre_query = "SELECT * from genres where id = '$trending_genre_id'";
                            $trending_genre_result = mysqli_query($connection, $trending_genre_query);
                            $trending_genre = mysqli_fetch_assoc($trending_genre_result);
                        ?>
                    <div class="book-container">
                        <div class="book">
                            <div class="top">
                                
                                <img src="./images/<?= $trending['cover'] ?>" class="cover" alt="">
                                <a href="add-to-reading-list.php?id=<?= $trending['id']?>" class="add"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                <a href="book-preview.php?id=<?= $trending['id']?>" class="preview"><i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                <div class="overlay"></div>
                            </div>
                            
                            
                        </div>
                        <?php if (strlen($trending['title']) > 22) : ?>
                        <h3><?=substr($trending['title'], 0, 22)."..." ?></h3>
                        <?php else: ?>
                        <h3><?=$trending['title']?></h3>

                        <?php endif; ?>
                        <p><?= $trending['author'] ?></p>

                        <div class="bot">
                            <div>
                                <p><?= $trending['year'] ?></p>
                            </div>
                            <div>
                                <a href="<?= 'genre.php?id='. $trending_genre['id']?>"><?= $trending_genre['name'] ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                   
                    


                </div>

            </div>
            <div class="latest-book">
                <div class="title">
                    <h1>Latest Books</h1>
                    <div class="see-more">
                        <a href="all-book.php">See All <i class="fa-sharp fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
                <div class="book-shelf">
                <?php
                        $latest_query = "SELECT * FROM books where books.is_latest = 1  ";
                        $latest_result = mysqli_query($connection, $latest_query);
                    ?>
                    <?php
                        while ($latest = mysqli_fetch_array($latest_result)) : ?>
                    

                    <?php 
                    $latest_genre_id = $latest['genre_id']; 
                    $latest_genre_query = "SELECT * from genres where id = '$latest_genre_id'";
                    $latest_genre_result = mysqli_query($connection, $latest_genre_query);
                    $genre = mysqli_fetch_assoc($latest_genre_result);
                    ?>

                     
                        
                    
                    <div class="book-container">
                        <div class="book">
                      
                        <div class="top">
                                
                                <img src="./images/<?= $latest['cover'] ?>" class="cover" alt="">
                                <a href="add-to-reading-list.php?id=<?= $latest['id']?>" class="add"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                <a href="book-preview.php?id=<?= $latest['id']?>" class="preview"><i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                <div class="overlay"></div>
                            </div>
                            
                        </div>
                        <?php if (strlen($latest['title']) > 22) : ?>
                        <h3><?=substr($latest['title'], 0, 22)."..." ?></h3>
                        <?php else: ?>
                        <h3><?=$latest['title']?></h3>

                        <?php endif?>

                        <p><?= $latest['author'] ?></p>

                        <div class="bot">
                            <div>
                                <p><?= $latest['year'] ?></p>
                            </div>
                            <div>
                                <a href="<?= 'genre.php?id='.$genre['id'] ?>"><?= $genre['name'] ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                </div>
            </div>
            <div class="latest-book">
                <div class="title">
                    <h1>Hard Copy Available Books</h1>
                    <div class="see-more">
                        <a href="all-book.php">See All <i class="fa-sharp fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
                <div class="book-shelf">
                <?php
                        $latest_query = "SELECT * FROM books where books.available > 0  ";
                        $latest_result = mysqli_query($connection, $latest_query);
                    ?>
                    <?php
                        while ($latest = mysqli_fetch_array($latest_result)) : ?>
                    

                    <?php 
                    $latest_genre_id = $latest['genre_id']; 
                    $latest_genre_query = "SELECT * from genres where id = '$latest_genre_id'";
                    $latest_genre_result = mysqli_query($connection, $latest_genre_query);
                    $genre = mysqli_fetch_assoc($latest_genre_result);
                    ?>

                     
                        
                    
                    <div class="book-container">
                        <div class="book">
                      
                        <div class="top">
                                
                                <img src="./images/<?= $latest['cover'] ?>" class="cover" alt="">
                                <a href="add-to-reading-list.php?id=<?= $latest['id']?>" class="add"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                <a href="book-preview.php?id=<?= $latest['id']?>" class="preview"><i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                <div class="overlay"></div>
                            </div>
                            
                        </div>
                        <?php if (strlen($latest['title']) > 22) : ?>
                        <h3><?=substr($latest['title'], 0, 22)."..." ?></h3>
                        <?php else: ?>
                        <h3><?=$latest['title']?></h3>

                        <?php endif?>

                        <p><?= $latest['author'] ?></p>

                        <div class="bot">
                            <div>
                                <p><?= $latest['year'] ?></p>
                            </div>
                            <div>
                                <a href="<?= 'genre.php?id='.$genre['id'] ?>"><?= $genre['name'] ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                </div>
            </div>
            
        </div>
    </section>
    <?php if (isset($_SESSION['issue-book'])) : ?>
    <div class="alert error">
        <p><?= $_SESSION['issue-book'] ?><?php unset($_SESSION['issue-book']) ?></p>
    </div>
    <?php endif; ?>
    <script src="./app.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    
</body>
</html>