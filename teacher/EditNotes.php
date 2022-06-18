<?php
session_start();
require('../includes/dbcon.php');


?>

<?php

if (isset($_REQUEST['submit'])) {

    $subject = mysqli_real_escape_string($conn, trim($_REQUEST['subject']));
    $descrption = mysqli_real_escape_string($conn, trim($_REQUEST['descrption']));
    $branch = mysqli_real_escape_string($conn, trim($_REQUEST['branch']));
    $semester = mysqli_real_escape_string($conn, trim($_REQUEST['semester']));


    $files1 = $_FILES['file'];

    // print_r($files1);
    // exit;

    $filename1 = $files1['name'];
    $fileerror1 = $files1['error'];
    $filetmp1 = $files1['tmp_name'];

    $extsncheck1 = explode('.', $filename1);
    $filecheck1 = strtolower(end($extsncheck1));

    $fileextstore1 = array('png', 'jpg', 'jpeg', 'pdf', 'ppt', '.doc', '.txt');

    if (in_array($filecheck1, $fileextstore1)) {

        $destinationfile1 = 'NotesDetail/' . $filename1;
        move_uploaded_file($filetmp1, $destinationfile1);
    }


    if (
        !empty($subject) && isset($_GET['id']) && !empty($descrption) &&  !empty($branch) && !empty($semester)
    ) {
      
        $adminid = $_GET["id"];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d H:i:s ");
        //  echo $today;

        $update = "update notes set subject='$subject',Descrp='$descrption',modDate='$today',filename='$destinationfile1',Branch='$branch',Semester='$semester' where id='$adminid' ";

        // mysqli_query($conn, $insertqry);
        // print_r(mysqli_error($conn));
        // exit;

        if (mysqli_query($conn, $update)) {
?>
            <script>
                alert("Notes Updated Sucesstully");
                window.location.replace("index.php");
            </script>
        <?php
            // exit;
        } else {

        ?>
            <script>
                alert("Something Error".$update.mysqli_error($conn));
            </script>
<?php

        }
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

if(isset($_GET['id'])){
    $id= $_GET['id'];
}
$query = "SELECT * FROM notes where id='$id' ";
$info = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($info);

?>

<!-- main content start -->

<div class="main-container">
    <center>
        <h2>Update Notes</h2>
    </center>

    <form method="post" enctype="multipart/form-data">
        <div class="container m-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Subject</label>
                        <input type="text" name="subject" value="<?php if(isset($rows['Subject'])){ echo $rows['Subject'];} ?>" class="form-control" placeholder="Enter Subject">
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputPassword1">Descrption</label>
                        <textarea name="descrption" class="form-control" placeholder="Enter Subject Descrption"><?php if(isset($rows['Descrp'])){ echo $rows['Descrp'];} ?></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Branch</label>
                        <input type="text" name="branch" value="<?php if(isset($rows['Branch'])){echo $rows['Branch']; } ?>" class="form-control" placeholder="Enter Branch">
                    </div>
                    <div class="form-group mb-2">
                        <label>Semester</label>
                        <input type="text" name="semester" value="<?php if(isset($rows['Semester'])){echo $rows['Semester']; } ?>" class="form-control" placeholder="Enter Semester">
                    </div>
                    <div class="form-group mb-2">
                        <label>filename</label>
                        <input type="file" value="<?php if(isset($rows['filname'])){echo $rows['filname'];}  ?>"  name="file" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>

    </form>


</div>
<!-- main content end -->



<?php include("footer.php"); ?>