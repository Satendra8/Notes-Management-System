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
                    location.href = "delete_user.php?delete_record=" + jsonString;

                }
            });
        });
    </script>
    <title>User Record</title>

</head>


<?php
include("header.php");

include("sidebar.php");
?>

<!-- main content start -->

<div class="main-container">
    <center>
        <h2>Users List</h2>
    </center>

    <table id="Mytable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Department</th>
                <th>User Type</th>
                <th>Gender</th>
                <th>Join Date</th>
                <th>Bio</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../includes/dbcon.php";
                $id = $_SESSION["id"];
                $query ="
                    SELECT * FROM user";
                $execute = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_array($execute)) {
            ?>
                <tr data-id="<?php echo $data['id']; ?>">
                    <td><?php echo $data['id'] . "<br>"; ?></td>
                    <td><?php echo $data['name'] . "<br>"; ?></td>
                    <td><?php echo $data['email'] . "<br>"; ?></td>
                    <td><?php echo $data['phone'] . "<br>"; ?></td>
                    <td><?php echo $data['user_type'] . "<br>"; ?></td>
                    <td><?php echo $data['department'] . "<br>"; ?></td>
                    <td><?php echo $data['gender'] . "<br>"; ?></td>
                    <td><?php echo $data['join_date'] . "<br>"; ?></td>
                    <td><?php echo $data['bio'] . "<br>"; ?></td>
                    <td>
                        <a href="update_user.php?id=<?php echo $data['id']; ?>"><button name="edit" type="submit" class="btn btn-info">Edit</button></a>

                </tr>

            <?php } ?>
        </tbody>
    </table>

    <a href="delete_user.php?id=<?php echo $data['id']; ?>"><button id="delete" name="delete" type="submit" class="btn btn-danger">Delete</button></a></td>
</div>
<!-- main content end -->



<?php include("footer.php"); ?>