<?php
// login.php

// Database connection details
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "medicine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Login operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, login successful
        echo "Login successful!";
    } else {
        // User not found or incorrect credentials
        echo "Invalid username or password";
    }
}

// Placeholder for Edit, Delete, and Add operations
// Add your code here as needed

$conn->close();
?>



