<?php 
    include "connection.php";
function deleteMovie($table, $name)
{
    global $conn;
    $query = "DELETE FROM $table WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $name);
    
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Movie deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting movie.");</script>';
    }
    
    mysqli_stmt_close($stmt);
    header('Location: addmovie.php');
    exit();
}
if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $name = $_GET['id'];
    deleteMovie($table, $name);
}
?>