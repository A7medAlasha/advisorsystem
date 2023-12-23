<?php
// Establish database connection
$servername = "localhost"; // Change this to your server name
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password
$dbname = "AcademicAdvisingDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>