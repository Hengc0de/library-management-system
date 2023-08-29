<?php
ob_start();
include 'partials/header.php';
$user_id = $_SESSION['user_id'];
$imagequery = "SELECT * from users  where id = '$user_id' ";
$imageresult = mysqli_query($connection, $imagequery);
$user = mysqli_fetch_assoc($imageresult);
if (isset($_GET['id'])){
    $book_id = $_GET['id'];
}
?>
    
        <!-- ========================= Main ==================== -->
            <?php include 'partials/main.php' ?>

                <!-- ======================= Cards ================== -->


                <!-- ================ Order Details List ================= -->
                <!-- <div class="overlay">
                </div> -->
                
                <div class="table">
                    <div class="table-list">
                        <div class="table-header">
                            <h2>Issue Book</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Cover</td>
                                    <td>Title</td>
                                    <td>Author</td>
                                    <td>Year</td>
                                    <td>Available</td>
                                    <td>Genre</td>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $book_query = "SELECT * FROM books where id = '$book_id'";
                                    $book_result = mysqli_query($connection, $book_query);
                                ?>
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
                                    <td><?php $books_available = $book['available'];
                                                if ($books_available > 0){
                                                    $available_status = "Yes";
                                                }
                                                else {
                                                    $available_status = "No";
                                                }
                                    ?> <p><?= $available_status ?></p></td>
                                    <td><?php $genre = mysqli_fetch_assoc($genre_result);?><?= $genre['name'] ?></td>

                                </tr>
                                <?php endwhile ?>
                                
                            </tbody>
                        </table>
                        <div class="book-form" >
                            <h1 class="page-title">Options</h1>
                            <form action="issue-book-logic.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $book_id?>" name="issue_id">

                                <div class="row">
                                    <div class="input-box">
                                        <span class="title"> Enter how days you want to borrow <small style="color: gray;">the longer the higher the fine if late</small></span>
                                        <input type="number"  required class="date" id="date" name="date">
                                        <!-- <select onchange="selectNum()" class="date" style="margin: 20px 0; font-size: 20px;" name="date" id="date">
                                            <option selected value="3">3 days</option>
                                            <option value="7">7 days</option>
                                            <option value="14">14 days</option>
                                            <option value="21">21 days</option>
                                            <option value="28">28 days</option>
                                        </select> -->
                                    </div>
                                    <div class="input-box">
                                        <span style="color: dark-yellow " class="title">Fine if late per day in $</span>
                                        <input type="text"  style="margin: 20px 0;pointer-events: none; user-select: none;" id="fine" name="fine" value="0" placeholder="0.30 $">
                                    </div>
                                </div>
                                <?php if($available_status == "Yes") : ?>
                                <div class="row">
                                    <button  style="padding: 15px 30px; border: 0; cursor:pointer; background-color: lime; border-radius: 4px; " name="submit" type="submit">Borrow hard copy</button>
                                </div>
                                <?php else : ?>
                                    <div class="row">
                                    <button disabled  style="padding: 15px 30px; border: 0; cursor:pointer; background-color: gray; border-radius: 4px; " >Book not available</button>
                                </div>
                                <?php endif ?>
                            </form>

                        </div>

                    </div>

                    

                    <!-- ================= New Customers ================ -->
                
                    </div>
                </div>

        </div>
        <!-- <div class="options" style="position:absolute; ">
              <div class="option-card">
                <h1 class="title" style="font-size: 50px;">Options</h1>
                                
              </div>          
        </div> -->

    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>