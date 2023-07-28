<?php
require_once "../db_connect.php";

if (isset($_POST["Add family_member"])) {
  $name = $_POST["name"];
  $species = $_POST["species"];
  $age = $_POST["age"];
  $size = $_POST["size"];
  $picture = $_POST(["picture"]);
  $vaccinated = $_POST["vaccinated"];
  $status = $_POST["status"];
  $location = $_POST["location"];

  // Using prepared statement to avoid SQL injection
  $stmt = $connect->prepare("INSERT INTO `animals` (`name`, `species`, `age`, `size`, `picture`, `vaccinated`, `status`, `location`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $name, $species, $age, $size, $picture[0], $vaccinated, $status, $location);


  if ($stmt->execute()) {
    echo "<div class ='alert alert-success' role='alert'>New record has been Add family_memberd</div>";
    // header("refresh: 3; url=home.php");
  } else {
    echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
  }

  $stmt->close();
  $connect->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Add New Pets</title>
  <style>
    body {
      font-size: 16px;
    }

    .navbar {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 30px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-group button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 14px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 18px;
    }

    .form-group button[type="submit"]:hover {
      background-color: #0056b3;
    }

    .form-group .input-group-addon {
      background-color: #f8f9fa;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 4px;
      font-size: 15px;
    }

    .small-placeholder::placeholder {
      font-size: 12px;
    }
  </style>
</head>

<!-- navbar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../home.php">My Pets</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION["user"])) { ?>
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar ends -->

<body>
  <div class="container mt-5">
    <h2>Add New Pets</h2>
    <form method="post">
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" name="name" area-describility="name" id="name" />
      </div>
      <div class="mb-3 mt-3">
        <label for="species" class="form-label">species</label>
        <input type="text" class="form-control" id="species" name="species" />
      </div>
      <div class="mb-3 mt-3">
        <label for="age" class="form-label">age</label>
        <input type="text" class="form-control" id="age" name="age" />
      </div>
      <div class="mb-3 mt-3">
        <label for="size" class="form-label">size</label>
        <input type="text" class="form-control" id="size" name="size" />
      </div>

      <div class="mb-3 mt-3">
        <label for="picture" class="form-label">picture</label>
        <input type="text" class="form-control" name="picture" area-describility="picture" id="picture" />
      </div>
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
        <input type="text" class="form-control" name="status" area-describility="status" id="status" />
      </div>
      <div class="mb-3 mt-3">
        <label for="location" class="form-label">location</label>
        <input type="text" class="form-control" name="location" area-describility="location" id="location" />
      </div>

      <button type="submit" name="Add family_member" class="btn btn-primary">Add family_member</button>
    </form>
  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>