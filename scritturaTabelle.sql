--
-- tabella provvisoria
-- formato data (AAAA-MM-GG)
--

CREATE TABLE eventi
(
  id int NOT NULL AUTO_INCREMENT,
  img varchar(255) NOT NULL,
  name varchar(50) NOT NULL,
  description text NOT NULL,
  data date NOT NULL,
  user_id int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE favorites
(
  id int NOT NULL AUTO_INCREMENT,
  eventi_id int NOT NULL,
  user_id int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
  FOREIGN KEY (eventi_id) REFERENCES eventi(id) ON DELETE CASCADE
);

CREATE TABLE favorites ( 
eventi_id int NOT NULL, 
user_id int NOT NULL, 
PRIMARY KEY(eventi_id,user_id), 
FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE, 
FOREIGN KEY (eventi_id) REFERENCES eventi(id) ON DELETE CASCADE ON UPDATE CASCADE 
) 

CREATE TABLE register
(
  id int NOT NULL AUTO_INCREMENT,
  eventi_id int NOT NULL,
  email varchar(50) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (eventi_id) REFERENCES eventi(id) ON DELETE CASCADE
);