<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search parameters
$specialization = $_GET['specialization'];
$location = $_GET['location'];

// SQL query to search doctors
$sql = "SELECT * FROM doctors WHERE specialization LIKE '%$specialization%' AND location LIKE '%$location%'";
$result = $conn->query($sql);

$doctors = [];
while ($row = $result->fetch_assoc()) {
    $doctors[] = $row;
}

echo json_encode($doctors);

$conn->close();
?>
