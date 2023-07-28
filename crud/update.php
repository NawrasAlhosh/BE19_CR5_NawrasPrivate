<?php
// Including the database connection file
require_once "../db_connect.php";
require_once "../file_upload.php";


// Getting the 'x' parameter from the URL to identify the media to be updated
$id = $_GET["x"];

// Query to select the media record with the given ID
$sql = "SELECT * FROM library_table WHERE id = $id";
$result = mysqli_query($connect, $sql);

// Checking if the query was successful
if ($result) {
  // Fetching the media record as an associative array
  $row = mysqli_fetch_assoc($result);

  // Checking if the form was submitted for updating the media
  if (isset($_POST["update"])) {
    // Getting the updated values from the form
    $title = $_POST["title"];
    $ISBN_code = $_POST["ISBN_code"];
    $short_description = $_POST["description"]; // corrected name from 'short_description' to 'description'
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];
    $status = $_POST["status"];

    if ($row["image"] != "product.jpeg") {
      if (file_exists("../pictures/" . $row["image"])) {
        unlink("../pictures/{$row['image']}");
      }
    }

    // Query to update the media record with the new values
    $sql = "UPDATE `library_table` SET `title`='$title',`image`='$image[0]',`ISBN_code`='$ISBN_code',`short_description`='$short_description',`type`='$type',`author_first_name`='$author_first_name',`author_last_name`='$author_last_name',`publisher_name`='$publisher_name',`publisher_address`='$publisher_address',`publish_date`='$publish_date',`status`='$status' WHERE id = $id";

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
  <title>Update Media</title>
</head>

<body>
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../dashboard.php">My Library</a>
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
    <h2>Update Media</h2>
    <form method="post" enctype="multipart/form-data">
      <!-- Displaying the current values of the media record in the form for updating -->
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" area-describility="title" id="title" value="<?php echo $row["title"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="ISBN_code" class="form-label">ISBN_code</label>
        <input type="text" class="form-control" id="ISBN_code" name="ISBN_code" value="<?php echo $row["ISBN_code"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" area-describility="image" id="image" value="<?php echo $row["image"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" area-describility="description" id="description" value="<?php echo $row["short_description"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" area-describility="type" id="type" value="<?php echo $row["type"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="author_first_name" class="form-label">Author First Name</label>
        <input type="text" class="form-control" name="author_first_name" area-describility="author_first_name" id="author_first_name" value="<?php echo $row["author_first_name"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="author_last_name" class="form-label">Author Last Name</label>
        <input type="text" class="form-control" name="author_last_name" area-describility="author_last_name" id="author_last_name" value="<?php echo $row["author_last_name"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publisher_name" class="form-label">Publisher Name</label>
        <input type="text" class="form-control" name="publisher_name" area-describility="publisher_name" id="publisher_name" value="<?php echo $row["publisher_name"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publisher_address" class="form-label">Publisher Address</label>
        <input type="text" class="form-control" name="publisher_address" area-describility="publisher_address" id="publisher_address" value="<?php echo $row["publisher_address"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publish_date" class="form-label">Publish Date</label>
        <input type="text" class="form-control" name="publish_date" area-describility="publish_date" id="publish_date" value="<?php echo $row["publish_date"]; ?>" />
      </div>
      <div class="mb-3 mt-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" name="status" area-describility="status" id="status" value="<?php echo $row["status"]; ?>" />
      </div>
      <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
    </form>
  </div>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>