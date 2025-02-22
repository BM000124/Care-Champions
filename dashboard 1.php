<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

echo "<h2>Welcome, " . $_SESSION['name'] . "</h2>";

if ($_SESSION['role'] == 'patient') {
    echo "<p><a href='view_complaints.php'>View My Complaints</a></p>";
} elseif ($_SESSION['role'] == 'staff') {
    echo "<p><a href='resolve_complaints.php'>Manage Complaints</a></p>";
} elseif ($_SESSION['role'] == 'admin') {
    echo "<p><a href='admin_dashboard.php'>Admin Dashboard</a></p>";
}
?>