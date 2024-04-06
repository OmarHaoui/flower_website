<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tp_project_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Use this connection object ($conn) in your other PHP scripts
