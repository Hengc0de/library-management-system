<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="grid-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                <li>
                    <img src="<?= ROOT_URL. 'images/' . $user['avatar'] ?>" class="profile" />
                    <ul>
                        <li class="sub-item">
                            <p><?= 'Username:   '. $user['username'] ?></p>
                        </li>
                        <li class="sub-item">
                            <p><?php $is_admin = $user['is_admin'];
                                if($is_admin == 1){
                                    $is_admin = "Admin";
                                }
                                else {
                                    $is_admin = "Student";
                                }
                            ?><?= 'Account Type:   '. $is_admin ?></p>
                        </li>
                        <li class="sub-item">
                            <i class="fa-solid fa-table-cells-large"></i>
                            <a href="../index.php"><p>Back to home</p></a>
                        </li>

                        <li class="sub-item">
                            <i class="fa-solid fa-user"></i>
                            <a href="manage-profile.php"><p>Manage Profile</p></a>
          
                        </li>
                        <li class="sub-item">
                            <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                        <a href="<?= ROOT_URL ?>logout.php"><p>Logout</p></a>
                        </li>
                    </ul>
                    </li>
                </div>
            </div>