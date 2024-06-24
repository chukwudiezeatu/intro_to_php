<?php
    //define variables and set them to empty strings
    $fnameErr = $lnameErr = $emailErr = $passwordErr = $genderErr = $websiteErr = $stateErr = "";
    $fname = $lname = $email = $password = $gender = $website = $state = "";
    function sanitizeData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['fname'])){
            $fnameErr = "First  is required";
        }
        else{
            $fname = sanitizeData($_POST['fname']);

            if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                $fnameErr = "Only letters and white space allowed";
            }
        }
        if(empty($_POST['lname'])){
            $lnameErr = "Last Name is required";

            if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
                $lnameErr = "Only letters and white space allowed";
            }
        }
        else{
            $lname = sanitizeData($_POST['lname']);
        }
        if(empty($_POST['email'])){
            $emailErr = "Email is required";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
       
        else{
            $email = sanitizeData($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email";
            }
        }
        if(empty($_POST['password'])){
            $passwordErr = "Password is required";
        }
        else{
            $password = sanitizeData($_POST['password']);
        }
        if(empty($_POST['gender'])){
            $genderErr = "";
        }
        else{
            $gender = sanitizeData($_POST['gender']);
        }
        if(empty($_POST['website'])){
            $websiteErr = "";
        }
        else{
            $website = sanitizeData($_POST['website']);
        }
        if(empty($_POST['state'])){
            $stateErr = "State is required";
        }
        else{
            $state = sanitizeData($_POST['state']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<style>

    .required {
        color: red;
    } 
</style>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="fname">First Name</label><span class="required">*</span><br>
        <input type="text" name="fname" id="fname"><span class="required"><?php echo $fnameErr ?></span><br><br>


        <label for="lname">Last Name</label><span class="required">*</span><br>
        <input type="text" name="lname" id="lname">
        <span class="required"><?php echo $lnameErr ?></span><br><br>


        <label for="email">Email</label><span class="required">*</span><br>
        <input type="text" name="email" id="email"><span class="required"><?php echo $emailErr ?></span><br><br>


        <label for="password">Password</label><span class="required">*</span><br>
        <input type="password" name="password" id="password"><span class="required"><?php echo $passwordErr ?></span><br><br>


        <p>Gender</p>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male"><br>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female"><br>
        <label for="others">Others</label>
        <input type="radio" name="gender" id="others" value="others"><span class="required"><?php echo $genderErr ?></span><br><br>


        <label for="website">Website</label><br>
        <input type="text" name="website" id="website"><span class="required"><?php echo $websiteErr ?></span><br><br>


        <label for="state">State</label><span class="required">*</span><br>
        <select name="state" id="state">
            <option value="" selected>Choose</option>
            <option value="Delta">Delta</option>
            <option value="Others">Others</option>
        </select>
        <span class="required"><?php echo $stateErr ?></span><br>


        <input type="submit" value="Register">
    </form>

    <h4><?php  echo $fname ?><h4>
    <h4><?php  echo $lname ?><h4>
    <h4><?php  echo $email ?><h4>
    <h4><?php  echo $gender ?><h4>
    <h4><?php  echo $website ?><h4>
    <h4><?php  echo $password ?><h4>
</body>
</html>