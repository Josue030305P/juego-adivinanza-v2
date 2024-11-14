CREATE DATABASE juego_v2;
USE juego_v2;

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
('Paloma', 'Le gusta volar demasiado');
 -- ('Sol', 'Es una estrella que da luz y calor');
SELECT * FROM palabras;

INSERT INTO imagenes (idcategoria,idnivel,idpalabra,imagen_url) VALUES
				(1,1,4,'https://thumbs.dreamstime.com/b/pluma-de-la-paloma-43443565.jpg'),
                (1,1,4,'https://as2.ftcdn.net/v2/jpg/04/58/58/55/1000_F_458585510_GEuh2HuZa9TFGiPOOnpvoee95F8yKWkA.jpg'),
				(1,1,4,'https://static.vecteezy.com/system/resources/previews/017/143/778/non_2x/set-of-black-silhouettes-of-doves-in-flight-illustration-vector.jpg'),
                (1,1,4,'https://thumbs.dreamstime.com/b/pluma-de-la-paloma-43443565.jpg');
                
                
SELECT * FROM imagenes;

SELECT * FROM palabras WHERE palabra = 'Gato';
SELECT * FROM imagenes WHERE idpalabra = 1;


               
                
                

