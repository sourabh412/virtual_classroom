<div class="container bg-light">
<div class="accordion" id="accordionExample">

<?php
$select = "SELECT * FROM `assignments`";
$assignments = mysqli_query($con, $select);
while($row = mysqli_fetch_assoc($assignments)){
  echo'
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading'.$row['SNo'].'">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['SNo'].'" aria-expanded="true" aria-controls="collapse'.$row['SNo'].'">
        '.$row['heading'].'
      </button>
    </h2>
    <div id="collapse'.$row['SNo'].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row['SNo'].'" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <table class="table table-hover">';
        $select1 = "SELECT * FROM `submissions`";
        $submissions = mysqli_query($con, $select1);
        while($row1 = mysqli_fetch_assoc($submissions)){
          if($row1['heading']==$row['SNo']){
            echo'
            <tr><td class="col-md-6 col-sm-12"><form action="" method="post"><input type="hidden" name="SNo" value='.$row1["SNo"].'><input class="btn btn-outline-primary" type="submit" value="'.$row1['mailid'].'" name="view"></form></td>
            <td class="col-md-6 col-md-12"><form action="" method="post"><div class="input-group"><input type="hidden" name="grade" value='.$row1["SNo"].'><input type="number" class="form-control" placeholder="'.$row1["grades"].'" name="marks" max="10" aria-describedby="button-addon2">
            <button class="btn btn-outline-success" type="submit" id="button-addon2">Grade</button></div></form></td></tr>
            ';
          }
        }
    echo'</table>
      </div>
    </div>
  </div>
  ';
}
if (isset($_REQUEST['SNo'])) {
  $_SESSION['SNo'] = $_REQUEST['SNo'];
  echo '<script>window.location.href="display_sub.php"</script>';
};
if (isset($_REQUEST['grade'])) {
  $SNo = $_REQUEST['grade'];
  $marks = $_REQUEST['marks'];
  $select2 = "UPDATE `submissions` SET grades=$marks WHERE SNo=$SNo";
  mysqli_query($con, $select2);
};
?>