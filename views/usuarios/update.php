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
    echo "Error";
    // Redireccionar con el valor de la variable en la URL
    header("Location: formUpdate.php?idusuario=" . base64_encode($idusuario)."&msj=".base64_encode("Error favor de selecionar el tipo de usuario...."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    $tabla = "usuarios";
    $idusuario = $_POST['idusuario'];
    $usuario = $_POST['usuario'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    if(empty($_POST['passw'])){
        $campos = "usuario='$usuario',estado='$estado',tipo='$tipo'";
        $condicion = "idusuario='$idusuario'";
    }else{
        $passw = password_hash($_POST['passw'], PASSWORD_DEFAULT);
        $campos = "usuario='$usuario',passw='$passw',estado='$estado',tipo='$tipo'";
        $condicion = "idusuario='$idusuario'";
    }
    
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion", "u");
    if ($update) {
        header("Location: principal.php?msj=" . base64_encode("Usuario actualizado....."));
        // Asegurarse de que no se siga ejecutando el script
        exit();
    } else {
        header("Location: formUpdate.php?idusuario=" . base64_encode($idusuario)."&msj=".base64_encode("Error al actualizar usuario...."));
        // Asegurarse de que no se siga ejecutando el script
        exit();
    }
}
