<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM complaints ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Complaint Records</h2>

    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Type</th>
                <th>Status</th>
                <th>Urgency</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['patient_name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['department'] ?></td>
                <td><?= $row['complaint_type'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['urgency'] ?></td>
                <td><a href="update_complaint.php?id=<?= $row['id'] ?>">Update</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No complaints found.</p>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>