CREATE DATABASE care_compass;

Use  care_compass;

CREATE table appointments (
PatientName varchar(100) NOT NULL ,
Email varchar(150) NOT NULL,
Doctor varchar(100) NOT NULL,
AppoinmentDate Date NOT NULL
);

CREATE TABLE feedback (
    name VARCHAR(100) NOT NULL,        
    comments TEXT NOT NULL,            
    rating INT NOT NULL              
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'patient') NOT NULL
);

CREATE TABLE lab_results (
    result_id INT AUTO_INCREMENT PRIMARY KEY,
    Patient_id INT NOT NULL,  
    result_date DATE NOT NULL,
    test_name VARCHAR(255) NOT NULL,
    result_details TEXT NOT NULL
);

CREATE TABLE medical_records (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id VARCHAR(100) NOT NULL,
    date DATE,
    conditions VARCHAR(255),
    doctor VARCHAR(255)
);

CREATE TABLE billPayments (
    patientID VARCHAR(255) NOT NULL,
    patientName VARCHAR(255) NOT NULL,
    invoiceNo VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    paymentMethod ENUM('credit', 'debit', 'paypal') NOT NULL
);

INSERT INTO users (user_id, name, email, password, role)
VALUES
(11, 'John Doe', 'john.doe@example.com', 'password123', 'admin'),
(12, 'Jane Smith', 'jane.smith@example.com', 'password123', 'staff'),
(13, 'Samuel Green', 'samuel.green@example.com', 'password123', 'patient'),
(14, 'Emily Clark', 'emily.clark@example.com', 'password123', 'admin'),
(15, 'Michael Brown', 'michael.brown@example.com', 'password123', 'staff'),
(16, 'Sarah Johnson', 'sarah.johnson@example.com', 'password123', 'patient'),
(17, 'David Williams', 'david.williams@example.com', 'password123', 'admin'),
(18, 'Laura Miller', 'laura.miller@example.com', 'password123', 'staff'),
(19, 'James Wilson', 'james.wilson@example.com', 'password123', 'patient'),
(20, 'Anna Taylor', 'anna.taylor@example.com', 'password123', 'admin');

INSERT INTO lab_results (result_id, Patient_id, result_date, test_name, result_details)
VALUES
(01, 11, '2025-01-01', 'Blood Test', 'Normal blood count, no issues detected.'),
(02, 12, '2025-01-02', 'Urine Test', 'Mild protein detected, further tests required.'),
(03, 13, '2025-01-03', 'X-Ray', 'No fractures or abnormalities detected.'),
(04, 14, '2025-01-04', 'CT Scan', 'Abnormal growth detected in the liver.'),
(05, 15, '2025-01-05', 'MRI Scan', 'Minor disc herniation observed.'),
(06, 16, '2025-01-06', 'Blood Test', 'Cholesterol levels slightly elevated.'),
(07, 17, '2025-01-07', 'Ultrasound', 'Normal kidney function.'),
(08, 18, '2025-01-08', 'EKG', 'Normal heart rhythm, no issues.'),
(09, 19, '2025-01-09', 'COVID-19 Test', 'Negative result.'),
(10, 20, '2025-01-10', 'Diabetes Test', 'Blood sugar levels within the normal range.');

SELECT * FROM billPayments;

INSERT INTO medical_records (record_id, patient_id, date, conditions, doctor)
VALUES
(01, 'P001', '2025-02-20', 'Flu', 'Dr. Smith'),
(02, 'P002', '2025-02-21', 'Back Pain', 'Dr. Johnson'),
(03, 'P003', '2025-02-22', 'Asthma', 'Dr. Lee'),
(04, 'P004', '2025-02-23', 'Diabetes', 'Dr. Taylor'),
(05, 'P005', '2025-02-24', 'Headache', 'Dr. Brown'),
(06, 'P006', '2025-02-20', 'Allergy', 'Dr. Green'),
(07, 'P007', '2025-02-21', 'High Blood Pressure', 'Dr. White'),
(08, 'P008', '2025-02-22', 'Cold', 'Dr. Black'),
(09, 'P009', '2025-02-23', 'Migraine', 'Dr. Harris'),
(10, 'P010', '2025-02-24', 'Anxiety', 'Dr. Walker');
