<!DOCTYPE html>
<html lang="en">
<head>
    <title>My tick</title>
    <link rel="stylesheet" type="text/css" href="style2.css"> 
</head>
<body>

<div class="movie-container">
    <?php
    // Get the movie name from the URL parameter
    $selectedMovieName = isset($_GET['movie_name']);
    ?>

    <label>Selected movie: <?php echo $selectedMovieName; ?></label>

    <label>Select Price:</label>
    <select id="price">
        <option value="100">Rs. 100</option>
        <option value="200">Rs. 200</option>
        <option value="300">Rs. 300</option>
        <option value="400">Rs. 400</option>
    </select>
</div>

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
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat "></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
    
    <p class="text">
      You have selected <span id="count">0</span> seats for the total price of Rs. <span id="total">0</span>
    </p>
  </div>
</div>
<script src="home.js"></script>
</body>
</html>