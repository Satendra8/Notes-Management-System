<?php
session_start();
include "../includes/dbcon.php";
?>




<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

    <title>User Info</title>

</head>
<style>
    .wrapper.collapse .sidebar {
        width: 70px;
    }

    .wrapper.collapse .sidebar .profile img,
    .wrapper.collapse .sidebar .profile p,
    .wrapper.collapse .sidebar a span {
        display: none;
    }

    .wrapper.collapse .sidebar .sidebar-menu .item .menu-btn {
        font-size: 23px;
    }

    .wrapper.collapse .sidebar .sidebar-menu .item .sub-menu i {
        font-size: 18px;
        padding-left: 3px;
    }

    .wrapper.collapse .main-container {
        width: (100% - 70px);
        margin-left: 70px;
    }

    .wrapper .main-container .card {
        background: #fff;
        padding: 15px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .collapse:not(.show) {
        display: contents;
    }
</style>

<?php
include("header.php");

include("sidebar.php");
?>

<?php
if (isset($_SESSION["id"])) {
    include "../includes/dbcon.php";
    $id = $_SESSION["id"];
    $query ="
        SELECT * FROM user
        WHERE id = '$id'
        LIMIT 1";
    $execute = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($execute);

?>

<!-- main content start -->
<div class="main-container">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <div style="width:100px; height:100px; margin-left:120px;" class="logo">
            <img style="height:100%; width:100%;  border-radius: 50px;" src="images/1.png" alt="">
        </div>
        <h4 class="card-title text-center">Profile Info</h4>

        <form id = "user_info">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="name" class="form-control" placeholder="Full name" type="text" value="<?php echo $row["name"]; ?>" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $row["email"]; ?>" readonly>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone number" type="number" value="<?php echo $row["phone"]; ?>" readonly/>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="department" class="form-control" value="<?php echo $row["department"]; ?>" type="text" readonly>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="user_type" class="form-control" value="<?php echo $row["user_type"]; ?>" type="text" readonly/>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="gender" class="form-control" value="<?php echo $row["gender"]; ?>" type="text" readonly/>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="join_date" class="form-control" value="<?php echo $row["join_date"]; ?>" type="text" readonly/>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <textarea type="text" name="bio" id="customer_address" value = "<?php echo $row["bio"]; ?>" readonly><?php echo $row["bio"]; ?></textarea>            </div>
        </form>
    </article>
</div>
<!-- main content end -->
</div>
<!-- wrapper end -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".sidebar-btn").click(function() {
            $(".wrapper").toggleClass("collapse");
        });
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php } ?>