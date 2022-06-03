<?php
include 'config.php';
session_start();
if(! isset($_SESSION["username"])){
    header("Location: login.php");
} else {
    if ($_SESSION["username"] != "2"){
        header("Location: notauthorized.php");
    }
}


?>
<!doctype html>
<html lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:15:10 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate Admin Dashboard template, UI kit, Bootstrap 4x">
<meta name="author" content="Thememakker">

<title>GYN</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/charts-c3/plugin.css" />
<link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-blue">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
             <h1 style="font-family:courier,arial,helvetica;">
                <strong style="color:white;">Mother's Portal</strong>
            </h1>
        </li>
        
          
        <li class="float-right">
            <a href="logout.php" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    
                    <li class="active open"><a href="motherdashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                    
                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Checkups</span></a>
                        <ul class="ml-menu">
                            <li><a href="mothercheckup.php">View Checkups</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Pregnancy Progeress</span></a>
                        <ul class="ml-menu">
                            <li><a href="motherpregnancyprogress.php">View Progress</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Chats</span></a>
                        <ul class="ml-menu">
                            <li><a href="chat.php">View Chats</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>    
</aside>

<!-- Right Sidebar -->


<!-- Main Content -->
<section class="content">
<div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                </h2>
            </div>            
            
        </div>
    </div>
    <?php
    $mother_login_id = $_SESSION['login_id'];
    $sql = "SELECT * FROM mother WHERE mother_login_id = '$mother_login_id'";
    $result = mysqli_query($conn, $sql);
    $mother_count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $mother_id = $row["mother_id"];

    $sql = "SELECT * FROM checkup WHERE checkup_mother_id = '$mother_id'";
    $result = mysqli_query($conn, $sql);
    $checkup_count = mysqli_num_rows($result);

    $total = $mother_count + $checkup_count;

    ?>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Total Count</h5>
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $total; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Mothers</h5>                                
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $mother_count; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Checkups</h5>
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $checkup_count; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Scheduled Checkups</strong>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Checkup Date</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Checkup Date</th>
                                        <th>Description</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                <?php 
                                $sql = "SELECT * FROM checkup WHERE checkup_mother_id = '$mother_id'";

                                $rows = mysqli_query($conn, $sql);
                                ?>
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <td ><?php echo $row["checkup_appointment_date"]?></td>
                                    <td ><?php echo $row["checkup_description"]?></td>
                                </tr>
                                <?php  endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
<!-- Jquery Core Js --> 
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/libscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/vendorscripts.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/c3.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/jvectormap.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/knob.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/mainscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/js/pages/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:36:38 GMT -->
</html>