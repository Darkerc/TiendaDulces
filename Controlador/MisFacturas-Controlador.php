<?php

    require_once '../Modelo/VerificarSesion.php';

    require_once '../Modelo/MisFacturas-Modelo.php';

    $misFacturas=new MisFacturas();

    $idTienda=$_SESSION['TIENDA'];

    $datosFacturas=$misFacturas->datosFactura($idTienda);

    $nombreEncargado=$misFacturas->nombreEncargado($idTienda);

    require_once '../Vista/MisFacturas.php';


?>