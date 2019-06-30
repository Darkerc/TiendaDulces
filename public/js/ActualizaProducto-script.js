$(document).ready(function () {
    'use strict';

    $("#enviaProducto").validate({
        rules: {
            Nombre_Producto: { required: true, maxlength: 30 },
            Precio: { required: true, number: true, min: 1, max: 1000000 },
            Existencias: { required: true, number: true, max: 1000000 }
        }, messages: {
            Nombre_Producto: { required: "El campo es requerido", maxlength: "Longitud maxima de 30 caracteres" },
            Precio: { required: "El campo es requerido", number: "El campo debe ser numerico", min: "Precio minimo de 1$", max: "Precio maximo permitido de 1000000$" },
            Existencias: { required: "El campo es requerido", number: "El campo debe ser numerico", max: "Existencias maximas de 1000000" }
        }, errorClass: "campoNoValido",
        validClass: "campoValido"
    });

    $("#Imagen_Producto").change(function (ex) {
        var archivo = ex.target.files[0].name;  //(this.files[0].name).toString();
        var leeArchivo = new FileReader();

        $("#NombreImagen").text("");
        $("#NombreImagen").text(archivo);

        leeArchivo.onload = function (e) {
            $("#visualizaImagen").attr('src', e.target.result);
        };

        leeArchivo.readAsDataURL(this.files[0]);
    });
});
