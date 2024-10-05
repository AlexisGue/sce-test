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
                <b>PanelCategorías</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-borderless table-bordered" style="width: 80%;margin: 0 auto;">
                        <thead class="centrar">
                            <tr>
                               
                            </tr>
                        </thead>
                        <tbody class="centrar">
                            <!-- Bucle Foreach -->
                            <?php ?>
                            <tr>
                               
                            </tr>
                            <?php ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
</body>

</html>