<?php
// cart.php

if (isset($_GET['movie_name'])) {
    $movieName = urldecode($_GET['movie_name']);
    
    // Now, you can use $movieId and $movieName to handle the booking process
    // For example, display the selected movie's information and provide options for booking.
} else {
    // Handle the case when no movie information is provided in the query parameters.
    echo 'Invalid movie selection.';
}
?>
