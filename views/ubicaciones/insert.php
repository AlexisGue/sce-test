<?php
@session_start();
if (!isset($_SESSION['login_ok'])) {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';


if (empty($_POST['estado'])) {
    // Redireccionar con el valor de la variable en la URL
    header("Location: principal.php?msj=" . base64_encode("Error  estado de ubicación no seleccionado favor de volver a llenar el formulario de resgitro de ubicación...."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {

    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $tabla = "ubicaciones";
    $campos = "ubicacion, estado";
    $valores = "'$ubicacion', '$estado'";
    $insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)", "i");


    if ($insert) {
        header("Location: principal.php?msj=" . base64_encode("Ubicacion registrada....."));
        exit();
    } else {
        header("Location: principal.php?msj=" . base64_encode("Error al registrar ubicacion....."));
        exit();
    }

}
?>