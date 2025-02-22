CREATE DATABASE hospital_db;

USE hospital_db;

-- Table for doctors
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    specialization VARCHAR(100)
);

-- Table for appointments
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    doctor VARCHAR(100),
    appointmentDate DATE
);
