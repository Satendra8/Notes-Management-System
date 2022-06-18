<?php
session_start();

?>
<head>
    <?php include("head.php"); ?>

    <!-- datatables -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

    <title>Notes</title>

</head>


<?php
include("header.php");

include("sidebar.php");
?>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Ubuntu', sans-serif;
}

#facilities{
    background-color: #dbe5e6;
    padding: 30px 0px;
}
#facilities h1{
    font-weight: 900;
    font-size: 34px;
    padding-bottom: 5px;
}
.title{
    text-align: center;
    padding: 25px 0px;

}
.title p{
    font-size: 18px;
}
.card-body{
    box-shadow: 0 0 20px 7px rgba(0,0,0,0.1);
}
.card{
    margin: 20px 10px;
}
.card-body a{
    color: #0c7f90;
    text-decoration: none;
    font-size: 15px;
    margin-top: auto;
    font-weight: 600;
}
.card-body a:hover{
    color: #63a6b0;
    text-decoration: none;
}
</style>

<!-- main content start -->

<div class="main-container">
<div id="card1">
        <div class="overlay"></div>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">

                    <section id="facilities">
                        <div class="container">
                            <div class="title">
                                <h1>SUBJECTS</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde placeat voluptates
                                    totam in ipsam quam dolore pariatur accusamus cupiditate nemo est, molestiae quod
                                    ipsa, quia aperiam asperiores, commodi corrupti nisi.</p>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/1sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">PHP Frameworks</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/2sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Laravel</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/3sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Codeigniter</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Node.js</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">AngularJS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img src="images/4sem.png" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">ReactJS</h5>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                                elit. Optio dolores iste aspernatur velit ducimus neque vitae a
                                                reiciendis illo omnis? Aut sapiente optio cupiditate omnis laborum
                                                mollitia, earum facilis magni.</p>
                                            <a href="#">CLick for Details</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>

                </section>

            </div>

        </div>
    </div>
</div>
</div>
<!-- main content end -->



<?php include("footer.php"); ?>