<?php
session_start();
require('../includes/dbcon.php');


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
        <h2>Check Contact Info</h2>
    </center>

    <table id="Mytable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>UserType</th>
                <th>AddDate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../includes/dbcon.php";

            $query = "SELECT * FROM contactform ";

            $info = mysqli_query($conn,$query);

           

            while ($data = mysqli_fetch_assoc($info)) {
            ?>
            <tr data-id="<?php echo $data['id']; ?>">
                    <td><?php echo $data['id'] . "<br>"; ?></td>
                    <td><?php echo $data['custname'] . "<br>"; ?></td>
                    <td><?php echo $data['email'] . "<br>"; ?></td>
                    <td><?php echo $data['phone'] . "<br>"; ?></td>
                    <td><?php echo $data['description'] . "<br>"; ?></td>
                    <td><?php echo $data['UserType'] . "<br>"; ?></td>
                    <td><?php echo $data['AddDate'] . "<br>"; ?></td>
                    <td><a href="Response.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">Response</button></a></td>
                       

                </tr>

            <?php } ?>
        </tbody>
    </table>


</div>
<!-- main content end -->




<?php include("footer.php"); ?>