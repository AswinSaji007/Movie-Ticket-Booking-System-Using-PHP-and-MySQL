<?php


include("connection.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $usertype=1;

    if($num > 0){
        echo'<script>alert("Email already exists!")</script>';
    }
    else{
        $insert= "INSERT INTO login(user_type,email,password)VALUES('$usertype','$email','$password')";
        mysqli_query($conn,$insert);
        header("location:Login.php");
    }
}

?>
<html>
    <head>
        <link rel="stylesheet" href="stylesignup.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
        <title>MyTick</title>
    </head>
 <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="" method="POST">
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
                        <button type="submit" name="submit">Log in</button><br><br>
                        <div class="login">
                        <p>Already have an account<a href="Login.php"> Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
          </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>