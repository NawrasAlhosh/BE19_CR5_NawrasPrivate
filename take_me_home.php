<?php
require_once "db_connect.php";

session_start();

if (isset($_SESSION["adm"])) {
  header("Location: dashboard.php");
}

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
  header("Location: register.php");
}

$id = $_GET["i"];
if (isset($_POST["adopt_pet"])) {
  $adoption_date = $_POST["adoption_date"];
  $user_id = $_SESSION["user"];
  $pet_id = $_POST["pet_id"];

  $sql = "INSERT INTO `pet_adoption`(`user_id`, `pet_id`, `adoption_date` ) VALUES ('$user_id','$pet_id', '$adoption_date')";

  if (mysqli_query($connect, $sql)) {
    echo "<div class='alert alert-success' role='alert'>
        You have adopted a dog!";
    header("refresh:3; url=home.php");
  } else {
    echo "Error adopting the pet. Try later";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Adopt a Pet</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    form {
      max-width: 400px;
      margin: 0 auto;
    }

    .mb-3 {
      margin-bottom: 20px;
    }

    .btn-outline-success.btn-lg {
      padding: 12px 24px;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form method="POST" class="p-4 border rounded shadow-sm">
      <div class="mb-3">
        <label for="ownerName" class="form-label">Name of Future Owner</label>
        <input type="text" class="form-control" id="ownerName" name="user_id">
      </div>
      <div class="mb-3">
        <label for="petName" class="form-label">Name of the Pet</label>
        <input type="text" class="form-control" id="dogName" name="pet_id" value="<?= $id ?>">
      </div>
      <div class="mb-3">
        <label for="pickupDate" class="form-label">Date of Pick Up</label>
        <input type="date" class="form-control" id="pickupDate" name="adoption_date" placeholder="yyyy-mm-dd">
      </div>

      <button type="submit" name="adopt_pet" class="btn btn-outline-success btn-lg btn-block">Take me home</button>
    </form>
  </div>
</body>

</html>