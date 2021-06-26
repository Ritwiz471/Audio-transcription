<?php
session_start();
echo "<html>";
echo "<body>";
$conn = mysqli_connect("localhost","root","","Audio");

if(!$conn)
{
    echo "failed";

}
//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

$name = $_SESSION['name'];
$batch = $_SESSION['batch'];

$query = "SELECT * FROM $batch";
$run = mysqli_query($conn, $query);
if(!$run)
{
    echo mysqli_error($conn);

}
    
    echo "<table class = 'dash' border='2px'>";
    while($row = mysqli_fetch_assoc($run)) 
    {
        echo "<tr>";
            echo "<td> {$row['Sno']} </td>";
            echo "<td>{$row['Filename']}</td>";
            echo "<td>{$row['TeacherName']}</td>";
            $filename = "/Audio-transcription/Source/".$row['Filename'];  
            echo '<td><a href= "'.$filename.'" target="_blank"><button>Download</button></a></td>';
        echo "</tr>";
    } 
    echo "</table>";
    echo "</body>";
    echo "</html>";
?>
<html>
    <br>
    <button onclick="location.href='login.html'">Sign Out</button>
</html>
