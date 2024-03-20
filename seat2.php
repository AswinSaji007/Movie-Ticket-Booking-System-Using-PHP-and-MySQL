<!DOCTYPE html>
<html>
<head>
    <style>
        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            text-align: center;
            line-height: 40px;
            font-weight: bold;
            border: 1px solid #ccc;
        }
        .booked {
            background-color: white;
        }
        .selected {
            background-color: blue;
            color: white;
        }
        .not-occupied {
            background-color: gray;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mytickdb";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to select booked seats
    $sql = "SELECT seat_number FROM seat_bookings WHERE booking_date = CURDATE()";

    $result = $conn->query($sql);

    // Create an array to store the booked seat numbers
    $bookedSeats = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row["seat_number"];
        }
    }

    // Close the database connection
    $conn->close();

    // Generate and display the seat layout
    for ($seatNumber = 1; $seatNumber <= 50; $seatNumber++) {
        $seatClass = "not-occupied";
        
        if (in_array($seatNumber, $bookedSeats)) {
            $seatClass = "booked";
        }
        
        echo "<div class='seat $seatClass'>$seatNumber</div>";
    }
    ?>
</body>
</html>