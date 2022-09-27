<?php include('sheader.php'); ?>
<link rel="stylesheet" href="assignview.css">
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
  </nav>
    <?php
    $heading = $_SESSION['assignheading'];
    $select = "SELECT * FROM `assignments` WHERE SNo = '$heading'";
    $assignment = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($assignment);
    echo '
    <div class="assignview bg-light">
    <h1>' . $row['heading'] . '</h1>
    <h5>Due Time : ' . $row['due'] . '</h5>
    <section></section>
    <h5>' . $row['description'] . '</h5>
    </div>'
    ?>
    <div class="submitassign bg-light">
        <h5>Your work</h5>
        <?php
        $email = $_SESSION['user_email'];
        $check = "SELECT * FROM `submissions` WHERE mailid = '$email' AND heading = '$heading'";
        if ($con->query($check)) {
            $available = mysqli_query($con, $check);
            $num_rows = mysqli_num_rows($available);

            if ($num_rows > 0) {
                echo '<h6 style="color:green">Submitted</h6>
                        <div id="file-Name">
                            Already Submitted Once
                        </div>';
            } else {
                echo '<h6 style="color:red">Assigned</h6>
                        <div id="file-Name">
                            No files uploaded<br>
                            Upload pdf files
                        </div>';
            }
        } else {
            echo '<h6 style="color:red">Assigned</h6>
                        <div id="file-Name">
                            No files uploaded<br>
                            Upload pdf files
                        </div>';
        }
        ?>

        <form action="assignview.php" method="post" enctype="multipart/form-data">
            <input type="file" name="uploadfile" id="uploadfile" onchange="getName()" hidden>
            <label for="uploadfile" class="uploadfile">Upload Assignment</label>
            <?php
            if ($num_rows > 0) {
                echo '<button type="submit" disabled name="submitassign">Submit</button>';
            } else {
                echo '<button type="submit" name="submitassign">Submit</button>';
            }
            ?>
            <?php
            if (isset($_REQUEST['submitassign'])) {
                $mailid = $_SESSION['user_email'];
                $submission = $_FILES['uploadfile']['name'];
                $temp_submission = $_FILES['uploadfile']['tmp_name'];
                move_uploaded_file($temp_submission, "Submissions/" . $submission);

                $sql = "INSERT INTO Submissions (`heading`,`mailid`,`submissions`) VALUES ('$heading','$mailid','$submission')";
                mysqli_query($con, $sql);
                echo'<script>windows.location.href="assifnments.php"</script>';
                $_SESSION['message'] = 'Submitted successfully!!!';
            }
            ?>
        </form>
    </div>
    <div class="attachment bg-light">
        <h2>Attachments</h2>
        <?php
        echo '<a target="_blank" href="viewattachment.php">' . $row['attachments'] . '</a>';
        ?>
    </div>

    <script type="text/javascript">
        getName = () => {
            var x = document.getElementById("uploadfile");
            var txt = "";
            if ('files' in x) {
                if (x.files.length == 0) {
                    txt = "No files uploaded";
                } else {
                    for (var i = 0; i < x.files.length; i++) {
                        var file = x.files[i];
                        if ('name' in file) {
                            txt += file.name + "<br>";
                        }
                    }
                }
            }
            document.getElementById("file-Name").innerHTML = txt;
        }
    </script>

<?php include('sfooter.php'); ?>