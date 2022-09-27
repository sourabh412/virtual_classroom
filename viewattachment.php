<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assignview.css">
    <title>Document</title>
</head>
<body>
    <?php
    $select = "SELECT * FROM `assignments` WHERE SNo = {$_SESSION['assignheading']}";
    $assignment = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($assignment);
    ?>
    <?php echo'<embed src="Fassign-attachments/'.$row['attachments'].'" type="application/pdf">'?>     
</body>
</html>