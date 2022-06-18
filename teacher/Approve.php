<?php
require('../includes/dbcon.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sltqry = "select * from notes where id='$id'";
    $result = mysqli_query($conn, $sltqry);
    $row = mysqli_fetch_assoc($result);

    if($row["status"] === '1'){
        $updt = "update notes set status='0' where id='$id'";
    }else{
        $updt = "update notes set status='1' where id='$id'";
    }

    if (mysqli_query($conn, $updt)) {
?>
        <script>
            alert("Approved Successful");
            window.location.replace("index.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error IsActive record:".mysqli_error($conn));
        </script>
<?php

    }
    mysqli_close($conn);
}
?>