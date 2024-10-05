<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';
if (isset($_GET['msj'])) {
    $msj = base64_decode($_GET['msj']);
}
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    $dataUsuarios = CRUD("SELECT * FROM usuarios WHERE tipo='$tipo'", "s");
} else {
    $dataUsuarios = CRUD("SELECT * FROM usuarios", "s");
}
$cont = 0;
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php';?>
<body>
    <div id="principal" class="container-fluid">
        <?php
        include '../../views/navbar_modulos.php';
        ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Usuarios</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <div class="row centrar">
                        <div class="col-md-6">
                            <!-- Button Despliega Modal para registrar nuevo usuario -->
                            <button type="button" class="btn btnModulosPrincipal" data-bs-toggle="modal" data-bs-target="#ModalInsertUsuario">
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
                            <a href="./principal.php" class="btn btnModulosPrincipal"><i class="fa-solid fa-retweet"></i></a>
                        </div>
                        <div class="col-md-6">
                            <form action="principal.php" method="POST">
                                <div class="input-group mb-3" style="width: 350px; height: max-content;">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Busca Tipo</b>: </label>
                                    <select class="form-select" id="tipo" name="tipo">
                                        <option value="1">Administrador</option>
                                        <option value="2">Operador</option>
                                    </select>
                                    <button class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-borderless table-bordered" style="width: 80%;margin: 0 auto;">
                        <thead class="centrar">
                            <tr>
                                <th>Nº</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="centrar">
                            <!-- Bucle Foreach -->
                            <?php foreach ($dataUsuarios as $result): ?>
                                <tr>
                                    <td><?php echo $cont += 1; ?></td>
                                    <td><?php echo $result['usuario']; ?></td>
                                    <td><?php echo ($result['estado'] == 1) ? 'Activo' : 'Desactivo'; ?></td>
                                    <td><?php echo ($result['tipo'] == 1) ? 'Administrador' : 'Operador'; ?></td>
                                    <td>
                                        <form action="./formUpdate.php" method="POST">
                                            <input type="hidden" name="idusuario" value="<?php echo $result['idusuario']; ?>">
                                            <button class="btn btn-success btn-sm" name="uuf">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="./del.php" method="POST">
                                            <input type="hidden" name="idusuario" value="<?php echo $result['idusuario']; ?>">
                                            <button class="btn btn-danger btn-sm" name="ud">
                                                <i class="fa-solid fa-user-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if (isset($msj)): ?>
            alertify.alert("Registro Usuario", "<?php echo $msj; ?>");
            setTimeout(function() {
                // Redirigir a la página de destino
                window.location.href = "principal.php";
            }, 1000); // 1000 milisegundos = 1 segundo
        <?php endif ?>
    </script>
</body>

</html>