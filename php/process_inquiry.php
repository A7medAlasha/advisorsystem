<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the inquiry text from the form
    $inquiryText = $_POST['inquiryText'];

    // Save inquiry to a text file (you might use a database in a real scenario)
    $file = 'inquiries.txt';
    $currentData = file_get_contents($file);
    $currentData .= "Inquiry: " . $inquiryText . "\n";
    file_put_contents($file, $currentData);

    // Redirect back to inquiries page after submission
    header("Location: inquiriesstore.html");
    exit();
}
?>
