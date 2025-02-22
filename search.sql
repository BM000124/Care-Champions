CREATE DATABASE hospital_db;
USE hospital_db;

CREATE TABLE specialists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialty VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

-- my Data
INSERT INTO specialists (name, specialty, location, description) VALUES
('Dr. John Doe', 'Cardiologist', 'Yaoundé', 'Diagnoses and treats heart-related conditions like hypertension, heart attacks, and arrhythmias.'),
('Dr. Jane Smith', 'Cardiothoracic Surgeon', 'Douala', 'Performs surgical procedures on the heart, lungs, and chest, including bypass surgeries and valve repairs.'),
('Dr. Albert Einstein', 'Neurologist', 'Buea', 'Specializes in nervous system disorders such as stroke, epilepsy, and multiple sclerosis.'),
('Dr. Mary Johnson', 'Obstetrician & Gynecologist', 'Bamenda', 'Provides pregnancy care, delivers babies, and treats reproductive health issues.'),
('Dr. James Brown', 'Pediatrician', 'Limbe', 'Provides medical care for infants, children, and adolescents.'),
('Dr. Daniel Wilson', 'Emergency Medicine Physician', 'North', 'Treats patients with urgent and life-threatening conditions in the ER.'),
('Dr. Sarah Lee', 'Trauma Surgeon', 'Far North', 'Specializes in treating severe injuries from accidents, falls, and violence.');
-- Yaoundé
('Dr. Emmanuel Nkom', 'Endocrinologist', 'Yaoundé', 'Treats hormonal disorders such as diabetes, thyroid disease, and adrenal gland disorders.'),
('Dr. Olivia Mbala', 'Gastroenterologist', 'Yaoundé', 'Specializes in digestive system diseases, including ulcers, liver disease, and irritable bowel syndrome (IBS).'),

-- Douala
('Dr. Francis Owona', 'Pulmonologist', 'Douala', 'Focuses on lung conditions such as asthma, COPD, and tuberculosis.'),
('Dr. Clara Moukoko', 'Nephrologist', 'Douala', 'Manages kidney-related diseases, including chronic kidney disease and dialysis patients.'),

-- Buea
('Dr. Richard Fon', 'Hematologist', 'Buea', 'Diagnoses and treats blood disorders such as anemia, leukemia, and clotting disorders.'),
('Dr. Linda Njong', 'Infectious Disease Specialist', 'Buea', 'Focuses on diagnosing and treating infections, including HIV, tuberculosis, and hospital-acquired infections.'),

-- Bamenda
('Dr. Patrick Abang', 'Dermatologist', 'Bamenda', 'Treats skin, hair, and nail disorders such as eczema, psoriasis, and skin cancer.'),
('Dr. Joyce Atanga', 'Allergist/Immunologist', 'Bamenda', 'Manages allergic reactions, asthma, and immune system disorders.'),

-- Limbe
('Dr. Samuel Ewane', 'Oncologist', 'Limbe', 'Specializes in the diagnosis and treatment of various cancers.'),
('Dr. Alice Mofor', 'Geriatrician', 'Limbe', 'Focuses on the care and medical treatment of elderly patients.'),

-- North
('Dr. Peter Tchokonte', 'Psychiatrist', 'North', 'Diagnoses and treats mental health disorders such as depression, schizophrenia, and anxiety.'),
('Dr. Nancy Ebang', 'Psychologist', 'North', 'Provides therapy and counseling for mental health and behavioral conditions.'),

-- Far North
('Dr. Pascal Mba', 'Radiologist', 'Far North', 'Interprets imaging tests such as X-rays, CT scans, MRIs, and ultrasounds.'),
('Dr. Helen Ngu', 'Pathologist', 'Far North', 'Analyzes laboratory samples to diagnose diseases such as cancer and infections.');
ALTER TABLE specialists ADD INDEX idx_specialty (specialty);
ALTER TABLE specialists ADD INDEX idx_location (location);
ALTER TABLE specialists ADD INDEX idx_name (name);