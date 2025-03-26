<?php
session_start();
$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";

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
    
    // Prepare and execute the query
    $tsql = "SELECT * FROM Users WHERE username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    
    if ($stmt === false) {
         header("Location: " . $base_url . "index.php?error=sqlerror");
         exit();
    }
    
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
         // Verify the password using password_verify()
         if (password_verify($password, $row['password'])) {
              // Successful login: set session variables
              $_SESSION['user_id'] = $row['id']; // Adjust field names as needed
              $_SESSION['username'] = $row['username'];
              $_SESSION['profile_pic'] = $row['profile_pic'] ?? 'default-profile-pic.png';
              
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
