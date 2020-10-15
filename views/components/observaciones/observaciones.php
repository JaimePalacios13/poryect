<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] == 1) {
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Mantenimiento Observaciones</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2 mx-3">
                        <!-- <a href="<?=base_url?>usuario/registro" type="submit" class="btn btn-outline-info"><i class="fas fa-plus"></i></a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrorol">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable table table-hover table-striped table-bordered table-sm"
                        style="width:100%">
                        <thead class="bg-dark">
                            <tr>
                                <th>ID</th>
                                <th>Observacion</th>
                                <th>Estado Asignado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($mostrarobs as $row) {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['observaciones']; ?></td>
                                <td><?php echo $row['estado']; ?></td>
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
                            <!-- MODALS PARA VER LOS DATOS DE LOS REGISTROS DE LA TABLA ROLES -->
                            <div class="modal fade" id="ver<?=$i?>" tabindex="-1" role="dialog"
                                aria-labelledby="verLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h5 class="modal-title" id="verLabel">
                                                <i class="far fa-eye"></i>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Observacion</p>
                                                    <p class="font-italic"><?php echo $row['observaciones']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-auto text-center">
                                                    <p class="font-weight-bolder">Estado asignado de la observacion</p>
                                                    <p class="font-italic"><?php echo $row['estado']; ?></p>
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
                                            <i class="fas fa-"></i>
                                            <h5 class="modal-title" id="verLabel"><i class="fas fa-edit"></i></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="form" action="<?=base_url?>observaciones/editar">
                                                <div class="row">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="usuario">Observacion</label>
                                                        <input required type="text" id="observacion" name="observacion"
                                                            class="form-control" placeholder="Observacion"
                                                            value="<?php echo $row['observaciones']; ?>">
                                                        <input type="hidden" id="id" name="id" class="form-control"
                                                            value="<?php echo $row['id_rol']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="estado">Estado</label>
                                                        <select name="idestado" id="idestado" class="form-control">
                                                            <option value="<?php echo $row['id_estado'];?>" selected>
                                                                <?php echo $row['estado'];?></option>
                                                            <?php
                                                        foreach ($mostrarestado as $estado) {?>
                                                            <option value="<?php echo $estado['id_estado']; ?>">
                                                                <?php echo $estado['estado']; ?></>
                                                                <?php
                                                        }
                                                        ?>
                                                        </select>
                                                        <input type="hidden" name="id_observacion" class="form-control"
                                                            value="<?php echo $row['id_obs']; ?>"
                                                            placeholder="<?php echo $row['o.id_obs']; ?>">

                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-md-9 m-auto">
                                                        <button type="submit" value="update"
                                                            class="btn btn-warning btn-block">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- fin del modal de editar roles -->


                            <!-- Modals para eliminar registros de la tabla roles -->
                            <div class="modal fade" id="eliminar<?=$i?>" tabindex="-1" role="dialog"
                                aria-labelledby="verLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="verLabel"><i class="fas fa-trash"></i> </h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base_url?>observaciones/eliminar" method="post">
                                                <div class="row">
                                                    <div class="col-md-10 m-auto">
                                                        <h5 class="modal-title text-center">¿Estas seguro de que quieres
                                                            eliminar este registro: "<span
                                                                class="font-italic"><?php echo $row['observaciones']; ?></span>"
                                                            ?</h5>

                                                        <input type="hidden" class="form-control" id="id_observacion"
                                                            name="id_observacion" value="<?php echo $row['id_obs']; ?>"
                                                            placeholder="<?php echo $row['id_obs']; ?>">
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
<div class="modal fade" id="registrorol" tabindex="-1" role="dialog" aria-labelledby="registrorolLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="registrorolLabel"><i class="fas fa-plus-circle"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form" action="<?=base_url?>observaciones/guardar">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <label for="usuario">Observacion</label>
                            <input required type="text" id="observacion" name="observacion" class="form-control"
                                placeholder="Observacion">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 m-auto">
                            <label for="rol">Estado</label>
                            <select name="idestado" id="idestado" class="form-control">
                                <option value="" selected>Seleccione:</option>
                                <?php
                                foreach ($mostrarestado as $estado) {?>
                                <option value="<?php echo $estado['id_estado']; ?>"><?php echo $estado['estado']; ?>
                                </option>
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