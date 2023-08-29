<section class="main">
        <div class="left-side" >
            <div class="topper">
                <i class="fa-solid fa-bars bars2"></i>

                <h1>Bookmark</h1>
            </div>
            <div class="search-side">
                <form action="home-search-logic.php" method="POST">
                    <div class="search">
                        <input type="text" name="search" placeholder="Search books, author.. " />
                        <button type="submit" name="search-side"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>

                </form>
            </div>
            <div class="top">
                <a href="index.php" class="active">Home</a>
                <a href="hard-copy.php" >Hard Copy Available</a>
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