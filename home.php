<?php
session_start();
require_once "db_connect.php";

// Check if the user is logged in
if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
  header("Location: login.php"); // Redirect to the login page if not logged in
  exit();
}

// If the user is an administrator, redirect them to the dashboard
if (isset($_SESSION["adm"])) {
  header("Location: dashboard.php");
  exit();
}

// Fetch the user's information from the database using their email (assuming you have the email stored in the session)
if (isset($_SESSION["user"])) {
  $email = $_SESSION["user"];
  $sqlUser = "SELECT first_name, last_name, email, picture FROM users WHERE email = '$email'";
  $resultUser = mysqli_query($connect, $sqlUser) or die(mysqli_error($connect));
  $userData = mysqli_fetch_assoc($resultUser);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Adoption</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
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
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto"> <!-- Add ml-auto class here -->
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout.php?logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- navbar ends -->

  <!-- Displaying the user's information -->
  <?php if (isset($_SESSION["user"])) : ?>
    <div class="container mt-3">
      <div class="row">
        <div class="col">
          <div class="alert alert-success" role="alert">
            Welcome <?php echo $userData["first_name"] . " " . $userData["last_name"]; ?>!
            Your email: <?php echo $userData["email"]; ?>
          </div>
          <img src="<?php echo $userData["picture"]; ?>" alt="Profile Picture" width="100" height="100">
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Echoing the generated layout of media items -->
  <div>
    <?php echo $layout; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>