CREATE TABLE users (
    uid INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(30) NOT NULL

);
INSERT INTO users(username, password)VALUES("admin", "password");