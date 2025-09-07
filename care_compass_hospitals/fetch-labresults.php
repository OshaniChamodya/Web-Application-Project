<?php
include('db_connect.php');

$patient_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['patient_id']) && !empty($_POST['patient_id'])) {
    $patient_id = htmlspecialchars($_POST['patient_id']);  

    if (!empty($patient_id)) {
        $sql = "SELECT * FROM lab_results WHERE Patient_id LIKE ?";
        $stmt = $conn->prepare($sql);

        $search_param = "%" . $patient_id . "%"; 
        $stmt->bind_param("s", $search_param);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <thead>
                        <tr>
                            <th>Result ID</th>
                            <th>Patient ID</th>
                            <th>Date</th>
                            <th>Test Name</th>
                            <th>Result Details</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["result_id"] . "</td>
                        <td>" . $row["Patient_id"] . "</td>
                        <td>" . $row["result_date"] . "</td>
                        <td>" . $row["test_name"] . "</td>
                        <td>" . $row["result_details"] . "</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No records found for the provided patient ID.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Please enter a Patient ID to search.</p>";
    }
} else {
    echo "<p>Invalid request or no Patient ID provided.</p>";
}

$conn->close();
?>
