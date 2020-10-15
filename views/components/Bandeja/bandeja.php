<?php
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] != 0) {
?>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <?php if ($_SESSION["session"] == "validated" && $_SESSION["id_rol"] == 3) {?>
            <a href="<?=base_url?>pedidos/nuevo" class="btn btn-success btn-block mb-3">Nuevo mensaje <i
                    class="far fa-envelope-open"></i></a>
            <?php }?>
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Estados de los Pedidos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-3 border text-decoration-none">
                    <ul class="nav nav-pills flex-column nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item bg-secondary">
                            <a href="<?=base_url?>bandeja/entrada" class="nav-link text-white " aria-selected="true">
                                ENVIADO        <span class="float-right badge badge-light"><?php echo $total['Enviado'];?></span>                        
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/laboratorio" class="nav-link text-dark btn-light">
                                AUTORIZADO POR EL LABORATORIO       <span class="float-right badge badge-secondary"><?php echo $total['AuthLab'];?></span>                           
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/drogueria" class="nav-link text-dark btn-light">
                                AUTORIZADO POR LA DROGUERIA <span class="float-right badge badge-secondary"><?php echo $total['AuthDrog'];?></span>                      
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/facturacion" class="nav-link text-dark btn-light">
                                FACTURADO <span class="float-right badge badge-secondary"><?php echo $total['Facturado'];?></span>                                
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
        <!-- SECCION PARA MOSTRAR LOS DISTINTOS ITEM EN LA VISTA DE LA BANDEJA DE ENTRADA -->
        <div class="col-md-9 ">

            <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title font-weight-bold">Bandeja de entrada de mensajes <i
                            class="fas fa-envelope-open-text"></i></h3>
                            <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- AQUI VAN LAS OPCIONES DE CADA UNO DE LOS ITEMS DE LOS PEDIDOS-->
                    <div class="tab-content" id="myTabContent">

                        
                    <h3 class="text-header font-weight-bold">Pedidos <span class="text-success"><i
                                class="fas fa-check-circle"></i></span></h3>
                    <div class="bandeja-msg">
                        <table class=" table table-hover table-sm" >
                            
                            <tbody>
                            
                            <?php
                                foreach ($info as $rowPedidos) {
                                    $contador = 1;
                                    $pedido = $rowPedidos["pedido"];
                                    $id_obs = $rowPedidos["id_obs"];
                                    ?>
                                    <form action="<?=base_url?>bandeja/email" name="form<?=$contador?>" method="post">
                                        <tr>
                                            <td><input type="hidden" name="pedido" placeholder="<?=$pedido?>" value="<?=$pedido?>"></td>
                                            <td><input type="hidden" name="id_obs" placeholder="<?=$id_obs?>" value="<?=$id_obs?>"></td>

                                            <?php

                                                if ($rowPedidos['leido'] == 1){
                                                    echo '<td class="text-primary"><i class="far fa-check-double"></i></td>';
                                                }else{
                                                    echo '<td><i class="far fa-check-double"></i></td>';
                                                }
                                            
                                            ?>

                                            <td class="mailbox-name"><button class="btn btn-block btn-transparent text-primary"><?=$rowPedidos["cliente"]?></button></td>
                                            <td class="mailbox-subject"><button class="btn btn-block btn-transparent"><b><?=$rowPedidos["laboratorio"]?></b></button></td>
                                            <td class="mailbox-subject"><button class="btn btn-block btn-transparent"><?=$rowPedidos["observacion"]?></button></td>
                                            <td class="mailbox-subject"><button class="btn btn-block btn-transparent"><?=$rowPedidos["envio"]?></button></td>
                                            <?php 
                                            $rol = $_SESSION["id_rol"];
                                            if ($rol !=3) {
                                                echo "<td class='mailbox-date'><button class='btn btn-block btn-transparent'>".$rowPedidos['visto']."</button></td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                    </form>
                                    <?php
                                    
                                }
                                            
                            ?>
                            </tbody>
                        </table>
                    </div>



                    </div>
                    <!-- FIN DE LOS ITEMS -->
                </div>
            </div>

        </div>
        <!-- FIN PARA MOSTRAR LAS VISTAS DE LA BANDEJA DE ENTRADA -->
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<?php
    }else {
		
        error403();
	}
?>