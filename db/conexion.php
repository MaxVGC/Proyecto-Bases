<?php 
	$conexion = pg_connect("host=localhost port=5432 dbname=proyecto user=postgres password=pkmn3612");
	$refresh=pg_query("REFRESH MATERIALIZED VIEW vnotas");
?>