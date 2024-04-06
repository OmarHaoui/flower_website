<?php
include("connection.php"); // Include connection details

// Get form data
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"]; // Handle optional email

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username already exists (optional security measure)
$sql_check = "SELECT * FROM users WHERE username='$username'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "Username already exists. Please choose a different one.";
} else {
    // Prepare SQL statement for insertion (use prepared statements for better security)
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind values to prevent SQL injection (if using prepared statements)
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $email);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt); // Close prepared statement (if used)
}

mysqli_close($conn); // Close connection
