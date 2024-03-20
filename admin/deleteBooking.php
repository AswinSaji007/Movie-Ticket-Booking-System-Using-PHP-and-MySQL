<?php 
    
    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=mytickdb", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        
        // Perform the deletion from the database
        $deleteSql = "DELETE FROM orders WHERE order_id = :delete_id";
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->bindParam(':delete_id', $deleteId, PDO::PARAM_INT);
        
        try {
            $deleteStmt->execute();
            // Redirect back to the page after deletion
            header("Location: view.php");
            exit;
        } catch (PDOException $e) {
            echo "Error deleting order: " . $e->getMessage();
        }
    }
    
?>