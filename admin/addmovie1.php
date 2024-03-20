<?php
require 'connection.php';
function addMovie($table, $name, $type, $year, $rating, $length, $imagePath,$trailer1,$scroll)
{
    global $conn;
    $query = "INSERT INTO $table (name, type, year, rating, length, images_path,trailer,scrolling) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $name, $type, $year, $rating, $length, $imagePath,$trailer1,$scroll);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect to admin dashboard after adding a movie
    header('Location: addmovie.php');
    exit(); // Make sure to exit to prevent further script execution
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $table = $_POST['table'];
        $name = $_POST['movieTitle'];
        $type = $_POST['movieGenre'];
        $year = $_POST['movieRelDate'];
        $rating = $_POST['rating'];
        $length = $_POST['movieDuration'];
        $imagePath = mysqli_real_escape_string($conn, $_POST['movieImg']); // Set this to your image upload logic
        $trailer1=$_POST['trailer'];
        $scroll = mysqli_real_escape_string($conn, $_POST['sImg']);
        addMovie($table, $name, $type, $year, $rating, $length, $imagePath,$trailer1,$scroll);
    }
}
?>