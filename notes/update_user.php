<?php
include "connect.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
$statement = $conn->prepare("
    UPDATE user
    SET name = :name,
     email = :email,
     phone = :phone,
     user_type = :user_type,
     password = :password, 
     r_password = :r_password
     WHERE id = :id
");
$statement->execute(
    array(
        ':name'  => trim($_POST['username']),
        ':email'  => trim($_POST['email']),
        ':phone'  => trim($_POST['phone']),
        ':user_type'  => trim($_POST['user_type']),
        ':password'  => trim($_POST['password']),
        ':r_password'  => trim($_POST['cpassword']),
        ':id'    => $_GET["id"],
    )
);

?>
<script>
    alert("User Updated Successfully!");
</script>

<?php     header("location:edit_user.php"); } ?>




<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

    <title>Update User</title>

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
if (isset($_GET["id"])) {
    $statement = $conn->prepare("
        SELECT * FROM user
        WHERE id = :id
        LIMIT 1
    
    ");
    $statement->execute(
        array(
            ':id'    => $_GET["id"]
        )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {

?>

<!-- main content start -->
<div class="main-container">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <div style="width:100px; height:100px; margin-left:120px;" class="logo">
            <img style="height:100%; width:100%;  border-radius: 50px;" src="images/logo.png" alt="">
        </div>
        <h4 class="card-title text-center">Update User</h4>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id = "update_user">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="username" class="form-control" placeholder="Full name" type="text" value="<?php echo $row["name"]; ?>" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $row["email"]; ?>" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone number" type="number" value="<?php echo $row["phone"]; ?>" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="user_type" id="usertype" class="form-control">
                    <option selected value="<?php echo $row["user_type"]; ?>"><?php echo $row["user_type"]; ?></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control" placeholder="Create password" type="password" name="password" valur="" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control" placeholder="Repeat password" type="password" name="cpassword" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
            </div>

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

<script>
    $(document).ready(function() {

        $("#submitbtn").click(function() {

            var username = $("#username").val();
            var pattern_user = /^[a-zA-Z ]+$/;
            var email = $("#email").val();
            var pattern_email = /^[a-zA-Z0-9_.]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
            var mobile = $("#mobile").val();
            var pattern_mobile = /^[6-9][0-9]{9}$/;
            var password = $("#password").val();
            var pattern_password = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,16}$/;
            var cpassword = $("#cpassword").val();

            if (username == "" && email == "" && mobile == "" && password == "" && cpassword == "") {
                alert("All Fields Are Required");
                return false;
            }

            // Username Validation

            if (username == "") {
                alert("Username Field is Required");
                return false;
            } else if (!(username.length >= 3 && username.length <= 20)) {
                alert("Username Length must be between 3 to 20");
                return false;
            } else if (!pattern_user.test(username)) {
                alert("username is invalid");
                return false;
            }

            // Email Validation

            if (email == "") {
                alert("Email is required");
                return false;

            } else if (!pattern_email.test(email)) {

                alert("Email Is invalid");
                return false;
            }

            // mobile Validation

            if (mobile == "") {
                alert("Mobile Field is Required");
                return false;

            } else if (mobile.length != 10) {
                alert("mobile length must be 10 digits");
                return false;
            } else if (!pattern_mobile.test(mobile)) {
                alert("Mobile Number is invalid");
                return false;
            }


            // Password Validation

            if (password == "") {
                alert("password is required");
                return false;
            } else if (!pattern_password.test(password)) {
                alert("Password must be start with One Capital letter and contain atleast one digit and one special charcter");
                return false;
            }

            if (cpassword == "") {
                alert("Confirm password is required");
                return false;
            } else if (!pattern_password.test(cpassword)) {
                alert("Password must be start with One Capital letter and contain atleast one digit and one special charcter");
                return false;
            } else if (password != cpassword) {
                alert("Confirm Password Does'not match with Password");
                return false;
            }

        });

    });
</script>

<?php } } ?>