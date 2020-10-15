<?php
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");
    if ($_SESSION["session"] == "validated" && $_SESSION["id_rol"] ==3) {
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Message</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" id="formulario" action="<?=base_url?>pedidos/guardar">
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="font-weight-bolder">Nombre de Usuario</label>
                  <input class="form-control"  readonly value="<?=$_SESSION["nombre_usuario"];?>">
                  <input type="hidden" class="form-control" name="usuario" id="usuario" readonly value="<?=$_SESSION["id_usuario"];?>">
                </div>
                <div class="form-group col-md-2">
                </div>
                <input type="hidden" class="form-control" name="id_obs" id="id_obs" readonly value="1">

                <div class="form-group col-md-6">
                  <label class="font-weight-bolder">Cliente</label>
                  <input class="form-control" name="cliente" id="cliente" placeholder="Cliente" required autofocus>
                </div>
              </div>
              <div class="row">
                <table class="table table-primary table-sm" id="tablaprueba">
                  <thead>
                    <tr>
                      <td>Nombre Producto</td>
                      <td>Cantidad</td>
                      <td>Bonificacion</td>
                      <td>Descuento Laboratorio</td>
                      <td>Descuento Guardado</td>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>

                <div class="form-group mt-3">
                  <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>
                  <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-2">
                  <label class="font-weight-bolder">Fecha de Envio</label>
                  <input class="form-control" placeholder="fecha envio" name="envio" id="envio" readonly value="<?php echo $registro ?>">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
            </div>
          </div>
          <!-- /.card-footer ..-->
        </form>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<script type="text/javascript">
  function agregarFila(){
  document.getElementById("tablaprueba").insertRow(-1).innerHTML = `
  <td><input class="form-control" type="text" name="producto[]" pattern="[a-z-A-ZáéíóúÁÉÍÓÚÑñ0-9 ]{3,80}" required="required"></td>
  <td><input class="form-control" type="number" name="cantidad[]" onkeyup="if(this.value<0){this.value= this.value * -1}" min="1" required="required"></td>
  <td><input class="form-control" type="number" name="bonificacion[]" onkeyup="if(this.value<0){this.value= this.value * -1}" min="1" required="required"></td>
  <td><input class="form-control" type="text" name="desclab[]" pattern="[0-9% ]{0,40}" onkeyup="if(this.value<0){this.value= this.value * -1}" min="1" required="required"></td>
  <td><input class="form-control" type="text" name="descguardado[]" pattern="[0-9% ]{0,40}" onkeyup="if(this.value<0){this.value= this.value * -1}" min="1" required="required"></td>
  `;
}

function eliminarFila(){
  var table = document.getElementById("tablaprueba");
  var rowCount = table.rows.length;
  //console.log(rowCount);
  
  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}
</script>

<?php
    }else {
		
        error403();
	}
?>