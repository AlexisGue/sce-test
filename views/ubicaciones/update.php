<?php
@session_start();
if (!isset($_SESSION['login_ok'])) {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

// Verifica si la ubicación está presente
if (empty($_POST['ubicacion'])) {
    header("Location: formUpdate.php?msj=" . base64_encode("Error, favor de seleccionar una ubicación...."));
    exit();
} else {
    $tabla = "ubicaciones";
    $ubicacion = $_POST['ubicacion'];
    $idubicacion = $_POST['idubicacion'];
    $estado = $_POST['estado'];

    // Construcción de la consulta
    $campos = "ubicacion='$ubicacion',estado='$estado'";
    $condicion = "idubicacion='$idubicacion'";
    // Ejecutar la actualización (aquí debes definir cómo identificar qué registro actualizar)
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion", "u"); // Asegúrate de tener una condición adecuada

    if ($update) {
        header("Location: principal.php?msj=" . base64_encode("Ubicación actualizada exitosamente....."));
        exit();
    } else {
        header("Location: formUpdate.php?msj=" . base64_encode("Error al actualizar la ubicación...."));
        exit();
    }
}
?>
