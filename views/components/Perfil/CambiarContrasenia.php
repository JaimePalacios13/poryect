<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] != 0) {
?>

<style>
.campo span {
    position: absolute;
    right: 13px;
    top: 45px;
    cursor: pointer;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Cambiar Contraseña</h3>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="<?=base_url?>Perfil/UpdatePassword">

                        <div class="row  mt-2">
                            <div class="form-group col-md-4 m-auto">
                                <div class="campo">
                                    <label for="inputPwdActual">Contraseña actual: </label>
                                    <input type="password" class="form-control password" id="inputPwdActual"
                                        placeholder="" required name="pwd">
                                    <span class="fa fa-fw fa-eye password-icon show-password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 m-auto">
                                <div class="form-group">
                                    <div class="campo">
                                        <label for="inputPwdNueva">Nueva contraseña: </label>
                                        <input type="password" class="form-control password1" placeholder="" required
                                            name="pwd1" id="pwd1">
                                        <span class="fa fa-fw fa-eye password-icon show-password1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 m-auto">
                                <div class="form-group">
                                    <div class="campo">
                                        <label for="inputPwd2">Confirmar contraseña:</label>
                                        <input type="password" class="form-control password2" placeholder="" required
                                            name="pwd2" id="pwd2">
                                        <span class="fa fa-fw fa-eye password-icon show-password2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <input type="submit" class="btn btn-primary " name="Enviar" value="Guardar Cambios">
                        </form>
                    </div>
                </div>
            </div>

            <!-- 
      <div class="card-footer">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
      </div> -->

            <script>
            window.addEventListener("load", function() {

                // icono para mostrar contraseña
                showPassword1 = document.querySelector('.show-password1');
                showPassword1.addEventListener('click', () => {

                    // elementos input de tipo clave
                    password1 = document.querySelector('.password1');

                    if (password1.type === "text") {
                        password1.type = "password"
                        showPassword1.classList.remove('fa-eye-slash');
                    } else {
                        password1.type = "text"
                        showPassword1.classList.toggle("fa-eye-slash");
                    }

                })

            });



            window.addEventListener("load", function() {

                // icono para mostrar contraseña
                showPassword2 = document.querySelector('.show-password2');
                showPassword2.addEventListener('click', () => {

                    // elementos input de tipo clave
                    password2 = document.querySelector('.password2');


                    if (password2.type === "text") {
                        password2.type = "password"
                        showPassword2.classList.remove('fa-eye-slash');
                    } else {
                        password2.type = "text"
                        showPassword2.classList.toggle("fa-eye-slash");
                    }

                })

            });



            window.addEventListener("load", function() {

                // icono para mostrar contraseña
                showPassword = document.querySelector('.show-password');
                showPassword.addEventListener('click', () => {

                    // elementos input de tipo clave
                    password = document.querySelector('.password');


                    if (password.type === "text") {
                        password.type = "password"
                        showPassword.classList.remove('fa-eye-slash');
                    } else {
                        password.type = "text"
                        showPassword.classList.toggle("fa-eye-slash");
                    }

                })

            });
            </script>


        </div>
    </div>
</div>
<div id="result">
    <?php 
        Utils::getAlert();

        if (isset($_SESSION["updatew1"])) {
        
            Utils::deleteSession("updatew1");
            
        }else{
            Utils::deleteSession("update");
        }
        
    ?>
</div>

<?php
    }else {
		
        error403();
	}
?>