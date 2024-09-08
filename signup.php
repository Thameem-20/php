<?php
$server = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "trip";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the password before storing it
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Check if the username already exists
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already exists!";
} else {
    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_pass')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
