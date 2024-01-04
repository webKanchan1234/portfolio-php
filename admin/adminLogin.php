<?php
include("../dbConnection.php");
session_start();
if(!isset($_SESSION['is_admin'])){
    if(isset($_REQUEST['aEmail'])){
        $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
        $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));

        $sql = "SELECT  admin_email, admin_password FROM admin_tb WHERE admin_email = '".$aEmail."' AND admin_password = '".$aPassword."' limit 1";

        $result  = $conn->query($sql);
        if($result->num_rows==1){
            $_SESSION['is_admin']=true;
            $_SESSION['aEmail']=$aEmail;
            echo "<script> location.href='dashboard.php'; </script>";
            exit;
        }else{
            $msg = "<div class='alert alert-warning mt-2'>Enter valid Email or Password</div>";
        }

    }
}else{
    echo "<script>location.href='../index.php'; </script>";
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <title>Admin Login</title>

    <style>
        .admin {
            background-color: #B6BBC4;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .admin-form{
            width: 30%;
            background-color: #EEF5FF;
            padding: 1vmax;
            border-radius: 0.5vmax;
        }
    </style>

</head>

<body>
    <div class="admin">
        <div class="admin-form">
            <h2 style="text-align: center;">Admin Login</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label" >Email</label>
                    <input type="email" class="form-control" name="aEmail" id="email" aria-describedby="emailHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="aPassword" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <h2><?php echo $msg ?></h2>
            </form>
        </div>
    </div>
</body>



<!-- add bootstrap javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>