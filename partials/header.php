<?php 
require 'assets/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./book-preview.css">
    <title>Bookmark</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

</head>
<body class="light-theme">
    <nav>
        <div class="left-side">
            <i class="fa-solid fa-bars bars"></i>
            <a href="index.php"><h1>Bookmark</h1></a>
        </div>
        <div class="right-side">
            <div class="r-left-side">
                    <form method="POST" action="./home-search-logic.php">
                        <div class="search">
                            <input type="text" name="search" placeholder=" Search books, authors..." />

                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                          </div>
                    </form>
                <div>

                    <div class="theme">

                        <label class="switch">
                            <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#ffd43b"><circle r="5" cy="12" cx="12"></circle><path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path></g></svg></span>
                            <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path></svg></span>   
                            <input type="checkbox" class="input" checked>
                            <span class="slider"></span>
                          </label>
                    </div>
                </div>
            </div>
            <div class="r-right-side">
                <ul>
                <i class="fa-solid fa-magnifying-glass search-trigger"></i>
                    <?php if (!isset($_SESSION['user_id'])) : ?>
                        
                        <a href="login.php" class="call-to-action">Start Reading</a>
                    <?php elseif (isset($_SESSION['user_id'])) : ?> 
                        <li id="name" style="color: var(--text-white)" class="name">
                        <?php
                            $user_id = $_SESSION['user_id'];
                            $imagequery = "SELECT * from users where id = '$user_id' ";
                            $imageresult = mysqli_query($connection, $imagequery);
                            $user = mysqli_fetch_assoc($imageresult);
                            $user_is_admin_or_no = $user['is_admin'];
                            ?>
                            <p  ><?= $user['name'] ?></p>

                        </li>
                        <li>

                        <img src="<?= './images/' . $user['avatar'] ?>" class="profile" />
                        <?php if ($user_is_admin_or_no == 1) :?>
                        <ul>
                            <li class="sub-item">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <a href="./admin/index.php"><p>Dashboard</p></a>
                            </li>
                            <li class="sub-item">
                                <i class="fa-solid fa-list"></i>
                            <p>My Reading List</p>
                            </li>
                            <li class="sub-item">
                                <i class="fa-solid fa-user"></i>
                            <p>Manage Profile</p>
                            </li>
                            <li class="sub-item">
                                <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="logout.php"><p>Logout</p></a>
                            </li>
                        </ul>
                        </li>
                        <?php else: ?>
                            <ul>
                            <li class="sub-item">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <a href="./student-dashboard/index.php"><p>Dashboard</p></a>
                            </li>
                            <li class="sub-item">
                                <i class="fa-solid fa-list"></i>
                                <a href="./student-dashboard/reading-list.php"><p>My Reading List</p></a>

                            </li>
                            <li class="sub-item">
                                <i class="fa-solid fa-user"></i>
                                <a href="./student-dashboard/manage-profile.php"><p>Manage Profile</p></a>

                            </li>
                            <li class="sub-item">
                                <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="logout.php"><p>Logout</p></a>
                            </li>
                        </ul>
                        </li>
                        <?php endif ?>
                    <?php endif ?>
                    
                    </ul>
            </div>
        </div>

    </nav>