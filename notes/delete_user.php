<?php

    include 'connect.php';
    $myArray = json_decode($_GET['delete_record'], true);

    for($i=0; $i<count($myArray); $i++){
                $value = $myArray[$i];

                $statement = $conn->prepare("DELETE FROM user WHERE id = :id");
                $statement->execute(
                    array(
                    ':id'    => $value
                    )
                );
    }
    header("location: edit_user.php");
    exit();
?>
