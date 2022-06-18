<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Password</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
    .loginpage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body>


    <?php
include "../includes/dbcon.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['email'];

        $query = "SELECT * FROM user where email='$username' ";
        $info = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($info);
        $data = mysqli_fetch_array($info);

        if ($rows) {
            $username = $data['name'];
            $email = $data['email'];
            $token = $data['token'];


            $subject = "Password Reset";
            $body = "Hi, $username.Click here too reset your password
            http://localhost/inventory/ResetPass.php?token=$token";
            $sender_email = "From: kgi48096@zwoho.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "check your mail to reset your password $email";
                header('location:login.php');
            } else {
                echo "Email sending failed....";
            }
        } else {
            echo "No email found";
        }
    }
    ?>

    <div class="loginpage">
            <div style="width:100px; height:100px; margin-left:80px;" class="logo">
                <img style="height:100%; width:100%;  border-radius: 50px;" src="images/logo.png" alt="">
            </div>
                <h4 class="card-title text-center mt-3">Reset Password</h4>
                <p class="text-center">Please fill Email ID correctly</p>


                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div>



                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">SEND MAIL</button>
                    </div>
                    <p class="text-center">Have an account?<a href="../login.php">login In</a></p>

                </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>