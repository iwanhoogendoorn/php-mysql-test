CREATE DATABASE F1;
USE F1
CREATE TABLE drivers(First_Name VARCHAR(50) NOT NULL,Last_Name VARCHAR(50) NOT NULL,PRIMARY KEY(Last_Name));
INSERT INTO drivers VALUE ("Max", "Verstappen");
INSERT INTO drivers VALUE ("Sergio", "Pérez");
CREATE USER 'iwan'@'%' IDENTIFIED WITH mysql_native_password BY 'XXX';
GRANT ALL ON F1.* TO 'iwan'@'%';
