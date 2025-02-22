CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    department VARCHAR(100),
    complaint_type VARCHAR(255),
    description TEXT,
    file_upload VARCHAR(255),
    urgency ENUM('Low', 'Medium', 'High') DEFAULT 'Low',
    status ENUM('Pending', 'In Progress', 'Resolved') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);