<?php
include "connection.php";


// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM orders";
    $bookingsNo = mysqli_num_rows(mysqli_query($conn, $sql));
    
    $moviesNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM movies"));
    ?>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="addmovie1.php" method="POST">
                    <input type="hidden" name="table" value="movies">
                        <input placeholder="Name" type="text" name="movieTitle" required>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <input placeholder="Rating" type="number" name="rating" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="Trailer Link" type="text" name="trailer" required><br />
                        <br>
                        <label>Add Poster</label>
                        <input type="file" name="movieImg" accept="image/*">
                        <label>Add Scrolling Image</label>
                        <input type="file" name="sImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">Add Movie</button>
                        
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Recent Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>MovieTitle</th>
                            <th>Movie_Genre</th>
                            <th>Release_date</th>
                            <th>More</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            $host = "localhost"; /* Host name */
                            $user = "root"; /* User */
                            $password = ""; /* Password */
                            $dbname = "mytickdb"; /* Database name */

                            $con = mysqli_connect($host, $user, $password, $dbname);
                            $select = "SELECT * FROM `movies`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $title = $row['name'];
                                $genere = $row['type'];
                                $releasedate = $row['year'];
                            ?>
                                <tr align="center">
                
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $genere; ?></td>
                                    <td><?php echo $releasedate; ?></td>
                        
                                    <!--<td><?php echo  "<a href='deletemovie.php?table=movies&id=" . $row['id'] . "'>delete</a>"; ?></td>-->
                                    <td><button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger"><?php echo  "<a href='deletemovie.php?table=movies&id=" . $row['id'] . "'>delete</a>"; ?></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>