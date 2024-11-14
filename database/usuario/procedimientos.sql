USE juego_v2;

DELIMITER //
CREATE PROCEDURE spu_usuarios_login(
    IN _nomuser VARCHAR(20)
)
BEGIN
    SELECT 
        idusuario,
        nomuser,
        passuser,
        puntos
    FROM usuarios_juego
    WHERE nomuser = _nomuser AND inactive_at IS NULL;
END//
DELIMITER ;

CALL spu_usuarios_login('Josué');
