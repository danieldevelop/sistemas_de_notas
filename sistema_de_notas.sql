create table if not exists profesor 
(
    id int primary key auto_increment,
    nombre varchar(45) not null,
    telefono int not null,
    username varchar(45) unique not null,
    password varchar(255) not null
);

create table if not exists estudiante
(
    id int primary key auto_increment,
    nombre varchar(45) not null,
    apellidos varchar(45) not null,
    id_profesor int null,
    constraint fk_id_profesor foreign key (id_profesor) references profesor(id) 
);

create table if not exists calificaciones
(
    id int primary key auto_increment,
    nota1 float,
    nota2 float,
    nota3 float,
    promedio float,
    observaciones varchar(255),
    id_estudiante int null,
    constraint fk_id_estudiante foreign key (id_estudiante) references estudiante(id)
);
