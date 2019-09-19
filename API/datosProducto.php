<?php

    require_once '../Modelo/ConexionClase.php';

    $conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

    $conexionBBDD->enviaCodificacion("utf8");

    $datosProductos=$conexionBBDD->datosTodos("productos",PDO::FETCH_ASSOC,true);

    echo json_encode($datosProductos);

?>