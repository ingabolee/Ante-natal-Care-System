<?php 
ini_set('display_errors', 0);
include 'config.php';

 session_start();
if(! isset($_SESSION["username"])){
    header("Location: login.php");
} else {
    if ($_SESSION["username"] != "1"){
        header("Location: notauthorized.php");
    }
}
$mother_id = $_GET["id"];
$login_id = $_SESSION['login_id'];
$sql = "SELECT * FROM doctor WHERE doctor_login_id = '$login_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$doctor_id = $row["doctor_id"];

$sql = "SELECT * FROM mother WHERE mother_id IN (SELECT conversation_mother_id FROM conversation WHERE conversation_doctor_id = '$doctor_id')";

$rows = mysqli_query($conn, $sql);

$login_id = $_SESSION['login_id'];
$sql = "SELECT * FROM doctor WHERE doctor_login_id = '$login_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$doctor_id = $row["doctor_id"];

$sql = "SELECT * FROM conversation WHERE conversation_mother_id = '$mother_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$conversation_id = $row["conversation_id"];


if(isset($_POST['submit'])){
    $message_content = $_POST['message_content'];


    $sql = "INSERT INTO message (message_content, message_sender_id, message_conversation_id) 
                VALUES ('$message_content', '$doctor_id', '$conversation_id')";

    $result = mysqli_query($conn, $sql);

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
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/chatapp.css">
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
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Checkups</span></a>
                        <ul class="ml-menu">
                            <li><a href="addcheckup.php">Add Checkup</a></li>
                            <li><a href="checkup.php">View Checkups</a></li>
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

    <div class="container-fluid">
        <div class="row clearfix">           
            <div class="col-lg-12 col-xl-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                           
                        </div>
                        <ul class="nav nav-tabs p-l-0 p-r-0" role="tablist">
                            <li class="nav-item inlineblock"><a class="nav-link active" data-toggle="tab" href="#people">People</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane slideRight active" id="people">
                                <ul class="chat-list list-unstyled m-b-0">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <li class="clearfix">
                                        <img src="../assets/images/xs/avatar1.jpg" alt="avatar" />
                                        <div class="about">
                                            <div onclick="window.location.href='doctorchats.php?id=<?php echo $row['mother_id']; ?>'"  class="name"><?php echo $row['mother_first_name']; ?> <?php echo $row['mother_last_name']; ?></div>
                                        </div>
                                    </li>
                                    <?php  endwhile; ?>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="chat">

                        <div class="chat-history">
                            <ul>
                                
                                <?php 
                                $sql = "SELECT * FROM message WHERE message_conversation_id  = '$conversation_id'";
                                $rows = mysqli_query($conn, $sql);
                                ?>
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <?php if($row['message_sender_id'] == $doctor_id):?>

                                <li class="clearfix">
                                    <div class="message-data text-right"> <span class="message-data-time" ><?php echo $row['message_send_time']; ?> </span> &nbsp; &nbsp; <span class="message-data-name" ></span> <i class="zmdi zmdi-circle me"></i> </div>
                                    <div class="message other-message float-right"> <?php echo $row['message_content']; ?> </div>
                                </li>
                                <?php else: ?>
                                <li>
                                    <div class="message-data"><span class="message-data-name"><i class="zmdi zmdi-circle online"></i> </span> <span class="message-data-time"><?php echo $row['message_send_time']; ?> </span></div>
                                    <div class="message my-message"><?php echo $row['message_content']; ?></div>
                                </li> 
                                <?php  endif; ?>
                                <?php  endwhile; ?>
                                                   
                            </ul>
                        </div>
                        <form action="" method="post">

                        <div class="chat-message clearfix">
                            <div class="input-group p-t-15">
                                <input type="text" class="form-control" placeholder="Enter text ..." name="message_content">
                                <span  class="input-group-addon">
                                    <button type="submit" name="submit" class="zmdi zmdi-mail-send"></button>
                                </span>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

<script>
    $(".list_btn").on('click',function(){
        $("#plist").toggleClass("open");
    });
</script>

</body>

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/property-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:39:37 GMT -->
</html>