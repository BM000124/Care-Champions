CREATE DATABASE hospital_db;

USE hospital_db;

-- Table to store appointments
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    doctor VARCHAR(100),
    appointmentDate DATE
);

-- Table to store doctors information
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    specialization VARCHAR(100)
);

-- Sample doctor data
INSERT INTO doctors (name, specialization) VALUES ('Dr. Smith', 'Cardiologist');
INSERT INTO doctors (name, specialization) VALUES ('Dr. Jones', 'Neurologist');
INSERT INTO doctors (name, specialization) VALUES ('Dr. Williams', 'Dermatologist');
