create database colegio;
use colegio;

-- Registros
 
create table if not exists estudiantes(
	id_estudiante int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Edad int(2) not null,
	Cedula varchar(12) not null,
	Genero varchar(10) not null,
	Telefono varchar(15) not null,
    Fecha_Nacimiento date not null,
    Correo varchar(30) not null,
    Clave varchar(30) not null,
    Direccion varchar(30) not null,
    Curso int(20) not null,
    Condicion varchar(30) not null,
    Pais varchar(30) not null,
    Estado varchar(30) not null,
    Ciudad varchar(30) not null,
    primary key(id_estudiante)
);

create table if not exists docentes(
	id_docentes int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Cedula varchar(12) not null,
	Edad int(2) not null,
    Nivel_Educacion varchar(23) not null,
	Telefono varchar(15) not null,
    Correo varchar(30) not null,
    Clave varchar(30) not null,
	Direccion varchar(30) not null,
    primary key(id_docentes)
);

create table if not exists administradores(
	id_admin int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Cedula varchar(12) not null,
	Telefono varchar(15) not null,
    Correo varchar(30) not null,
    Clave varchar(30) not null,
    primary key(id_admin)
);

create table if not exists padres(
    id_padres int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Edad int(2) not null,
    Cedula varchar(10) not null,
    Nacionalidad varchar(20) not null,
    Telefono varchar(15) not null,
    Direccion varchar(70) not null,
    Ocupacion varchar(20) not null,
    Lugar_Trabajo varchar(30) not null,
    Telefono_Trabajo varchar(20) not null,
    primary key (id_padres)
);

create table if not exists madres(
    id_madres int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Edad int(2) not null,
    Cedula varchar(10) not null,
    Nacionalidad varchar(20) not null,
    Telefono varchar(15) not null,
    Direccion varchar(70) not null,
    Ocupacion varchar(20) not null,
    Lugar_Trabajo varchar(30) not null,
    Telefono_Trabajo varchar(20) not null,
    primary key (id_madres)
);

create table if not exists representantes(
    id_representante int not null auto_increment,
	Nombre varchar(20) not null,
	Apellido varchar(20) not null,
	Edad int(2) not null,
    Cedula varchar(10) not null,
    Parentesco varchar(10) not null,
    Nacionalidad varchar(20) not null,
    Telefono varchar(15) not null,
    Direccion varchar(70) not null,
    Ocupacion varchar(20) not null,
    Lugar_Trabajo varchar(30) not null,
    Telefono_Trabajo varchar(20) not null,
    Telefono_Emergencia varchar(15) not null,
    primary key (id_representante)
);

-- Horarios
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `horario` text,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

-- Asignar Cursos

create table if not exists cursos(
	id_curso int(2) not null auto_increment,
    curso varchar(15) not null,
    primary key(id_curso)
);
select * from cursos;

create table if not exists secciones(
	id_seccion int not null auto_increment,
    Seccion varchar(1) not null,
    primary key(id_seccion)
); 

create table if not exists 2do_grado(
	id_alumno int(5) not null auto_increment,
    Alumno int(5) not null,
    primary key(id_alumno),
    foreign key(Alumno) references cursos(id_curso)
);  

-- Cartas De Conducta
create table if not exists Constancias(
	id_constancia int(5) not null auto_increment,
	Datos_Alumno varchar(70) not null,
    Cedula_Alumno varchar(10) not null,
    Curso varchar(15) not null,
    Academico varchar(15) not null,
    Nivel_Educativo varchar(15) not null,
    Conducta varchar(100) not null,
    Dia int(2) not null,
    Mes varchar(15),
    Year_School int(4),
    primary key(id_constancia)
);

-- vista boletines 
create table if not exists calificaciones(
	id_nota int(2) not null auto_increment,
    Alumno int(5) not null,
    Materia int(5) not null,
    Curso int(2) not null,
    Nota_1 int(2) not null,
    Nota_2 int(2) not null,
    Nota_3 int(2) not null,
    Nota_4 int(2) not null,
    Promedio int(2) not null,
    primary key(id_nota),
    foreign key (Materia) references materias_prueba(id_materia),
    foreign key (Alumno) references estudiantes(id_estudiante),
    foreign key (Curso) references cursos(id_curso)
);

create table if not exists materias_prueba(
	id_materia int(2) not null auto_increment,
    nombre_materia varchar(20) not null,
    docente int(5) not null,
    curso_asignado int(5) not null,
    primary key(id_materia),
    foreign key (docente) references docentes(id_docentes),
    foreign key (curso_asignado) references cursos(id_curso)
);