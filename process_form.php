<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $first_name = purge_data($_POST['fname']);
    $last_name = purge_data($_POST['lname']);
    $gender = purge_data($_POST['gender']);
    $email = purge_data($_POST['email']);
    $stack = purge_data($_POST['stack']);

    // Display the sanitized input
    echo "<h2>Good Afternoon " . $first_name . " " . $last_name . "</h2>";
    echo "<p>Gender: " . $gender . "</p>";
    echo "<p>Email: " . $email . "</p>";
    echo "<p>Stack: " . $stack . "</p>";
}

// Function to sanitize input data
function purge_data($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;  // Return the sanitized data
}
?>
