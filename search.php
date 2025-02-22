<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $specialty = $conn->real_escape_string($_POST['specialty']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO specialists (name, specialty, location, description) 
            VALUES ('$name', '$specialty', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New specialist added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $limit = 5000; // Number of results per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM specialists 
        WHERE name LIKE '%$search_query%' 
        OR specialty LIKE '%$search_query%' 
        OR location LIKE '%$search_query%' 
        LIMIT $limit OFFSET $offset";
        $total_sql = "SELECT COUNT(*) FROM specialists WHERE name LIKE '%$search_query%' OR specialty LIKE '%$search_query%' OR location LIKE '%$search_query%'";
        $total_result = $conn->query($total_sql);
        $total_rows = $total_result->fetch_array()[0];
        $total_pages = ceil($total_rows / $limit);
        
        echo "<div style='margin-top: 20px;'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='search.php?search=$search_query&page=$i' style='margin: 5px; text-decoration: none; padding: 5px 10px; border: 1px solid black;'>$i</a>";
        }
        echo "</div>";
        $stmt = $conn->prepare("SELECT * FROM specialists WHERE name LIKE ? OR specialty LIKE ? OR location LIKE ? LIMIT ? OFFSET ?");
$search_param = "%$search_query%";
$stmt->bind_param("sssii", $search_param, $search_param, $search_param, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT
);
INSERT INTO departments (name, description) VALUES
('Cardiology', 'Deals with heart conditions and diseases.'),
('Neurology', 'Specializes in nervous system disorders.'),
('Orthopedics', 'Handles musculoskeletal conditions.'),
('General Surgery', 'Performs various surgical procedures.'),
('Pediatrics', 'Takes care of children’s health.'),
('Emergency Medicine', 'Handles life-threatening emergencies.');
ALTER TABLE specialists ADD COLUMN department_id INT;
ALTER TABLE specialists ADD FOREIGN KEY (department_id) REFERENCES departments(id);
UPDATE specialists SET department_id = 1 WHERE specialty IN ('Cardiologist', 'Cardiothoracic Surgeon');
UPDATE specialists SET department_id = 2 WHERE specialty IN ('Neurologist', 'Neurosurgeon');
UPDATE specialists SET department_id = 3 WHERE specialty IN ('Orthopedic Surgeon', 'Rheumatologist');
UPDATE specialists SET department_id = 4 WHERE specialty IN ('General Surgeon', 'Plastic Surgeon');
UPDATE specialists SET department_id = 5 WHERE specialty IN ('Pediatrician', 'Neonatologist');
UPDATE specialists SET department_id = 6 WHERE specialty IN ('Emergency Medicine Physician', 'Trauma Surgeon');
SELECT s.name AS Specialist_Name, s.specialty, s.location, d.name AS Department
FROM specialists s
JOIN departments d ON s.department_id = d.id
ORDER BY d.name, s.name;
DELIMITER $$

CREATE PROCEDURE SearchSpecialists(
    IN search_term VARCHAR(255)
)
BEGIN
    SELECT s.name AS Specialist_Name, s.specialty, s.location, d.name AS Department
    FROM specialists s
    JOIN departments d ON s.department_id = d.id
    WHERE s.name LIKE CONCAT('%', search_term, '%')
       OR s.specialty LIKE CONCAT('%', search_term, '%')
       OR s.location LIKE CONCAT('%', search_term, '%')
    ORDER BY s.name;
END $$

DELIMITER ;
CALL SearchSpecialists('Cardiology');
CREATE TABLE specialist_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    specialist_name VARCHAR(255),
    specialty VARCHAR(255),
    location VARCHAR(255),
    action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
DELIMITER $$

CREATE TRIGGER LogNewSpecialist
AFTER INSERT ON specialists
FOR EACH ROW
BEGIN
    INSERT INTO specialist_logs (specialist_name, specialty, location)
    VALUES (NEW.name, NEW.specialty, NEW.location);
END $$

DELIMITER ;
SELECT * FROM specialist_logs ORDER BY action_time DESC;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'doctor', 'staff') NOT NULL DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash password securely
$admin_password = password_hash("Admin@123", PASSWORD_BCRYPT);

// Insert admin user
$sql = "INSERT INTO users (username, password, role) VALUES ('admin', '$admin_password', 'admin')";
if ($conn->query($sql) === TRUE) {
    echo "Admin user created successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Specialist</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { width: 50%; margin: auto; }
        input, textarea, select, button { width: 100%; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>
    <h2>Add a New Specialist</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="specialty" placeholder="Specialty" required>
        <select name="location" required>
            <option value="">Select Location</option>
            <option value="Yaoundé">Yaoundé</option>
            <option value="Douala">Douala</option>
            <option value="Buea">Buea</option>
            <option value="Bamenda">Bamenda</option>
            <option value="Limbe">Limbe</option>
            <option value="North">North</option>
            <option value="Far North">Far North</option>
        </select>
        <textarea name="description" placeholder="Specialist Description" required></textarea>
        <button type="submit">Add Specialist</button>
    </form>
</body>
</html>