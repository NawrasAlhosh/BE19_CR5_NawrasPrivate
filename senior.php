<?php
// Include the database connection file
require_once "db_connect.php";

// Fetch senior animals from the database (older than 8 years)
$sql = "SELECT * FROM animals WHERE age >= 8";
$result = mysqli_query($connect, $sql);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Senior Animals</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<!-- navbar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Animal Adoption</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php?logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar ends -->

<body>
  <div class="container">
    <h1 class="text-center">Senior Animals</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Size</th>
          <th>Name</th>
          <th>Species</th>
          <th>Age</th>
          <th>Picture</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['size'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['species'] . "</td>";
          echo "<td>" . $row['age'] . "</td>";
          echo "<td><img src='" . $row['picture'] . "' alt='Animal Picture' style='width: 100px; height: 100px;'></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>