<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM complaints WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<h2>Your Complaints</h2>
<table border="1">
    <tr>
        <th>Message</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['message'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>