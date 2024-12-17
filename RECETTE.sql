select * from user;

DROP DATABASE IF EXISTS `gestion_recette`;
DROP TABLE IF EXISTS  `user`;

CREATE TABLE IF NOT EXISTS `user` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    privilege_id INT NOT NULL,
    CONSTRAINT fk_privilege_id FOREIGN KEY (privilege_id) REFERENCES privilege(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Insert INTO user (name, username, password, email, privilege_id) VALUES('admin', 'admin@example.com', '$2y$10$vIStwMacmckR631olvZ18eB2qfMCKCMODnxERQ6TcKPLDeIwP9g1O', 'admin@example.com', 1);