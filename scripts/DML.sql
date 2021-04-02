--Usuario para la BD:
CREATE USER 'manager'@'localhost' IDENTIFIED BY 'asd.456';
GRANT ALL PRIVILEGES ON * . * TO 'manager'@'localhost';


-- INSERTS TBL_PAISES 
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Belice');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Guatemala');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'El Salvador');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Honduras');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Nicaragua');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Costa Rica');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'Panamá');
INSERT INTO TBL_PAISES (id_pais, pais) VALUES (null, 'México');

-- INSERTS TBL_PRESUPUESTO
INSERT INTO TBL_PRESUPUESTO (id_presupuesto, presupuesto) VALUES (null,'$1,500 - $3,000');
INSERT INTO TBL_PRESUPUESTO (id_presupuesto, presupuesto) VALUES (null,'$3,000 - $5,000');
INSERT INTO TBL_PRESUPUESTO (id_presupuesto, presupuesto) VALUES (null,'$5,000 - $10,000');
INSERT INTO TBL_PRESUPUESTO (id_presupuesto, presupuesto) VALUES (null,'$10,000 - $20,000');
INSERT INTO TBL_PRESUPUESTO (id_presupuesto, presupuesto) VALUES (null,'Más de $20,000');

-- INSERTS TBL_TIPO_USUARIO
INSERT INTO TBL_TIPO_USUARIO (id_tipo_usuario, tipo_usuario) VALUES (null, 'Freelancer');
INSERT INTO TBL_TIPO_USUARIO (id_tipo_usuario, tipo_usuario) VALUES (null, 'Empresa');

--INSERTS TBL_ESTADO_PUBLICACION
INSERT INTO TBL_ESTADO_PUBLICACION (id_estado, estado) VALUES (null,'Aceptando Solicitudes');
INSERT INTO TBL_ESTADO_PUBLICACION (id_estado, estado) VALUES (null,'No Disponible');
INSERT INTO TBL_ESTADO_PUBLICACION (id_estado, estado) VALUES (null,'Aceptando Personal');
INSERT INTO TBL_ESTADO_PUBLICACION (id_estado, estado) VALUES (null,'Terminado');
INSERT INTO TBL_ESTADO_PUBLICACION (id_estado, estado) VALUES (null,'');

--INSERTS TBL_CATEGORIA_PROYECTO
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Programación Estructurada');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Web');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Médico');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Proyecto Educativo');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Proyecto Social');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Bases de Datos');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Infraestructura de Red');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Móvil');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo IOS');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Front End Developer');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Back End Developer');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'IoT');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Inteligencia Artificial');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, '');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, '');


-- INSERTS TBL_TECNOLOGIAS
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'HTML5');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'CSS3');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'JavaScript');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'PHP');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'ReactJS');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'MySQL');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Oracle');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'MongoDB');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'MariaDB');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'NodeJS');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Angular');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Java');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'C++');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'C#');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'SASS');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'PUG');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'IONIC');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Android');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Swift');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Python');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Django');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, '.NET');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Kotlin');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, 'Go');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, '');
INSERT INTO TBL_TECNOLOGIAS (id_tecnologia, tecnologia) VALUES (null, '');

-- INSERTS TBL_USUARIO (Datos pruebas perfil)
-- Freenlancers
INSERT INTO `tbl_usuario` 
  (`id_usuario`, `id_tipo_usuario`, `id_pais`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `contrasenia`, `ruta_img_perfil`, `nombre_img_perfil`) 
  VALUES 
  (NULL, '1', '4', 'Peter', 'Parker', 'Honduras, Francisco Morazán, Tegucigalpa, 11101, UNAH CU', 'peter.parker@gmail.com', '8888-8888', 'asd.456', 'usuarios/', '1.jpg'), 
  (NULL, '1', '4', 'Bruce', 'Wayne', 'Honduras, Francisco Morazán, Tegucigalpa, 11101, UNAH CU', 'bruce.wayne@unah.hn', '9999-9999', 'asd.456', 'usuarios/', '2.jpg');

-- Empresas (Datos pruebas perfil)
INSERT INTO `tbl_usuario` 
  (`id_usuario`, `id_tipo_usuario`, `id_pais`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `contrasenia`, `ruta_img_perfil`, `nombre_img_perfil`) 
  VALUES 
  (NULL, '2', '4', 'Patos Inc.', NULL, 'Honduras, Francisco Morazan, Tegucigalpa, 11101, UNAH CU', 'info@patosinc.com', '2222-2222', 'asd.456', 'empresas/1/', '1.png');
  
-- INSERTS TBL_TEC_X_USUARIO (Datos pruebas perfil)
INSERT INTO `tbl_tec_x_usuario` 
  (`id_usuario`, `id_tecnologia`) 
  VALUES 
  ('1', '18'), 
  ('1', '14'), 
  ('1', '12'), 
  ('1', '2'), 
  ('2', '12'), 
  ('2', '7'), 
  ('2', '4'), 
  ('2', '24');

-- INSERTS TBL_

--INSERTS TBL_USUARIOS (DE PRRUEBA)
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (1,1,"Rony","Perez",null,"rony@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (1,2,"Rafa","Juarez",null,"rafa@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (1,3,"Andres","Lizandro",null,"andres@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (2,4,"BurguerKing",null,"Col. La Quezada, calle principal, avenida 215.","bk@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (2,5,"Nike",null,"Col. 3 de Mayo, tercera avenida, calle 3.","nike@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (2,6,"Puma",null,"Col. Res. Palmira, calle principal, casa N° 4.","puma@gmail.com","99887766","asd.456",null,null);
INSERT INTO TBL_USUARIO (id_tipo_usuario, id_pais, nombre, apellido, direccion, correo, telefono, contrasenia, ruta_img_perfil, nombre_img_perfil) 
VALUES (2,7,"Codeks",null,"Col. Res. Loarque, calle principal, casa N° 533.","codeks@gmail.com","99887766","asd.456",null,null);


--INSERTS TBL_PUBLICACION (DE PRUEBA)
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,2,1,'Dev Finder','Proyecto de programaion web para atraer posibles proyectos a los estudiantes de la UNAH', 'devFinder.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,5,1,'LTT Store','Tienda online para el canal de youtube de LTT.', 'lttpng.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,2,1,'Pinterest','Pagina web que mostrara imagenes que lsean del gusto de los usuario.', 'pinteres.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,3,1,'9Gag','Pagina web y aplicacion movil que mostrara memes de todo tipo a los usuarios.', '9gag.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,4,2,1,'BK Store','Aplicacion movil para android y IOS para vender la mercaderia de BurgerKing.', 'bk.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,6,1,1,'Shoes Customizer','Aplicacion que permitira a los usuarios personalizar tenis puma a su gusto.', 'shoes.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,2,1,'AmongUS','Juego para android y IOS donde hay un impostor entre un numero de tripulantes.', 'among.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,6,1,'COD Mobile','Juego estilo Battle Royale donde la gente se va a matar con armas de todo tipo.', 'cod.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,3,1,'Fortnite','Juego estilo Battle Royale donde la gente se va a matar con armas de todo tipo, ademas de construir estructuras.', 'fortnite.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,1,1,'HNIPTV4','Aplicacion android donde los usuarios podran ver sus partidos favoritos de todas las ligas del mundo.', 'hn.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,5,1,'VS Code','Editor de texto para que los usuarios puedan programar en cualquier lenguage de programacion.', 'visual.png', null);
INSERT INTO TBL_PUBLICACION (id_presupuesto, id_usuario, id_categoria, id_estado, nombre_proyecto, descripcion, nombre_img, ruta_img) 
VALUES (1,7,2,1,'PUBG','Juego estilo battle royale bien tuany que tenga graficos tumbados y armas de la segunda guerra mundial.', 'pubg.png', null);


--INSERTS TBL_Solicitud
INSERT INTO TBL_SOLICITUDES (id_solicitud, id_publicacion, id_usuario, fecha_solicitud) VALUES (null,5,1,'2021-04-01');


-- INSERTS TBL_