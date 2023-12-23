<?php
$error_message = '';

// Database configuration
$host = 'http://localhost:59038/';
$db_name = 'AcademicAdvisingDB';
$username = 'Admin';
$password = 'password';

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$http://localhost:59038/;dbname=$AcademicAdvisingDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    $error_message = 'Failed to connect to the database. Please try again later.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (e.g., check for empty fields, email format, etc.)
    if (empty($name) || empty($email) || empty($password)) {
        $error_message = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        try {
            // Check if email already exists in the database
            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $error_message = 'Email already registered. Please use a different email address.';
            } else {
                // Insert new user into the database
                $stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password); // Note: In practice, passwords should be hashed for security
                $stmt->execute();

                // Redirect to a success page or perform any other necessary actions
                header('Location: registration-success.php');
                exit();
            }
        } catch (PDOException $e) {
            // Handle database errors
            $error_message = 'Failed to register. Please try again later.';
        }
    }
}
?>
