CREATE DATABASE `hackwithehc`;
USE DATABASE `hackwithehc`;
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(300),
    password VARCHAR(300),
    telephone VARCHAR(300)
);

INSERT INTO users(username, password, telephone) VALUES('admin', 'adminlanguoiehc', 'pleasedonateforme');