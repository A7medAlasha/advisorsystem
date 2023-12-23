<?php
// Fetch and display inquiries from the database here
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

// Fetch inquiries from the database and display in table rows
$sql = "SELECT * FROM Inquiries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Inquiry"] . "</td>";
        echo "<td>" . $row["Status"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No inquiries found.</td></tr>";
}

// Close database connection
$conn->close();
?>