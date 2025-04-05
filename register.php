<?php
// register.php
session_start();

require 'config.php';

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname   = trim($_POST['firstname']);
    $lastname    = trim($_POST['lastname']);
    $email       = trim($_POST['email']);
    $phonenumber = trim($_POST['phonenumber']);
    $passwordInput = trim($_POST['password']);

    // Check if a user with the same email already exists
    $query = "SELECT COUNT(*) FROM users2 WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if($count > 0) {
        $errorMessage = "An account with this email already exists.";
    } else {
        // Insert new user record into the database
        $query = "INSERT INTO users2 (firstname, lastname, email, phonenumer, [password]) VALUES (:firstname, :lastname, :email, :phonenumber, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phonenumber', $phonenumber);
        $stmt->bindParam(':password', $passwordInput);
        
        if($stmt->execute()) {
            $successMessage = "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            $errorMessage = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if($errorMessage != ""): ?>
        <p style="color:red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <?php if($successMessage != ""): ?>
        <p style="color:green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <form method="post" action="register.php">
        <label>First Name:</label>
        <input type="text" name="firstname" required><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" required><br>
        <label>Email:</label>
        <input type="text" name="email" required><br>
        <label>Phone Number:</label>
        <input type="text" name="phonenumber"><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>
