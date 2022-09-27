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
            <a class="nav-link" href="Classroom.php">Classroom</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="Fassignments.php">Assignments</a>
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
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Create</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Submissions</button>
      </div>
    </nav>
    <div class="tab-content mt-3" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php include('assign-create.php'); ?></div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php include('assign-submissions.php'); ?></div>
    </div>
      <div class="dynamic">
        <?php 
          if(isset($_REQUEST['postassign'])){
            $heading = $_POST['heading'];
            $description = $_POST['description'];

            $attachments = $_FILES['attachments']['name'];
            $temp_attachments = $_FILES['attachments']['tmp_name'];
            move_uploaded_file($temp_attachments, "Fassign-attachments/".$attachments);

            $output_text = $_POST['output-text'];

            $output_img = $_FILES['output-img']['name'];
            $temp_img = $_FILES['output-img']['tmp_name'];
            move_uploaded_file($temp_img, "Fassign-output-img/".$output_img);

            $due = $_POST['due'];
            $sql = "INSERT INTO assignments (`heading`,`description`,`attachments`,`output-text`,`output-img`,`due`) VALUES ('$heading','$description','$attachments','$output_text','$output_img','$due')";
            mysqli_query($con,$sql);
          }
        ?>
      </div>
    </div>
<?php include('sfooter.php'); ?>