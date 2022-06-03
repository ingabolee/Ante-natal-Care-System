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

$progress_id = $_GET["id"];


if(isset($_POST['submit'])){


    $sql = "INSERT INTO payment (payment_progress_id) 
                VALUES ('$progress_id')";

    $result = mysqli_query($conn, $sql);
    if ($result){
        if ($result){
        header ("Location: motherdashboard.php");
        }
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
                <strong style="color:white;">Mother Portal</strong>
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

<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Add Payment
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
        <form class="form" method="POST" action="">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">MPESA Number:</label>
                                    <input type="tel" class="form-control" placeholder="MPESA Number" name="">
                                </div>
                            </div>
                            <br>
                            
                            
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-round">Initiate Payment</button>
                                <a href="checkup.php" class="btn btn-default btn-round btn-simple">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>