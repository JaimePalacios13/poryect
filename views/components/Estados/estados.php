<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] == 1) {
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Mantenimiento Estados</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2 mx-3">
                        <!-- <a href="<?=base_url?>usuario/registro" type="submit" class="btn btn-outline-info"><i class="fas fa-plus"></i></a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroestado">
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
                                <th>Estados</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($mostrarestado as $row) {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
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
                                                    <p class="font-weight-bolder">Estado</p>
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
                                            <h5 class="modal-title" id="verLabel">Ver</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="form" action="<?=base_url?>estados/editar">
                                                <div class="row">
                                                    <div class="col-md-8 m-auto">
                                                        <label for="usuario">Estado</label>
                                                        <input required type="text" id="estado" name="estado"
                                                            class="form-control" placeholder="Rol"
                                                            value="<?php echo $row['estado']; ?>">
                                                        <input type="hidden" id="id" name="id" class="form-control"
                                                            value="<?php echo $row['id_estado']; ?>">
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
                                            <form action="<?=base_url?>estados/eliminar" method="post">
                                                <div class="row">
                                                    <div class="col-md-10 m-auto">
                                                        <h5 class="modal-title text-center">¿Estas seguro de que quieres
                                                            eliminar este registro del rol "<span
                                                                class="font-italic"><?php echo $row['estado']; ?></span>"
                                                            ?</h5>

                                                        <input type="hidden" class="form-control" id="id" name="id"
                                                            value="<?php echo $row['id_estado']; ?>"
                                                            placeholder="<?php echo $row['id_estado']; ?>">
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
<div class="modal fade" id="registroestado" tabindex="-1" role="dialog" aria-labelledby="registroestadoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="registroestadoLabel"><i class="fas fa-plus-circle"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form" action="<?=base_url?>estados/guardar">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <label for="usuario">Estado</label>
                            <input required type="text" id="estado" name="estado" class="form-control"
                                placeholder="Estado">
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