<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ?>
<head>
    <title>My Orders</title>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" type="text/css" href="myorders.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mytick</title>
    <link rel="stylesheet" type="text/css" href="styleMovies.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Staatliches&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


</head>
<body>
<?php
    if(isset($_SESSION['logged_in'])&&$_SESSION['logged_in']==true)
    {
        include 'nav1.php';
    }
    else
        include 'nav2.php';
    ?>
    <h1>My Orders</h1>

    <?php
// Include your database connection code here (e.g., using PDO or mysqli)
// Example database connection using PDO:
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mytickdb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if a delete request was sent
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    
    // Perform the deletion from the database
    $deleteSql = "DELETE FROM orders WHERE order_id = :delete_id";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->bindParam(':delete_id', $deleteId, PDO::PARAM_INT);
    
    try {
        $deleteStmt->execute();
        // Redirect back to the page after deletion
        header("Location: myorders.php");
        exit;
    } catch (PDOException $e) {
        echo "Error deleting order: " . $e->getMessage();
    }
}

// Retrieve orders from the database
$name=$_SESSION['email'];
$sql = "SELECT * FROM orders  WHERE username='$name' ORDER BY orderdate DESC"; // Get orders sorted by order date
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>Movie Name</th><th>Total Price</th><th>Order Date</th><th>Action</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['movie_name'] . "</td>";
        echo "<td>" . $row['total_price'] . "</td>";
        echo "<td>" . $row['orderdate'] . "</td>";
        echo "<td><a href='myorders.php?delete_id=" . $row['order_id'] . "'>Cancel Order</a></td>"; // Delete link
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "You haven't placed any orders yet.";
}
?>
