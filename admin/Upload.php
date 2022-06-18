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
    $uploadtype =  mysqli_real_escape_string($conn, trim($_REQUEST['uploadtype']));


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
        !empty($subject) && isset($_SESSION['name']) && !empty($descrption) 
    ) {
        $admin = $_SESSION['name'];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d H:i:s ");
        //  echo $today;
        $admin = $_SESSION['name'];
        $insertqry = "insert into notes (
        Subject,Descrp,UploadedBy,UploadedOn,filename,UploadType,Branch,Semester
      )
      values('$subject','$descrption','$admin','$today','$destinationfile1','$uploadtype','$branch','$semester')";

        // mysqli_query($conn, $insertqry);
        // print_r(mysqli_error($conn));
        // exit;

        if (mysqli_query($conn, $insertqry)) {
?>
            <script>
                alert("Notes Uploaded Sucesstully");
                window.location.replace("Upload.php");
            </script>
        <?php
            // exit;
        } else {

        ?>
            <script>
                alert("Something Error".$insertqry.mysqli_error($conn));
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


?>

<!-- main content start -->

<div class="main-container">
    <center>
        <h2>Upload Notes</h2>
    </center>

    <form method="post" enctype="multipart/form-data">
        <div class="container m-auto">
            <div class="row">
                <div class="col-md-6">
                    <label>Type : </label>
                    <div class="col-sm-12">
                        <select name="uploadtype" id="uploadtype" class="form-control required">
                            <option value="" disabled selected>....Choose....</option>
                            <option value="Notes">NOTES</option>
                            <option value="Question Paper">QUESTION PAPER</option>
                            <option value="Sample Papers">SAMPLE PAPERS</option>
                            <option value="Projects">PROJECTS</option>
                            <option value="Reference Books">REFERENCE BOOKS</option>
                            <option value="Presentations">PRESENTATIONS</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputPassword1">Descrption</label>
                        <textarea name="descrption" class="form-control" placeholder="Enter Subject Descrption"></textarea>
                    </div>
                    <div class="form-group mb-2" id="branch">
                        <label>Branch</label>
                        <input type="text" name="branch" class="form-control" placeholder="Enter Branch">
                    </div>
                    <div class="form-group mb-2" id="semester">
                        <label>Semester</label>
                        <input type="text" name="semester" class="form-control" placeholder="Enter Semester">
                    </div>
                    <div class="form-group mb-2">
                        <label>filename</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>

    </form>


</div>
<!-- main content end -->

<script>
    $(document).ready(function() {
        $("#uploadtype").change(function() {

                var selectVal = $("#uploadtype option:selected").text();
                // alert(selectVal);
                if (!(selectVal == 'NOTES' || selectVal == 'QUESTION PAPER')) {
                    console.log(selectVal);
                    $("#branch").hide();
                     $("#semester").hide();

               } else{
                $("#branch").show();
                     $("#semester").show();
               }
        });

    });
</script>


<?php include("footer.php"); ?>