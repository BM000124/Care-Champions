<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctors from database
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
$doctors = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

// Handle appointment form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
    $name = $_POST['name'];
    $doctor = $_POST['doctor'];
    $appointmentDate = $_POST['appointmentDate'];

    $stmt = $conn->prepare("INSERT INTO appointments (name, doctor, appointmentDate) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $doctor, $appointmentDate);

    if ($stmt->execute()) {
        $successMessage = "Appointment booked successfully!";
    } else {
        $errorMessage = "Error: " . $stmt->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compassion Care</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<!-- Header Section -->
<header>
    <div class="logo">
        <h1>Compassion Care</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#doctors">Find a Doctor</a></li>
            <li><a href="#appointments">Make an Appointment</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- Home Section -->
<section id="home">
    <div class="hero">
        <h2>Welcome to Compassion Care</h2>
        <p>Your health is our priority.</p>
        <a href="#appointments" class="cta-button">Book an Appointment</a>
    </div>
</section>

<!-- Doctors Section -->
<section id="doctors">
    <h2>Find a Doctor</h2>
    <form id="doctorSearchForm">
        <input type="text" id="specialization" placeholder="Search by specialization">
        <input type="text" id="location" placeholder="Search by location">
        <button type="submit">Search</button>
    </form>
    <div id="doctorResults">
        <?php
        if (count($doctors) > 0) {
            foreach ($doctors as $doctor) {
                echo "<p>" . $doctor['name'] . " - " . $doctor['specialization'] . "</p>";
            }
        } else {
            echo "<p>No doctors available at the moment.</p>";
        }
        ?>
    </div>
</section>

<!-- Appointment Booking Section -->
<section id="appointments">
    <h2>Make an Appointment</h2>
    <?php
    if (isset($successMessage)) {
        echo "<p style='color: green;'>" . $successMessage . "</p>";
    }
    if (isset($errorMessage)) {
        echo "<p style='color: red;'>" . $errorMessage . "</p>";
    }
    ?>
    <form action="index.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="doctor">Select Doctor:</label>
        <select id="doctor" name="doctor" required>
            <?php
            foreach ($doctors as $doctor) {
                echo "<option value='" . $doctor['name'] . "'>" . $doctor['name'] . " - " . $doctor['specialization'] . "</option>";
            }
            ?>
        </select>

        <label for="appointmentDate">Select Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate" required>

        <button type="submit" name="book_appointment">Book Appointment</button>
    </form>
</section>

<!-- Contact Section -->
<section id="contact">
    <h2>Contact Us</h2>
    <form action="contact.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</section>

<!-- Footer Section -->
<footer>
    <p>&copy; 2025 Compassion Care. All rights reserved.</p>
</footer>

</body>
</html>