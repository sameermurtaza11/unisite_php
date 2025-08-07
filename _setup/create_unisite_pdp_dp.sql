CREATE DATABASE IF NOT EXISTS unisite_pdp_dp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE unisite_pdp_dp;

CREATE TABLE IF NOT EXISTS feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile VARCHAR(20),
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
