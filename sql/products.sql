CREATE DATABASE products;
CREATE TABLE IF NOT EXISTS products ( id INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, product_name VARCHAR(20) NOT NULL, quanity INTEGER(20) NOT NULL, price DECIMAL(25,2) NOT NULL );
