<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM specialists ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Specialists</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Meet Our Specialists</h1>
    <div class="expert-container">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='expert-card'>
                <img src='{$row['profile_image']}' alt='{$row['name']}' class='profile-pic'>
                <h2>{$row['name']}</h2>
                <h3>{$row['specialty']}</h3>
                <p>{$row['description']}</p>
                <span class='location'>Location: {$row['location']}</span>
            </div>";
        }
        ?>
    </div>
</body>
</html>