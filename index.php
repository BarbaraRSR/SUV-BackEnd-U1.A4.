<?php
/* Guardar archivo en el servidor */
$message = '';
$error = '';
$uploads_dir = 'uploads';
if (isset($_POST["upload"]))
{
    //Verificando si hay error.
    $error = $_FILES["archivo"]["error"];
    //Se continúa si no hay error.
    if ($error == UPLOAD_ERR_OK) {
        // Nombre temporal del archivo
        $tmp_name = $_FILES["archivo"]["tmp_name"];
        // Basename regresa nombre del archivo sin ruta.
        $name = basename($_FILES["archivo"]["name"]);
        // Seleccionar destino del archivo
        if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
        {
            // USABILIDAD: Mensaje de éxito.
            $message = basename($_FILES["archivo"]["name]) . " ¡Gracias por el archivo!";"
        }
        else $error = "Ocurrió un error, intenta de nuevo.";
    }
    else $error = "Ocurrió un erorr.";
}

?>