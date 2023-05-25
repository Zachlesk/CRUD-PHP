CREATE DATABASE campusv2;

CREATE TABLE campers(
    id INT primary key auto_increment,
    nombres VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    logros VARCHAR(60),
    ser SMALLINT(2) NOT NULL,
    review SMALLINT(2) NOT NULL,
    skills SMALLINT(2) NOT NULL,
    ingles VARCHAR(50) NOT NULL,
    asistencia VARCHAR(50) NOT NULL,
    especialidad VARCHAR(50) NOT NULL
); 