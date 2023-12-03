<?php
$serverName = "ruthvik.mysql.database.azure.com";
$username = "ruthvik";
$password = "Password@123"; // Replace with your actual password
$databaseName = "ogtech";
$port = 3306;

// Create connection
$conn = mysqli_init();

// Set SSL options with the correct path to the CA certificate
mysqli_ssl_set($conn, NULL, NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);

// Establish the connection with SSL options
if (!$conn->real_connect($serverName, $username, $password, $databaseName, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
// Sample data for insertion
$username = "sample_user";
$pwd = "sample_password";
$email = "sample@example.com";

// Hash the password
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

// SQL query for insertion
$sql = "INSERT INTO Members (Username, Password, Email, PrivilegeLevel, Attempt, RegisteredDate)
        VALUES (?, ?, ?, ?, ?, ?);";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Default values
$privilegeLevel = 0;
$attempt = 3;
$registerDate = date("Y-m-d");

// Bind parameters
$stmt->bind_param("sssiis", $username, $hashedPwd, $email, $privilegeLevel, $attempt, $registerDate);

// Execute the statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
// Close the connection
$conn->close();
?>