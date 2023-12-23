<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "YourDatabaseName";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch inquiry data from the database (assuming 'inquiries' as the table name)
$sql = "SELECT * FROM inquiries";
$result = $conn->query($sql);

// Store inquiry data in an array
$inquiries = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $inquiries[] = $row;
    }
}

// Close the connection
$conn->close();

// Return inquiry data as JSON
echo json_encode($inquiries);
?>
