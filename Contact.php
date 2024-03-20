<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mytick</title>
    <link rel="stylesheet" type="text/css" href="styleContact.css">
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

    <div class="contactus">
        <div class="customercarenumber">
        <label for="text">Contact Customer Care :</label><br>
    </div>
    <div class="number">
           <p>+91 1234567890</p>
    </div>
    </div>


    <div class="email">
        <div class="emailaddress">
            <label for="text">Email :</label>
        </div>
    <div class="mytickemail">
        <p>mytickcine@gmail.com</p>
    </div>
</div>


<div class="socialmedia">
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
</div>




    <div class="footerimg">
    <img src="footer.png">
    </div>