<?php
$trans = $_POST['trans'];
$myfile = fopen("testfile.txt", "w");
fwrite($myfile,$trans);
fclose($myfile);
?>