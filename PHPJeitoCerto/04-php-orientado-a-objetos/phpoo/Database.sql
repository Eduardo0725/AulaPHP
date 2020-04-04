CREATE DATABASE users;

use users;

CREATE TABLE tb_users (
    id int not null AUTO_INCREMENT,
    first_name VARCHAR(255) not null,
    last_name VARCHAR(255) not null,
    email VARCHAR(255) not null,
    passwd VARCHAR(255) not null,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    PRIMARY KEY (id)
);