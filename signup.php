<?php
// signup.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    // Database connection details
    $servername = "127.0.0.1";  // Use "localhost" or the IP address of your MySQL server
    $username = "root";
    $password = "";
    $dbname = "medicine";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Add/Edit User operation
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = isset($_POST["GENDER"]) ? $_POST["GENDER"] : null;


        // Add new user
        $sql = "INSERT INTO signup (name, mobile, email, dob, username, password, gender) VALUES ('$name', '$mobile', '$email', '$dob', '$username', '$password', '$gender')";
   

    if ($conn->query($sql) !== TRUE) {
        // Handle the error if needed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Fetch user details from the database
    $sql = "SELECT * FROM signup";
    $result = $conn->query($sql);

    // Handle Delete User operation
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {
        $id = $_GET["delete"];
        // Delete user from the database
        $sql = "DELETE FROM signup WHERE id=$id";
        if ($conn->query($sql) !== TRUE) {
            // Handle the error if needed
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
} else {
    // Form was not submitted, redirect or handle accordingly
    // You may want to redirect to the home page or display an error message
    header("Location: index.html");
    exit(); // Ensure that the script stops executing after redirection
}
?>


