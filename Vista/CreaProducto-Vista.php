<!DOCTYPE html>
<html>
  <head>
    <title>Sube tu producto!</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <div id="app">
      <navegacion></navegacion>
      <div class="contenedorPrincipal">
        <form class="creaProducto" enctype="multipart/form-data" action="../Modelo/AñadirProducto.php" method="post" id="enviaProducto" name="enviaProducto">

          <label for="NombreProducto" class="input">Nombre del producto: </label>
          <input type="text" name="NombreProducto" id="NombreProducto" class="input">
  
          <label for="Precio" class="input">Precio: </label>
          <input type="text" name="Precio" id="Precio" class="input">

          <label for="Existencias" class="input">Existencias: </label>
          <input type="text" name="Existencias" id="Existencias" class="input">

          <div>
            <label for="ImagenProducto" class="input">Subir imagen: </label>
            <label class="nombre" id="NombreImagen" name="NombreImagen">Imagen Producto</label>
          </div>
        
          <div class="contImagen">
            <div>
              <div>
                <input type="file" name="ImagenProducto" id="ImagenProducto" class="input-file">
                <span>Insertar Imagen</span>
              </div>
            </div>
            <img src="../Resources/png/017-sensible.png" name="visualizaImagen" id="visualizaImagen">
          </div>
          
          <input type="submit" value="Subir Producto" class="submit">

        </form>
      </div>
      
      <div class="tgSQLNone" id="mostrarSql">
        <div>
          <label>Sentencias SQL</label>
          <ul>
            <li>Insert Into Productos values (null,TiendaDueña,NombreProducto,Precio,Existencias,ImagenProducto)</li>
          </ul>
        </div>
      </div>

      <div class="sentenciaSql" id="btnSql">
        <span>SQL</span>
      </div>     
      <pie></pie>
    </div>

    <script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../Scripts/vue.js"></script>
    <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>
    <script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
  	<script type="text/javascript" src="../Scripts/CreaProducto-script.js"></script>

<body>
</body>
</html>