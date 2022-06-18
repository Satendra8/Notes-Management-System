<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "You are logged in";
} else {

    if (!isset($_POST['submit'])) {
?>
        <script>
            window.location.replace("./login.php");
        </script>
    <?php

    }
    include "../includes/dbcon.php";

    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user where email='$username' ";

    $info = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($info);
    $data = mysqli_fetch_array($info);
    $id = $data['id'];
    $user_type = $data['user_type'];
    $name = $data['name'];

    if ($rows == 1 && password_verify($password, $data['password'])) {
        $_SESSION['email'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['user_type'] = $user_type;
        if($data['user_type'] == 'teacher'){
            ?>
            <script>
            window.location.replace("../teacher/index.php");
            </script>
            <?php
        }
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
                <th>UploadType</th>
                <th>Description</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>UploadBy</th>
                <th>Status</th>
                <th>Notes PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../includes/dbcon.php";

            $sltqry = "select * from notes";
            $result = mysqli_query($conn, $sltqry);
          //  $row = mysqli_fetch_assoc($result);


            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr data-id="<?php echo $data['id']; ?>">
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['Subject']; ?></td>
                    <td><?php echo $data['UploadType']; ?></td>
                    <td><?php echo $data['Descrp']; ?></td>
                    <td><?php echo $data['Branch']; ?></td>
                    <td><?php echo $data['Semester']; ?></td>
                    <td><?php echo $data['UploadedBy'];  ?></td>
                    <td>
                    <?php
                    if($data['status']=="1"){
                        ?>
                   <p class="text-success">Approved</p>
                        <?php
                    }else{
                        ?>
                   <p class="text-danger">Not Approved</p>
                        <?php
                    }
                    ?>
                    
                    </td>
                    <td><a target = "_blank" href="../admin/<?php echo $data['filename']; ?>">PDF</a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
    <a href="delete.php?id=<?php echo $data['id']; ?>"><button id="delete" name="delete" type="submit" class="btn btn-danger">Delete</button></a></td>

</div>
<!-- main content end -->



<?php include("footer.php"); ?>