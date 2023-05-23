CREATE DATABASE campusv2;

CREATE TABLE campers(
    id INT primary key auto_increment,
    nombres VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    logros VARCHAR(60)
);