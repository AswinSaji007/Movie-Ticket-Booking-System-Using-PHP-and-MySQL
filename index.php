<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mytick</title>
    <link rel="stylesheet" type="text/css" href="styleindexregister.css">
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
    <div class="filmposter">
    <div class="poster" id="poster-container">
    <?php
// Database connection
require 'connection.php';

// Fetch images from database
$sql = "SELECT scrolling FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $images = array();
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['scrolling'];
    }

    // Display auto-scrolling images
    echo '<div id="imageContainer">';
    foreach ($images as $index => $image) {
        echo '<div class="image" id="image' . $index . '"><img src="' . $image . '" alt="Image"></div>';
    }
    echo '</div>';

} else {
    echo "No images found in the database.";
}

$conn->close();
?>
    </div>
    <script>
      // Auto-scrolling functionality
      const images = document.querySelectorAll('.image');
    let currentIndex = 0;

    function showImage(index) {
        images.forEach((image, i) => {
            if (i === index) {
                image.style.display = 'block';
            } else {
                image.style.display = 'none';
            }
        });
    }

    function autoScroll() {
        showImage(currentIndex);
        currentIndex = (currentIndex + 1) % images.length;
        setTimeout(autoScroll, 2000); // Adjust the delay (2000ms = 2 seconds) as needed
    }

    autoScroll();
</script>
            <a href="#poster1"></a>
            <a href="#poster2"></a>
            <a href="#poster3"></a>
            <a href="#poster4"></a>
            <a href="#poster5"></a>
            <a href="#poster6"></a>
            <a href="#poster7"></a>
        </div>
    </div>
    
<!----------------Movie1--------------------->
<!---------------Category1------------------->
<div class="category1" id="section1">
    <h1>Recommended Movies</h1>
</div>

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
    <a href="cart.php?movie_name=<?php  urlencode($row['name']); ?>">
        <!-- Pass movie ID and name as query parameters -->
        <div class="img1">
        <?php
     if(!isset($_SESSION['logged_in'])||$_SESSION['logged_in']!==true)
     {
      ?>
      <a href="login.php"><img src="<?php echo $row["images_path"]; ?>" alt="Movie Image"></a>
      <?php
     }
     else
     {
     ?>
     <a href="seat.php?id=<?php echo $row['id'];?>" ><img src="<?php echo $row["images_path"]; ?>" alt="Movie Image"></a>
      <?php
     }
     ?>
        </div>
        <div class="playbutton1">
        <a href="<?php echo $row["trailer"];?>">
            <ion-icon name="play"></ion-icon>
    </a>
        </div>
        <div class="description1">
            <div class="name1">
                <p><?php echo $row["name"];
                ?></p>
            </div>
            <div class="quality1">
                <p>HD</p>
            </div>
            <div class="year1">
                <p><?php echo $row["year"]; ?></p>
            </div>
            <div class="star1">
                <?php
                $i=1;
                while($i<=$row['rating'])
                {?>
                    <ion-icon name="star"></ion-icon>
                    <?php $i++;
                }?>
            </div>
            <div class="time1">
                <p><ion-icon name="time-outline"></ion-icon><?php echo $row["length"]; ?></p>
            </div>
        </div>
    </a>
</div>

<?php
        $count++;
    }

    echo '</div>'; // Close the last row
}


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
        
        <img src="<?php echo $row["images_path"];;?>"  alt="Movie Image">   
    
    </div>
    <div class="playbutton1">
        <a href="<?php echo $row["trailer"];?>">
            <ion-icon name="play"></ion-icon>
    </a>
        </div>
        <div class="name2">
            <p><?php echo $row["name"]; ?></p>
            cast:<?php echo $row["cast"];?>
        </div>
       
    
</div>
<?php
        $count++;
    }

    echo '</div>'; // Close the last row
}


?>


<!------------Footer----------->

<div class="footer">
    <div class="footerbooknow">
        <h2>BOOK NOW</h2>
    </div> 
    
    <div class="copyright">
        <p>Copyright 2023 ⓒ MyTick Entertainment Pvt. Ltd. All Rights Reserved.
            <p>The Content and images used on this site are copyright protected vests with the respective owners. The usage of the content and images on this website is intended to promote the works and no endorsement of the artist shall be implied. Unauthorized use is prohibited and punishable by law.</p>
        </p>
    </div>
    <div class="logofooter">
        <img src="logo1.jpg">
    </div>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>