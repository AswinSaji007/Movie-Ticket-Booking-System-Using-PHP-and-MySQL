<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .card-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .payment-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .payment-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
// Get order data from URL parameters
$movieName = $_GET['movie_name'];
$totalPrice = $_GET['total_price'];
$selectedtime = $_GET['selected_time']; // Make sure you sanitize and validate user input here
?>
<div class="card-form">
    <h2>Card Payment</h2>
    <form action="payment.php" method="POST">
        <div class="form-group">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" placeholder="Card Number" required>
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv" placeholder="CVV" required>
        </div>
       
        <!-- Use a button element with the id "payNowButton" -->
        <button type="button" id="payNowButton" class="payment-button">Pay Now</button>
    </form>
</div>
<script>
    document.getElementById("payNowButton").addEventListener("click", function() {
        // Get the movie name and total price
        var movieName = "<?php echo addslashes($movieName); ?>"; // Addslashes to escape special characters
        var totalPrice = "<?php echo addslashes($totalPrice); ?>"; // Corrected syntax
        var selectedtime = "<?php echo addslashes($selectedtime); ?>"; // Corrected syntax
        // Construct the payment URL with movie details
        var paymentURL = "payment.php?movie_name=" + encodeURIComponent(movieName) + "&total_price=" + totalPrice + "&selected_time=" + encodeURIComponent(selectedtime);

        // Redirect to the payment page
        window.location.href = paymentURL;
    });
</script>
</body>
</html>