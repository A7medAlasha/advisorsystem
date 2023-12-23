<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $user_type = $_POST['userType'];

    $servername = "BOGA"; // Change this to your server name
    $username = "admin"; // Change this to your database username
    $password = "password"; // Change this to your database password
    $dbname = "AcademicAdvisingDB"; // Change this to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Adjust the table names as per your database structure
    $table_name = ($user_type == 'student') ? 'students' : 'advisors';

    $sql = "SELECT * FROM $table_name WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Valid login - Redirect to respective dashboard based on user type
        if ($user_type == 'student') {
            header("../pages/Student Dashboard.html");
        } else if ($user_type == 'advisor') {
            header( "Advisor Dashboard.html");
        }
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>
