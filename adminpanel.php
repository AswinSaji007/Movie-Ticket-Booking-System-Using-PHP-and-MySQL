<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminpanel.css">
</head>
<body>
    <h1>Movie Management Dashboard</h1>
    
    <!-- Add Movie Form -->
    <h2>Add Movie</h2>
    <form action="admin.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="year">Year:</label>
        <input type="text" name="year" required><br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" required><br>
        <label for="director">Director:</label>
        <input type="text" name="director" required><br>
        <input type="submit" name="add_movie" value="Add Movie">
    </form>
    
    <!-- Movie List (Editable) -->
    <h2>Edit Movies</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['director'] . "</td>";
                echo '<td><a href="edit_movie.php?id=' . $row['id'] . '">Edit</a> | <a href="admin.php?delete=' . $row['id'] . '">Delete</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
