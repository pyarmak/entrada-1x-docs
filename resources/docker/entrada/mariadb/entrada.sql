UPDATE `mysql`.`user` SET `Password` = PASSWORD('password') WHERE `User` = "root";
CREATE USER 'root'@'gateway' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'gateway' WITH GRANT OPTION;

CREATE DATABASE `entrada` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_auth` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_clerkship` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'entrada'@'gateway' IDENTIFIED BY 'password';
GRANT ALL ON `entrada`.* TO 'entrada'@'gateway';
GRANT ALL ON `entrada_auth`.* TO 'entrada'@'gateway';
GRANT ALL ON `entrada_clerkship`.* TO 'entrada'@'gateway';

FLUSH PRIVILEGES;