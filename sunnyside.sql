CREATE DATABASE SUNNYSIDE;

CREATE TABLE usuarios(
  user char(20),
  contraseña char(20),
  email char(50),
  PRIMARY KEY (user)
);

CREATE TABLE maestro(
  nombreP char(100),
  user char(20),
  dpi integer,
  direccion char(100),
  telefono integer,
  fechaNac date,
  PRIMARY KEY(dpi),
  FOREIGN KEY (user) REFERENCES usuarios
);

CREATE TABLE tutor(
  nombreT char(100),
  user char(20),
  dpi integer,
  direccion char(100),
  telefono integer,
  fechaNac date,
  PRIMARY KEY(dpi),
  FOREIGN KEY (user) REFERENCES usuarios
);



CREATE TABLE grupo()
  nombreGrupo char(50),
  cantidad integer,
  PRIMARY KEY (nombreClase)
);

CREATE TABLE alumno(
  nombreA char(100),
  idAlumno char(50),
  fechaNac date,
  fotoPerfil text,
  nombreGrupo char(50),
  PRIMARY KEY (idAlumno),
  FOREIGN KEY (dpi) REFERENCES tutor,
  FOREIGN KEY (nombreGrupo) REFERENCES grupo
);

CREATE TABLE calendario(
  fechaHora timestamp with time zone,
  descripcion char(100),
  icono text,
  dpi integer,
  nombreGrupo char(50),
  PRIMARY KEY (nombreGrupo, dpi),
  FOREIGN KEY (dpi) REFERENCE maestro,
  FOREIGN KEY (nombreGrupo) REFERENCES grupo
);

CREATE TABLE curso(
  nombreC char(50),
  idCurso integer,
  dia date,
  hora time,
  nombreGrupo char(50),
  PRIMARY KEY(idCurso),
  FOREIGN KEY (nombreGrupo) REFERENCES grupo
);

CREATE TABLE tareas(
  descripcion char(100),
  fecha date,
  idAlumno char(50),
  nombreC char(50),
  PRIMARY KEY (idAlumno, idCurso),
  FOREIGN KEY (idAlumno) REFERENCES alumno,
  FOREIGN KEY (idCurso) REFERENCES curso
);

CREATE TABLE reporte(
  actividad char(50),
  observacion char(200),
  fecha date,
  calificacion char(2),
  tipoReporte char(1),
  idAlumno char(50),
  dpi integer,
  PRIMARY KEY (idAlumno,  dpi),
  FOREIGN KEY (idAlumno) REFERENCES alumno,
  FOREIGN KEY (dpi) REFERENCES maestro
);
