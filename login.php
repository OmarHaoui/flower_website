<?php
include("connection.php"); // Include connection details

// Get form data

$email = $_POST['email'];
$password = $_POST["password"];

// Hash the password (recommended for security)
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // Use a strong hashing algorithm

// SQL statement to check user credentials
$sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed_password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Login successful (redirect or display success message)
    echo "Login successful!"; // Replace with your desired action
} else {
    // Login failed (display error message)
    echo "Invalid username or password.";
}

mysqli_close($conn); // Close connection
