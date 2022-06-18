<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION["name"])) {
    
    
} else {
?>
        <script>
            window.location.replace("../login.php");
        </script>
    <?php

    }
?>
<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

    <!-- datatable and delete script -->
    <script>
        $(document).ready(function() {
            $('#Mytable').DataTable({
                responsive: true
            });

            var table = $('#Mytable').DataTable();
            var ids = [];
            $('#Mytable tbody').on('click', 'tr', function() {
                ids.push($(this).attr("data-id"));
                $(this).toggleClass('selected');
            });

            $('#delete').click(function() {
                var conf = confirm("Are You sure to delete");
                if (conf) {
                    alert(ids);
                    table.rows('.selected').remove().draw();

                    var jsonString = JSON.stringify(ids);
                    location.href = "delete.php?delete_record=" + jsonString;

                }
            });
        });
    </script>
    <title>Dashboard</title>

</head>


<?php
include("header.php");

include("sidebar.php");
?>

<!-- main content start -->

<div class="main-container">
    <center>
        <h2>Recent Orders List</h2>
    </center>

    <table id="Mytable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Subject</th>
                <th>UpdoadType</th>
                <th>Description</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>UploadBy</th>
                <th>UploadedOn</th>
                <th>Mod Date</th>
                <th>Status</th>
                <th>PDF</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../includes/dbcon.php";

            $query = "SELECT * FROM notes ";

            $info = mysqli_query($conn,$query);

           

            while ($data = mysqli_fetch_assoc($info)) {
            ?>
            <tr data-id="<?php echo $data['id']; ?>">
                    <td><?php echo $data['id'] . "<br>"; ?></td>
                    <td><?php echo $data['Subject'] . "<br>"; ?></td>
                    <td><?php echo $data['UploadType'] . "<br>"; ?></td>
                    <td><?php echo $data['Descrp'] . "<br>"; ?></td>
                    <td><?php echo $data['Branch'] . "<br>"; ?></td>
                    <td><?php echo $data['Semester'] . "<br>"; ?></td>
                    <td><?php echo $data['UploadedBy'] . "<br>"; ?></td>
                    <td><?php echo $data['UploadedOn'] . "<br>"; ?></td>
                    <td><?php echo $data['ModDate'] . "<br>"; ?></td>
                    <td>
                    <?php
                    if($data['status']=="1"){
                        ?>
                   <a href="Approve.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-success">Approved</button> </a>
                        <?php
                    }else{
                        ?>
                   <a href="Approve.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Approve</button> </a>
                        <?php
                    }
                    ?>
                    
                   </td>
                    <td><a target = "_blank" href="<?php echo $data['filename'] ?>">PDF</a></td>
                    <td><a href="EditNotes.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                       

                </tr>

            <?php } ?>
        </tbody>
    </table>
    <a href="delete.php?id=<?php echo $data['id']; ?>"><button id="delete" name="delete" type="submit" class="btn btn-danger">Delete</button></a></td>

</div>
<!-- main content end -->



<?php include("footer.php"); ?>