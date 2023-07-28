<?php

// Database configuration
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "BE19_CR5_animal_adoption_Nawras";

// Create a connection
$connect = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
