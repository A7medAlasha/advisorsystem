<?php
// Perform database connection (using provided admin credentials for demonstration)
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "AcademicAdvisingDB"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch evaluation data (assuming 'evaluations' as the table name)
$sql = "SELECT student_name, reviewer_name, evaluation_date, score, comments FROM evaluations";
$result = $conn->query($sql);

// Return JSON response of evaluation data
$evaluations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $evaluations[] = $row;
    }
}

echo json_encode($evaluations);

$conn->close();
?>
