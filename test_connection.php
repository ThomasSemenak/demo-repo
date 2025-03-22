<?php
// Azure SQL Database connection details
$serverName = "mysqlserverjadentest.database.windows.net";
$connectionOptions = array(
    "Database" => "master",
    "Uid" => "azureuser",
    "PWD" => "password@1",
    "TrustServerCertificate" => true
);

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection and output result
if ($conn) {
    echo "yes";
} else {
    echo "no";
}
?>
