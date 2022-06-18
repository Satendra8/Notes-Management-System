<?php

include "../includes/dbcon.php";
    $myArray = json_decode($_GET['delete_record'], true);

    for($i=0; $i<count($myArray); $i++){
                $value = $myArray[$i];

                $statement = "DELETE FROM user WHERE id = '$value' ";
                mysqli_query($conn, $statement);
    }
    header("location: edit_user.php");
    exit();
?>
