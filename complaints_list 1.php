<?php
include 'db.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';

if ($role == 'admin') {
    $sql = "SELECT * FROM complaints";
} elseif ($role == 'patient') {
    $sql = "SELECT * FROM complaints WHERE user_id = $user_id";
} else {
    echo "Access denied.";
    exit();
}

$result = $conn->query($sql);
?>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Message</th>
        <th>Status</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['department'] ?></td>
        <td><?= $row['message'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>