<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] != 0) {
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Datos Personales</h3>
                </div>

                <div class="card-body p-5">

                    <form method="post" action="<?=base_url?>Perfil/Update">
                        <div class="row">
                            <div class="form-group col-md-4 m-auto">
                                <label for="inputUsuario">Nombre de usuario: </label>
                                <input type="text" class="form-control" id="inputUsuario" placeholder=""
                                    name="nombre_usuario" required value="<?php echo $row['nombre_usuario']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 m-auto">
                                <label for="inputCorreo">Correo</label>
                                <input type="email" class="form-control" id="inputCorreo" name="correo" placeholder=""
                                    required value="<?php echo $row['correo']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-md-4 m-auto">
                                <label for="inputRol">Rol</label>
                                <input type="text" class="form-control" id="inputRol" name="rol" placeholder="" readonly
                                    value="<?php echo $row['rol']; ?>">
                            </div>
                        </div>

                        <?php if($row['id_rol'] == 3){ ?>

                        <div>
                            <div class="form-group col-md-4 m-auto pb-3">
                                <label for="inputLab">Laboratorio</label>
                                <input type="text" class="form-control" id="inputLab" placeholder="" name="laboratorio"
                                    value="<?php echo $row['laboratorio']; ?>" readonly>
                            </div>
                            <div>
                            </div>
                            <?php }?>


                            <div class="card-footer">
                                <div class="float-right">
                                    <input type="submit" class="btn btn-primary " name="Enviar" value="Guardar Cambios">
                    </form>
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



    <!--       <div class="card-footer">
        <div class="row">
          <div class="col-md-12">
            <?php
            ?>
          </div>
        </div>
      </div>
 -->
</div>
</div>
</div>


<?php
    }else {
		
        error403();
	}
?>