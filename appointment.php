<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $doctor = $_POST['doctor'];
    $appointmentDate = $_POST['appointmentDate'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'hospital_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert appointment into database
    $sql = "INSERT INTO appointments (name, doctor, appointmentDate) VALUES ('$name', '$doctor', '$appointmentDate')";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
