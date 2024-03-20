<?php
require 'connection.php';

// Function to add a movie to the database
// Function to add a movie to the database
function addMovie($table, $name, $type, $year, $rating, $length, $imagePath,$trailer1)
{
    global $conn;
    $query = "INSERT INTO $table (name, type, year, rating, length, images_path,trailer) VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssss', $name, $type, $year, $rating, $length, $imagePath,$trailer1);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect to admin dashboard after adding a movie
    header('Location: admin_dashboard.php');
    exit(); // Make sure to exit to prevent further script execution
}

function addComingMovie($name, $imagePath, $cast, $trailer)
{
    global $conn;
    $query = "INSERT INTO comingmovies (name, images_path,cast,trailer) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $imagePath, $cast, $trailer);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect to admin dashboard after adding a coming movie
    header('Location: admin_dashboard.php');
    exit(); // Make sure to exit to prevent further script execution
}

// Function to delete a movie from the database
function deleteMovie($table, $name)
{
    global $conn;
    $query = "DELETE FROM $table WHERE name = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $name);
    
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Movie deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting movie.");</script>';
    }
    
    mysqli_stmt_close($stmt);
    header('Location: admin_dashboard.php');
    exit();
}

// Check if a new movie should be inserted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_movie'])) {
        $table = $_POST['table'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $year = $_POST['year'];
        $rating = $_POST['rating'];
        $length = $_POST['length'];
        $imagePath = mysqli_real_escape_string($conn, $_POST['images_path']); // Set this to your image upload logic
        $trailer1=$_POST['trailer1'];
        addMovie($table, $name, $type, $year, $rating, $length, $imagePath,$trailer1);
    }
}

// Check if a new coming movie should be inserted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_coming_movie'])) {
        $name = $_POST['name'];
        $imagePath = mysqli_real_escape_string($conn, $_POST['images_path']); // Set this to your image upload logic
        $cast = $_POST['cast'];  
        $trailer = $_POST['trailer'];  

        addComingMovie($name, $imagePath,$cast,$trailer);
    }
}

// Check if a movie should be deleted
if (isset($_GET['table']) && isset($_GET['delete'])) {
    $table = $_GET['table'];
    $name = $_GET['delete'];
    deleteMovie($table, $name);
}

// Function to fetch movies or coming movies based on the table name
function getMovies($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    $movies = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $movies[] = $row;
    }

    return $movies;
}
?>
