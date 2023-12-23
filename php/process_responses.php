<?php
// Establish database connection with provided credentials
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "AcademicAdvisingDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name-input'];
    $email = $_POST['email-input'];
    $response = $_POST['inquiry-input'];

    // Prepare SQL statement to update the inquiries table with the response
    $sql = "UPDATE inquiries SET response='$response' WHERE name='$name' AND email='$email'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Response recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
