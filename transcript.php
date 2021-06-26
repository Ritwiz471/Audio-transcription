<?php
session_start();
$conn = mysqli_connect("localhost","root","","Audio");

if(!$conn)
{
    echo "failed";

}

//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);


$batch = $_SESSION['batch'];
$name = $_SESSION['name'];
$trans = $_POST['trans'];
$filename = "niru.txt";
echo $filename;
$path = "/Audio-transcription/Source/".$filename;
$myfile = fopen($path, "w");
fwrite($myfile,$trans);

    $query = "INSERT INTO $batch (Filename, TeacherName) values('$filename','$name')";
    $run = mysqli_query($conn,$query);
     //check query
    if(!$run)
    {
        echo mysqli_error();

    }
    else
    {
        echo "sucess";
    }

fclose($myfile);
?>