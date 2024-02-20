CREATE TABLE usuarios (
    id int(10) PRIMARY KEY,
    username varchar(30),
    nombre text,
    apellidos text,
    email varchar(50),
    telefono int(9),
    password text,
    rol text
)