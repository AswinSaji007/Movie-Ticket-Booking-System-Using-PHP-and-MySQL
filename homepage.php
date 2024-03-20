<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mytick</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

    <div class="filmposter">
    <div class="poster" id="poster-container">
        <img id="poster1" src="nun2.jpg">
        <img id="poster2" src="king.jpg">
        <img id="poster3" src="kannursquadposter.jpg">
        <img id="poster4" src="2018.jpg">
        <img id="poster5" src="churuli.jpg">
        <img id="poster6" src="thuramugham.jpg">
    </div>
    <script>
    const posterContainer = document.getElementById("poster-container");
const posters = document.querySelectorAll("#poster-container img");

let currentIndex = 0;

function showNextPoster() {
    posters[currentIndex].style.display = "none";
    currentIndex = (currentIndex + 1) % posters.length;
    posters[currentIndex].style.display = "block";
}

// Change poster every 3 seconds (adjust the interval as needed)
setInterval(showNextPoster, 2979);
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
<div class="category1">
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
        <a href="seat.php?movie_name=<?php echo urlencode($row['name']); ?>">
            
            <img src="<?php echo $row["images_path"];?>" alt="Movie Image">   
            </a>
        </div>
        <div class="playbutton1">
            <a href="<?php echo $row["trailer"]; ?>">
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
                <p><?php echo $row["rating"]; ?></p>
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
        <a href="#">
        <img src="<?php echo $row["images_path"];;?>"  alt="Movie Image">   
        </a>
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

mysqli_close($conn);
?>


<!------------Footer----------->

<div class="footer">
    <div class="footerbooknow">
        <h2>BOOK NOW</h2>
    </div> 
    <div class="paragraph">
        <div class="showingmovies">
        <p>MOVIES NOW SHOWING</p> 
        </div>
        <div class="showingmovieslist">
         <p>Thuramukham  | Voice of sathyanadhan | Rorschach | Jailer | Ajagajandharam</p>  
        </div>
        <div class="upcomingmovies">
            <p>UPCOMMING MOVIES</p>
        </div>
        <div class="upcommingmovieslist">
            <P>Ula | The Queen Mary | King Of Kotha | Meg 2 | Spider Into The Verse</P>
        </div>
    </div>  
    <div class="instagram">
        <a href="https://www.instagram.com/">
        <ion-icon name="logo-instagram"></ion-icon>
        </a>
    </div>
    <div class="facebook">
        <a href="https://www.facebook.com/">
        <ion-icon name="logo-facebook"></ion-icon>
        </a>
    </div>
    <div class="twitter">
        <a href="https://twitter.com/">
        <ion-icon name="logo-twitter"></ion-icon>
        </a>
    </div>
    <div class="whatsapp">
        <a href="https://web.whatsapp.com/">
        <ion-icon name="logo-whatsapp"></ion-icon>
        </a>
    </div>
    <div class="youtube">
        <a href="https://www.youtube.com/">
        <ion-icon name="logo-youtube"></ion-icon>
        </a>
    </div>
    <div class="linkdin">
        <a href="https://www.linkedin.com/login">
        <ion-icon name="logo-linkedin"></ion-icon>
        </a>
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

</body>
</html>






