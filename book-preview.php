<?php
    include 'partials/header.php';
    
    $user_id = $_SESSION['user_id'];
    $user_query = "SELECT * from users where id = '$user_id'";
    $user_result = mysqli_query($connection, $user_query);
    $user = mysqli_fetch_array($user_result);
    if (isset($_GET['id'])) {
        $book_id = $_GET['id'];
        $book_query = "SELECT * from books where id = '$book_id'";
        $book_result = mysqli_query($connection, $book_query);
        $book = mysqli_fetch_assoc($book_result);
    }
    if (!isset($_SESSION['user_id'])){
        header('location: index.php');
    }
?>

    <div class="preview-page">
        <div class="big-preview-page-container">
            <div class="preview-page-container">
                <div class="preview-page-book">
                    <img src="./images/<?= $book['cover'] ?>" alt="">
                    <div class="button-container">
                        <a href="pdf-view.php?id=<?= $book['id'] ?>">Read Online</a>
                        <a href="./student-dashboard/issue-book.php?id=<?= $book['id']?>">Borrow Hard Copy</a>
                    </div>
                </div>
                <div class="description">
                    <div class="title">
                        <h1><?=$book['title'] ?></h1>
                    </div>
                    <div class="author">
                        <p>By: <?=$book['author'] ?></p>
                    </div>
                    <div class="intro">
                        <p style="padding-bottom: 50px;  border-bottom: 1px solid var(--color-black-lighter);"><?=$book['description'] ?></p>
                    </div>
                    <div class="comment">
                        <h1>Comment Section</h1>
                        <div class="add-comment" style="padding: 20px 0; border-bottom: 1px solid var(--color-black-lighter)">
                            <form action="add-comment.php" method="post">
                                <input type="hidden" name="book_id" value="<?=$book_id ?>">
                                <input type="hidden" name="user_id" value="<?=$user_id ?>">
                                <div class="row" >
                                    <label style="color: var(--color-black-light);" for="comment">Add comment:</label>
                                    <input id="comment" type="text" name="comment" style="padding:10px; width: 70%; background-color: var(--color-black-lighter); color: var(--text-white)">
                                    <button type="submit" style="padding: 10px; border-radius: 4px; color: black; background-color: var(--color-primary)" name="submit">Send</button>
                                </div>
                            </form>
                        </div>
                        <?php 
                            $comment_query ="SELECT * FROM comments where book_id = $book_id";
                            $comment_result = mysqli_query($connection, $comment_query);
                        ?>
                        <?php if (mysqli_num_rows($comment_result)) : ?>
                        <?php while ($comment = mysqli_fetch_array($comment_result)) : ?>
                            
                            <?php
                                $comment_user_id = $comment['user_id'];
                                $comment_user_query = "SELECT * FROM users WHERE id = $comment_user_id";
                                $comment_user_result = mysqli_query($connection, $comment_user_query);
                                $comment_user = mysqli_fetch_assoc($comment_user_result);
        
                            ?>
                            <div class="comment-container">
                            <div class="top">
                                <img style="object-fit: cover;" src="./images/<?= $comment_user['avatar'] ?>" alt="">
                                <div>
                                    <p>Commented By</p>
                                    <small class="name"><?= $comment_user['name'] ?></small>
                                </div>

                            </div>
                            <p style="margin-top: 10px; font-family: 'Lora', serif;">"<?= $comment['comment']?>"</p>
                        </div>
                        <?php endwhile  ; ?>
                        <?php else : ?>
                        <p style=" color: var(--color-black-lighter); ">No Comment Available </p>
                        <?php endif ?>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="./app.js"></script>
</body>
</html>