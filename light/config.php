<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "gyn";


$conn = mysqli_connect($server, $username, $password, $database);

if(! $conn){
    echo "<p><strong>db connection failed</strong></p>";
}
?>