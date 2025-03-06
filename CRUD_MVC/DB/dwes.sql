-- Create the database
CREATE DATABASE dwes DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;USE dwes;

-- Create the tables
CREATE TABLE store (cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,tlf VARCHAR(13) NULL)ENGINE=INNODB;

CREATE TABLE product (cod VARCHAR(12) NOT NULL,name VARCHAR(200) NULL,short_name VARCHAR(50) NOT NULL,description TEXT NULL,RRP DECIMAL(10,2) NOT NULL,family VARCHAR(6) NOT NULL, PRIMARY KEY( cod ), INDEX( family ), UNIQUE( short_name ))ENGINE=INNODB;

CREATE TABLE family (cod VARCHAR(6)NOT NULL, name VARCHAR(200)NOT NULL,PRIMARY KEY( cod ))ENGINE=INNODB;

CREATE TABLE stock (product VARCHAR(12)NOT NULL,store INT NOT NULL,units INT NOT NULL,PRIMARY KEY( product , store ))ENGINE=INNODB;

-- We create the foreign keys
ALTER TABLE product ADD CONSTRAINT product_ibfk_1 FOREIGN KEY(family) REFERENCES family (cod) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE stock ADD CONSTRAINT stock_ibfk_2 FOREIGN KEY(store) REFERENCES store (cod) ON DELETE CASCADE ON UPDATE CASCADE, ADD CONSTRAINT stock_ibfk_1 FOREIGN KEY(product) REFERENCES product (cod) ON UPDATE CASCADE;


