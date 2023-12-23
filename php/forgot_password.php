<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Connection to the database
    $servername = "localhost";
    $username = "admin";
    $password = "password";
    $dbname = "AcademicAdvisingDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists in your user database (replace 'users' with your actual table name)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "Email not found";
        exit;
    }

    // Generate a unique token and store it in the database
    $token = bin2hex(random_bytes(32)); // Generating a secure token
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set token expiry time

    $updateStmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
    $updateStmt->bind_param("sss", $token, $expiry, $email);
    $updateStmt->execute();

    // Send an email with a link containing the token to the user's email address
    $to = $email;
    $subject = "Password Reset Request";
    $message = "Please click on the link below to reset your password:\n\n";
    $message .= "https://yourwebsite.com/reset_password.php?token=$token";
    $headers = "From: your_email@example.com";

    mail($to, $subject, $message, $headers);

    echo "Password reset instructions sent to your email";

    $conn->close();
}
?>
