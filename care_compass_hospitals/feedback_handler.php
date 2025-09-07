<?php

include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comments = $_POST['comments'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO feedback (name, comments, rating) 
            VALUES ('$name', '$comments', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
