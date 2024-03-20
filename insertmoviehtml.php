<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movie Details</title>
    <script>
    function getImageName(input) {
    if (input.files && input.files[0]) {
      var file = input.files[0];
      var fileName = file.name;
      document.getElementById('images_path').value = "images/" + fileName;
    }
  }
</script>
</head>
<body>
    <h2>Insert Movie Details</h2>
    <form action="insert_movie.php" method="POST">
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
        <div class="form-group">
  <label for="image_upload">Upload Image:</label>
  <input type="file" class="form-control" id="image_upload" name="image_upload" accept="image/*" onchange="getImageName(this)" required>
</div>
<input type="text" class="form-control" id="images_path" name="images_path" placeholder="Your Food Image Path" required>
        <input type="submit" value="Insert Movie">
    </form>
</body>
</html>
