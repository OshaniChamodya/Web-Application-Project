<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("Both email and password are required.");
    }

    if ($conn === false) {
        die("ERROR: Could not connect to the database.");
    }
    
    $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE email = ?");

    if ($stmt === false) {
        die("Error: Could not prepare the query. " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password, $role);
    
    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['login_message'] = "Successfully logged in!";
            
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid password or Username.";
        }
    } else {
        echo "No account found with that email.";
    }
    
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>
