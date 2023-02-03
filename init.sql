CREATE TABLE users_web (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);


INSERT INTO users_web (username, password) VALUES ('jellyfish', MD5('jellyfish'));
INSERT INTO users_web (username, password) VALUES ('Guybrush', MD5('monkeyisland4'));