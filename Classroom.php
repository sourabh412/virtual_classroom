<?php include('sheader.php'); ?>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="rounded-circle">
        <a href="https://bmsce.ac.in/home/Information-Science-and-Engineering-About"><img src="bmslogo.png" alt="BMSCE" width="250" height="60"></a>
      </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Findex.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="Classroom.php">Classroom</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Fassignments.php">Assignments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </div>
    </div>
    </nav>
    <div class="container">
    <nav>
      <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Announce</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Classlist</button>
      </div>
    </nav>
    <div class="tab-content mt-3" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php include('classroom-announce.php'); ?></div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php include('classroom-classlist.php'); ?></div>
    </div>
    
      <div class="dynamic">
        <?php 
          if(isset($_REQUEST['kick'])){
            $kick = "DELETE FROM mailids WHERE SNo = {$_REQUEST['SNo']}";
            mysqli_query($con,$kick);
            if($con->query($kick) === TRUE){
              echo'
              <script>window.location.href="Classroom.php?page=classroom-classlist"</script>
              <h3>Member deleted</h3>';
            }
          }
          else if(isset($_REQUEST['announce'])){
            $heading = $_POST['heading'];
            $announcemnents = $_POST['announcements'];
            $link = $_POST['link'];
            $sql = "INSERT INTO announcements (`heading`,`announcements`,`link`) VALUES ('$heading','$announcemnents','$link')";
            mysqli_query($con,$sql);
          }
        ?>
      </div>
    </div>

<?php include('sfooter.php'); ?>
