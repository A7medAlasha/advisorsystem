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
    $advisor = $_POST['advisor-input'];
    $rating = $_POST['rating-input'];
    $comment = $_POST['comment-input'];

    // Prepare SQL statement to insert evaluation into a table (e.g., evaluations)
    $sql = "INSERT INTO evaluations (name, email, advisor, rating, comment)
            VALUES ('$name', '$email', '$advisor', '$rating', '$comment')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Evaluation recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
