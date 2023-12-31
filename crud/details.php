<?php
session_start();
// Including the database connection file
require_once "../db_connect.php";

// Getting the 'id' parameter from the URL using GET method
$id = $_GET["x"];

// Query to fetch the record with the specified 'id' from the database
$sql = "SELECT * FROM animals WHERE id = $id";
$result = mysqli_query($connect, $sql);

// Checking if the query was successful and fetching the row data
if ($result) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "Error in SQL query: " . mysqli_error($connect);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pets Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home.php">Pets Details</a>
      <li class="nav-item">
        <a class="nav-link" href="../senior.php">Seniors</a>
      </li>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
          </li>
          <!-- MJ Trick -->
          <?php if (isset($_SESSION["adm"])) { ?>
            <li class="nav-item">
              <a class="nav-link active" href="create.php">Add family-member</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->

  <!-- Media details table -->
  <div class="container mt-4">
    <table class="table table-bordered" style="background-color: #f8f9fa; text-align: center;">
      <h1 style="text-align: center; margin-bottom: 30px;">Details about pets:</h1>
      <!-- Displaying media details in table rows -->
      <tr>
        <th>Picture:</th>
        <td><img src="<?= $row['picture'] ?>" alt="Animal Picture" style="width: 100px; height: 100px;"></td>
      </tr>
      <tr>
        <th>Name:</th>
        <td><?= $row["name"] ?></td>
      </tr>
      <tr>
        <th>Species</th>
        <td><?= $row["species"] ?></td>
      </tr>
      <tr>
        <th>Age:</th>
        <td><?= $row["age"] ?></td>
      </tr>
      <tr>
        <th>Size:</th>
        <td><?= $row["size"] ?></td>
      </tr>
      <tr>
        <th>Vaccinated:</th>
        <td><?= $row["vaccinated"] ?></td>
      </tr>
      <tr>
        <th>Status:</th>
        <td>
          <?= $row["status"] ?></td>
      </tr>
      <tr>
        <th>Location:</th>
        <td><?= $row["location"] ?></td>
      </tr>
    </table>
  </div>

  <!-- Bootstrap JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>