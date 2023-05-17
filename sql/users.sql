CREATE DATABASE login;

CREATE TABLE users (
    uid INT PRIMARY  KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(20)  NOT NULL,
    password VARCHAR(206) NOT NULL
);
INSERT INTO users(username, password) VALUES("admin" , "password");
