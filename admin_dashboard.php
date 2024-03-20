<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
  </script>
    <title>Admin Dashboard</title>
    <script>
    function getImageName(input) {
    if (input.files && input.files[0]) {
      var file = input.files[0];
      var fileName = file.name;
      document.getElementById('images_path').value = "images/" + fileName;
    }
  }


  function getcomingImageName(input) {
    if (input.files && input.files[0]) {
      var file = input.files[0];
      var fileName = file.name;
      document.getElementById('images_path').value = "images/" + fileName;
    }
  }


</script>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <style>
.button {
  background-color: #171717;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 40px 20px;
  cursor: pointer;
}
</style>
<a href="logout.php" class="button">Logout</a>
    <!-- Add Movie Form for Movies -->
    <h2>Add Movie</h2>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="table" value="movies">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br><br>
        
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required><br><br>
        
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" step="0.1" required><br><br>
        
        <label for="length">Length (minutes):</label>
        <input type="number" id="length" name="length" required><br><br>
        
        <label for="image_upload">Upload Image:</label>
  <input type="file" class="form-control" id="image_upload" name="image_upload" accept="image/*" onchange="getImageName(this)" required>
</div>
<input type="text" class="form-control" id="images_path" name="images_path" placeholder="Image Name" required>
<label for="trailer">Trailer-link:</label>
    <input type="text" id="trailer1" name="trailer1" required><br><br> 
        <input type="submit" name="add_movie" value="Insert Movie">
    </form>

    <!-- Add Movie Form for Coming Movies -->
    <h2>Add Coming Movie</h2>
<form action="admin.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="add_coming_movie" value="1">
    <label for="coming_name">Name:</label>
    <input type="text" id="coming_name" name="name" required><br><br>

    <label for="image_upload">Upload Image:</label>
  <input type="file" class="form-control" id="image_upload" name="image_upload" accept="image/*" onchange="getcomingImageName(this)" required>
</div>
<input type="text" class="form-control" id="images_path" name="images_path" placeholder="Enter Image Name" required>
<label for="cast">Cast:</label>
    <input type="text" id="cast" name="cast" required><br><br>

    <label for="trailer">Trailer-link:</label>
    <input type="text" id="trailer" name="trailer" required><br><br>     
    <input type="submit" value="Add Coming Movie">
</form>

    <!-- Movie List (Editable) -->
    <h2>Delete Movies</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through movies and display them here with edit and delete options -->
            <?php
            require 'admin.php';
            $movies = getMovies('movies');
            foreach ($movies as $movie) {
                echo '<tr>';
                echo '<td>' . $movie['name'] . '</td>';
                echo '<td><a href="admin.php?table=movies&delete=' . $movie['name'] . '">Delete</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- Edit Coming Movie Section -->
    <h2>Delete Coming Movies</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through coming movies and display them here with edit and delete options -->
            <?php
            $comingMovies = getMovies('comingmovies');
            foreach ($comingMovies as $comingMovie) {
                echo '<tr>';
                echo '<td>' . $comingMovie['name'] . '</td>';
                echo '<td><a href="admin.php?table=comingmovies&delete=' . $comingMovie['name'] . '">Delete</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
