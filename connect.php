<?php
$servername = "localhost";
$database = "uploads";
$username = "root";
$password = "";

// Correct mysqli constructor usage
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
?>
