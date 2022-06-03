<?php 
include 'config.php';

 session_start();
if(! isset($_SESSION["username"])){
    header("Location: login.php");
} else {
    if ($_SESSION["username"] != "1"){
        header("Location: notauthorized.php");
    }
}

$progress_id  = $_GET["id"];

$sql = "SELECT * FROM pregnancy_progress WHERE progress_id  = '$progress_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $progress_visit_date = $_POST['progress_visit_date'];
    $progress_due_date = $_POST['progress_due_date'];
    $progress_doctor_description = $_POST['progress_doctor_description'];

    $sql = "UPDATE pregnancy_progress SET progress_visit_date = '$progress_visit_date', progress_due_date = '$progress_due_date', progress_doctor_description='$progress_doctor_description' WHERE progress_id  = '$progress_id'"; 
                
    $result = mysqli_query($conn, $sql);
    if ($result){

        header ("Location: pregnancyprogress.php");
        
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
                <strong style="color:white;">Doctor Portal</strong>
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
                    
                    <li class="active open"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Mother</span></a>
                        <ul class="ml-menu">
                            <li><a href="viewmothers.php">View Mothers</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>pregnancy_progresss</span></a>
                        <ul class="ml-menu">
                            <li><a href="addpregnancy_progress.php">Add pregnancy_progress</a></li>
                            <li><a href="pregnancy_progress.php">View pregnancy_progresss</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Pregnancy Progeress</span></a>
                        <ul class="ml-menu">
                            <li><a href="addpregnancyprogress.php">Add Progress</a></li>
                            <li><a href="pregnancyprogress.php">View Progress</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Chats</span></a>
                        <ul class="ml-menu">
                            <li><a href="doctorchats.php">View Chats</a></li>
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
                <h2>Edit pregnancy_progress
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
        <form class="form" method="POST" action="#">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>Visit Date:</h6>
                                    <input type="date" class="form-control" placeholder="pregnancy_progress Date" name="progress_visit_date" value="<?php echo $row['progress_visit_date'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>Due Date:</h6>
                                    <input type="date" class="form-control" placeholder="pregnancy_progress Due date" name="progress_due_date" value="<?php echo $row['progress_due_date'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>Description:</h6>
                                    <input type="text" class="form-control" placeholder="pregnancy_progress Description" name="progress_doctor_description" value="<?php echo $row['progress_doctor_description'];?>">
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-12">
                                    <button name="submit" class="btn btn-primary btn-round">Edit pregnancy progress</button>
                                    <a  href="deletepregnancyprogress.php?id=<?php echo $progress_id  ?>" class="btn btn-danger btn-round ">Delete</a>
                                    <a href="pregnancyprogress.php" class="btn btn-default btn-round btn-simple">Cancel</a>
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

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/property-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:39:37 GMT -->
</html>