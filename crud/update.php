<?php
// Including the database connection file
require_once "../db_connect.php";


// Getting the 'x' parameter from the URL to identify the media to be updated
$id = $_GET["x"];

// Query to select the media record with the given ID
$sql = "SELECT * FROM animals WHERE id = $id";
$result = mysqli_query($connect, $sql);

// Checking if the query was successful
if ($result) {
  // Fetching the media record as an associative array
  $row = mysqli_fetch_assoc($result);

  // Checking if the form was submitted for updating the media
  if (isset($_POST["update"])) {
    // Getting the updated values from the form
    $name = $_POST["name"];
    $species = $_POST["species"];
    $age = $_POST["age"];
    $size = $_POST["size"];
    $picture = $_POST(["picture"]);
    $vaccinated = $_POST["vaccinated"];
    $status = $_POST["status"];
    $location = $_POST["location"];

    // if ($row["picture"] != "product.jpeg") {
    //   if (file_exists("../pictures/" . $row["image"])) {
    //     unlink("../pictures/{$row['image']}");
    //   }
    // }

    // Query to update the media record with the new values
    $sql = "UPDATE `animals` SET `name`='$name', `species`='$species', `age`='$age', `size`='$size', `picture`='$picture[0]', `vaccinated`='$vaccinated', `status`='$status', `location`='$location' WHERE id = $id";


    // Executing the update query
    if (mysqli_query($connect, $sql)) {
      echo "<div class='text-center bg-success'>Success! A media has been updated.</div>";
      // header("refresh:3 url=home.php");
    } else {
      echo "Error in SQL query: " . mysqli_error($connect);
    }
  }
} else {
  echo "Error in SQL query: " . mysqli_error($connect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Update Pets Info</title>
</head>

<body>
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../dashboard.php">My Bets</a>
      <li class="nav-item">
        <a class="nav-link" href="../senior.php">Seniors</a>
      </li>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../dashboard.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->

  <div class="container mt-5">
    <h2>Update Pets</h2>
    <form method="post">
      <!-- Displaying the current values of the media record in the form for updating -->
      <div class="mb-3 mt-3">
        <label for="picture" class="form-label"></label>
        <img src="<?php echo $row["picture"]; ?>" alt="Animal Picture" style="width: 100px; height: 100px;">
      </div>
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" name="name" area-describility="name" id="name" value="<?php echo $row["name"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="species" class="form-label">species</label>
        <input type="text" class="form-control" id="species" name="species" value="<?php echo $row["species"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="age" class="form-label">age</label>
        <input type="number" class="form-control" name="age" area-describility="age" id="age" value="<?php echo $row["age"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="size" class="form-label">size</label>
        <input type="text" class="form-control" name="size" area-describility="size" id="size" value="<?php echo $row["size"]; ?>" />
      </div>


      <!-- <div class="mb-3 mt-3">
        <label for="vaccinated" class="form-label">vaccinated/label>
          <input type="text" class="form-control" name="vaccinated" area-describility="vaccinated" id="vaccinated" value="<?php echo $row["vaccinated"]; ?>" />
      </div> -->
      <div class="mb-3 mt-3">
        <label class="form-label">Vaccinated</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vaccinated" id="yes" value="Yes">
          <label class="form-check-label" for="yes">
            Yes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vaccinated" id="no" value="No">
          <label class="form-check-label" for="no">
            No
          </label>
        </div>
      </div>
      <div class="mb-3 mt-3">
        <label for="status" class="form-label">status</label>
        <input type="text" class="form-control" name="status" area-describility="status" id="status" value="<?php echo $row["status"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="location" class="form-label">location</label>
        <input type="text" class="form-control" name="location" area-describility="location" id="location" value="<?php echo $row["location"]; ?>" />
      </div>

      <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
    </form>
  </div>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>