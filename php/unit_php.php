<?php
// process.php

// Simulating form submission processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form field named 'inputField' was sent
    if (isset($_POST['inputField'])) {
        // Retrieving the form field value
        $inputData = $_POST['inputField'];

        // Simulating server-side processing (e.g., saving data to a database)
        // For demonstration, here, let's just simulate saving to a file
        $file = 'data.txt';
        $dataToWrite = "Received data: " . $inputData . "\n";

        // Writing data to a file
        if (file_put_contents($file, $dataToWrite, FILE_APPEND | LOCK_EX) !== false) {
            echo "Data saved successfully!";
        } else {
            echo "Error: Unable to save data.";
        }
    } else {
        echo "Error: No input field received.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
