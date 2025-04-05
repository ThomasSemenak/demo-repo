<?php
// aboutus.php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['UserName'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
</head>
<body>
    <!-- Include the common header -->
    <?php include 'header.php'; ?>

    <!-- Main content area -->
    <h2>This is the About Us page</h2>
</body>
</html>
