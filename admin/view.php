<?php
include "connection.php";


// Check user login or not
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Booking <b>Details</b></h2>
                            </div>
                            <!--<div class="col-sm-4">
                                <a href='add.php'><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                            </div>-->
                        </div>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Booking ID</th>
                            <th>Movie name</th>
                           
                            <th>Date</th>
            
                            <th>Amount</th>
                            <th>More</th>

                        </tr>
                        <tbody>
                            <?php

                            $con = mysqli_connect($hostname, $username, $password, $db_name);
                            $select = "SELECT * FROM orders";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $bookingid = $row['order_id'];
                                $movieID = $row['movie_name'];
                                
                                $date = $row['orderdate'];
                               
                                $amount = $row['total_price'];

                                

                            ?>
                                <tr align="center">
                                <td><?php echo $bookingid; ?></td>
                                    <td><?php echo $movieID; ?></td>
                                    
                                    <td><?php echo $date; ?></td>
                                   
                                    <td><?php echo $amount; ?></td>
                                    <td><button type="submit" type="button" class="btn btn-outline-danger"><?php echo  "<a href='deleteBooking.php?delete_id=" . $row['order_id'] . "'>Delete</a>"; ?></button></td>
                                    <td></td>
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