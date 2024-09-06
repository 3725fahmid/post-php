<?php
session_start();
include 'helper-func.php';
if (empty($_SESSION['user'])){
    header("Location: user-login.php");
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: user-login.php");
}
$userID = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE user_id = '$userID'";
$result = mysqli_query($conn, $sql);
$userInfo = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard - User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
         
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- jquery.vectormap css -->
        <!-- <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> -->

        <!-- DataTables -->
        <!-- <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" /> -->

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet">
        
    </head>
    
    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="user-dashboard.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="user-dashboard.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.png" alt="logo-sm-light" height="20">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="logo-light" height="40">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>


                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar"> -->
                                <span class="d-none d-xl-inline-block ms-1"> <?php echo $userInfo['user_name']?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href='<?php echo "user-profile.php?userId=".$userInfo['user_id'] ?>'><i class="ri-user-line align-middle me-1"></i> Profile</a>

                                <a class="dropdown-item text-danger" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?logout'?>"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="ri-settings-2-line"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="index.php" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

<div class="page-content">