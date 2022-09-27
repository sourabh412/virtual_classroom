<?php include('sheader.php'); ?>
<body style="overflow-x:hidden;">
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
            <a class="nav-link" aria-current="page" href="Sindex.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="assignments.php">Assignments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
      </div>
    </div>
  </nav><?php
        if (isset($_SESSION['message'])) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . $_SESSION['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          unset($_SESSION['message']);
        };
        $select1 = "SELECT * FROM `assignments` ORDER BY SNo DESC";
        $assignment = mysqli_query($con, $select1);
        $num1 = mysqli_num_rows($assignment);
        while ($row = mysqli_fetch_assoc($assignment)) {
          echo '
        <div class="col-12 m-5">
          <div class="card bg-light">
            <div class="card-body">
              <h5 class="card-title">' . $row['heading'] . '</h5>
              <p class="card-text">' . $row['due'] . '</p>
              <form method="post">
                <input type="hidden" name="SNo" value=' . $row["SNo"] . '>
                <button class="btn btn-primary" type="submit">View Assignment</button>
              </form>
            </div>
          </div>
        </div>';
        };
        if (isset($_REQUEST['SNo'])) {
          $_SESSION['assignheading'] = $_REQUEST['SNo'];
          echo '<script>window.location.href="assignview.php"</script>';
        };
        ?>
<?php include('sfooter.php'); ?>