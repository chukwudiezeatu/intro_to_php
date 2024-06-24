<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Form</title>
</head>
<body>
   
    
    <!-- HTML Form -->
    <form method="post" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="stack">Stack:</label>
        <input type="text" id="stack" name="stack" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
           
            margin: 10;
        }
        .container {
            height: 100vh;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>

<?php
    // Check if the form is submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
    function purge_data($inputData){
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;  // Return the sanitized data
    }
    ?>
</body>
</html>
