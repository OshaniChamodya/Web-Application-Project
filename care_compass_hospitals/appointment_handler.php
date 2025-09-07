<?php
include('db_connect.php'); 

if ($conn === null || $conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $doctor = htmlspecialchars($_POST['doctor']);
    $date = htmlspecialchars($_POST['date']);

    $stmt = $conn->prepare("INSERT INTO appointments (PatientName, Email, Doctor, AppoinmentDate) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $doctor, $date);

    if ($stmt->execute()) {
        echo "Appointment booked successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
