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

$checkup_id = $_GET["id"];

$sql = "DELETE FROM checkup WHERE checkup_id = '$checkup_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: checkup.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>