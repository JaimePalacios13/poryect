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
                <div class="card-body p-3 border">
                    <ul class="nav nav-pills flex-column nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/entrada" class="nav-link text-dark " aria-selected="true">
                                ENVIADO <span class="float-right badge badge-secondary"><?php echo $total['Enviado'];?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/laboratorio" class="nav-link text-dark">
                                AUTORIZADO POR EL LABORATORIO <span class="float-right badge badge-secondary"><?php echo $total['AuthLab'];?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/drogueria" class="nav-link text-dark">
                                AUTORIZADO POR LA DROGUERIA <span class="float-right badge badge-secondary"><?php echo $total['AuthDrog'];?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/facturacion" class="nav-link text-dark">
                                FACTURADO <span class="float-right badge badge-secondary"><?php echo $total['Facturado'];?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?=base_url?>bandeja/entrada" class="nav-link text-dark bg-info">
                                <i class="fas fa-caret-left"></i> VOLVER
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
                    <h3 class="card-title font-weight-bold">Informacion del Mensaje<i
                            class="fas fa-envelope-open-text"></i></h3>
                </div>
                <div class="card-body">
                    <!-- AQUI VAN LAS OPCIONES DE CADA UNO DE LOS ITEMS DE LOS PEDIDOS-->
                    <div class="tab-content" id="myTabContent">
                        <h3 class="text-header font-weight-bold">Mensaje Visto <span class="text-success"><i
                                    class="fas fa-check-circle"></i></span></h3>
                        <div class="bandeja-msg">
                            <table class="table table-hover table-striped table-bordered table-sm" tyle="width:100%">
                                <tbody>
                                    <?php
                        $i = 1;
                        foreach ($message as $value) {

                            $fechaEnvio = $value['envio'];
                            $id_estado = $value['id_estado'];
                            if ($i == 1){
                            ?>

                                    <form class="form" method="post" action="<?=base_url?>bandeja/cambio">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Cliente: </label>
                                                    <label for=""
                                                        class="text-info"><?php echo $value["cliente"];  ?></label>
                                                    <input type="hidden" name="id_pedido"
                                                        value="<?php echo $value["pedido"];  ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label> Laboratorio: </label>
                                                    <label for=""
                                                        class="text-info"><?php echo $value["laboratorio"];  ?></label>
                                                </div>
                                            </div>
                                            <?php if ($_SESSION["session"] == "validated" && $_SESSION["id_rol"] == 2 && $id_estado !=4) {?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Estado</label>
                                                    <select name="id_obs" id="id_obs" class="form-control">
                                                        <option value="<?php echo $value['id_obs'];?>" selected>
                                                            <?php echo $value['observacion'];?></option>
                                                        <?php
                                        foreach ($mostrar as $obs) {?>
                                                        <option value="<?php echo $obs['id_obs']; ?>">
                                                            <?php echo $obs['observacion']; ?></option>
                                                        <?php
                                        }
                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <button type="submit" value="update" class="btn btn-warning">Guardar
                                                        Cambios</button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                    <?php
                            $i++;
                            }
                        }
                        ?>
                                    <tr>
                                        <th> Producto</th>
                                        <th> Cantidad </th>
                                        <th> Bonificacion</th>

                                        <th> Des. Lab</th>
                                        <th> Des. Guardado</th>
                                    </tr>
                                    <?php
                            foreach ($message as $rowPedidos) {
                                //$pedido = $rowPedidos["pedido"];
                            ?>
                                    <tr>
                                        <td class="mailbox-name"> <?php echo $rowPedidos["producto"];?> </td>
                                        <td class="mailbox-subject"> <?php echo $rowPedidos["cantidad"];?> </td>
                                        <td class="mailbox-subject"> <?php echo $rowPedidos["bonificacion"];?> </td>
                                        <td class="mailbox-subject"> <?php echo $rowPedidos["desclab"];?> </td>
                                        <td class="mailbox-date"> <?php echo $rowPedidos["descguardado"];?> </td>
                                    </tr>
                                    <?php
                        }
                        ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Fecha de envio: </label>
                                    <label for="" class="text-info"><?php echo $fechaEnvio;  ?></label>
                                </div>
                                <div class="col-md-6">
                                    <label> Enviado por: </label>
                                    <label for="" class="text-info"><?php echo $rowPedidos["usuario"];?>, <<i>
                                            <?php echo $rowPedidos["correo"];?></i>></label>
                                </div>
                            </div>

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