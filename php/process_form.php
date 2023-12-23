<?php
// Establish database connection (replace with your credentials)
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
    $inquiry = $_POST['inquiry-input'];

    // Prepare SQL statement to insert data into the inquiries table
    $sql = "INSERT INTO inquiries (name, email, inquiry) VALUES ('$name', '$email', '$inquiry')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
