<?php
include 'config.php';

session_start();

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
}

if(isset($_POST['submit'])){
    $mother_first_name = $_POST['mother_first_name'];
    $mother_last_name = $_POST['mother_last_name'];
    $login_username = $_POST['login_username'];
    $mother_contact = $_POST['mother_contact'];
    $login_password = md5($_POST['login_password']);
    $cpassword = md5($_POST['cpassword']);

    if($login_password == $cpassword){
        $sql = "SELECT * FROM login WHERE login_username = '$login_username'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0){
            echo "<p>Username already exists</p>";
        }

        else {
            $sql = "SELECT * FROM mother WHERE mother_contact = '$mother_contact'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows > 0){
                echo "<p>Contact already exists</p>";
            }

            else{
                //login table
                $sql = "INSERT INTO login (login_username, login_password, login_rank) 
                VALUES ('$login_username', '$login_password', '2')";
                $result = mysqli_query($conn, $sql);

                //login id
                $sql = "SELECT * FROM login WHERE login_username = '$login_username'";
                $login_id = mysqli_query($conn, $sql);
                $arra = mysqli_fetch_array($login_id);
                if(is_array($arra)){
                    $login_id = $arra['login_id'];
                }

                //mother table
                $sql = "INSERT INTO mother (mother_first_name, mother_last_name, mother_contact, mother_login_id) 
                VALUES ('$mother_first_name', '$mother_last_name', '$mother_contact', '$login_id')";
                
                $result = mysqli_query($conn, $sql);                
                if($result){
                    header ("Location: login.php?status=success");
                }
                else {
                    echo "<p>Registration not succesful</p>";
                }

            }
        }
        
    } 
    else{
        echo "Passwords do not match!";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate, Admin, Dashboard, template, UI kit, RealEstate Admin, Bootstrap 4x">
<meta name="author" content="Thememakker">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Register</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-blue authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(../assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="">
                    <div class="header">
                        
                        <h5>Mother Sign Up</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="First Name" name="mother_first_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Last Name" name="mother_last_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="User Name" name="login_username" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="contact" name="mother_contact" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        
                        <div class="input-group">
                            <input type="password" placeholder="Password" class="form-control" name="login_password" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button class="btn btn-primary btn-round btn-lg btn-block " name="submit">SIGN UP</button>
                        <small>Already have an account?   <a href="login.php" class="link">      Sign In</a></small>
                        <br>
                        <small>Sign Up as a mother   <a href="signup.php" class="link">      Sign Up(mother)</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>

</html>