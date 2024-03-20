<?php
include("connection.php");
?>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM adminlogin WHERE name = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        header("location:admin_dashboard.php");
    } else {
        // Authentication failed
        echo '<script>alert("Email or password is incorrect.");</script>';
    }

    mysqli_close($conn);
}
?>
