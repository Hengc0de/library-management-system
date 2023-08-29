
<?php 
require '../assets/database.php';
if (isset($_GET['id'])){
$comment_id = $_GET['id'];
$comment_query = "SELECT * FROM comments WHERE id = '$comment_id'";
$comment_result = mysqli_query($connection, $comment_query);
$comment = mysqli_fetch_assoc($comment_result);

$delete_query = "DELETE FROM comments where id = '$comment_id'";
$delete_result = mysqli_query($connection, $delete_query);
$_SESSION['delete-comment-success'] = "Deleted comment successfully";
header('location: manage-comment.php');
}