<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';


if (empty($_POST['tipo'])) {
    // Redireccionar con el valor de la variable en la URL
    header("Location: principal.php?msj=" . base64_encode("Error  tipo de usuario no seleccionado favor de volver a llenar el formulario de resgitro de usuario...."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    $usuario = $_POST['usuario'];
    $passw = password_hash($_POST['passw'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];
    $tabla = "usuarios";
    $campos = "usuario,passw,estado,tipo";
    $valores = "'$usuario','$passw',1,'$tipo'";
    $insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)", "i");
    if ($insert) {
        header("Location: principal.php?msj=" . base64_encode("Usuario registrado....."));
        // Asegurarse de que no se siga ejecutando el script
        exit();
    } else {
        header("Location: principal.php?msj=" . base64_encode("Error al registrar usuario....."));
        // Asegurarse de que no se siga ejecutando el script
        exit();
    }
}
