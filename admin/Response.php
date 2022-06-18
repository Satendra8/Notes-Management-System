<?php
session_start();
require('../includes/dbcon.php');


if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $message = $_POST["message"];

    $query = "SELECT * FROM contactform where email='$username'";
    $info = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($info);
    $data = mysqli_fetch_array($info);

    if ($rows) {
        $username = $data['name'];
        $email = $data['email'];
        $token = $data['token'];


        $subject = "Response";
        $body = "Hi, $username,$message.";
        $sender_email = "From: souravkumar32973@gmail.com";

        if (mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "check your mail to reset your password $email";
            header('location:contactInfo.php');
        } else {
            echo "Email sending failed....";
        }
    } else {
        echo "No email found";
    }
}


?>


<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

    <!-- datatable and delete script -->

    <title>Contact Info</title>

</head>


<?php
include("header.php");
include("sidebar.php");


?>

<!-- main content start -->

<div class="main-container">
    <center>
        <h2>Response</h2>
    </center>

    <form method="post" enctype="multipart/form-data">
        <div class="container m-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputPassword1">Write Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Enter Subject Descrption"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>

    </form>
</div>
<!-- main content end -->




<?php include("footer.php"); ?>