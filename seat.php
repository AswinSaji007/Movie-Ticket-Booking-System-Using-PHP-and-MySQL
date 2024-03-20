<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "connection.php";
    ?>
<head>
    <title>My tick</title>
    <link rel="stylesheet" type="text/css" href="style2.css"> 
   
</head>
<body>
<?php
    // Get the movie name from the URL parameter
    $sql = "SELECT * FROM movies where id='".$_GET["id"]."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        
      // Start the first row
        
        while ($row = mysqli_fetch_assoc($result)) {
            
            ?>

<p>Selected movie: <?php echo $row['name']; ?></p>

<div class="movie-container">
 
<label for="movie">Select Price:</label>
<select id="movie" name="movie">
    <option value="250"> (Rs. 250)</option>
    <option value="200">(Rs. 200)</option>
    <option value="150"> (Rs. 150)</option>
    <option value="100"> (Rs. 100)</option>
</select>

<label for="date">Select Date:</label>
  <select id="date" name="date">
    <option value="13/01/24">13/01/24</option>
    <option value="14/01/24">14/01/24</option>
    <option value="15/01/24">15/01/24</option>
    <option value="16/01/24">16/01/24</option>
    </select>


<label for="time">Select Time:</label>
<select id="time" name="time">
    <option value="09:00 AM">09:00 AM</option>
    <option value="12:00 PM">12:00 PM</option>
    <option value="03:00 PM">03:00 PM</option>
    <option value="06:00 PM">06:00 PM</option>
    <!-- Add more time slots as needed -->
</select>


  
  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>N/A</small>
    </li>
    <li>
      <div class="seat selected"></div>
      <small>Selected</small>
    </li>
    <li>
      <div class="seat occupied"></div>
      <small>Occupied</small>
    </li>    
  </ul>
  
  <div class="container">
    <div class="screen"></div>
    
    <div class="row">
        <div class="seat" id=11></div>
        <div class="seat" id=12></div>
        <div class="seat" id=13></div>
        <div class="seat" id=14></div>
        <div class="seat" id=15></div>
        <div class="seat" id=16></div>
        <div class="seat" id=17></div>
        <div class="seat" id=18></div>
      </div>
      <div class="row">
        <div class="seat" id=21></div>
        <div class="seat" id=22></div>
        <div class="seat" id=23></div>
        <div class="seat" id=24></div>
        <div class="seat" id=25></div>
        <div class="seat" id=26></div>
        <div class="seat" id=27></div>
        <div class="seat" id=28></div>
      </div>
      <div class="row">
        <div class="seat" id=31></div>
        <div class="seat" id=32></div>
        <div class="seat" id=33></div>
        <div class="seat" id=34></div>
        <div class="seat" id=35></div>
        <div class="seat" id=36></div>
        <div class="seat" id=37></div>
        <div class="seat" id=38></div>
      </div>
      <div class="row">
      <div class="seat" id=41></div>
        <div class="seat" id=42></div>
        <div class="seat" id=43></div>
        <div class="seat" id=44></div>
        <div class="seat" id=45></div>
        <div class="seat" id=46></div>
        <div class="seat" id=47></div>
        <div class="seat" id=48></div>
      </div>
      <div class="row">
      <div class="seat" id=51></div>
        <div class="seat" id=52></div>
        <div class="seat" id=53></div>
        <div class="seat" id=54></div>
        <div class="seat" id=55></div>
        <div class="seat" id=56></div>
        <div class="seat" id=57></div>
        <div class="seat" id=58></div>
      </div>
      <div class="row">
      <div class="seat" id=61></div>
        <div class="seat" id=62></div>
        <div class="seat" id=63></div>
        <div class="seat" id=64></div>
        <div class="seat" id=65></div>
        <div class="seat" id=66></div>
        <div class="seat" id=67></div>
        <div class="seat" id=68></div>
      </div>
    
    <p class="text">
      You have selected <span id="count">0</span> seats for the total price of Rs. <span id="total">0</span>
    </p>
    
    <button id="payNowButton">Pay Now</button>
  </div>
</div>
<script>
       document.getElementById("payNowButton").addEventListener("click", function() {
    // Get the movie name and total price
    var movieName = "<?php echo addslashes($row['name']); ?>"; // Addslashes to escape special characters
    var totalPrice = document.getElementById("total").textContent ;
    
    // Get the selected time
    var selectedTime = document.getElementById("date").value + "<?php echo " "; ?>" + document.getElementById("time").value;

    // Construct the payment URL with movie details and time
    var paymentURL = "card.php?movie_name=" + encodeURIComponent(movieName) + "&total_price=" + totalPrice + "&selected_time=" + encodeURIComponent(selectedTime);

    // Redirect to the payment page
    window.location.href = paymentURL;
});

    </script>
<script src="home.js"></script>
<?php
        }
      }
      ?>
</body>
</html>