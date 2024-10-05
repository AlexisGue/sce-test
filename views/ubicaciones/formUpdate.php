<?php
@session_start();
if (!isset($_SESSION['login_ok'])) {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

$idubicacion = isset($_POST['idubicacion']) ? $_POST['idubicacion'] : base64_decode($_GET['idubicacion']);
if (isset($_GET['msj'])) {
    $msj = base64_decode($_GET['msj']);
} else {
    $msj = null;
}

$dataUbicacion = CRUD("SELECT * FROM ubicaciones WHERE idubicacion='$idubicacion'", "s");
foreach ($dataUbicacion as $result) {
    $ubicacion = $result['ubicacion'];
    $estado = $result['estado'];
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>
<body>
    <div id="principal" class="container-fluid">
        <?php include '../../views/navbar_modulos.php'; ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Ubicacion (Actualizar)</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="./principal.php" class="btn btnModulosPrincipal"><b><i class="fa-solid fa-circle-left"></i> Regresar</b></a>
                        <form action="update.php" method="POST">
                            <input type="hidden" name="idubicacion" value="<?php echo $idubicacion; ?>">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><b>Ubicacion: </b></span>
                                <input type="text" class="form-control" placeholder="Ubicacion" name="ubicacion" required value="<?php echo $ubicacion; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><b>Estado: </b></span>
                                <select class="form-select" name="estado" required>
                                    <option value="1" <?php echo ($estado == 1) ? 'selected' : ''; ?>>Disponible</option>
                                    <option value="2" <?php echo ($estado == 2) ? 'selected' : ''; ?>>No Disponible</option>
                                </select>
                            </div>
                            <button class="btn btnModulosPrincipal btn-sm">
                                <b>Actualizar <i class="fa-solid fa-rotate"></i></b>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if ($msj): ?>
            alertify.alert("Actualizar Ubicacion", "<?php echo $msj; ?>");
            setTimeout(function() {
                window.location.href = "formUpdate.php?id=<?php echo base64_encode($idubicacion); ?>";
            }, 1000);
        <?php endif ?>
    </script>
</body>
</html>