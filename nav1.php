<html>
    <body>
<nav>
        <div class="logo">
            <img src="logo1.jpg">
        </div> 
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#"><?php echo $_SESSION["email"];?></a></li>
            <li><a href="myorders.php">Orders</a></li>
            <li><a href="#section1">Movies</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    </body>
</html>