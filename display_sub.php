<?php
include('config.php');

$SNo = $_SESSION['SNo'];
$select = "SELECT * FROM `submissions` WHERE SNo = '$SNo'";
$assignment = mysqli_query($con, $select);
$row = mysqli_fetch_assoc($assignment);

$pdf = $row['submissions'];
$path = "Submissions/";
$file = $path.$pdf;
// Add header to load pdf file
header('Content-type: application/pdf'); 
header('Content-Disposition: inline; filename="' .$file. '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile($file);
?>