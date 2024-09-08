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

// Check if user exists
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if (password_verify($pass, $row['password'])) {
        // Start session and redirect to trip.php
        session_start();
        $_SESSION['username'] = $user;
        header("Location: trip.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User does not exist!";
}
$conn->close();
?>
