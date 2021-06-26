
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
  echo "<html><h1>Account successfully created &#127881;</h1></html>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

  <link rel="stylesheet" href="ins.css"/>
  </head>
  <body>
    <br>
    <button id =sub onclick="location.href='login.html'">Go to login page</button>
</body>
</html>
