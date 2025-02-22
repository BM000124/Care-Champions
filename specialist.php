<?php
$servername = "localhost";
$username = "root"; // Change if using a different database user
$password = "";
$database = "hospital_db";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query from form
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM specialists WHERE 
        name LIKE '%$searchQuery%' OR 
        specialty LIKE '%$searchQuery%' OR 
        location LIKE '%$searchQuery%'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Search Results</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='specialist-card'>";
            echo "<img src='" . $row['profile_image'] . "' alt='Profile Picture'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p><strong>Specialty:</strong> " . $row['specialty'] . "</p>";
            echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No specialists found.</p>";
    }

    $conn->close();
    ?>

</body>
</html>