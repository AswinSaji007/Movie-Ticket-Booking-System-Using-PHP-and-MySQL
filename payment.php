<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .button-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px
}

.button-link:hover {
    background-color: #0056b3;
}



        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        .receipt {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-message {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            margin: 10px 0;
        }

        button{
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            outline: none;
            border: none;
        }

        button:hover{
            background-color: #0056b3;
        }

        /* You can add more custom styles as needed */

    </style>
</head>
<body>
    <h1>Payment Confirmation</h1>

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
        $movieName = $_GET['movie_name'];
        $totalPrice = $_GET['total_price'];
        $selectedtime = $_GET['selected_time'];
        
        $name=$_SESSION['email'];
        // Make sure you sanitize and validate user input here
// Make sure you sanitize and validate user input here

        // Insert the order into the "orders" table
        $sql = "INSERT INTO orders (username,movie_name, total_price,orderdate) VALUES (:username, :movie_name, :total_price, :selected_time)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $name, PDO::PARAM_STR);
        $stmt->bindParam(':movie_name', $movieName, PDO::PARAM_STR);
        $stmt->bindParam(':total_price', $totalPrice, PDO::PARAM_STR);
        $stmt->bindParam(':selected_time', $selectedtime, PDO::PARAM_STR);
        
       

        try {
            $stmt->execute();
            echo "<div class='confirmation-message'>Payment successful! Your order has been recorded.</div>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

    <div class="receipt">
        <h2>Selected Movie:</h2>
        <p>Name: <?php echo $movieName; ?></p>
        <p>Time:  <?php echo $selectedtime; ?></p>
        <p>Price: Rs. <?php echo $totalPrice; ?></p>
        <h2>Payment Successful!</h2>
        <p>Thank you for your payment. Enjoy your movie!</p>
        <form action="cancel_ticket.php" method="GET">
            <input type="hidden" name="movie_name" value="<?php echo $movieName; ?>">
            <button type="submit">Cancel Ticket</button>
        </form>
        <a href="index.php" class="button-link">Go Back to Home</a>

    </div>


    <!-- You can add more content or links to return to the homepage, etc. -->

</body>
</html>
