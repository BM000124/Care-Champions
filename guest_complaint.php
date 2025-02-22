<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complaints (guest_name, guest_email, message) 
            VALUES ('$guest_name', '$guest_email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>