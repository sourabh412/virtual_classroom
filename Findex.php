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
            <a class="nav-link active" aria-current="page" href="Findex.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Classroom.php">Classroom</a>
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
    <?php
          $select1 = "SELECT * FROM `assignments` ORDER BY SNo DESC";
          $assignment = mysqli_query($con, $select1);
          $num1 = mysqli_num_rows($assignment);
          while($row = mysqli_fetch_assoc($assignment)){
            echo'<table class="table table-hover"><tr><td>'.$row['heading'].'</td></tr></table>';
          }
    ?>
    </div>
    </div>
      <!--
    <div class="container">
      <div class="head">
        <?php
        // echo
        // '<img src="'.$_SESSION["user_image"].'" alt="">
        // <div class="details">
        //   <h1>'.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h1>
        //   <p>'.$_SESSION['user_email'].'</p>
        // </div>'
        ?>
        <div class="class">
          <p>Section : C</p>
          <p>Batch : C4</p>
        </div>
      </div>
      <div class="main">
        <h1>Announcements</h1>
        <div class="announcements">
        <?php
          // $select = "SELECT * FROM `announcements` ORDER BY SNo DESC";
          // $announcement = mysqli_query($con, $select);
          // $num = mysqli_num_rows($announcement);
          // while($row = mysqli_fetch_assoc($announcement)){
          //   echo'
          //   <h3>'.$row['heading'].'</h3>
          //   <p>'.$row['announcements'].'</p>
          //   <a href="'.$row['link'].'">'.$row['link'].'</a>
          //   <section></section>';
          // }
        ?>
        </div>
        <h1>Assignments</h1>
        <div class="assignments">
          <?php
            // $select1 = "SELECT * FROM `assignments` ORDER BY SNo DESC";
            // $assignment = mysqli_query($con, $select1);
            // $num1 = mysqli_num_rows($assignment);
            // while($row = mysqli_fetch_assoc($assignment)){
            //   echo'
            //   <div class="card">
            //   <h3>'.$row['heading'].'</h3>
            //   <p>Due : '.$row['due'].'</p>
            //   </div>';
            // }
          ?>
        </div>
      </div>
    </div>
          -->
<?php include('sfooter.php'); ?>
