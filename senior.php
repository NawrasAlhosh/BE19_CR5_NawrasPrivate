<?php
// Include the database connection file
require_once "db_connect.php";

// Fetch senior animals from the database (older than 8 years)
$sql = "SELECT * FROM animals WHERE age > 8";
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
          echo "<td>" . $row['picture'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>