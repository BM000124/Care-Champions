<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "NULL";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complaints (user_id, name, email, department, message) 
            VALUES ($user_id, '$name', '$email', '$department', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully. <a href='complaints_list 1.php'>View Complaints</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Department:</label>
    <select name="department">
        <option value="Cardiology">Cardiology</option>
        <option value="Neurology">Neurology</option>
        <option value="Emergency">Emergency</option>
    </select>
    
    <label>Complaint:</label>
    <textarea name="message" required></textarea>
    
    <button type="submit">Submit Complaint</button>
</form>