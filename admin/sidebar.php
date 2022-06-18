<?php session_start(); ?>
<!-----  sidebar started------>
<div class="sidebar">
            <div class="sidebar-menu">
                <li class="item">
                    <a href="index.php" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="item">
                    <a href="Upload.php" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Upload Notes</span>
                    </a>
                </li>
                <li class="item" id="user">
                    <a href="#user" class="menu-btn">
                        <i class="fas fa-user-edit"></i><span>User Action<i
                                class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="register.php"><i class="far fa-edit"></i><span>Create User</span></a>
                        <a href="edit_user.php"><i class="fas fa-address-card"></i><span>View User</span></a>

                    </div>
                </li>
                <li class="item">
                    <a href="contactInfo.php" class="menu-btn">
                        <i class="fas fa-lock"></i><span>Contact Info</span>
                    </a>
                </li>
                <li class="item" id ="password">
                    <a href="recover.php" class="menu-btn">
                        <i class="fas fa-lock"></i><span>Change Password</span>
                    </a>
                </li>
                <li class="item">
                    <a href="about_us.php" class="menu-btn">
                        <i class="fas fa-info-circle"></i><span>About</span>
                    </a>
                </li>
            </div>
        </div>

        <!-----  sidebar end------>