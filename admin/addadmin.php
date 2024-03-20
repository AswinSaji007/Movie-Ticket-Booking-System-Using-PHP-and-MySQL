<?php
include "connection.php";



include("connection.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $usertype=0;

    if($num > 0){
        echo'<script>alert("Email already exists!")</script>';
    }
    else{
        $insert= "INSERT INTO login(user_type,email,password)VALUES('$usertype','$email','$password')";
        mysqli_query($conn,$insert);
        header("location:addadmin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM login";
    $result =mysqli_query($conn, $sql);
    
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>

<form action="" method="POST">
<div class="admin-section-panel admin-section-panel2">
                        <h2>Signup</h2>

                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name="email" id="email" required>
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="password" id="password" required>
                            <label for="">Password</label>
                        </div>
                        <button type="submit" name="submit">Add Admin</button><br><br>
                        
                    
                        </div>
                    </form>
    </div>
</body>
</html>