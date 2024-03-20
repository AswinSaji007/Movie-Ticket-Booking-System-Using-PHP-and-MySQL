<!DOCTYPE html>
<html lang="en">
    <?php session_start();?>
<head>
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
    </nav>


    <div class="category1">
    <h1>Running Movies</h1>


<?php
require 'connection.php';

$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $count = 0;
    
    echo '<div class="row">'; // Start the first row
    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($count % 5 == 0 && $count > 0) {
            echo '</div>'; // Close the previous row
            echo '<div class="row">'; // Start a new row
        }
?>

<div class="column1">
    <div class="img1">
        <a href="#">
        <img src="<?php echo $row["images_path"]; ?>"  alt="Movie Image">   
        </a>
    </div>
    <div class="playbutton1">
        <a href="http://localhost/Miniproject/USER/MOVIE%20TRAILER%20&%20BOOKING/trailer1.html">
            <ion-icon name="play"></ion-icon>
        </a>
    </div>
    <div class="description1">
        <div class="name1">
            <p><?php echo $row["name"]; ?></p>
        </div>
        <div class="quality1">
            <p>HD</p>
        </div>
        <div class="year1">
            <p><?php echo $row["year"]; ?></p>
        </div>
        <div class="star1">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half-outline"></ion-icon>
            <ion-icon name="star-outline"></ion-icon>
            <ion-icon name="star-outline"></ion-icon>
        </div>
        <div class="rating1">
            <p> <?php echo $row["rating"]; ?></p>
        </div>
        <div class="time1">
            <p><ion-icon name="time-outline"></ion-icon><?php echo $row["length"]; ?></p>
        </div>
    </div>
</div>

<?php
        $count++;
    }

    echo '</div>'; // Close the last row
}

mysqli_close($conn);
?>



<div class="category2">
    <h1>Coming soon</h1>


    <?php
require 'connection.php';

$sql = "SELECT * FROM comingmovies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $count = 0;
    
    echo '<div class="row">'; // Start the first row
    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($count % 5 == 0 && $count > 0) {
            echo '</div>'; // Close the previous row
            echo '<div class="row">'; // Start a new row
        }
?>

<div class="column2">
    <div class="img1">
        <a href="">
        <img src="<?php echo $row["images_path"]; ?>"  alt="Movie Image">   
        </a>
    </div>
        <div class="name2">
            <p><?php echo $row["name"]; ?></p>
        </div>
       
    
</div>

<?php
        $count++;
    }

    echo '</div>'; // Close the last row
}

mysqli_close($conn);
?>






</div>
</div>