<?php session_start(); ?>
<!-----  sidebar started------>
<div class="sidebar">
    <div class="sidebar-menu">
        <li class="item">
            <a href="index.php" class="menu-btn">
                <i class="fas fa-desktop"></i><span>Dashboard</span>
            </a>
        </li>
        <li class="item" id="profile">
            <a href="#profile" class="menu-btn">
                <i class="fas fa-user-circle"></i><span>Profile<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="edit_profile.php"><i class="far fa-edit"></i><span>Edit</span></a>
                <a href="user_info.php"><i class="fas fa-address-card"></i><span>Info</span></a>
            </div>
        </li>
        <li class="item" id="notes">
            <a href="#notes" class="menu-btn">
                <i class="fa fa-folder-open"></i><span>CSE/IT Notes<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="card1.php?id=1"><i class="fa fa-stop-circle"></i><span>1st Semester</span></a>
                <a href="card1.php?id=2"><i class="fa fa-stop-circle"></i><span>2nd Semester</span></a>
                <a href="card1.php?id=3"><i class="fa fa-stop-circle"></i><span>3rd Semester</span></a>
                <a href="card1.php?id=4"><i class="fa fa-stop-circle"></i><span>4th Semester</span></a>
                <a href="card1.php?id=5"><i class="fa fa-stop-circle"></i><span>5th Semester</span></a>
                <a href="card1.php?id=6"><i class="fa fa-stop-circle"></i><span>6th Semester</span></a>
                <a href="card1.php?id=7"><i class="fa fa-stop-circle"></i><span>7th Semester</span></a>
                <a href="card1.php?id=8"><i class="fa fa-stop-circle"></i><span>8th Semester</span></a>

            </div>
        </li>
        <li class="item" id="paper">
            <a href="#paper" class="menu-btn">
                <i class="fa fa-file"></i><span>Question Paper<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="QuesPaper.php?qus=1"><i class="fa fa-stop-circle"></i><span>1st Semester</span></a>
                <a href="QuesPaper.php?qus=2"><i class="fa fa-stop-circle"></i><span>2nd Semester</span></a>
                <a href="QuesPaper.php?qus=3"><i class="fa fa-stop-circle"></i><span>3rd Semester</span></a>
                <a href="QuesPaper.php?qus=4"><i class="fa fa-stop-circle"></i><span>4th Semester</span></a>
                <a href="QuesPaper.php?qus=5"><i class="fa fa-stop-circle"></i><span>5th Semester</span></a>
                <a href="QuesPaper.php?qus=6"><i class="fa fa-stop-circle"></i><span>6th Semester</span></a>
                <a href="QuesPaper.php?qus=7"><i class="fa fa-stop-circle"></i><span>7th Semester</span></a>
                <a href="QuesPaper.php?qus=8"><i class="fa fa-stop-circle"></i><span>8th Semester</span></a>

            </div>
        </li>
        <li class="item" id="projects">
            <a href="#projects" class="menu-btn">
                <i class="fa fa-code"></i><span>Projects<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="card1.php"><i class="fa fa-stop-circle"></i><span>Mini Projects</span></a>
            </div>
        </li>
        <li class="item" id="books">
            <a href="ReferBook.php" class="menu-btn">
                <i class="fa fa-book"></i><span>Reference Books<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
        </li>
        <li class="item" id="presentations">
            <a href="presentation.php" class="menu-btn">
                <i class="fa fa-film"></i><span>Presentations<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
        </li>
        <li class="item" id="samplepapers">
            <a href="#samplepapers" class="menu-btn">
                <i class="fa fa-file"></i><span>Sample Papers<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="SamplePaper.php?id=1"><i class="fa fa-stop-circle"></i><span>1st Semester</span></a>
                <a href="SamplePaper.php?id=2"><i class="fa fa-stop-circle"></i><span>2nd Semester</span></a>
                <a href="SamplePaper.php?id=3"><i class="fa fa-stop-circle"></i><span>3rd Semester</span></a>
                <a href="SamplePaper.php?id=4"><i class="fa fa-stop-circle"></i><span>4th Semester</span></a>
                <a href="SamplePaper.php?id=5"><i class="fa fa-stop-circle"></i><span>5th Semester</span></a>
                <a href="SamplePaper.php?id=6"><i class="fa fa-stop-circle"></i><span>6th Semester</span></a>
                <a href="SamplePaper.php?id=7"><i class="fa fa-stop-circle"></i><span>7th Semester</span></a>
                <a href="SamplePaper.php?id=8"><i class="fa fa-stop-circle"></i><span>8th Semester</span></a>

            </div>
        </li>
        <li class="item" id="password">
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