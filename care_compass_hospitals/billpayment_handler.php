<?php
include('db_connect.php'); 

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patientID = htmlspecialchars($_POST['patientID']);
    $patientName = htmlspecialchars($_POST['patientName']);
    $invoiceNo = htmlspecialchars($_POST['invoiceNo']);
    $amount = htmlspecialchars($_POST['amount']);
    $paymentMethod = htmlspecialchars($_POST['paymentMethod']);

    $stmt = $conn->prepare("INSERT INTO billPayments (patientID, patientName, invoiceNo, amount, paymentMethod) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $patientID, $patientName, $invoiceNo, $amount, $paymentMethod);

    if ($stmt->execute()) {
        echo "Payment processed successfully.";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
