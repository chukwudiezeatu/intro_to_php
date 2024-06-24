<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $email = $age = "";
    $nameErr = $emailErr = $ageErr = "";

    // Validate Name
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        $name = purge_data($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = purge_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Age
    if (empty($_POST['age'])) {
        $ageErr = "Age is required";
    } else {
        $age = purge_data($_POST['age']);
        if (!is_numeric($age)) {
            $ageErr = "Only numbers allowed";
        }
    }

    // Display Errors or Process the Data
    if ($nameErr || $emailErr || $ageErr) {
        echo "<h2>Form Errors</h2>";
        echo "<p>$nameErr</p>";
        echo "<p>$emailErr</p>";
        echo "<p>$ageErr</p>";
    } else {
        echo "<h2>Thank you, $name</h2>";
        echo "<p>Your email is $email</p>";
        echo "<p>Your age is $age</p>";
    }
}

// Function to sanitize input data
function purge_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
