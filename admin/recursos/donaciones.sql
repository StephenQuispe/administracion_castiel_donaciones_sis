




CREATE TABLE PERSONA (
    id_persona INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    ap_paterno VARCHAR(50),
    ap_materno VARCHAR(50),
    calle VARCHAR(100),
    nro VARCHAR(10),
    zona VARCHAR(50),
    telefono VARCHAR(20)
);

CREATE TABLE ORGANIZADOR (
    id_organizador INT PRIMARY KEY,
    FOREIGN KEY (id_organizador) REFERENCES PERSONA(id_persona)
);

CREATE TABLE VOLUNTARIO (
    id_voluntario INT PRIMARY KEY,
    FOREIGN KEY (id_voluntario) REFERENCES PERSONA(id_persona)
);

CREATE TABLE BENEFICIARIO (
    id_beneficiario INT PRIMARY KEY,
    prioridad VARCHAR(50),
    requerimientos TEXT,
    FOREIGN KEY (id_beneficiario) REFERENCES PERSONA(id_persona)
);

CREATE TABLE PROYECTO (
    id_proyecto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_proyecto VARCHAR(100),
    presupuesto DECIMAL(10, 2),
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    nro_participantes INT
);

CREATE TABLE DONANTE (
    id_donante INT PRIMARY KEY AUTO_INCREMENT,
    tipo ENUM('Natural', 'Organización', 'Anónimo'),
    fecha_registro DATE,
    frecuencia ENUM('Única', 'Recurrente'),
    id_persona INT NULL,
    nombre_organizacion VARCHAR(100) NULL,
    FOREIGN KEY (id_persona) REFERENCES PERSONA(id_persona)
);

CREATE TABLE DONACION (
    id_donacion INT PRIMARY KEY AUTO_INCREMENT,
    fecha_donacion DATE,
    valor_economico INT, -- Valor entero que representa el monto de la donación económica
    p_acopio VARCHAR(100),
    id_donante INT,
    id_proyecto INT,
    FOREIGN KEY (id_donante) REFERENCES DONANTE(id_donante),
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto)
);

CREATE TABLE PRODUCTO (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    marca VARCHAR(50),
    descripcion TEXT
);

CREATE TABLE TIENE_DP (
    id_donacion INT,
    id_producto INT,
    cantidad INT,
    PRIMARY KEY (id_donacion, id_producto),
    FOREIGN KEY (id_donacion) REFERENCES DONACION(id_donacion),
    FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
);

CREATE TABLE PARTICIPA (
    id_voluntario INT,
    id_proyecto INT,
    carga_horaria INT,
    PRIMARY KEY (id_voluntario, id_proyecto),
    FOREIGN KEY (id_voluntario) REFERENCES VOLUNTARIO(id_voluntario),
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto)
);

CREATE TABLE RECEPCIONA (
    id_beneficiario INT,
    id_producto INT,
    cantidad_recibida INT,
    PRIMARY KEY (id_beneficiario, id_producto),
    FOREIGN KEY (id_beneficiario) REFERENCES BENEFICIARIO(id_beneficiario),
    FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
);

CREATE TABLE ORGANIZA (
    id_organizador INT,
    id_proyecto INT,
    monto DECIMAL(10, 2),
    PRIMARY KEY (id_organizador, id_proyecto),
    FOREIGN KEY (id_organizador) REFERENCES ORGANIZADOR(id_organizador),
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto)
);

CREATE TABLE NOTICIA (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    resumen TEXT NOT NULL,
    contenido TEXT NOT NULL,
    imagen VARCHAR(255),
    fecha DATE NOT NULL,
    estado ENUM('publicado', 'borrador', 'archivado') NOT NULL DEFAULT 'borrador',
    id_proyecto INT NOT NULL,
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto)
);

CREATE TABLE USUARIO (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_persona INT NOT NULL,
    tipo ENUM('donante', 'admin', 'super'),
    contra VARCHAR(20),
    usuario VARCHAR(20),
    correo VARCHAR(40),
    estado ENUM('activo', 'inactivo'),
    FOREIGN KEY (id_persona) REFERENCES PERSONA(id_persona)
);
-- Insertar 50 personas en la tabla PERSONA
INSERT INTO PERSONA (nombre, ap_paterno, ap_materno, calle, nro, zona, telefono)
VALUES
('Juan', 'Pérez', 'García', 'Calle Primavera', '101', 'Centro', '712345678'),
('Ana', 'López', 'Martínez', 'Calle Luna', '202', 'Norte', '723456789'),
('Carlos', 'Rodríguez', 'Hernández', 'Av. Sol', '303', 'Este', '734567890'),
('María', 'González', 'Ramírez', 'Calle Estrella', '404', 'Oeste', '745678901'),
('José', 'Fernández', 'Torres', 'Calle Mar', '505', 'Sur', '756789012'),
('Laura', 'Ramírez', 'Vega', 'Av. Roca', '606', 'Centro', '767890123'),
('Luis', 'Martínez', 'Ortiz', 'Calle Río', '707', 'Norte', '778901234'),
('Diana', 'Hernández', 'Pérez', 'Calle Loma', '808', 'Este', '789012345'),
('Pedro', 'Torres', 'Ruiz', 'Av. Colina', '909', 'Oeste', '790123456'),
('Marta', 'Ortiz', 'Soto', 'Calle Valle', '1001', 'Sur', '701234567'),
('Andrea', 'Vega', 'Reyes', 'Calle Campo', '1111', 'Centro', '812345678'),
('Miguel', 'Ruiz', 'Arias', 'Av. Trigal', '1212', 'Norte', '823456789'),
('Sofía', 'Reyes', 'Rivas', 'Calle Sauce', '1313', 'Este', '834567890'),
('Fernando', 'Arias', 'Lozano', 'Calle Roble', '1414', 'Oeste', '845678901'),
('Claudia', 'Rivas', 'Mendoza', 'Av. Cedro', '1515', 'Sur', '856789012'),
('Ricardo', 'Lozano', 'Silva', 'Calle Pino', '1616', 'Centro', '867890123'),
('Isabel', 'Mendoza', 'Morales', 'Calle Encino', '1717', 'Norte', '878901234'),
('Javier', 'Silva', 'Delgado', 'Av. Álamo', '1818', 'Este', '889012345'),
('Paola', 'Morales', 'Herrera', 'Calle Laurel', '1919', 'Oeste', '890123456'),
('Gabriel', 'Delgado', 'Cruz', 'Av. Ciprés', '2020', 'Sur', '801234567'),
('Carolina', 'Herrera', 'Fuentes', 'Calle Arrayán', '2121', 'Centro', '912345678'),
('Daniel', 'Cruz', 'Chávez', 'Calle Jacaranda', '2222', 'Norte', '923456789'),
('Natalia', 'Fuentes', 'Salinas', 'Calle Nogal', '2323', 'Este', '934567890'),
('Ángel', 'Chávez', 'Valencia', 'Calle Olmo', '2424', 'Oeste', '945678901'),
('Camila', 'Salinas', 'Aguilar', 'Calle Ciprés', '2525', 'Sur', '956789012'),
('Esteban', 'Valencia', 'Castro', 'Av. Tilo', '2626', 'Centro', '967890123'),
('Valeria', 'Aguilar', 'Quintero', 'Calle Fresno', '2727', 'Norte', '978901234'),
('Adrián', 'Castro', 'Muñoz', 'Av. Bambú', '2828', 'Este', '989012345'),
('Flor', 'Quintero', 'Cordero', 'Calle Sauce', '2929', 'Oeste', '990123456'),
('Sebastián', 'Muñoz', 'Paredes', 'Av. Olivo', '3030', 'Sur', '901234567'),
('Lucía', 'Cordero', 'Navarro', 'Calle Cedro', '3131', 'Centro', '812345679'),
('Mateo', 'Paredes', 'Carrillo', 'Calle Pino', '3232', 'Norte', '823456780'),
('Marisol', 'Navarro', 'Villalba', 'Av. Álamo', '3333', 'Este', '834567891'),
('Enrique', 'Carrillo', 'Ramos', 'Calle Olmo', '3434', 'Oeste', '845678902'),
('Julieta', 'Villalba', 'Durán', 'Calle Nogal', '3535', 'Sur', '856789013'),
('Oscar', 'Ramos', 'Escobar', 'Calle Laurel', '3636', 'Centro', '867890124'),
('Patricia', 'Durán', 'Barrios', 'Av. Arrayán', '3737', 'Norte', '878901235'),
('Diego', 'Escobar', 'Campos', 'Calle Encino', '3838', 'Este', '889012346'),
('Elsa', 'Barrios', 'Esquivel', 'Calle Roble', '3939', 'Oeste', '890123457'),
('Hugo', 'Campos', 'Montes', 'Calle Jacaranda', '4040', 'Sur', '801234568'),
('Fátima', 'Esquivel', 'Romero', 'Calle Tilo', '4141', 'Centro', '912345679'),
('Raúl', 'Montes', 'Correa', 'Av. Bambú', '4242', 'Norte', '923456780'),
('Verónica', 'Romero', 'Burgos', 'Calle Trigal', '4343', 'Este', '934567891'),
('Ignacio', 'Correa', 'Lara', 'Calle Valle', '4444', 'Oeste', '945678902'),
('Rosa', 'Burgos', 'Rojas', 'Calle Río', '4545', 'Sur', '956789013'),
('Manuel', 'Lara', 'Serrano', 'Calle Campo', '4646', 'Centro', '967890124'),
('Teresa', 'Rojas', 'Peña', 'Calle Colina', '4747', 'Norte', '978901235'),
('Samuel', 'Serrano', 'Chavez', 'Calle Loma', '4848', 'Este', '989012346'),
('Clara', 'Peña', 'Miranda', 'Calle Mar', '4949', 'Oeste', '990123457'),
('Roberto', 'Chavez', 'Cortes', 'Calle Primavera', '5050', 'Sur', '901234568');



-- Datos para la tabla ORGANIZADOR (10 registros)
INSERT INTO ORGANIZADOR (id_organizador)
VALUES
(1), 
(3), 
(5), 
(7), 
(9), 
(11), 
(13), 
(15), 
(17), 
(19);

-- Datos para la tabla VOLUNTARIO (10 registros)
INSERT INTO VOLUNTARIO (id_voluntario)
VALUES
(2), 
(4), 
(6), 
(8), 
(10), 
(12), 
(14), 
(16), 
(18), 
(20);

-- Datos para la tabla BENEFICIARIO (10 registros)
INSERT INTO BENEFICIARIO (id_beneficiario, prioridad, requerimientos)
VALUES
(21, 'Alta', 'Alimentos básicos, ropa de invierno.'),
(22, 'Media', 'Medicamentos, juguetes para niños.'),
(23, 'Baja', 'Material escolar, artículos de limpieza.'),
(24, 'Alta', 'Cobijas, ropa de abrigo.'),
(25, 'Media', 'Útiles escolares, alimentos no perecederos.'),
(26, 'Alta', 'Ayuda económica para pagar alquiler.'),
(27, 'Baja', 'Ropa casual, libros de texto.'),
(28, 'Media', 'Calzado, mochilas escolares.'),
(29, 'Alta', 'Sillas de ruedas, andadores.'),
(30, 'Media', 'Productos de higiene personal.');


INSERT INTO PROYECTO (nombre_proyecto, presupuesto, descripcion, fecha_inicio, fecha_fin, nro_participantes)
VALUES
('Proyecto Alimentación', 50000.00, 'Distribución de alimentos básicos en comunidades rurales.', '2024-01-01', '2024-03-31', 50),
('Proyecto Educación', 75000.00, 'Entrega de material escolar a escuelas de bajos recursos.', '2024-02-15', '2024-06-15', 80),
('Proyecto Salud', 100000.00, 'Campaña de vacunación en áreas rurales.', '2024-03-01', '2024-05-30', 100),
('Proyecto Vivienda', 200000.00, 'Construcción de viviendas para familias necesitadas.', '2024-04-01', '2024-12-31', 120),
('Proyecto Ropa', 25000.00, 'Recolección y distribución de ropa de invierno.', '2024-01-15', '2024-02-28', 30),
('Proyecto Tecnología', 50000.00, 'Entrega de laptops y tablets a estudiantes.', '2024-06-01', '2024-08-31', 40),
('Proyecto Agua', 150000.00, 'Instalación de sistemas de agua potable.', '2024-07-01', '2024-11-30', 70),
('Proyecto Energía', 300000.00, 'Implementación de paneles solares en comunidades remotas.', '2024-09-01', '2025-03-31', 90),
('Proyecto Deportes', 40000.00, 'Donación de equipamiento deportivo a escuelas.', '2024-05-01', '2024-07-31', 60),
('Proyecto Medio Ambiente', 60000.00, 'Campañas de reforestación y limpieza.', '2024-08-01', '2024-12-31', 50);

INSERT INTO DONANTE (tipo, fecha_registro, frecuencia, id_persona, nombre_organizacion)
VALUES
('Natural', '2024-01-10', 'Única', 1, NULL),
('Organización', '2024-01-15', 'Recurrente', NULL, 'Fundación Solidaridad'),
('Natural', '2024-02-01', 'Recurrente', 2, NULL),
('Anónimo', '2024-02-20', 'Única', NULL, NULL),
('Organización', '2024-03-01', 'Recurrente', NULL, 'Empresas Unidas'),
('Natural', '2024-03-10', 'Única', 3, NULL),
('Natural', '2024-03-20', 'Recurrente', 4, NULL),
('Organización', '2024-04-01', 'Recurrente', NULL, 'Asociación Amigos'),
('Natural', '2024-04-15', 'Única', 5, NULL),
('Anónimo', '2024-05-01', 'Única', NULL, NULL);

INSERT INTO DONACION (fecha_donacion, valor_economico, p_acopio, id_donante, id_proyecto)
VALUES
('2024-01-15', 1000, 'Centro 1', 1, 1),
('2024-02-20', 1500, 'Centro 2', 2, 2),
('2024-03-10', 2000, 'Centro 3', 3, 3),
('2024-03-25', 500, 'Centro 4', 4, 4),
('2024-04-05', 3000, 'Centro 5', 5, 5),
('2024-04-20', 2500, 'Centro 6', 6, 6),
('2024-05-10', 4000, 'Centro 7', 7, 7),
('2024-05-25', 600, 'Centro 8', 8, 8),
('2024-06-01', 5000, 'Centro 9', 9, 9),
('2024-06-15', 1200, 'Centro 10', 10, 10);


INSERT INTO PRODUCTO (nombre, marca, descripcion)
VALUES
('Arroz', 'La Preferida', 'Paquete de 1 kg de arroz blanco.'),
('Frijoles', 'El Campo', 'Bolsa de 1 kg de frijoles negros.'),
('Leche', 'Vaca Feliz', 'Caja de leche líquida de 1 litro.'),
('Cobija', 'Calor Hogar', 'Cobija de lana para invierno.'),
('Zapatos', 'Pie Seguro', 'Zapatos deportivos talla 40.'),
('Lápiz', 'Escribe Bien', 'Caja de 12 lápices de grafito.'),
('Camiseta', 'Ropa Buena', 'Camiseta de algodón talla M.'),
('Medicamentos', 'Salud Vital', 'Caja de analgésicos genéricos.'),
('Botella de Agua', 'Agua Clara', 'Botella de agua de 1.5 litros.'),
('Balón de Fútbol', 'Deportes Pro', 'Balón de fútbol tamaño oficial.');

INSERT INTO TIENE_DP (id_donacion, id_producto, cantidad)
VALUES
(1, 1, 50),
(1, 2, 30),
(2, 3, 20),
(2, 4, 15),
(3, 5, 40),
(4, 6, 25),
(5, 7, 60),
(6, 8, 35),
(7, 9, 45),
(8, 10, 10);


INSERT INTO PARTICIPA (id_voluntario, id_proyecto, carga_horaria)
VALUES
(2, 1, 20),
(4, 2, 25),
(6, 3, 30),
(8, 4, 15),
(10, 5, 20),
(12, 6, 25),
(14, 7, 30),
(16, 8, 15),
(18, 9, 20),
(20, 10, 25);


INSERT INTO RECEPCIONA (id_beneficiario, id_producto, cantidad_recibida)
VALUES
(21, 1, 20),
(22, 2, 15),
(23, 3, 10),
(24, 4, 12),
(25, 5, 30),
(26, 6, 18),
(27, 7, 25),
(28, 8, 20),
(29, 9, 15),
(30, 10, 10);


INSERT INTO ORGANIZA (id_organizador, id_proyecto, monto)
VALUES
(1, 1, 10000.00),
(3, 2, 15000.00),
(5, 3, 20000.00),
(7, 4, 25000.00),
(9, 5, 3000.00),
(11, 6, 4000.00),
(13, 7, 5000.00),
(15, 8, 6000.00),
(17, 9, 7000.00),
(19, 10, 8000.00);



INSERT INTO USUARIO (id_persona, tipo, contra, usuario, correo, estado) VALUES (1, 'donante', 'password123', 'juanperez', 'juanperez@example.com', 'activo'), (2, 'donante', 'password456', 'analopez', 'analopez@example.com', 'activo'), (4, 'donante', 'password789', 'mariag', 'mg@example.com', 'activo'), (8, 'admin', 'password012', 'dianita', 'DiAna@example.com', 'activo');