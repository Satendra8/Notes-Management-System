<?php

include "../includes/dbcon.php";

?>

<?php

$query = "SELECT * FROM notes ";

$info = mysqli_query($conn, $query);
$rows = mysqli_num_rows($info);
$data = mysqli_fetch_array($info);

?>

<head>

    <?php include("head.php"); ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Subjects</title>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Ubuntu', sans-serif;
    }

    #facilities {
        background-color: #dbe5e6;
        padding: 30px 0px;
    }

    #facilities h1 {
        font-weight: 800;
        font-size: 30px;
        padding-bottom: 4px;
    }

    .title {
        text-align: center;
        padding: 25px 0px;

    }

    .title p {
        font-size: 18px;
    }

    .card-body {
        box-shadow: 0 0 20px 7px rgba(0, 0, 0, 0.1);
    }

    .card {
        margin: 30px 10px;

    }

    .card-body a {
        color: #0c7f90;
        text-decoration: none;
        font-size: 15px;
        margin-top: auto;
        font-weight: 700;
    }

    .card-body a:hover {
        color: #63a6b0;
        text-decoration: none;
    }
</style>
<?php
include("header.php");

include("sidebar.php");
?>

<body>

    <!-- main content start -->
    <div class="main-container">
        <div id="card">
            <div class="overlay"></div>

            <!-- Page Content -->
            <div id="page-content-card">

                <div id="content">

                    <!-- <div class="container-fluid p-0 px-lg-0 px-md-0">

                    <section id="facilities">
                        <div class="container">
                            <div class="title">
                                <h1>SUBJECTS</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde placeat voluptates
                                    totam in ipsam quam dolore pariatur accusamus cupiditate nemo est, molestiae quod
                                    ipsa.</p>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/1sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/2sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/3sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">SUBJECT DETAILS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis.</p>
                                            <a href="#">Click to Download</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div> -->

                    <?php

                    $sem = isset($_GET["qus"]) ? $_GET["qus"] : '0';

                    $query = "SELECT * FROM notes where UploadType ='Question Paper' and Semester = '$sem'";

                    $info = mysqli_query($conn, $query);



                    while ($data = mysqli_fetch_assoc($info)) {
                    ?>

                        <div aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a target="_blank" href="../admin/<?php echo $data['filename']; ?>"><?php echo $data['Descrp']; ?></a></li>
                            </ol>
                        </div>


                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    <?php include("footer.php"); ?>