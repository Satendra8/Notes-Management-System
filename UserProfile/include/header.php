<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Dcube</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="font/font/flaticon.css">
</head>

<body>


    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">DCube Software Solution</span>
                </a>

                <ul class="navbar-nav align-self-stretch">

                    <li class="sidebar-header">User Dashboard</li>

                    <li class="">
                        <a href="index.html" class="nav-link text-left active" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-bar-chart-1"></i>UserProfile</a>
                    </li>


                    <li class="">
                        <a class="nav-link text-left" target="_blank" href="Notes.php" role="button">
                            <i class="flaticon-bar-chart-1"></i> Notes
                        </a>
                    </li>


                    <li class="">
                        <a class="nav-link text-left" target="_blank" href="papers.php" role="button">
                            <i class="flaticon-bar-chart-1"></i> Question Paper
                        </a>
                    </li>

                    <li class="">
                        <a class="nav-link text-left" target="_blank" href="#" role="button">
                            <i class="flaticon-bar-chart-1"></i>Projects</a>
                    </li>

                    <li class="">
                        <a class="nav-link text-left" target="_blank" href="#" role="button">
                            <i class="flaticon-bar-chart-1"></i>Presentation</a>
                    </li>

                </ul>


            </div>


        </nav>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
        <div id="page-content-wrapper">


            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light my-navbar">

                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>


                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown  d-sm-none">

                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <div class="position-relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle">
                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>
                                        <span class="indicator"></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                    <div class="dropdown-menu-header">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                    </svg>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Update completed</div>
                                                    <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                    <div class="text-muted small mt-1">30m ago</div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted">Show all notifications</a>
                                    </div>
                                </div>
                            </li>
                            <!-- Nav Item - Messages -->
                            <li class="nav-item">
                                <a class="nav-link " href="#" role="button">
                                    <i class="fas fa-envelope"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter"></span>
                                </a>
                            </li>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">DCube Software Solution</span>
                                    <img class="img-profile rounded-circle" src="img/logo3.png">
                                </a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->