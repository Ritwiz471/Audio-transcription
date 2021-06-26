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
//$bat = $_POST['bat'];

$sql1 = "SELECT * FROM users WHERE ID = $id";
$run = mysqli_query($conn, $sql1);
if(!$run){
    echo "error".mysqli_error($conn);
}

$row = mysqli_fetch_assoc($run);
$pass = $row['Password'];

$role = $row['Role'];
$batch = $row['Batch'];

if($pw != $pass){
    echo "<h3>Incorrect Password</h3>";
}
else{
    if($role == "Teacher" || $role =="teacher"){
        session_start();
        $_SESSION['batch'] = $batch;
        $_SESSION['name'] = $row['Name'];
        echo '<meta http-equiv= "refresh" content="1; url=/Audio-transcription/page.php"/>';
    }
    else if($role == "Student" || $role == "student"){
        session_start();
        $_SESSION['batch'] = $batch;
        $_SESSION['name'] = $row['Name'];
        echo '<meta http-equiv= "refresh" content="1; url=/Audio-transcription/studentD.php"/>';
    }
}
?>
