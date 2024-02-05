use dxtvdb;

CREATE TABLE users_table(
  id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  type_user VARCHAR(50) NOT NULL
);

INSERT INTO users_table (name, last_name, username, password, type_user)
VALUES ('Persona1', 'Persona', 'ppersona', '12345', 'admin');

INSERT INTO users_table (name, last_name, username, password, type_user)
VALUES ('Persona2', 'Persona2', 'ppersona2', '123456', 'admin');


