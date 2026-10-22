
CREATE DATABASE IF NOT EXISTS tablon_anuncios;
USE tablon_anuncios;

-- Tabla usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla categorias
CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

-- Tabla publicaciones
CREATE TABLE publicaciones (
    id_publicacion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_categoria INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    cuerpo TEXT NOT NULL,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

-- Tabla comentarios
CREATE TABLE comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_publicacion INT NOT NULL,
    id_usuario INT NOT NULL,
    contenido TEXT NOT NULL,
    fecha_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_publicacion) REFERENCES publicaciones(id_publicacion)
        ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

-- 5 usuarios
-- Contraseña de prueba para todos: password
-- Almacenada como hash bcrypt
INSERT INTO usuarios (nombre, email, password) VALUES
('Ana', 'ana@clase.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'),
('Carlos', 'carlos@clase.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'),
('Lucia', 'lucia@clase.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'),
('David', 'david@clase.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'),
('Marta', 'marta@clase.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.');

-- 5 categorias
INSERT INTO categorias (nombre) VALUES
('Compraventa'),
('Proyectos'),
('Objetos perdidos'),
('Apuntes'),
('Otros');

-- 5 publicaciones
INSERT INTO publicaciones (id_usuario, id_categoria, titulo, cuerpo) VALUES
(1, 1, 'Vendo libro de programación', 'Vendo libro de Java de primero de DAW en buen estado.'),
(2, 2, 'Busco grupo para proyecto', 'Busco compañeros para realizar el proyecto de desarrollo web.'),
(3, 3, 'Cargador olvidado en el aula 21', 'He encontrado un cargador negro en el aula 21.'),
(4, 4, 'Comparto apuntes de PHP', 'Tengo apuntes de PHP y MySQL para quien los necesite.'),
(5, 5, 'Partido de fútbol el viernes', '¿Alguien se apunta a jugar un partido después de clase?');

-- 5 comentarios
INSERT INTO comentarios (id_publicacion, id_usuario, contenido) VALUES
(1, 2, '¿Cuánto cuesta el libro?'),
(1, 3, 'A mí también me interesa.'),
(2, 4, 'Yo quiero participar en el proyecto.'),
(3, 5, 'Creo que ese cargador es mío.'),
(4, 1, '¡Gracias por compartir los apuntes!');
