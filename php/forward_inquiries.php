<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name-input'];
    $email = $_POST['email-input'];
    $inquiry = $_POST['inquiry-input'];

    // Handling departments
    if (isset($_POST['department']) && is_array($_POST['department']) && !empty($_POST['department'])) {
        $selectedDepartments = $_POST['department'];

        // Process each selected department
        foreach ($selectedDepartments as $department) {
            // Here you can perform actions for each selected department,
            // such as forwarding the inquiry to the corresponding department email, database insertion, etc.
            echo "Inquiry forwarded to $department <br>";
        }
    } else {
        echo "Please select at least one department";
    }

    // Here, you can perform additional actions like forwarding the inquiry to department emails, storing in a database, etc.
    // Display a success message or perform necessary actions based on your requirements
}
?>
