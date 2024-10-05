<?php
@session_start();
if (!isset($_SESSION['login_ok'])) {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

if (isset($_GET['msj'])) {
    $msj = base64_decode($_GET['msj']);
} else {
    $msj = null;
}
if (isset($_POST['estado'])) {
    $estado = $_POST['estado'];
    $dataUbicacion = CRUD("SELECT * FROM ubicaciones WHERE estado='$estado'", "s");
} else {
    $dataUbicacion = CRUD("SELECT * FROM ubicaciones", "s");
}    
$cont = 0;

?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>
<body>
    <div id="principal" class="container-fluid">
        <?php include '../../views/navbar_modulos.php'; ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Ubicaciones</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                <div class="row centrar">
                        <div class="col-md-6">
                            <!-- Button Despliega Modal para registrar nuevo usuario -->
                            <button type="button" class="btn btnModulosPrincipal" data-bs-toggle="modal" data-bs-target="#ModalInsertUbicacion">
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
                            <a href="./principal.php" class="btn btnModulosPrincipal"><i class="fa-solid fa-retweet"></i></a>
                        </div>
                        <div class="col-md-6">
                            <form action="principal.php" method="POST">
                                <div class="input-group mb-3" style="width: 350px; height: max-content;">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Busca Estado</b>: </label>
                                    <select class="form-select" id="estado" name="estado">
                                    <option value="1">Disponible</option>
                                    <option value="2">No Disponible</option>
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
                                <th>Ubicacion</th>
                                <th>Estado</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="centrar">

                        <?php if (count((array)$dataUbicacion)) {?>
                           
                            <!-- Bucle Foreach -->
                            <?php foreach ($dataUbicacion as $result): ?>
                                <tr>
                                    <td><?php echo ++$cont; ?></td>
                                    <td><?php echo $result['ubicacion']; ?></td>
                                    <td><?php echo ($result['estado'] == 1) ? 'Disponible' : 'No Disponible';  ?></td>
                                    <td>
                                        <form action="./formUpdate.php" method="POST">
                                            <input type="hidden" name="idubicacion" value="<?php echo $result['idubicacion']; ?>">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="./del.php" method="POST">
                                            <input type="hidden" name="idubicacion" value="<?php echo $result['idubicacion']; ?>">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-user-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        <?php } else {?>
                            <tr>
                                <td colspan="4" centrar>No hay registros</td>
                            </tr>
                        <?php }?>

                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if ($msj): ?>
            alertify.alert("Registro Ubicacion", "<?php echo $msj; ?>");
            setTimeout(function() {
                window.location.href = "principal.php";
            }, 1000);
        <?php endif ?>
    </script>
</body>
</html>