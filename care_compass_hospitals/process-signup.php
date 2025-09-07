<?php
session_start();
include 'db_connect.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        die("All fields are required.");
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if ($conn === false) {
        die("ERROR: Could not connect to the database.");
    }
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error: Could not prepare the query. " . $conn->error);
    }
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Signup successful!";
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>
