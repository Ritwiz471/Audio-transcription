<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Audio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$id=$_POST["cid"];
$na=$_POST["cn"];
$rol = $_POST["role"];
$batch=$_POST["bat"];
$pw=$_POST["pass"];

$sql = "INSERT INTO Users(ID,Name,Role,Batch,Password)
VALUES ('$id','$na','$rol','$batch','$pw')";

if ($conn->query($sql) === TRUE) {
  echo "Account created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
<html>
    <br>
    <button onclick="location.href='login.html'">Go to login page</button>
</html>
