use db;

CREATE TABLE users_table(
  id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);

