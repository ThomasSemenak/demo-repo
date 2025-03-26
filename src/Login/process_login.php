<?php
session_start();
$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";

// Prevent caching during debugging (optional)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Database connection details
$serverName = "ts19cpsqldb.database.windows.net";
$connectionOptions = array(
    "Database" => "ts19cpdb3p96",
    "Uid" => "ts19cp",
    "PWD" => "@Group93p96",
    "TrustServerCertificate" => true
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        header("Location: " . $base_url . "index.php?error=emptyfields");
        exit();
    }
    
    // Query for the user
    $tsql = "SELECT * FROM Users WHERE username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    
    if ($stmt === false) {
         header("Location: " . $base_url . "index.php?error=sqlerror");
         exit();
    }
    
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
         if (password_verify($password, $row['password'])) {
              // Set session variables on successful login
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['profile_pic'] = $row['profile_pic'] ?? 'default-profile-pic.png';
              
              error_log("Login successful. Session: " . print_r($_SESSION, true));  // Debug logging
              
              header("Location: " . $base_url . "index.php");
              exit();
         } else {
              header("Location: " . $base_url . "index.php?error=wrongpassword");
              exit();
         }
    } else {
         header("Location: " . $base_url . "index.php?error=nouser");
         exit();
    }
}
?>
