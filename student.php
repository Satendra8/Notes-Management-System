<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "You are logged in";
} else {

    if (!isset($_POST['submit'])) {
?>
        <script>
            window.location.replace("login.php");
        </script>
    <?php

    }
    include "includes/dbcon.php";

    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user where email='$username' ";

    $info = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($info);
    $data = mysqli_fetch_array($showdata);
    $id = $data['id'];
    $user_type = $data['user_type'];

    if ($rows == 1 && password_verify($password, $data['password'])) {
        $_SESSION['email'] = $username;
        $_SESSION['id'] = $id;
        $_SESSION['user_type'] = $user_type;
    ?>
        <script>
            alert("Login Sucsessfully");
        </script>
    <?php


    } else {
    ?>

        <script>
            alert("Invalid Userid/password");
        </script>
<?php
        echo "Invalid Username/Password";
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>

<body>
    <h1>Welcome to Student Portal</h1>
</body>

</html>