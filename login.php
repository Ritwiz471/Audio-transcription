<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Audio";

//connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//checking
if(!$conn){
    echo "Error".mysqli_error($conn);
}

$id = $_POST['cid'];
$pw = $_POST['pass'];
$role = $_POST['role'];
$bat = $_POST['bat'];

$sql1 = "SELECT * FROM users WHERE ID = $id";
$run = mysqli_query($conn, $sql1);
if(!$run){
    echo "error".mysqli_error($conn);
}
else{
    echo "successsssss";
}

$row = mysqli_fetch_assoc($run);
$pass = $row['Password'];

if($pw != $pass){
    echo "<h3>Incorrect Password</h3>";
}
else if($role == "Teacher" || $role = "teacher"){
    echo "<h3>hi</h3>";
}
else if($role == "Student" || $role = "student"){
    echo "heloooo";
}







?>
