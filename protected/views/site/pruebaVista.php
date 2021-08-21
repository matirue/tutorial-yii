<?php

require "metaInformacion/prueba.php";

// TODA LA META INFO LA MOVI A metaInformacion -> prueba.php Y SOLO HAGO UN REQUIRE

$this->breadcrumbs = array(
    'Pagina Prueba'
);

echo "<h1>"."Hola desde mi pruebaVista"."</h1>";

?>

<script>
    $(function(){
        $("#mostrar").html("<h4> Incluyendo codigo Jquery </h4>");
    });
</script>

<a href="index.php?r=site/page&view=articulo-1">ARTICULO 1</a>

<br><br>

<div id="mostrar"></div>