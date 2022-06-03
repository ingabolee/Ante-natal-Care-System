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

$progress_id = $_GET["id"];

$sql = "DELETE FROM pregnancy_progress WHERE progress_id = '$progress_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: pregnancyprogress.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>