-- Sewadar Management Database Setup
-- Run this script in phpMyAdmin or MySQL command line

-- Create database
CREATE DATABASE IF NOT EXISTS sewadar_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use the database
USE sewadar_db;

-- Create sewadars table
CREATE TABLE IF NOT EXISTS sewadars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Insert sample data for testing
-- INSERT INTO sewadars (name) VALUES 
-- ('Rajesh Kumar'),
-- ('Priya Singh'),
-- ('Amit Patel');
