<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];  // Role: patient, staff, or admin

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
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
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <label>Role:</label>
    <select name="role">
        <option value="patient">Patient</option>
        <option value="staff">Hospital Staff</option>
        <option value="admin">Administrator</option>
    </select>
    
    <button type="submit">Register</button>
</form>