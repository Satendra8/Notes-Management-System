<?php
include "../includes/dbcon.php";
if (isset($_POST['submit'])) {
    echo $_POST['submit'];
    $name = trim($_POST['username']);
    $email = $_POST['email'];
    $phone = trim($_POST['phone']);
    $user_type = trim($_POST['user_type']);
    $department = trim($_POST['department']);
    $gender = trim($_POST['gender']);
    $bio = trim($_POST['bio']);

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));

    $query = "SELECT * FROM user where email='$email' ";
    $info = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($info);

    if ($rows > 0) {
        ?>
        <script>
        alert('Email Already Exist!');
        </script>
        <?php
    } else {
        if ($_POST['password'] === $_POST['cpassword']) {
            $query ="
            INSERT INTO user
            (name, email, phone, user_type, password, r_password, token, department, gender, bio) 
            VALUES ('$name', '$email', '$phone',  '$user_type', '$pass', '$cpass', '$token', '$department', '$gender', '$bio')";
            $info = mysqli_query($conn, $query);
            // print_r(mysqli_error($conn));
            // exit;
            if ($info) {
?>
                <script>
                    alert("Registered Successfully");
                    window.location.replace("edit_user.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Not Registered");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Password are not matching");
            </script>
<?php
        }
    }
} ?>




<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

    <title>Create User</title>

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

<!-- main content start -->
<div class="main-container">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <div style="width:100px; height:100px; margin-left:120px;" class="logo">
            <img style="height:100%; width:100%;  border-radius: 50px;" src="images/logo.png" alt="">
        </div>
        <h4 class="card-title text-center">Create Account</h4>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="create_user">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="username" class="form-control" placeholder="Full name" type="text" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone number (Optional)" type="number">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="department" class="form-control" placeholder="Department" type="text" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input name="user_type" class="form-control" value="teacher" type="text" readonly/>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="gender" id="gender" class="form-control">
                    <option selected value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
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
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <textarea type="text" name="bio" id="bio" placeholder="Bio"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
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