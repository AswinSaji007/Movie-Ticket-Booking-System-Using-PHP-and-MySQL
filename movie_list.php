<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <link rel="stylesheet" type="text/css" href="styleindexregister.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Staatliches&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Database Connection -->
        <?php
        require 'connection.php'; // Replace with your database connection script
       

        $sql = "SELECT * FROM movies";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
        ?>        <div class="category1">
                <div class="column1">
                        <div class="name3">
                        <div class="playbutton3">
            <ion-icon name="play"></ion-icon>
        </div>
                            <h5 class="name3"><?php echo $row["name"]; ?></h5>
                            <p class="year3">Year: <?php echo $row["year"]; ?></p>
                            <p class="rating3">Rating: <?php echo $row["rating"]; ?></p>
                            <p class="time3">Length: <?php echo $row["length"]; ?></p>
                            <!-- Add your additional movie details here -->
                        </div>
                   
                </div>
            </div>
        <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div>';
                }
            }

            if ($count % 3 != 0) {
                echo '</div>';
            }
        } else {
        ?>
            <div class="container">
                <div class="jumbotron">
                    <center>
                        <label style="margin-left: 5px;color: red;">
                            <h1>Oops! No movies are available.</h1>
                        </label>
                        <p>Stay tuned for upcoming releases.</p>
                    </center>
                </div>
            </div>
        <?php
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
