
<div class="container w-100">
    <form action="" method="post" class="float-end">
        <div class="mb-3">
            <input type="email" name="addemail" class="addemail" placeholder="New member email" class="form-control">
            <input type="submit" class="btn btn-primary" name="addmem" value="Add">
        </div>
    </form>
    <?php
    if(isset($_REQUEST['addemail'])){
        $mailid = $_POST['addemail'];
        if($mailid == NULL){
            echo '<p style="color:#721C24;position:absolute;right:200px;top:125px;">Enter a valid email</p>';
        }
        else{
            $addemail = "INSERT INTO mailids (`email`) VALUES ('$mailid')";
            mysqli_query($con,$addemail);
            echo'<script>window.location.href="Classroom.php?page=classroom-classlist"</script>';
        }
    }
    ?>

<div class="container bg-light">
<table class="table table-striped table-hover">
  <thead>
    <tr>
        <th>Sno</th>
        <th>Email id</th>
        <th>Remove</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $select = "SELECT * FROM `mailids`";
    $announcement = mysqli_query($con, $select);
    $num = mysqli_num_rows($announcement);
    $i = 1;
    while($row = mysqli_fetch_assoc($announcement)){
        if($row['isfaculty']!=1){
            echo'
            <tr>
                <th scope="row">'.$i.'</th>
                <td><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>
                <td><form action="" method="post"><input type="hidden" name="SNo" value='.$row["SNo"].'><input type="submit" value="&#128465" name="kick" class="kick"></form></td>
            </tr>
            ';
            $i = $i+1;
        }
    } 
    ?>
  </tbody>
</table>
</div>
</div>