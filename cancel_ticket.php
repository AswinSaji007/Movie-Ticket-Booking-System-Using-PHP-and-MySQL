<?php
// Include your database connection code here (e.g., using PDO or mysqli)
// Example database connection using PDO:
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mytickdb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get order data from URL parameters
$movieName = $_GET['movie_name']; // Ensure you sanitize and validate user input

// Delete the order from the "orders" table
$sql = "DELETE FROM orders WHERE movie_name = :movie_name";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':movie_name', $movieName, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "Ticket canceled successfully!";
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
