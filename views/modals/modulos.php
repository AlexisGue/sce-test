<!-- Modal Módulos Navbar Index -->
<div class="modal fade" id="ModalModulosIndex" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <b class="centrar">Módulos</b>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="./views/usuarios/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="./public/img/usuarios.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Usuarios</b>
                </a>
                <a href="./views/categorias/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="./public/img/categorias.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Categorías</b>
                </a>
                <a href="./views/ubicaciones/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="./public/img/ubicaciones.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Ubicaciones</b>
                </a>
                <a href="./views/equipos/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="./public/img/equipos.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Equipos</b>
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Módulos Navbar Index -->
<div class="modal fade" id="ModalModulos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <b class="centrar">Módulos</b>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="../../views/usuarios/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="../../public/img/usuarios.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Usuarios</b>
                </a>
                <a href="../../views/categorias/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="../../public/img/categorias.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Categorías</b>
                </a>
                <a href="../../views/ubicaciones/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="../../public/img/ubicaciones.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Ubicaciones</b>
                </a>
                <a href="../../views/equipos/principal.php" class="btn btnModulosPrincipal btn-sm">
                    <img src="../../public/img/equipos.png" width="80px" class="img-fluid" alt="">
                    <br>
                    <b>Equipos</b>
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Insertar Usuario -->
<form action="insert.php" method="POST">
    <div class="modal fade" id="ModalInsertUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        <b>Registrar Usuario</b>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <b>Usuario: </b>
                        </span>
                        <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <b>Clave: </b>
                        </span>
                        <input type="text" class="form-control" placeholder="Ingrese Contraseña" name="passw" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><b>Tipo</b>: </label>
                        <select class="form-select" id="tipo" name="tipo">
                            <option disabled selected>Seleccione Tipo</option>
                            <option value="1">Administrador</option>
                            <option value="2">Operador</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <b>Cancelar <i class="fa-solid fa-ban"></i></b>
                    </button>
                    <button class="btn btn-primary">
                        <b>Registrar <i class="fa-solid fa-floppy-disk"></i>
                    </b></button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal Insertar Ubicacion -->
<form action="insert.php" method="POST">
    <div class="modal fade" id="ModalInsertUbicacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        <b>Registrar Ubicacion</b>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <b>Ubicacion: </b>
                        </span>
                        <input type="text" class="form-control" placeholder="Ingrese Ubicacion" name="ubicacion" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><b>Estado</b>: </label>
                        <select class="form-select" id="estado" name="estado">
                            <option disabled selected>Seleccione Estado</option>
                            <option value="1">Disponible</option>
                            <option value="2">No Disponible</option>
                        </select>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <b>Cancelar <i class="fa-solid fa-ban"></i></b>
                    </button>
                    <button class="btn btn-primary">
                        <b>Registrar <i class="fa-solid fa-floppy-disk"></i>
                    </b></button>
                </div>
            </div>
        </div>
    </div>
</form>