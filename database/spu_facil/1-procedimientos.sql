DELIMITER //

CREATE PROCEDURE sp_imagen_palabra_aleatoria()
BEGIN
    DECLARE palabra_id INT;
    
    -- Selecciona una palabra aleatoria del nivel "Fácil" y la categoría "Animales"
    SELECT pa.idpalabra
    INTO palabra_id
    FROM palabras pa
    INNER JOIN imagenes img ON pa.idpalabra = img.idpalabra
    INNER JOIN niveles nvl ON nvl.idnivel = img.idnivel
    INNER JOIN Categorias cat ON cat.idcategoria = img.idcategoria
    WHERE nvl.idnivel = 1 AND cat.idcategoria = 1
    ORDER BY RAND()
    LIMIT 1;

    -- Selecciona las 4 imágenes asociadas a la palabra seleccionada
    SELECT 
        img.imagen_url,
        img.idimagen,
        cat.categoria,
        nvl.nivel,
        pa.palabra,
        pa.pista
    FROM imagenes img
    INNER JOIN palabras pa ON pa.idpalabra = img.idpalabra
    INNER JOIN Categorias cat ON cat.idcategoria = img.idcategoria
    INNER JOIN niveles nvl ON nvl.idnivel = img.idnivel
    WHERE pa.idpalabra = palabra_id
    LIMIT 4;
END //

DELIMITER ;

CALL sp_imagen_palabra_aleatoria();
drop procedure sp_imagen_palabra_aleatoria;


