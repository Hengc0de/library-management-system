<?php
    require '../assets/database.php';
    $user_id = $_SESSION['user_id'];
    $user_check_query = "SELECT * from users WHERE id = $user_id";
    $user_check_result = mysqli_query($connection, $user_check_query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.6/css/line.min.css">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - Bookmark</title>
    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="<?= ROOT_URL. 'admin/assets/css/form.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL. 'admin/assets/css/style.css' ?>">
</head>

<body class="light-theme" >
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="menu-bars">
                        <span class="icon">
                        <i class="fa-solid fa-bars"></i>
                        </span>
                        <span style="font-size: 1.75rem; font-weight: 700;" class="title">Bookmark</span>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                        <i class="fa-solid fa-list"></i>
                        </span>
                        <span class="title">Reading List</span>
                    </a>
                </li>


                <li>
                    <a href="issued-penalty.php">
                        <span class="icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        </span>
                        <span class="title">Issued, Penalty List</span>
                    </a>
                </li>


                <li >
                    <a href="manage-comment.php" >
                        <span class="icon">
                        <i class="fa-solid fa-comment-dots"></i>
                        </span>
                        <span class="title">Manage comments</span>
                    </a>
                </li>
                <li >
                    <a href="feedbacks.php" >
                        <span class="icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        </span>
                        <span class="title">Requests, Feedbacks</span>
                    </a>
                </li>
                <li class="change-theme"   onclick="myFunction()">
                    <a href="#">
                        <span class="icon">
                        <i class="fa-solid fa-circle-half-stroke"></i>
                        </span>
                        <span class="title">Change theme</span>
                    </a>
                </li>

            </ul>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.6/script/monochrome/bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>