USE juego_v2;
DELIMITER //

CREATE PROCEDURE sp_categorias_listar()
BEGIN

SELECT * FROM categorias WHERE inactive_at IS NULL;

END //

CALL  sp_categorias_listar()