<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patient_name = $_POST['patient_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$complaint_type = $_POST['complaint_type'];
$description = $_POST['description'];
$urgency = $_POST['urgency'];

// Handle file upload
$file_upload = "";
if (!empty($_FILES['file_upload']['name'])) {
    $target_dir = "uploads/";
    $file_upload = $target_dir . basename($_FILES["file_upload"]["name"]);
    move_uploaded_file($_FILES["file_upload"]["tmp_name"], $file_upload);
}

$sql = "INSERT INTO complaints (patient_name, email, phone, department, complaint_type, description, file_upload, urgency) 
        VALUES ('$patient_name', '$email', '$phone', '$department', '$complaint_type', '$description', '$file_upload', '$urgency')";

if ($conn->query($sql) === TRUE) {
    echo "Complaint submitted successfully. <a href='complaints_list.php'>View Complaints</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
