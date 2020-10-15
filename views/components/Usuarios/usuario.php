<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] == 1) {
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Mantenimiento Usuarios</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2 mx-3">
                        <!-- <a href="<?=base_url?>usuario/registro" type="submit" class="btn btn-outline-info"><i class="fas fa-plus"></i></a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#registrousuario">
                            <i class="fas fa-user-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable table table-hover table-striped table-bordered table-sm"
                        style="width:100%">
                        <thead class="bg-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Laboratorio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($mostrarobj as $row) {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['nombre_usuario']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['rol']; ?></td>
                                <td><?php echo $row['laboratorio']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" data-toggle="modal" data-target="#ver<?=$i?>"
                                            class="btn btn-success"><i class="fas fa-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#editar<?=$i?>"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#eliminar<?=$i?>"
                                            class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <!-- href="<?=base_url?>usuario/eliminar&id=<?php echo $row['id_usuario']; ?>" -->
                                </td>
                            </tr>
                            <!-- MODALS PARA VER LOS DATOS DE LOS REGISTROS DE LA TABLA USUSARIO -->
                            <div class="modal fade" id="ver<?=$i?>" tabindex="-1" role="dialog"
                                aria-labelledby="verLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h5 class="modal-title" id="verLabel">
                                                <i class="far fa-eye"></i> Ver registro
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Nombre</p>
                                                    <p class="font-italic"><?php echo $row['nombre_usuario']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Correo</p>
                                                    <p class="font-italic"><?php echo $row['correo']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Rol</p>
                                                    <p class="font-italic"><?php echo $row['rol']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Laboratorio</p>
                                                    <p class="font-italic"><?php echo $row['laboratorio']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fin del modal de ver usuarios -->






                            <!--  Formulario para actualizar los datos  -->

                            <div class="modal fade" id="editar<?=$i?>" tabindex="-1" role="dialog"
                                aria-labelledby="verLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            
                                            <h5 class="modal-title" id="verLabel">
                                                <i class="fas fa-edit"></i>Actualizar Datos
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="formulario" action="<?=base_url?>usuario/editar">
                                                <div class="row">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="usuario">Nombre Usuario</label>
                                                        <input required type="text" id="nombre_usuario"
                                                            name="nombre_usuario" class="form-control"
                                                            placeholder="Nombre de usuario"
                                                            value="<?php echo $row['nombre_usuario']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="email">Email</label>
                                                        <input required type="email" id="correo" name="correo"
                                                            class="form-control" placeholder="Correo"
                                                            value="<?php echo $row['correo']; ?>">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="laboratorio">Laboratorio</label>
                                                        <input required type="text" id="laboratorio" name="laboratorio"
                                                            class="form-control" placeholder="laboratorio"
                                                            value="<?php echo $row['laboratorio']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="rol">Rol</label>
                                                        <select name="id_rol" id="rol" class="form-control">
                                                            <option value="<?php echo $row['id_rol'];?>" selected>
                                                                <?php echo $row['rol'];?></option>
                                                            <?php
                                                        foreach ($mostrarrol as $rol) {?>
                                                            <option value="<?php echo $rol['id_rol']; ?>">
                                                                <?php echo $rol['rol']; ?></>
                                                                <?php
                                                        }
                                                        ?>
                                                        </select>
                                                        <input type="hidden" name="id_usuario" class="form-control"
                                                            value="<?php echo $row['id_usuario']; ?>"
                                                            placeholder="<?php echo $row['id_usuario']; ?>">

                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-md-9 m-auto">
                                                        <button type="submit" value="update"
                                                            class="btn btn-warning btn-block">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="<?=base_url?>usuario/recuperar" method="POST">
                                                <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $row['id_usuario']; ?>" placeholder="<?php echo $row['id_usuario']; ?>">
                                                <div class="row mt-2">
                                                    <div class="col-md-9 m-auto">
                                                        <button type="submit" value="update"
                                                            class="btn btn-danger btn-block">Restablecer Contraseña</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- fin del modal de editar usuarios -->


                            <!-- Modals para eliminar registros de la tabla usuario -->
                            <div class="modal fade" id="eliminar<?=$i?>" tabindex="-1" role="dialog"
                                aria-labelledby="verLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="verLabel"><i class="fas fa-trash"></i> Eliminar
                                                registro</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base_url?>usuario/eliminar" method="post">
                                                <div class="row">
                                                    <div class="col-md-10 m-auto">
                                                        <h5 class="modal-title text-center">¿Estas seguro de que quieres
                                                            eliminar este registro del usuario "<span
                                                                class="font-italic"><?php echo $row['nombre_usuario']; ?></span>"
                                                            ?</h5>

                                                        <input type="hidden" name="id_usuario" class="form-control"
                                                            value="<?php echo $row['id_usuario']; ?>"
                                                            placeholder="<?php echo $row['id_usuario']; ?>">
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-md-10 m-auto">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-block">Eliminar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Fin del modals para eliminar registros de la tabla usuario -->


                            <?php
                            }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="result">
    <?php 
        Utils::getAlert();
        if (isset($_SESSION["register"])) {
        
            Utils::deleteSession("register");
            
        }else if(isset($_SESSION["delete"])){
            
            Utils::deleteSession("delete");

        }else{
            Utils::deleteSession("update");
        }
        
    ?>
</div>
<!-- Modal -->
<div class="modal fade" id="registrousuario" tabindex="-1" role="dialog" aria-labelledby="registrousuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="registrousuarioLabel"><i class="fas fa-user-plus"></i> Nuevo registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form" action="<?=base_url?>usuario/guardar">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <label for="usuario">Nombre Usuario</label>
                            <input required type="text" id="nombre_usuario" name="nombre_usuario" class="form-control"
                                placeholder="Nombre de usuario">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 m-auto">
                            <label for="email">Email</label>
                            <input required type="email" id="correo" name="correo" class="form-control"
                                placeholder="Correo">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 m-auto">
                            <label for="Password">Password</label>
                            <input required type="Password" id="password" name="password" class="form-control"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 m-auto">
                            <label for="laboratorio">Laboratorio</label>
                            <input required type="text" id="laboratorio" name="laboratorio" class="form-control"
                                placeholder="laboratorio">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 m-auto">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-control">
                                <option value="" selected>Seleccione:</option>
                                <?php
                                foreach ($mostrarrol as $rol) {?>
                                <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['rol']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-9 m-auto">
                            <button type="submit" value="Registrarse" class="btn btn-primary btn-block">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--fin modal -->
<script>
$(document).ready(function() {
    $('#usuarios').DataTable();
});
</script>

<?php
    }else {
		
        error403();
	}
?>