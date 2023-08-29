<?php 
require 'constants.php';
// connect to database 
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// check connection
if (mysqli_errno($connection)) {
    die('Connection error');
}