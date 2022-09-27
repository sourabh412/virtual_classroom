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
            <a class="nav-link active" aria-current="page" href="Sindex.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="assignments.php">Assignments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </div>
    </div>
    </nav>
    <div class="container">
    <div class="container">
        <div class="d-inline-block rounded-circle p-0" style="height:150px;width:150px;">
            <img class="d-inline-block rounded-circle p-0" src="<?php echo ''.$_SESSION["user_image"].'' ?>" height="150" width="150" alt="">
        </div>
        <div class="d-inline-block ms-2">
            <h1 class="mb-0" style="word-wrap:break-word;">
                <?php echo ''.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'' ?>
            </h1>
            <a href=<?php echo'mailto:'.$_SESSION['user_email'].'' ?> style="text-decoration: none;"><?php echo''.$_SESSION['user_email'].'' ?></a>
        </div>
    </div>
    <h1>Announcements</h1>
    <div class="container text-wrap rounded mt-3">
        <?php
            $select = "SELECT * FROM `announcements` ORDER BY SNo DESC";
            $announcement = mysqli_query($con, $select);
            $num = mysqli_num_rows($announcement);
            while($row = mysqli_fetch_assoc($announcement)){
                echo'
                <h3>'.$row['heading'].'</h3>
                <p>'.$row['announcements'].'</p>
                <a href="'.$row['link'].'" target="_blank">'.$row['link'].'</a>
                <section class="border border-bottom"></section>';
            }
        ?>
    </div>
    <div class="d-inline-block container text-wrap rounded my-3 pt-0">
    <h1>Submissions</h1>
    <?php
          $email = $_SESSION['user_email'];
          $sub = "SELECT * FROM `submissions` WHERE mailid = '$email'";
          $sub_query = mysqli_query($con, $sub);
          while ($row1 = mysqli_fetch_assoc($sub_query)) {
            $heading = $row1['heading'];
            $select2 = "SELECT * FROM `assignments` WHERE SNo = '$heading' ";
            $select2_query = mysqli_query($con, $select2);
            $row2 = mysqli_fetch_assoc($select2_query);
            echo'<table class="table table-hover"><tr><td>'.$row2['heading'].'</td></tr></table>';
          }
    ?>
    </div>
    </div>

<?php include('sfooter.php'); ?>