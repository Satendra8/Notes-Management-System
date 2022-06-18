<?php
include "includes/dbcon.php";
if (isset($_POST['submit'])) {
    echo $_POST['submit'];
    $name = trim($_POST['username']);
    $email = $_POST['email'];
    $phone = trim($_POST['phone']);
    $user_type = trim($_POST['user_type']);
    $department = trim($_POST['department']);
    $gender = trim($_POST['gender']);

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
            (name, email, phone, user_type, password, r_password, token, department, gender) 
            VALUES ('$name', '$email', '$phone',  '$user_type', '$pass', '$cpass', '$token', '$department', '$gender')";
            $info = mysqli_query($conn, $query);
            // print_r(mysqli_error($conn));
            // exit;
            if ($info) {

                $subject = "Welcome to our Website";
            $body = "Welcome ";
            $sender_email = "From: souravkumar32973@gmail.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "check your mail to reset your password $email";
                header('location:login.php');
            } else {
                echo "Email sending failed....";
            }
?>
                <script>
                    alert("Registered Successfully");
                    window.location.replace("login.php");
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

<?php require('includes/header.php') ?>

    <div class="card bg-light" style="height: 100vh;">
    <article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title text-center">Create Account</h4>
    <p class="text-center">Get started with your free Account</p>
    <p>
    <a href="index.php" class="btn btn-primary btn-block">Back to home page</a>
    </p>
    <p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
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
                <input name="user_type" class="form-control" value="student" type="text" readonly/>
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

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
            </div>

        </form>
    </article>
    </div>
    
    <?php require('includes/footer.php') ?>