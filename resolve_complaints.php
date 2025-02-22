
<td><?= $row['message'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
📌 Step 7: Staff Resolving Complaints
Staff can update complaints.

🛠 Create resolve_complaints.php
php
Copy
Edit
<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'staff') {
    die("Access denied.");
}

$sql = "SELECT * FROM complaints WHERE status='Pending'";
$result = $conn->query($sql);
?>

<h2>Pending Complaints</h2>
<table border="1">
    <tr>
        <th>Message</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['message'] ?></td>
        <td>
            <a href="mark_resolved.php?id=<?= $row['id'] ?>">Mark as Resolved</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>