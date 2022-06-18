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
if(isset($_POST['submit'])){

    if(isset($_GET['token'])){

        $token = $_GET['token'];

       
    $password= $_REQUEST['password'];
    $cpassword= $_REQUEST['cpassword'];

    echo $password;
    echo $cpassword;

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);



        if($_REQUEST['password'] === $_REQUEST['cpassword']){

            $updatequery = "update user set password='$pass', r_password='$cpass' where token='$token'";

           
            $iquery = mysqli_query($conn,$updatequery);

            if($iquery){
                $_SESSION['msg'] = "Your Password has been Updated";
                header('location:login.php');
               
            }
            else{
                $_SESSION['passmsg'] = "Your password is not updated";
                header("location:ReserPass.php");
            }


        }else{
            $_SESSION['passmsg']= " password are not matching";
        }
    } else{
        echo "No token found";
    }

}
?> 


    <div class="loginpage">
    <h4 class="card-title text-center">Create Account</h4>
    <p class="text-center">Get started with your free Account</p>

    <p class="bg-info text-white px-5"> <?php

    if(isset($_SESSION['passmsg'])){
        echo $_SESSION['passmsg'];
    }else{
        echo $_SESSION['passmsg'] = "";

    }
     ?> </p>
    
    <form action="" method="POST">
       
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>    
            <input class="form-control" placeholder="New password" type="password" name="password" valur="" required>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>    
            <input class="form-control" placeholder="Confirm   password" type="password" name="cpassword" required>
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Password</button>
        </div>
        <p class="text-center">Have an account?<a href="../login.php">login In</a></p>

    </form>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>