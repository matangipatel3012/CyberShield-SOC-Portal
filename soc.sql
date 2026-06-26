CREATE DATABASE soc_portal;

USE soc_portal;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE incidents(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    severity VARCHAR(20),
    status VARCHAR(20) DEFAULT 'Open',
    description TEXT,
    source VARCHAR(50),
    affected_user VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE login_attempts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    success BOOLEAN,
    attempt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT*FROM users;
SELECT*FROM incidents;
SELECT*FROM login_attempts;

