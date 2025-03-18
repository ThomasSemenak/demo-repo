<?php
$host = 'mysqltry250.mysql.database.azure.com';
// Update the username to include the server name
$username = 'admin505';
$password = '@Testing2';
$db_name = 'mysqltry250';
$port = 3306;

// Initialize the MySQLi connection
$conn = mysqli_init();
if (!$conn) {
    die("mysqli_init failed");
}

// Set the path to the certificate file
// Assuming the certificate is stored in a 'certs' folder at the project root
$certPath = __DIR__ . "/DigiCertGlobalRootCA.crt.pem";
mysqli_ssl_set($conn, NULL, NULL, $certPath, NULL, NULL);

// Connect using SSL
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Run the create table query
$createTableQuery = "
    CREATE TABLE Products (
        `Id` INT NOT NULL AUTO_INCREMENT,
        `ProductName` VARCHAR(200) NOT NULL,
        `Color` VARCHAR(50) NOT NULL,
        `Price` DOUBLE NOT NULL,
        PRIMARY KEY (`Id`)
    );
";

if (mysqli_query($conn, $createTableQuery)) {
    printf("Table created\n");
} else {
    printf("Error creating table: %s\n", mysqli_error($conn));
}

// Close the connection
mysqli_close($conn);
?>
