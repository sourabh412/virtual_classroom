<?php
include('config.php');

$email = $_SESSION['user_email'];
$emailquery = "SELECT email FROM mailids WHERE email='$email' ";
$sqlquery = mysqli_query($con,$emailquery);
$emailcount = mysqli_num_rows($sqlquery);

$sql = "SELECT isfaculty FROM `mailids` WHERE email='$email' ";
$query = mysqli_query($con,$sql);
$isfaculty = mysqli_fetch_assoc($query);

if($emailcount>0){
    if($isfaculty['isfaculty'] == 1){
        header('location: Findex.php');
    }
    else{
        header('location: Sindex.php');
    }
}
else{
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <title>Invalid</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: #F1F1F1;
        }
        .message{
            background:#EBCCCF;
            border-radius:10px;
            color:#721C24;
            height:90px;
            width:75%;
            text-align:center;
            font-size:2em;
            font-family:'roboto'
        }
        .redirect-login{
            margin-top: 100px;
            padding: 10px;
        }
        .redirect-login button{
            padding: 10px;
            margin: 20px 0;
            font-size: 1.3em;
            background: #1771E6;
            cursor: pointer;
            border-radius: 7px;
            border: none;
            box-shadow: 0 5px 20px #777777;
            transition: 0.5s;
        }
        .redirect-login button:hover{
            box-shadow: 0 -5px 50px -10px #777777;
        }
        .msg{
            font-size: 1.3em;
            color:#721C24;
        }
        </style>
        <script>
            window.history.forward();
        </script>
    </head>
    <body>
        <div class='message'>
        <p><b>Wrong Email Id!!!</b> Please login again</p>
        </div>
        <div class='redirect-login'>
        <a href='logout.php'><button type='button' name='return-login'>Return to Login Page</button></a>
        </div>
        <div class='msg'>
        <h3>Please enter your BMSCE mail id</h3>
        </div>
    </body>
    </html>
    ";
}

?>