<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form</title>

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
    <div class="loginpage">
        <div style="width:100px; height:100px; margin-left:60px;" class="logo">
            <img style="height:100%; width:100%;  border-radius: 50px;" src="images/logo.png" alt="">
        </div>
        <h4 class="card-title text-center"><b>LWT Inventory</b> Login</h4>
        <p class="bg-info text-white px-5">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            } else {
                echo $_SESSION['msg'] = "";
            }
            ?> </p>

        <form action="index.php" method="POST">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password" name="password" value="" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
        <a style="text-decoration:none; text-align: right; " href="recover.php">Forgot Password</a>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>