<?php
include('db_connect.php');

$patient_id = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
}

$sql = "SELECT * FROM medical_records WHERE patient_id LIKE ?";
$stmt = $conn->prepare($sql);
$search_param = "%" . $patient_id . "%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Patient ID</th>
                    <th>Date</th>
                    <th>Condition</th>
                    <th>Doctor</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["record_id"] . "</td>
                <td>" . $row["patient_id"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["conditions"] . "</td>
                <td>" . $row["doctor"] . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
   
    echo "<p>No records found</p>";
}

$stmt->close();
$conn->close();
?>
