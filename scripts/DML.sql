
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

-- INSERTS TBL_CATEGORIA_PROYECTO
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Programación Estructurada');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Web');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Médico');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Proyecto Educativo');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Proyecto Social');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Bases de Datos');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Infraestructura de Red');
INSERT INTO TBL_CATEGORIA_PROYECTO (id_categoria, categoria) VALUES (null, 'Desarrollo Móvil');
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

-- INSERTS TBL_USUARIO
-- Freenlancers
INSERT INTO `tbl_usuario` 
  (`id_usuario`, `id_tipo_usuario`, `id_pais`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `contrasenia`, `ruta_img_perfil`, `nombre_img_perfil`) 
  VALUES 
  (NULL, '1', '4', 'Peter', 'Parker', 'Honduras, Francisco Morazán, Tegucigalpa, 11101, UNAH CU', 'peter.parker@gmail.com', '8888-8888', 'asd.456', 'usuarios/', '1.jpg'), 
  (NULL, '1', '4', 'Bruce', 'Wayne', 'Honduras, Francisco Morazán, Tegucigalpa, 11101, UNAH CU', 'bruce.wayne@unah.hn', '9999-9999', 'asd.456', 'usuarios/', '2.jpg');

-- Empresas
INSERT INTO `tbl_usuario` 
  (`id_usuario`, `id_tipo_usuario`, `id_pais`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `contrasenia`, `ruta_img_perfil`, `nombre_img_perfil`) 
  VALUES 
  (NULL, '2', '4', 'Patos Inc.', NULL, 'Honduras, Francisco Morazan, Tegucigalpa, 11101, UNAH CU', 'info@patosinc.com', '2222-2222', 'asd.456', 'empresas/1/', '1.png');
  
-- INSERTS TBL_TEC_X_USUARIO
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

-- INSERTS TBL_