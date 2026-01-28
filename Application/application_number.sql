CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    application_no VARCHAR(20) UNIQUE NOT NULL,
    created_at DATE NOT NULL
);