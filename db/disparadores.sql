CREATE OR REPLACE FUNCTION actualizarNotas() RETURNS TRIGGER AS $actunotas$
DECLARE 
BEGIN
REFRESH MATERIALIZED VIEW vnotas; 
RETURN null;
end;
$actunotas$
LANGUAGE plpgsql;

CREATE TRIGGER actunotas1 AFTER insert
    ON notas FOR EACH ROW 
EXECUTE PROCEDURE actualizarNotas();

CREATE TRIGGER actunotas2 AFTER delete
    ON notas FOR EACH ROW 
EXECUTE PROCEDURE actualizarNotas();

CREATE TRIGGER actunotas3 AFTER update
    ON notas FOR EACH ROW 
EXECUTE PROCEDURE actualizarNotas();