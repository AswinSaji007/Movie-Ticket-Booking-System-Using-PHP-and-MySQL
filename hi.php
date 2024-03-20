<!DOCTYPE html>
<html>
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
</body>
</html>