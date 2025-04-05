<?php
// welcome.php
session_start();

// If the user is not logged in, redirect to login page
if(!isset($_SESSION['UserName'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['UserName']); ?>!</h2>
    <p><a href="logout.php">Sign Out</a></p>
</body>
</html>
