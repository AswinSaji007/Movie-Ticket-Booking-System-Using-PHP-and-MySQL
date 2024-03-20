<?php
require 'connection.php';
function addComingMovie($name, $imagePath, $cast, $trailer)
{
    global $conn;
    $query = "INSERT INTO comingmovies (name, images_path,cast,trailer) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $imagePath, $cast, $trailer);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect to admin dashboard after adding a coming movie
    header('Location: comingmovie.php');
    exit(); // Make sure to exit to prevent further script execution
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $name = $_POST['movieTitle'];
        $imagePath = mysqli_real_escape_string($conn, $_POST['movieImg']); // Set this to your image upload logic
        $cast = $_POST['cast'];  
        $trailer = $_POST['trailer'];  

        addComingMovie($name, $imagePath,$cast,$trailer);
    }
}
?>