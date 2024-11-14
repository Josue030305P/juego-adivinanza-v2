

CREATE DATABASE juego_v2;
USE juego_v2;

CREATE TABLE usuarios_juego (
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    nomuser VARCHAR(20) NOT NULL UNIQUE,
    passuser VARCHAR(200) NOT NULL,
    puntos INT NOT NULL DEFAULT 200,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    updated_at DATETIME NULL,
    inactive_at DATETIME NULL
);
INSERT INTO usuarios_juego (nomuser, passuser) VALUES
    ('Josué', 'josue123');
    
UPDATE usuarios_juego SET passuser = '$2y$10$oJP.UBBq/BV6t0lVizgdeuqksHk1VqWjrpEuAw9PuhFYLfdi4yL7K' WHERE idusuario = 1;
    
SELECT * FROM usuarios_juego;

CREATE TABLE niveles (
idnivel INT PRIMARY KEY AUTO_INCREMENT,
nivel	VARCHAR(35) NOT NULL,
created_at DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE Categorias (
idcategoria INT PRIMARY KEY AUTO_INCREMENT,
categoria	VARCHAR(40) NOT NULL,
created_at	DATETIME NOT NULL DEFAULT NOW(),
updated_at	DATETIME NULL,
inactive_at DATETIME NULL
);

CREATE TABLE palabras (
idpalabra	INT PRIMARY KEY AUTO_INCREMENT,
palabra		VARCHAR(80) NOT NULL,
pista		VARCHAR(80) NOT NULL,
created_at	DATETIME NOT NULL DEFAULT NOW(),
updated_at	DATETIME NULL,
inactive_at DATETIME NULL
);

CREATE TABLE imagenes (
idimagen	INT PRIMARY KEY AUTO_INCREMENT,
idcategoria INT NOT NULL,
idnivel     INT NOT NULL,
idpalabra	INT NOT NULL,
imagen_url	TEXT NOT NULL,
descripcion VARCHAR(100) NULL,
CONSTRAINT  fk_idcategoria FOREIGN KEY(idcategoria) REFERENCES categorias(idcategoria),
CONSTRAINT fk_idnivel FOREIGN KEY(idnivel) REFERENCES niveles(idnivel),
CONSTRAINT fk_idpalabra FOREIGN KEY(idpalabra) REFERENCES palabras(idpalabra)
);

INSERT INTO niveles(nivel) VALUES ('Facil');

INSERT INTO categorias(categoria) VALUES('Animales');
SELECT * FROM categorias;

INSERT INTO palabras (palabra, pista) VALUES
('Pato', 'Dice cua cua');
 -- ('Sol', 'Es una estrella que da luz y calor');
SELECT * FROM palabras;

INSERT INTO imagenes (idcategoria,idnivel,idpalabra,imagen_url) VALUES
				(1,1,4,'https://www.parquewarner.com/content/dam/war/images/stores/foto-con-pato-lucas-en-su-camerino/Foto-con-Pato-Lucas-en%20su-Camerino-Parque-Warner-Madrid-2.jpg'),
                (1,1,4,'https://mvsnoticias.com/u/fotografias/m/2024/2/2/f425x230-596630_610612_5050.jpg'),
				(1,1,4,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFg1KlV8C26Ea3D-pXbs0y6hgN3KCQZP3G0A&s'),
                (1,1,4,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFg1KlV8C26Ea3D-pXbs0y6hgN3KCQZP3G0A&s');
                
                
SELECT * FROM imagenes;

SELECT * FROM palabras WHERE palabra = 'Gato';
SELECT * FROM imagenes WHERE idpalabra = 1;
