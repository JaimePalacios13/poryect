<?php

    class errorControler
    {
        public function index(){
            
            echo "
                    <div class='container p-5 '>
                        <div class='row mt-5'>
                            <div class='col-md-12 m-auto'>
                                <img src='".base_url."views/assets/img/404guy.png' class='img-fluid' alt='error 404 page not found'>
                            </div>
                        </div>
                    </div>
                ";
        }

        public function error403(){
           
            if ($_SESSION["session"] == "" && $_SESSION["id_usuario"] == NULL && $_SESSION["id_rol"] == NULL && $_SESSION["nombre_usuario"] == NULL && $_SESSION["email"] == NULL) {
               
                Utils::loadActionn("");
            }else{

                echo "
                
                <div class='container  p-5 mt-5'>
                <div class='row'>
                <div class='col-md-8 m-auto'>
                <img src='".base_url."views/assets/img/403.png' class='img-fluid' alt='error 403, access denied'>
                </div>
                </div>
                </div>
                
                ";
            }
        }
    }
    